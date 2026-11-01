{{-- Add Tour Guide Modal --}}
<div class="modal fade" id="addTourGuideModal" tabindex="-1" aria-labelledby="addTourGuideModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTourGuideModalLabel">Add New Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.tourGuides.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Picture 370x437 px</label>
                        <input type="file" class="form-control" id="picture" name="picture" required>
                    </div>
                    <div class="mb-3">
                        <label for="instagram_link" class="form-label">Instagram Link</label>
                        <input type="url" class="form-control" id="instagram_link" name="instagram_link">
                    </div>
                    <div class="mb-3">
                        <label for="facebook_link" class="form-label">Facebook Link</label>
                        <input type="url" class="form-control" id="facebook_link" name="facebook_link">
                    </div>
                    <div class="mb-3">
                        <label for="twitter_link" class="form-label">Twitter Link</label>
                        <input type="url" class="form-control" id="twitter_link" name="twitter_link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Member</button>
                </div>
            </form>
        </div>
    </div>
</div>
