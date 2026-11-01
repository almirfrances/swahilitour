@extends('user.layouts.user')
@section('title', $title)

@section('user')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">User Dashboard Overview</h4>
    <p class="mb-4 text-muted">
        Welcome to the User Dashboard. Below is a quick overview of your account.
    </p>

    <div class="row g-4">
        <!-- Total Bookings Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Bookings</h6>
                            <h2 class="fw-bold mb-0">{{ $totalBookings }}</h2>
                        </div>
                        <div class="icon-box bg-primary text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="ti ti-calendar-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Bookings Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Pending Bookings</h6>
                            <h2 class="fw-bold mb-0">{{ $pendingBookings }}</h2>
                        </div>
                        <div class="icon-box bg-warning text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="ti ti-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Processing Bookings Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Processing Bookings</h6>
                            <h2 class="fw-bold mb-0">{{ $processingBookings }}</h2>
                        </div>
                        <div class="icon-box bg-info text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="ti ti-reload"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Completed Bookings Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Completed Bookings</h6>
                            <h2 class="fw-bold mb-0">{{ $completedBookings }}</h2>
                        </div>
                        <div class="icon-box bg-success text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="ti ti-check-box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Canceled Bookings Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Canceled Bookings</h6>
                            <h2 class="fw-bold mb-0">{{ $canceledBookings }}</h2>
                        </div>
                        <div class="icon-box bg-danger text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                            <i class="ti ti-close"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

