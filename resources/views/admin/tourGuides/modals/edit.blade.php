{{-- For each tour guide, a unique edit modal --}}
@foreach($tourGuides as $guide)
<div class="modal fade" id="editTourGuideModal-{{ $guide->id }}" tabindex="-1" aria-labelledby="editTourGuideModalLabel-{{ $guide->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTourGuideModalLabel-{{ $guide->id }}">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tourGuides.update', $guide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name-{{ $guide->id }}" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name-{{ $guide->id }}" name="name" value="{{ $guide->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="title-{{ $guide->id }}" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title-{{ $guide->id }}" name="title" value="{{ $guide->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="picture-{{ $guide->id }}" class="form-label">Change Picture  370x437 px</label>
                        <input type="file" class="form-control" id="picture-{{ $guide->id }}" name="picture">
                        <img src="{{ asset('storage/' . $guide->picture) }}" alt="Current Picture" class="img-thumbnail mt-2" style="width: 100px; height: auto;">
                    </div>
                    <div class="mb-3">
                        <label for="instagram_link-{{ $guide->id }}" class="form-label">Instagram Link</label>
                        <input type of="url" class="form-control" id="instagram_link-{{ $guide->id }}" name="instagram_link" value="{{ $guide->instagram_link }}">
                    </div>
                    <div class="mb-3">
                        <label for="facebook_link-{{ $guide->id }}" class="form-label">Facebook Link</label>
                        <input type of="url" class="form-control" id="facebook_link-{{ $guide->id }}" name="facebook_link" value="{{ $guide->facebook_link }}">
                    </div>
                    <div class="mb-3">
                        <label for="twitter_link-{{ $guide->id }}" class="form-label">Twitter Link</label>
                        <input type of="url" class="form-control" id="twitter_link-{{ $guide->id }}" name="twitter_link" value="{{ $guide->twitter_link }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
