{{-- resources/views/admin/bookings/index.blade.php --}}
@extends('admin.layouts.admin')

@section('title', 'Manage Event Bookings')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Event Bookings</h4>

    <div class="card">
        <div class="card-header">
            <form action="{{ route('admin.event.bookings.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search bookings..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->full_name }}</td>
                        <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                        <td>{{ $booking->booking_type }}</td>
                        <td>
                            <span class="badge
                                {{ $booking->status === 'pending' ? 'bg-warning' :
                                ($booking->status === 'processing' ? 'bg-primary' :
                                ($booking->status === 'completed' ? 'bg-success' :
                                ($booking->status === 'canceled' ? 'bg-danger' : 'bg-secondary'))) }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="bookingActionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="bookingActionsDropdown">
                                    @if ($booking->payment_proof)
                                        <li><a class="dropdown-item" href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank">Download Payment Proof</a></li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('update-status-form-completed-{{ $booking->id }}').submit();">
                                            Mark as Completed
                                        </a>
                                        <form id="update-status-form-completed-{{ $booking->id }}" action="{{ route('admin.event.bookings.update', $booking->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="completed">
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('update-status-form-cancelled-{{ $booking->id }}').submit();">
                                            Mark as Cancelled
                                        </a>
                                        <form id="update-status-form-cancelled-{{ $booking->id }}" action="{{ route('admin.event.bookings.update', $booking->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="canceled">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $bookings->links() }}
        </div>
    </div>
</div>
@endsection
