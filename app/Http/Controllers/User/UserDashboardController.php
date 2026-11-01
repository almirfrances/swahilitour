<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{

    public function index() {
        $title = 'User Dashboard';
        $user = auth()->user();

        // Safeguard in case there are no bookings
        $totalBookings = ($user->bookings ?? collect())->count() + ($user->eventBookings ?? collect())->count();
        $pendingBookings = ($user->bookings ?? collect())->where('status', 'pending')->count() + ($user->eventBookings ?? collect())->where('status', 'pending')->count();
        $processingBookings = ($user->bookings ?? collect())->where('status', 'processing')->count();
        $completedBookings = ($user->bookings ?? collect())->where('status', 'completed')->count() + ($user->eventBookings ?? collect())->where('status', 'completed')->count();
        $canceledBookings = ($user->bookings ?? collect())->where('status', 'cancelled')->count() + ($user->eventBookings ?? collect())->where('status', 'canceled')->count();

        return view('user.dashboard.index', compact('title', 'user', 'totalBookings', 'pendingBookings', 'processingBookings', 'completedBookings', 'canceledBookings'));
    }



}