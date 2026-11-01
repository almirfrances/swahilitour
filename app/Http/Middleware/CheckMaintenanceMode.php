<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        $maintenanceMode = Setting::where('key', 'maintenance_mode')->value('value') === 'true';
        $maintenanceAccessCode = Setting::where('key', 'maintenance_access_code')->value('value');
        $maintenanceViewStyle = Setting::where('key', 'maintenance_view_style')->value('value') ?? '1';

        // Check if the correct access code is provided
        if ($request->query('access_code') === $maintenanceAccessCode) {
            Session::put('maintenance_access', $maintenanceAccessCode);
        }

        if ($maintenanceMode && Session::get('maintenance_access') !== $maintenanceAccessCode) {
            $view = 'coming-soon.maintenance' . $maintenanceViewStyle; // Constructs the view name dynamically
            return response()->view($view, [], 503); // Return a custom maintenance page with a 503 HTTP status
        }

        return $next($request);
    }
}