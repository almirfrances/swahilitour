<?php

namespace App\Http\Controllers;

use App\Mail\AdminReplyNotification;
use App\Mail\ReviewNotificationToAdmin;
use App\Mail\ReviewReceived;
use App\Mail\WelcomeEmail;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ReviewController extends Controller
{


    public function store(Request $request)
    {
        Log::info('Review store method invoked', ['request_data' => $request->all()]);

        // Validate input
        $validated = $request->validate([
            'reviewable_type' => 'required|string',
            'reviewable_id' => 'required|integer',
            'service_rating' => 'required|integer|min:1|max:5',
            'location_rating' => 'required|integer|min:1|max:5',
            'amenities_rating' => 'required|integer|min:1|max:5',
            'price_rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'full_name' => 'sometimes|required|string',
            'email' => 'sometimes|required|email',
        ]);

        $user = Auth::check() ? Auth::user() : null;

        // If user is not authenticated, create a new account and login
        if (!$user) {
            Log::info('User is not authenticated, creating a new user.');

            $password = Str::random(10);

            try {
                $user = User::create([
                    'full_name' => $validated['full_name'],
                    'username' => Str::slug($validated['full_name']) . rand(1000, 9999),
                    'email' => $validated['email'],
                    'password' => Hash::make($password),
                    'phone' => $this->generateUniquePhoneNumber(),
                ]);

                Auth::login($user);

                Log::info('User created and logged in successfully', ['user_id' => $user->id]);

                // Send welcome email
                Mail::to($user->email)->send(new WelcomeEmail($user, $password));
                Log::info('Welcome email sent', ['email' => $user->email]);
            } catch (\Exception $e) {
                Log::error('Error creating user or sending welcome email', ['error' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Failed to create an account. Please try again.');
            }
        }

        // Save the review
        try {
            $review = new Review([
                'user_id' => $user->id,
                'reviewable_id' => $validated['reviewable_id'],
                'reviewable_type' => $validated['reviewable_type'],
                'service_rating' => $validated['service_rating'],
                'location_rating' => $validated['location_rating'],
                'amenities_rating' => $validated['amenities_rating'],
                'price_rating' => $validated['price_rating'],
                'comment' => $validated['comment'],
            ]);

            Log::info('Review created (not saved yet)', ['review_data' => $review->toArray()]);

            $reviewable = $validated['reviewable_type']::findOrFail($validated['reviewable_id']);
            $reviewable->reviews()->save($review);

            Log::info('Review saved successfully', ['review_id' => $review->id]);

            // Send review received email
            Mail::to($user->email)->send(new ReviewReceived($review));
            Log::info('Review received email sent', ['email' => $user->email]);

            // Notify admin
            Mail::to(config('app.admin_email'))->send(new ReviewNotificationToAdmin($review));
            Log::info('Admin notification email sent', ['admin_email' => config('app.admin_email')]);

            return redirect()->back()->with('success', 'Review added successfully.');
        } catch (\Exception $e) {
            Log::error('Error saving review or sending emails', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Failed to save the review.');
        }
    }


    private function generateUniquePhoneNumber()
{
    do {
        // Generate a random 10-digit phone number
        $phoneNumber = '07' . rand(10000000, 99999999);
    } while (User::where('phone', $phoneNumber)->exists());

    return $phoneNumber;
}









        // Show all reviews
        public function index()
        {
            $reviews = Review::latest()->paginate(10);
            return view('admin.reviews.index', compact('reviews'));
        }

        // Show a specific review
        public function show(Review $review)
        {
            return view('admin.reviews.show', compact('review'));
        }

        // Reply to a review
        public function reply(Request $request, Review $review)
        {
            $request->validate([
                'admin_reply' => 'required|string'
            ]);

            $review->admin_reply = $request->admin_reply;
            $review->save();

            // Send notification email to the user
            Mail::to($review->user->email)->send(new AdminReplyNotification($review));

            return redirect()->route('admin.reviews.index')->with('success', 'Reply sent successfully and user notified.');
        }



        public function loadMoreReviews(Request $request)
        {
            $hotelId = $request->input('hotel_id');
            $offset = $request->input('offset', 0);
            $limit = $request->input('limit', 3);

            $reviews = Review::where('reviewable_type', 'App\Models\Hotel')
                            ->where('reviewable_id', $hotelId)
                            ->with('user') // Ensure user is loaded
                            ->orderBy('created_at', 'desc') // Optional: order reviews
                            ->offset($offset)
                            ->limit($limit)
                            ->get();

            $totalCount = Review::where('reviewable_type', 'App\Models\Hotel')
                                ->where('reviewable_id', $hotelId)
                                ->count();

            return response()->json([
                'reviews' => $reviews,
                'totalCount' => $totalCount,
            ]);
        }


}