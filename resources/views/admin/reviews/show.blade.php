@extends('admin.layouts.admin')

@section('title', 'Review Details')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Review Details</h4>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @if ($review->user->full_name)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Reviewer Name</label>
                            <input type="text" class="form-control" value="{{ $review->user->full_name }}" disabled>
                        </div>
                    </div>
                @endif
                @if ($review->user->username)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Reviewer Username</label>
                            <input type="text" class="form-control" value="{{ $review->user->username }}" disabled>
                        </div>
                    </div>
                @endif
                @if ($review->user->email)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Reviewer Email</label>
                            <input type="text" class="form-control" value="{{ $review->user->email }}" disabled>
                        </div>
                    </div>
                @endif

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Review Date</label>
                            <input type="text" class="form-control" value="{{ $review->created_at->format('d M Y') }}" disabled>
                        </div>
                    </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Rating</label>
                <div class="trevlo-ratings">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $review->average_rating)
                            <i class="fa fa-star"></i>
                        @else
                            <i class="fa fa-star-o"></i>
                        @endif
                    @endfor
                    {{ number_format($review->average_rating, 1) }}
                </div>
            </div>
            @if ($review->reviewable_type)

            @if ($review->reviewable_type === 'App\\Models\\Tour')
                <span class="badge bg-info">Tour</span>
            @elseif ($review->reviewable_type === 'App\\Models\\Hotel')
                <span class="badge bg-warning">Hotel</span>
            @else
                <span class="badge bg-secondary">Unknown</span>
            @endif
        @endif
        <div class="mb-3">
            <label class="form-label">Review From</label>
            <textarea class="form-control" rows="1" disabled>
                @if ($review->reviewable_type === 'App\Models\Tour')
                                    {{ $review->reviewable->name ?? 'Tour Not Found' }}
                                @elseif ($review->reviewable_type === 'App\Models\Hotel')
                                    {{ $review->reviewable->name ?? 'Hotel Not Found' }}
                                @else
                                    Unknown
                                @endif
            </textarea>
        </div>
            <div class="mb-3">
                <label class="form-label">Review Comment</label>
                <textarea class="form-control" rows="5" disabled>{{ $review->comment }}</textarea>
            </div>

            @if ($review->admin_reply)
            <div class="mb-3">
                <label class="form-label">Admin Reply</label>
                <textarea class="form-control" rows="5" disabled>{{ $review->admin_reply }}</textarea>
            </div>
            @else
            <form action="{{ route('admin.reviews.reply', $review->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Reply to Review</label>
                    <textarea class="form-control" name="admin_reply" rows="3" placeholder="Write a reply..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Reply</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
