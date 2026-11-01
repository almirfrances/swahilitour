<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerified
{
    public function handle(Request $request, Closure $next, $guard = null)
    {
        $emailConfirmation = Setting::where('key', 'email_confirmation')->first()->value ?? false;

        if ($emailConfirmation) {
            $user = Auth::guard($guard)->user();
            if ($user && !$user->hasVerifiedEmail()) {
                return redirect()->route('verify.email');
            }
        }

        return $next($request);
    }
}