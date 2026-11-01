<?php

namespace App\Http\Controllers\Auth;

use \Log;
use App\Http\Controllers\Controller;
use App\Mail\SendVerificationCode;
use App\Models\Setting;
use App\Models\User;
use App\Traits\SendsVerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use SendsVerificationCode;

    public function showRegistrationForm()
    {
        if (Auth::guard('web')->check()) {
            sweetalert()->info('You are already registered and logged in.');
            return redirect()->route(Auth::guard('web')->check());
        }


        $title = 'Register';
        return view('auth.register', compact('title'));
    }


    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $emailConfirmation = Setting::where('key', 'email_confirmation')->first()->value ?? false;

            $userData = [
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'is_verified' => !$emailConfirmation, // Set is_verified based on email confirmation setting
                'email_verified_at' => !$emailConfirmation ? now() : null, // Set email_verified_at if email confirmation is disabled

            ];

            $user = User::create($userData);
            $redirectRoute = 'user.dashboard'; // Default redirect, adjust as necessary

            if ($emailConfirmation) {
                $user->SendsVerificationCode();
                // Mail::to($user->email)->send(new SendVerificationCode($user));
                sweetalert()->success('Registration successful! Please verify your email.');
            } else {
                Auth::guard('web')->login($user);
                sweetalert()->success('Registration successful! You are now logged in.');
            }
            return redirect()->route($redirectRoute);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            sweetalert()->error('An error occurred during registration. Please try again.');
            return redirect()->back()->withInput();
        }
    }

}