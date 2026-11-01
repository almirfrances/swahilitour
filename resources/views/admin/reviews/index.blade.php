@extends('admin.layouts.admin')

@section('title', 'Reviews')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Reviews</h4>
    <p class="text-muted">Manage user reviews. View, reply, or delete reviews.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span class="text-primary">All Reviews</span>
            <form action="{{ route('admin.reviews.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Search reviews..." value="{{ request()->get('search') }}">
                <button type="submit" class="btn btn-secondary ms-2">Search</button>
            </form>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Review ID</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>From</th>
                        <th>Admin Replied</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->user->full_name }}</td>
                            <td>
                                @if ($review->reviewable_type === 'App\\Models\\Tour')
                                    <span class="badge bg-info">Tour</span>
                                @elseif ($review->reviewable_type === 'App\\Models\\Hotel')
                                    <span class="badge bg-warning">Hotel</span>
                                @else
                                    <span class="badge bg-secondary">Unknown</span>
                                @endif
                            </td>
                            <td>
                                @if ($review->reviewable_type === 'App\Models\Tour')
                                    {{ Str::limit($review->reviewable->name ?? 'Tour Not Found', 10) }}
                                @elseif ($review->reviewable_type === 'App\Models\Hotel')
                                    {{ Str::limit($review->reviewable->name ?? 'Hotel Not Found', 10) }}
                                @else
                                    Unknown
                                @endif
                            </td>



                            @if ($review->admin_reply)
                            <td><span class="badge bg-success">Yes</span></td>
                            @else
                            <td><span class="badge bg-danger">No</span></td>
                            @endif
                            <td>{{ number_format($review->average_rating, 1) }}</td>
                            <td>{{ $review->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.reviews.show', $review->id) }}"><i
                                                    class="ti ti-eye me-2"></i>View</a></li>
                                        {{-- <li>
                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger" type="submit"><i
                                                        class="ti ti-trash me-2"></i>Delete</button>
                                            </form>
                                        </li> --}}
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($reviews->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No reviews found</h5>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $reviews->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
