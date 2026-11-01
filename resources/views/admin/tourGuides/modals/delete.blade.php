{{-- For each Member, a unique delete confirmation modal --}}
@foreach($tourGuides as $guide)
<div class="modal fade" id="deleteTourGuideModal-{{ $guide->id }}" tabindex="-1" aria-labelledby="deleteTourGuideModalLabel-{{ $guide->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTourGuideModalLabel-{{ $guide->id }}">Delete Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button.
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Member?
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.tourGuides.destroy', $guide->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
