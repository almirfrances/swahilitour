<?php

namespace App\Http\Controllers;

use App\Mail\EventBookingCompleted;
use App\Mail\EventBookingConfirmation;
use App\Mail\EventBookingConfirmationAdmin;
use App\Mail\EventPaymentProofReceived;
use App\Mail\WelcomeEmail;
use App\Models\Event;
use App\Models\EventBooking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EventBookingController extends Controller
{

        /**
 * Store a new event booking and register user if not authenticated.
 */
public function store(Request $request, $slug)
{

    $event = Event::where('slug', $slug)->firstOrFail();

    if (!Auth::check()) {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:255',
            'booking_type' => 'required|string'
        ]);

        // Generate username and password
        $username = explode('@', $validatedData['email'])[0];
        $password = Str::random(10);

        $user = User::create([
            'full_name' => $validatedData['full_name'],
            'username' => Str::slug($request->full_name) . rand(1000, 9999),
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($password),
        ]);

        // Send welcome email with credentials
        Mail::to($user->email)->send(new WelcomeEmail($user, $password));

        // Authenticate the user
        Auth::login($user);
    } else {
        $user = Auth::user();
        $validatedData = $request->validate([
            'booking_type' => 'required|string'
        ]);
    }

        // Determine price and discount based on booking type
        $price = 0;
        $discount_percentage = $event->discount_percentage;
        switch ($validatedData['booking_type']) {
            case 'residential_single':
                $price = $event->residential_price_single;
                break;
            case 'foreign_single':
                $price = $event->foreign_price_single;
                break;
            case 'couple_residential':
                $price = $event->couple_residential_price;
                break;
            case 'couple_foreign':
                $price = $event->couple_foreign_price;
                break;
        }

        $discountedPrice = $price * (1 - $discount_percentage / 100);  // Apply discount


    // Create the event booking
    $booking = EventBooking::create([
        'event_id' => $event->id,
        'user_id' => $user->id,
        'booking_type' => $validatedData['booking_type'],
        'status' => 'pending',
        'price' => $discountedPrice,
        'discount_percentage' => $discount_percentage
    ]);

    // Send email notifications about the booking
    Mail::to($user->email)->send(new EventBookingConfirmation($booking));
    Mail::to(config('app.admin_email'))->send(new EventBookingConfirmationAdmin($booking));

    // Redirect user to the payment upload page
    return redirect()->route('user.event.bookings.payment', ['bookingId' => $booking->id])
    ->with('success', 'Booking successful. Please upload your payment proof.');

}


    /**
     * Show the payment proof upload form.
     */
    public function payment($bookingId)
    {
        $booking = EventBooking::findOrFail($bookingId);
        return view('bookings.event.payment', compact('booking'));
    }

    /**
     * Store payment proof and send notification email.
     */
    public function storePaymentProof(Request $request, $bookingId)
    {
        $request->validate([
            'payment_proof' => 'required|image|max:2048'
        ]);

        $booking = EventBooking::findOrFail($bookingId);
        $path = $request->file('payment_proof')->store('payment_proofs', 'public');
        $booking->update(['payment_proof' => $path]);

        // Email user and admin about payment proof submission
        Mail::to($booking->user->email)->send(new EventPaymentProofReceived($booking));
        return redirect()->route('user.dashboard')->with('success', 'Payment proof uploaded successfully. We are reviewing it.');
    }




    public function listBookings(Request $request)
    {
        // Retrieve the status filter from the request
        $status = $request->input('status');

        // Fetch the bookings for the authenticated user, optionally filtering by status
        $bookings = EventBooking::where('user_id', Auth::id())
                        ->when($status, function ($query, $status) {
                            return $query->where('status', $status);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(10); // Paginate the results

        // Return the view with the bookings data
        return view('user.event.bookings.list', [
            'bookings' => $bookings
        ]);
    }






        // Display all bookings with filtering and pagination
        public function adminIndex(Request $request)
        {
            $search = $request->input('search');

            $bookings = EventBooking::with('user')
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('full_name', 'like', '%' . $search . '%');
                })
                ->orWhere('id', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return view('admin.bookings.event.index', compact('bookings'));
        }

        public function updateBookingStatus(Request $request, $bookingId)
        {
            $booking = EventBooking::findOrFail($bookingId);
            $previousStatus = $booking->status;
            $newStatus = $request->status;

            $booking->status = $newStatus;
            $booking->save();

            // Check if status is set to 'completed' and send an email
            if ($newStatus === 'completed' && $previousStatus !== 'completed') {
                // Assuming 'EventBookingCompleted' is the name of the Mailable class
                Mail::to($booking->user->email)->send(new EventBookingCompleted($booking));
            }

            return redirect()->back()->with('success', "Booking status updated successfully to " . $booking->status);
        }

}