<?php

namespace App\Http\Controllers;

use \Log;
use App\Mail\BookingCancelled;
use App\Mail\BookingSummary;
use App\Mail\PaymentApprovedInvoice;
use App\Mail\PaymentConfirmation;
use App\Mail\ProcessingInvoice;
use App\Mail\WelcomeEmail;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Pricing;
use App\Models\Room;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PDF;

class BookingController extends Controller
{
    // Book Tour
    public function bookTour(Request $request, $tourId)
{
    $tour = Tour::findOrFail($tourId);
    $pricing = $tour->pricing;
    $request->validate([
        'start_date' => 'required|date',
        'guests' => 'required|integer|min:1',
        'guest_type' => 'required|in:resident,foreigner',
        'children_count' => 'required|integer|min:0'
    ]);

    // Calculate pricing
    $currentMonth = Carbon::parse($request->start_date)->month;
    $pricingData = $pricing->getMonthlyPricing($currentMonth);
    $pricePerPerson = ($request->guest_type === 'resident') ? $pricingData['resident_price'] : $pricingData['foreign_price'];
    $discount = $pricingData['discount'] ?? 0;

    // Calculate children price at 50% discount
    $childrenPrice = ($pricePerPerson * 0.5) * $request->children_count;

    // Total price before discount
    $totalPrice = ($pricePerPerson * $request->guests) + $childrenPrice;

    // Apply discount if any
    $totalDiscountedAmount = $totalPrice * ($discount / 100);
    $totalPrice -= $totalDiscountedAmount;

    // Store booking details in session
    $bookingData = [
        'bookable_type' => 'tour',
        'bookable_id' => $tour->id,  // Keep this if other parts of the system use it
        'tour_id' => $tour->id,
        'tour_name' => $tour->name,
        'destination' => $tour->destination->name,
        'start_date' => $request->start_date,
        'guests' => $request->guests,
        'guest_type' => $request->guest_type,
        'children_count' => $request->children_count,
        'total_price' => $totalPrice,
        'discount' => $discount,  // Saving discount percentage
        'discount_amount' => $totalDiscountedAmount  // Saving total discounted amount
    ];

    Session::put('booking_data', $bookingData);

    \Log::debug('Booking Data:', session('booking_data'));

    return redirect()->route('user.booking.summary');
}

// Book Hotel
public function bookHotel(Request $request, $hotelId)
{
    // Find the hotel, or fail with a 404 error if not found
    $hotel = Hotel::findOrFail($hotelId);

    // Validate the incoming request data
    $request->validate([
        'room_id' => 'required|exists:rooms,id',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
        'guests' => 'required|integer|min:1'
    ]);

    // Find the room and ensure it's available
    $room = Room::where('hotel_id', $hotel->id)
                ->where('id', $request->room_id)
                ->where('is_available', true)
                ->firstOrFail();





                      // Calculate the total days based on the nights stayed
    $startDate = Carbon::parse($request->start_date);
    $endDate = Carbon::parse($request->end_date);
    $days = $startDate->diffInDays($endDate);  // Calculate days by the difference

    if ($days == 0) {
        $days = 1;  // Ensure at least one night is charged
    } else {
        // Include the night of the last day if late check-out isn't a typical policy
        $days = $startDate->diffInDays($endDate->subDay());
        $days = max($days, 1); // Safety check to prevent negative values
    }

        $roomPrice = $room->price;

        // Ensure at least one day is charged

$totalPrice = $roomPrice * $days;


    // Store booking details in session
    $bookingData = [
        'bookable_type' => 'hotel',
        'bookable_id' => $hotel->id,
        'hotel_id' => $hotel->id,
        'hotel_name' => $hotel->name,
        'destination' => $hotel->destination->name,
        'room_id' => $room->id,
        'room_name' => $room->room_name,
        'room_price' => $room->price,
        'room_type' => $room->room_type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'guests' => $request->guests,
        'total_price' => $totalPrice,

    ];

    // Save the booking data to the session
    Session::put('booking_data', $bookingData);



    // Redirect to a summary page to review the booking details
    return redirect()->route('user.booking.summary');
}




