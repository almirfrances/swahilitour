{{-- resources/views/admin/events/promos/index.blade.php --}}

@extends('admin.layouts.admin')

@section('title', 'Manage Promotions')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Promotion Management</h4>
    <p>Welcome to the Promotion Management page. Here you can add, edit, and delete promotional entries as needed.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createPromoModal">Add New Promotion</button>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="promos-table">
                <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th>Event</th>
                        <th>Status</th>
                        <th>Popup</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promos as $promo)
                    <tr>
                        <td>{{ $promo->title }}</td>
                        <td>{{ $promo->event->name ?? 'No Event Linked' }}</td>
                        <td>
                            <span class="badge {{ $promo->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($promo->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $promo->popup ? 'bg-info' : 'bg-warning' }}">
                                {{ $promo->popup ? 'Yes' : 'No' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Actions
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#editPromoModal-{{ $promo->id }}"><i
                                                class="ti ti-pencil me-2"></i>Edit</a></li>
                                    <li>
                                        <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item text-danger" type="submit" onclick="return confirm('Are you sure you want to delete this promotion?')"><i
                                                class="ti ti-trash me-2"></i>Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($promos->isEmpty())
            <div class="text-center py-4">
                <h5 class="text-muted">No promotions found</h5>
            </div>
            @endif
            <div class="d-flex justify-content-center mt-4">
                {{ $promos->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>

    <!-- Create Promo Modal -->
    <div class="modal fade" id="createPromoModal" tabindex="-1" aria-labelledby="createPromoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPromoModalLabel">Create New Promotion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.promos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="promoTitle" class="form-label">Promo Title</label>
                            <input type="text" class="form-control" id="promoTitle" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="promoSubTitle" class="form-label">Promo Sub-title</label>
                            <input type="text" class="form-control" id="promoSubTitle" name="sub_title" required>
                        </div>
                        <div class="mb-3">
                            <label for="promoDescription" class="form-label">Short Description</label>
                            <textarea class="form-control" id="promoDescription" name="short_description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="promoImage" class="form-label">Promo Image</label>
                            <input type="file" class="form-control" id="promoImage" name="promo_image" required>
                        </div>
                        <div class="mb-3">
                            <label for="event_id" class="form-label">Select Event</label>
                            <select class="form-select" id="event_id" name="event_id" required>
                                @foreach ($events as $event)
                                <option value="{{ $event->id }}">{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="popup" class="form-label">Popup</label>
                            <select class="form-select" id="popup" name="popup">
                                <option value="1">Yes</option>
                                <option value="0" selected>No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Promo Modal for each promo -->
    @foreach ($promos as $promo)
    <div class="modal fade" id="editPromoModal-{{ $promo->id }}" tabindex="-1" aria-labelledby="editPromoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPromoModalLabel">Edit Promotion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('admin.promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="promoTitle-{{ $promo->id }}" class="form-label">Promo Title</label>
                            <input type="text" class="form-control" id="promoTitle-{{ $promo->id }}" name="title" value="{{ $promo->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="promoSubTitle-{{ $promo->id }}" class="form-label">Promo Sub-title</label>
                            <input type="text" class="form-control" id="promoSubTitle-{{ $promo->id }}" name="sub_title" value="{{ $promo->sub_title }}">
                        </div>
                        <div class="mb-3">
                            <label for="promoDescription-{{ $promo->id }}" class="form-label">Short Description</label>
                            <textarea class="form-control" id="promoDescription-{{ $promo->id }}" name="short_description">{{ $promo->short_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="promoImage-{{ $promo->id }}" class="form-label">Promo Image</label>
                            <input type="file" class="form-control" id="promoImage-{{ $promo->id }}" name="promo_image">
                            @if($promo->promo_image)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($promo->promo_image) }}" alt="Current Promo Image" style="width: 100px; height: auto;">
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removeImage({{ $promo->id }})">Remove Image</button>
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="event_id-{{ $promo->id }}" class="form-label">Select Event</label>
                            <select class="form-select" id="event_id-{{ $promo->id }}" name="event_id">
                                @foreach ($events as $event)
                                <option value="{{ $event->id }}" {{ $promo->event_id == $event->id ? 'selected' : '' }}>{{ $event->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="popup-{{ $promo->id }}" class="form-label">Popup</label>
                            <select class="form-select" id="popup-{{ $promo->id }}" name="popup">
                                <option value="1" {{ $promo->popup ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$promo->popup ? 'selected' : '' }}>No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status-{{ $promo->id }}" class="form-label">Status</label>
                            <select class="form-select" id="status-{{ $promo->id }}" name="status">
                                <option value="active" {{ $promo->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $promo->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

                <script>
                function removeImage(promoId) {
                    // Logic to remove the image
                    // Example: send an AJAX request to the server to delete the image
                    if (confirm('Are you sure you want to remove this image?')) {
                        fetch(`/admin/promos/${promoId}/remove-image`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if(data.success) {
                                alert('Image removed successfully');
                                window.location.reload();
                            } else {
                                alert('Failed to remove image');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                }
                </script>

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
