@extends('user.layouts.user')

@section('title', 'My Event Bookings')

@section('user')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">My Event Bookings</h4>
    <p class="text-muted">Review and manage your bookings.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <form action="{{ route('user.event.bookings.list') }}" method="GET" class="d-flex">
                <select name="status" class="form-control me-2">
                    <option value="">All Statuses</option>
                    <option value="pending"{{ request('status') == 'pending' ? ' selected' : '' }}>Pending</option>
                     <option value="completed"{{ request('status') == 'completed' ? ' selected' : '' }}>Completed</option>
                    <option value="canceled"{{ request('status') == 'cancelled' ? ' selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" class="btn btn-secondary ms-2">Filter</button>
            </form>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="bookings-table">
                <thead class="thead-light">
                    <tr>
                        <th>Booking ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        {{-- <th class="text-center">Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->created_at->format('d M Y') }}</td>
                            <td>
                                <span class="badge
                                    {{ $booking->status === 'pending' ? 'bg-warning' :
                                    ($booking->status === 'processing' ? 'bg-primary' :
                                    ($booking->status === 'completed' ? 'bg-success' :
                                    ($booking->status === 'cancelled' ? 'bg-danger' : 'bg-secondary'))) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>${{ number_format($booking->price, 2) }}</td>
                            <td class="text-center">
                                @if (empty($booking->payment_proof))
                                    <a href="{{ route('user.event.bookings.payment', $booking->id) }}" class="btn btn-primary btn-sm">Upload Proof</a>
                                @endif
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
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->links() }}  {{-- This assumes you're using default Laravel pagination --}}
        </div>
    </div>
</div>
@endsection
