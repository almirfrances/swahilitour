@extends('admin.layouts.admin')

@section('title', 'Bookings')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Manage Bookings</h4>
    <p class="text-muted">Review and update booking statuses, manage payment proofs, and more.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Booking List</h5>
            <form action="{{ route('admin.bookings.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search bookings..." value="{{ request()->get('search') }}">
                <button type="submit" class="btn btn-secondary ms-2">Search</button>
            </form>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Customer</th>
                        <th>Booking Date</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->full_name }}</td>
                        <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                        <td>{{ $booking->bookable_type }}</td>
                        <td>
                            <span class="badge
                                {{ $booking->status === 'pending' ? 'bg-warning' :
                                ($booking->status === 'processing' ? 'bg-primary' :
                                ($booking->status === 'completed' ? 'bg-success' :
                                ($booking->status === 'cancelled' ? 'bg-danger' : 'bg-secondary'))) }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @if ($booking->payment_proof)
                                        <li><a class="dropdown-item" href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank">Download Payment Proof</a></li>
                                    @endif
                                    <li>
                                        @if (in_array($booking->status, ['processing', 'completed']))
                                        <a href="{{ route('admin.bookings.invoice', $booking->id) }}" class="dropdown-item">Download Invoice</a>
                                    @endif
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('update-status-form-processing-{{ $booking->id }}').submit();">
                                            Mark as Processing
                                        </a>
                                        <form id="update-status-form-processing-{{ $booking->id }}" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="processing">
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('update-status-form-completed-{{ $booking->id }}').submit();">
                                            Mark as Completed
                                        </a>
                                        <form id="update-status-form-completed-{{ $booking->id }}" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="completed">
                                        </form>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('update-status-form-cancelled-{{ $booking->id }}').submit();">
                                            Mark as Cancelled
                                        </a>
                                        <form id="update-status-form-cancelled-{{ $booking->id }}" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="cancelled">
                                        </form>
                                    </li>
                                </ul>

                                {{-- <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('admin.bookings.invoice', $booking->id) }}">Download Invoice</a></li>
                                </ul> --}}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($bookings->isEmpty())
            <div class="text-center py-4">
                <h5 class="text-muted">No bookings found</h5>
            </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $bookings->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
