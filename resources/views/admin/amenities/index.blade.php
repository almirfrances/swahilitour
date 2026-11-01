{{-- resources/views/admin/amenities/index.blade.php --}}

@extends('admin.layouts.admin')

@section('title', 'Manage Amenities')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Amenity Management</h4>
    <p>Welcome to the Amenity Management page. Here you can add, edit, and delete amenity entries as needed.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#createAmenityModal">Add New Amenity</button>
                </div>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-12 col-md-6 ms-auto">
                            <form action="{{ route('admin.amenities.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control me-2" placeholder="Search amenities..." value="{{ request()->get('search') }}">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="amenities-table">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Icon</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($amenities as $amenity)
                        <tr>
                            <td>{{ $amenity->name }}</td>
                            <td>{{ $amenity->icon }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="#" data-bs-toggle="modal" data-bs-target="#editAmenityModal-{{ $amenity->id }}"><i
                                                class="ti ti-pencil me-2"></i>Edit</a></li>
                                        <li>
                                            <button data-amenity-id="{{ $amenity->id }}" class="dropdown-item text-danger" onclick="deleteAmenity({{ $amenity->id }})"><i
                                                class="ti ti-trash me-2"></i>Delete</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($amenities->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No amenities found</h5>
                </div>
            @endif
            <div class="d-flex justify-content-center mt-4">
                {{ $amenities->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card mt-4 shadow-sm">
                <div class="card-header">
                    Available Icons
                </div>
                <div class="card-body">
                    <small>
                        <ul>


                            <li><code onclick="copyToClipboard('icon-restaurant')">icon-restaurant</code></li>
                            <li><code onclick="copyToClipboard('icon-seat')">icon-seat</code></li>
                            <li><code onclick="copyToClipboard('icon-minus')">icon-minus</code></li>
                            <li><code onclick="copyToClipboard('icon-plus')">icon-plus</code></li>
                            <li><code onclick="copyToClipboard('icon-chat')">icon-chat</code></li>
                            <li><code onclick="copyToClipboard('icon-user')">icon-user</code></li>
                            <li><code onclick="copyToClipboard('icon-envelope')">icon-envelope</code></li>
                            <li><code onclick="copyToClipboard('icon-search')">icon-search</code></li>
                            <li><code onclick="copyToClipboard('icon-airplane-1')">icon-airplane-1</code></li>
                            <li><code
                                    onclick="copyToClipboard('icon-best-customer-experience-1')">icon-best-customer-experience-1</code>
                            </li>
                            <li><code onclick="copyToClipboard('icon-Booking')">icon-Booking</code></li>
                            <li><code onclick="copyToClipboard('icon-bubble-chat-1')">icon-bubble-chat-1</code></li>
                            <li><code onclick="copyToClipboard('icon-calendar-5')">icon-calendar-5</code></li>
                            <li><code onclick="copyToClipboard('icon-clock-1')">icon-clock-1</code></li>
                            <li><code onclick="copyToClipboard('icon-deer-silhouette-1')">icon-deer-silhouette-1</code>
                            </li>
                            <li><code onclick="copyToClipboard('icon-Duration')">icon-Duration</code></li>
                            <li><code onclick="copyToClipboard('icon-filter')">icon-filter</code></li>
                            <li><code onclick="copyToClipboard('icon-fishing-net-1')">icon-fishing-net-1</code></li>
                            <li><code onclick="copyToClipboard('icon-friendly-Guide')">icon-friendly-Guide</code></li>
                            <li><code onclick="copyToClipboard('icon-hang-gliding-1')">icon-hang-gliding-1</code></li>
                            <li><code onclick="copyToClipboard('icon-hang-gliding-3')">icon-hang-gliding-3</code></li>
                            <li><code onclick="copyToClipboard('icon-happy-Travel')">icon-happy-Travel</code></li>
                        </ul>
                    </small>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card mt-4 shadow-sm">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <small>
                        <ul>




                            <li><code onclick="copyToClipboard('icon-phone-1')">icon-phone-1</code></li>
                            <li><code onclick="copyToClipboard('icon-photo-camera-1')">icon-photo-camera-1</code></li>
                            <li><code onclick="copyToClipboard('icon-location-2')">icon-location-2</code></li>
                            <li><code onclick="copyToClipboard('icon-plus-3')">icon-plus-3</code></li>
                            <li><code onclick="copyToClipboard('icon-safety-First')">icon-safety-First</code></li>
                            <li><code onclick="copyToClipboard('icon-safety')">icon-safety</code></li>
                            <li><code onclick="copyToClipboard('icon-satisfied')">icon-satisfied</code></li>
                            <li><code onclick="copyToClipboard('icon-star')">icon-star</code></li>
                            <li><code onclick="copyToClipboard('icon-telephone-call-1')">icon-telephone-call-1</code>
                            </li>
                            <li><code onclick="copyToClipboard('icon-tent-1')">icon-tent-1</code></li>
                            <li><code onclick="copyToClipboard('icon-tent-Fill')">icon-tent-Fill</code></li>
                            <li><code onclick="copyToClipboard('icon-ticket-1')">icon-ticket-1</code></li>
                            <li><code onclick="copyToClipboard('icon-tour-guide-2')">icon-tour-guide-2</code></li>
                            <li><code onclick="copyToClipboard('icon-traveling-1')">icon-traveling-1</code></li>
                            <li><code onclick="copyToClipboard('icon-twitter')">icon-twitter</code></li>
                            <li><code onclick="copyToClipboard('icon-user-1')">icon-user-1</code></li>
                            <li><code onclick="copyToClipboard('icon-user1')">icon-user1</code></li>
                            <li><code onclick="copyToClipboard('icon-video-camera-1-1')">icon-video-camera-1-1</code>
                            </li>
                            <li><code onclick="copyToClipboard('icon-wildlife')">icon-wildlife</code></li>
                            <li><code onclick="copyToClipboard('icon-windsurfing-2')">icon-windsurfing-2</code></li>
                            <li><code onclick="copyToClipboard('icon-world-1')">icon-world-1</code></li>
                            <li><code onclick="copyToClipboard('icon-youtube')">icon-youtube</code></li>
                            <li><code onclick="copyToClipboard('icon-heart')">icon-heart</code></li>

                        </ul>
                    </small>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card mt-4 shadow-sm">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <small>
                        <ul>


                            <li><code onclick="copyToClipboard('icon-hiking-1')">icon-hiking-1</code></li>
                            <li><code onclick="copyToClipboard('icon-hiking-4')">icon-hiking-4</code></li>
                            <li><code onclick="copyToClipboard('icon-hiking')">icon-hiking</code></li>
                            <li><code onclick="copyToClipboard('icon-Linkedin')">icon-Linkedin</code></li>
                            <li><code onclick="copyToClipboard('icon-location-1')">icon-location-1</code></li>
                            <li><code onclick="copyToClipboard('icon-low-price')">icon-low-price</code></li>
                            <li><code onclick="copyToClipboard('icon-lowest-price-1-1')">icon-lowest-price-1-1</code>
                            </li>
                            <li><code onclick="copyToClipboard('icon-minus-3')">icon-minus-3</code></li>
                            <li><code onclick="copyToClipboard('icon-mountain-bike-1')">icon-mountain-bike-1</code></li>
                            <li><code onclick="copyToClipboard('icon-online-chat-1')">icon-online-chat-1</code></li>
                            <li><code onclick="copyToClipboard('icon-paragliding-1')">icon-paragliding-1</code></li>
                            <li><code onclick="copyToClipboard('icon-paragliding-5')">icon-paragliding-5</code></li>
                            <li><code onclick="copyToClipboard('icon-Group')">icon-Group</code></li>
                            <li><code onclick="copyToClipboard('icon-right-arrow')">icon-right-arrow</code></li>
                            <li><code onclick="copyToClipboard('icon-left-arrow')">icon-left-arrow</code></li>
                            <li><code onclick="copyToClipboard('icon-up-arrow')">icon-up-arrow</code></li>
                            <li><code onclick="copyToClipboard('icon-down-arrow')">icon-down-arrow</code></li>
                            <li><code onclick="copyToClipboard('icon-plane')">icon-plane</code></li>
                            <li><code onclick="copyToClipboard('icon-share')">icon-share</code></li>
                            <li><code onclick="copyToClipboard('icon-credit-card')">icon-credit-card</code></li>
                            <li><code onclick="copyToClipboard('icon-discount')">icon-discount</code></li>
                            <li><code onclick="copyToClipboard('icon-parking')">icon-parking</code></li>
                            <li><code onclick="copyToClipboard('icon-reception-bell')">icon-reception-bell</code></li>
                        </ul>
                    </small>
                </div>
            </div>
        </div>
    </div>
    {{-- Create Amenity Modal --}}
    <div class="modal fade" id="createAmenityModal" tabindex="-1" aria-labelledby="createAmenityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAmenityModalLabel">Create New Amenity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="createAmenityForm" action="{{ route('admin.amenities.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="newAmenityName" class="form-label">Amenity Name</label>
                            <input type="text" class="form-control" id="newAmenityName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="newIcon" class="form-label">Icon</label>
                            <input type="text" class="form-control" id="newIcon" name="icon">
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

    {{-- Edit Amenity Modal --}}
    @foreach ($amenities as $amenity)
    <div class="modal fade" id="editAmenityModal-{{ $amenity->id }}" tabindex="-1" aria-labelledby="editAmenityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAmenityModalLabel">Edit Amenity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editAmenityForm-{{ $amenity->id }}" action="{{ route('admin.amenities.update', $amenity->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="amenityName-{{ $amenity->id }}" class="form-label">Amenity Name</label>
                            <input type="text" class="form-control" id="amenityName-{{ $amenity->id }}" name="name" value="{{ $amenity->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="icon-{{ $amenity->id }}" class="form-label">Icon</label>
                            <input type="text" class="form-control" id="icon-{{ $amenity->id }}" name="icon" value="{{ $amenity->icon }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <script>
    function deleteAmenity(id) {
        if (confirm('Are you sure you want to delete this amenity?')) {
            fetch(`/admin/amenities/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error('Failed to delete amenity');
                return response.json();
            })
            .then(data => {
                alert(data.message);
                window.location.reload();
            })
            .catch(error => {
                alert('Error: ' + error.message);
            });
        }
    }
    </script>
</div>
@endsection

