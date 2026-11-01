<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceHttps
{
    public function handle(Request $request, Closure $next)
    {
        $forceHttps = Setting::where('key', 'force_https')->first()->value ?? false;

        if (!$request->secure() && $forceHttps) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);


    }
}