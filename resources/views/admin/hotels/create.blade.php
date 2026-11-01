{{-- resources/views/admin/hotels/form.blade.php --}}

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
                            <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                   value="1" {{ old('featured', $hotel->featured ?? false) ? 'checked' : '' }}>
                            <small class="form-text text-muted">Check this box if the hotel is featured.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Hotel Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active" {{ (old('status', $hotel->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ (old('status', $hotel->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                <option value="under_maintenance" {{ (old('status', $hotel->status ?? '') == 'under_maintenance') ? 'selected' : '' }}>Under Maintenance</option>
                            </select>
                            <small class="form-text text-muted">Select the current status of the hotel.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="images">Hotel Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            <small class="form-text text-muted">Upload images of the hotel.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Amenities Section -->
            <div class="col-12 col-lg-6">
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
                                    {{ (isset($hotel) && in_array($amenity->id, $hotel->amenities ?? [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="amenity_{{ $amenity->id }}">
                                    {{ $amenity->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-1"></i> {{ isset($hotel) ? 'Update' : 'Create' }}
            </button>
            <button type="button" class="btn btn-label-secondary" onclick="window.history.back();">
                <i class="ti ti-arrow-left me-1"></i> Cancel
            </button>
        </div>
    </form>
</div>
@endsection
