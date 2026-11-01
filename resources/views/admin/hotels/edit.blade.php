@extends('admin.layouts.admin')

@section('title', isset($hotel) ? 'Edit Hotel' : 'Add Hotel')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ isset($hotel) ? route('admin.hotels.update', $hotel->id) : route('admin.hotels.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($hotel))
        @method('PUT')
        @endif

        <div class="row g-4">
            <!-- Hotel Information -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Hotel Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Hotel Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $hotel->name ?? '') }}" required>
                            <small class="form-text text-muted">Enter the name of the hotel.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="destination_id">Destination</label>
                            <select class="form-select" id="destination_id" name="destination_id" required>
                                <option value="">Select Destination</option>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ (old('destination_id', $hotel->destination_id ?? '') == $destination->id) ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select the destination for the hotel.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="overview">Overview</label>
                            <textarea class="form-control" id="overview" name="overview" rows="4"
                                required>{{ old('overview', $hotel->overview ?? '') }}</textarea>
                            <small class="form-text text-muted">Provide a brief overview of the hotel.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="starting_price">Starting Price</label>
                            <input type="number" class="form-control" id="starting_price" name="starting_price"
                                value="{{ old('starting_price', $hotel->starting_price ?? '') }}" required>
                            <small class="form-text text-muted">Enter the starting price of the hotel.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="featured">Featured</label>
                            <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1"
                                {{ old('featured', $hotel->featured ?? false) ? 'checked' : '' }}>
                            <small class="form-text text-muted">Check this box if the hotel is featured.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Hotel Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active"
                                    {{ (old('status', $hotel->status ?? '') == 'active') ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive"
                                    {{ (old('status', $hotel->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive
                                </option>
                                <option value="under_maintenance"
                                    {{ (old('status', $hotel->status ?? '') == 'under_maintenance') ? 'selected' : '' }}>
                                    Under Maintenance</option>
                            </select>
                            <small class="form-text text-muted">Select the current status of the hotel.</small>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="row">
                    <!-- Amenities Section -->
                    <div class="col-12 col-lg-12">
                        <div class="mb-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Amenities</h5>
                                </div>
                                <div class="card-body">
                                    @foreach($amenities as $amenity)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="amenity_{{ $amenity->id }}"
                                            name="amenities[]" value="{{ $amenity->id }}"
                                            {{ (isset($hotel) && in_array($amenity->id, json_decode($hotel->amenities, true) ?? [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                            {{ $amenity->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-12">
                        <div class="mb-4">
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Hotel Images</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                                        <small class="form-text text-muted">Upload images of the hotel.</small>
                                    </div>

                                    <!-- Existing Images -->
                                    @if(is_array($hotel->images) && count($hotel->images) > 0)
                                    <div class="mb-3">
                                        <label class="form-label">Existing Images</label>
                                        <div class="d-flex flex-wrap">
                                            @foreach($hotel->images as $image)
                                            <div class="mr-2 mb-2 p-2">
                                                <img src="{{ url($image) }}" alt="Hotel Image"
                                                    width="100" height="100" class="img-thumbnail">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>





        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-1"></i> {{ isset($hotel) ? 'Update' : 'Create' }}
            </button>
            <button type="button" class="btn btn-label-secondary" onclick="window.history.back();">
                <i class="ti ti-arrow-left me-1"></i> Cancel
            </button>
        </div>
    </form>
<div class="container-xxl flex-grow-1 container-p-y">
 <!-- Rooms Section -->
 <div class="mb-4">
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h5 class="card-title mb-0">Rooms</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Room Name</th>
                        <th>Price</th>
                        <th>Capacity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotel->rooms as $room)
                    <tr>
                        <td>{{ $room->room_name }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editRoomModal{{ $room->id }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.hotels.rooms.destroy', [$hotel->id, $room->id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>





    @foreach($hotel->rooms as $room)
    <div class="modal fade" id="editRoomModal{{ $room->id }}" tabindex="-1"
        aria-labelledby="editRoomModalLabel{{ $room->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoomModalLabel{{ $room->id }}">Edit Room</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.hotels.rooms.update', [$hotel->id, $room->id]) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="room_name" class="form-label">Room Name</label>
                            <input type="text" class="form-control" id="room_name" name="room_name"
                                value="{{ $room->room_name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $room->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity"
                                value="{{ $room->capacity }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="room_type" class="form-label">Room Type</label>
                            <select class="form-select" id="room_type" name="room_type" required>
                                <option value="single" {{ $room->room_type == 'single' ? 'selected' : '' }}>
                                    Single</option>
                                <option value="double" {{ $room->room_type == 'double' ? 'selected' : '' }}>
                                    Double</option>
                                <option value="suite" {{ $room->room_type == 'suite' ? 'selected' : '' }}>Suite
                                </option>
                                <option value="family" {{ $room->room_type == 'family' ? 'selected' : '' }}>
                                    Family</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="is_available" class="form-label">Available</label>
                            <input type="checkbox" class="form-check-input" id="is_available" name="is_available"
                                value="1" {{ $room->is_available ? 'checked' : '' }}>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>
                                    Available</option>
                                <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Booked
                                </option>
                                <option value="under_maintenance"
                                    {{ $room->status == 'under_maintenance' ? 'selected' : '' }}>Under
                                    Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            onclick="closeModal('editRoomModal{{ $room->id }}')">Close</button>
                        <button type="submit" class="btn btn-primary">Update Room</button>
                    </div>


                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