    // Register guest
    public function registerGuest(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15'
        ]);

        // Generate random password
        $password = Str::random(8);

        $user = User::create([
            'full_name' => $request->full_name,
            'username' => Str::slug($request->full_name) . rand(1000, 9999),
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($password),
        ]);

        // Send welcome email with generated username and password
        Mail::to($user->email)->send(new WelcomeEmail($user, $password));

        // Log in the new user
        Auth::login($user);

        // Redirect to summary page
        return redirect()->route('user.booking.summary');
    }

        // Summary Page
        public function summary()
        {
            $data = session('booking_data');
            if (!$data) {
                return redirect()->back()->with('error', 'No booking data found.');
            }

            if (Auth::check()) {
                $data['user'] = Auth::user();
                return view('booking.summary', compact('data'));
            } else {
                // If the user is not authenticated, show guest form
                return view('booking.guest_form', compact('data'));
            }
        }


    public function submitBooking(Request $request)
    {


        $request->validate([
            'bookable_type' => 'required|string',
            'bookable_id' => 'required|integer',
            'guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric',
            'room_id' => 'nullable|integer|exists:rooms,id',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:start_date',
            'guest_type' => 'nullable|string|in:resident,foreigner',
            'children_count' => 'nullable|integer|min:0',
            'tour_name' => 'nullable',
             'destination' => 'nullable',
             'discount' => 'nullable',
             'room_type' => 'nullable',
             'room_name' => 'nullable',
             'hotel_name' => 'nullable',
             'room_price' => 'nullable'
        ]);

            // Format dates from MM/DD/YYYY to YYYY-MM-DD
    $startDate = $request->start_date ? (new DateTime($request->start_date))->format('Y-m-d') : null;
    $endDate = $request->end_date ? (new DateTime($request->end_date))->format('Y-m-d') : null;


        $totalPrice = $request->total_price;
        $discountPercent = $request->discount;
        $discountAmount = $totalPrice * ($discountPercent / 100);  // Calculate discount amount


        try {
            $booking = Booking::create([
                'user_id' => Auth::id(),
                'bookable_type' => $request->bookable_type,
                'bookable_id' => $request->bookable_id,
                'room_id' => $request->room_id ?? null,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'guests' => $request->guests,
                'guest_type' => $request->guest_type ?? null,
                'children_count' => $request->children_count ?? 0,
                'total_price' => $request->total_price,
                'tour_name' => $request->tour_name ?? null,
                'destination' => $request->destination ?? null,
                'discount' => $request->discount ?? 0,
                'discount_amount' => $discountAmount ?? 0,
                'room_type' => $request->room_type,
                'room_name' => $request->room_name,
                'room_price' => $request->room_price,
                'hotel_name' =>$request->hotel_name,
                'status' => 'pending'
            ]);

            // Resetting discount information in the session after a booking is completed
            Session::forget(['discount', 'discount_amount']);

            // Send email notifications
            Mail::to($booking->user->email)->send(new BookingSummary($booking));
            Mail::to(config('app.admin_email'))->send(new BookingSummary($booking));

            return redirect()->route('user.booking.review'); // Assuming this is your review route
        } catch (\Exception $e) {
            Log::error('Error submitting booking:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to process booking: ' . $e->getMessage());
        }
    }



    public function reviewBooking()
{
    return view('booking.review');
}



public function listBookings(Request $request)
{
    $status = $request->input('status');
    $bookings = Booking::where('user_id', Auth::id())
                       ->when($status, function ($query, $status) {
                           return $query->where('status', $status);
                       })
                       ->latest()
                       ->paginate(10);

    return view('user.bookings.index', compact('bookings', 'status'));
}


    // Payment Page
    public function payment($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        return view('booking.payment', compact('booking'));
    }

    // Confirm Payment
    // public function confirmPayment(Request $request, $bookingId)
    // {
    //     $booking = Booking::findOrFail($bookingId);
    //     $request->validate([
    //         'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:2048'
    //     ]);

    //     $path = $request->file('payment_proof')->store('payment_proofs', 'public');
    //     $booking->update(['payment_proof' => $path]);

    //     $booking->status = 'processing';
    //     $booking->save();

    //     // Send confirmation email
    //     Mail::to($booking->user->email)->send(new PaymentConfirmation($booking));
    //     Mail::to(config('app.admin_email'))->send(new PaymentConfirmation($booking));

    //     return view('booking.payment_success', ['booking' => $booking]);
    // }

    public function confirmPayment(Request $request, $bookingId)
{
    $booking = Booking::findOrFail($bookingId);
    $request->validate([
        'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:2048'
    ]);

    try {
        // Start transaction
        DB::beginTransaction();

        $path = $request->file('payment_proof')->store('payment_proofs', 'public');
        $booking->update([
            'payment_proof' => $path,
            'status' => 'processing'
        ]);

        // Send confirmation emails
        Mail::to($booking->user->email)->send(new PaymentConfirmation($booking));
        Mail::to(config('app.admin_email'))->send(new PaymentConfirmation($booking));

        DB::commit();

        return redirect()->route('user.bookings.list')
                         ->with('success', 'Payment confirmed and processing started.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors('Error during payment confirmation: ' . $e->getMessage());
    }
}



    public function Adminindex(Request $request)
    {
        $search = $request->input('search');

        $bookings = Booking::with('user')
            ->whereHas('user', function ($query) use ($search) {
                $query->where('full_name', 'like', '%' . $search . '%');
            })
            ->orWhere('id', 'like', '%' . $search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }



        // Update Booking Status
public function updateBookingStatus(Request $request, $bookingId)
{
    $booking = Booking::findOrFail($bookingId);
    $status = $request->status;
    $booking->status = $status;
    $booking->save();

    // Generate the PDF invoice for both processing and completed statuses
    if ($status == 'processing' || $status == 'completed') {
        $pdf = PDF::loadView('invoices.booking_invoice', ['booking' => $booking]);
        $pdfOutput = $pdf->output();

        $mailSubject = $status == 'processing' ? new ProcessingInvoice($booking) : new PaymentApprovedInvoice($booking);

        // Send email with an attached PDF invoice
        Mail::to($booking->user->email)->send($mailSubject->attachData($pdfOutput, 'invoice.pdf', [
            'mime' => 'application/pdf',
        ]));

        // Additional actions or information if the booking is completed
        if ($status == 'completed') {
            // Additional email or action can be handled here
            // For instance, sending a confirmation or thank you email could be appropriate
        }
    } elseif ($status == 'cancelled') {
        Mail::to($booking->user->email)->send(new BookingCancelled($booking));
    }

    return redirect()->back()->with('success', 'Booking status updated successfully.');
}



   public function downloadInvoice($id)
{
    $booking = Booking::findOrFail($id);

    // Check if the user is allowed to download the invoice
    if ($booking->user_id != auth()->id() && !auth()->user()->isAdmin()) {
        abort(403, 'Unauthorized access.');
    }

    $pdf = PDF::loadView('invoices.booking_invoice', compact('booking'));

    // Return a download response
    return $pdf->download('invoice-' . $booking->id . '.pdf');
}
}