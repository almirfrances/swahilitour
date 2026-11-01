@extends('admin.layouts.admin')

@section('title', isset($event) ? 'Edit Event' : 'Add Event')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($event))
        @method('PUT')
        @endif

        <div class="row g-4">
            <!-- Event Information -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Event Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Event Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $event->name ?? '') }}" required>
                            <small class="form-text text-muted">Enter the name of the event.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="type_id">Event Type</label>
                            <select class="form-select" id="type_id" name="type_id" required>
                                <option value="">Select Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ (old('type_id', $event->type_id ?? '') == $type->id) ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select the type of the event.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="destination_id">Destination</label>
                            <select class="form-select" id="destination_id" name="destination_id" required>
                                <option value="">Select Destination</option>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ (old('destination_id', $event->destination_id ?? '') == $destination->id) ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select the destination for the event.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="overview">Event Overview</label>
                            <textarea class="form-control" id="overview" name="overview" rows="4"
                                required>{{ old('overview', $event->overview ?? '') }}</textarea>
                            <small class="form-text text-muted">Provide a brief overview of the event.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="status">Event Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="active" {{ (old('status', $event->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ (old('status', $event->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <small class="form-text text-muted">Select the current status of the event.</small>
                        </div>
                    </div>
                </div>

                       <!-- Images Section -->
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">Event Images</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label" for="images">Upload Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
            <small class="form-text text-muted">Upload multiple images for the event.</small>
        </div>
        @if(isset($event->images) && is_array($event->images))
        <div class="mt-3">
            <h6>Existing Images:</h6>
            <div class="d-flex flex-wrap gap-2">
                @foreach($event->images as $index => $image)
                <div class="position-relative">
                    <img src="{{ Storage::url($image) }}" alt="Event Image" class="img-thumbnail" style="width: 100px; height: 100px;">
                    <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-image-btn"
                            data-image="{{ $image }}" style="z-index: 1; font-size: 10px;">&times;</button>
                </div>
                @endforeach
            </div>
            <input type="hidden" name="removed_images" id="removed_images" value="">
        </div>
        @endif
    </div>
</div>


<script>

document.addEventListener('DOMContentLoaded', function () {
    const removedImagesInput = document.getElementById('removed_images');
    const removeButtons = document.querySelectorAll('.remove-image-btn');

    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const image = this.getAttribute('data-image');
            const parentDiv = this.closest('.position-relative');

            // Add the image path to the hidden input for removed images
            let removedImages = removedImagesInput.value ? JSON.parse(removedImagesInput.value) : [];
            removedImages.push(image);
            removedImagesInput.value = JSON.stringify(removedImages);

            // Remove the image preview
            parentDiv.remove();
        });
    });
});

</script>
            </div>

            <!-- Pricing and Amenities -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pricing & Amenities</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="duration">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration"
                                value="{{ old('duration', $event->duration ?? '') }}"required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="residential_price_single">Residential Price (Single)</label>
                            <input type="number" class="form-control" id="residential_price_single" name="residential_price_single"
                                value="{{ old('residential_price_single', $event->residential_price_single ?? '') }}" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="foreign_price_single">Foreign Price (Single)</label>
                            <input type="number" class="form-control" id="foreign_price_single" name="foreign_price_single"
                                value="{{ old('foreign_price_single', $event->foreign_price_single ?? '') }}" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="couple_residential_price">Residential Price (Couple)</label>
                            <input type="number" class="form-control" id="couple_residential_price" name="couple_residential_price"
                                value="{{ old('couple_residential_price', $event->couple_residential_price ?? '') }}" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="couple_foreign_price">Foreign Price (Couple)</label>
                            <input type="number" class="form-control" id="couple_foreign_price" name="couple_foreign_price"
                                value="{{ old('couple_foreign_price', $event->couple_foreign_price ?? '') }}" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="discount_percentage">Discount Percentage</label>
                            <input type="number" class="form-control" id="discount_percentage" name="discount_percentage"
                                value="{{ old('discount_percentage', $event->discount_percentage ?? '') }}" step="0.01">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="amenities">Amenities</label>
                            @foreach($amenities as $amenity)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="amenity_{{ $amenity->id }}"
                                    name="amenities[]" value="{{ $amenity->id }}"
                                    {{ isset($event) && in_array($amenity->id, $event->amenities ?? []) ? 'checked' : '' }}>
                                <label class="form-check-label" for="amenity_{{ $amenity->id }}">{{ $amenity->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>
        </div>

       <!-- Includes and Excludes -->
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h5 class="card-title mb-0">Includes and Excludes</h5>
    </div>
    @php
    $includes = old('includes', $event->includes ? json_decode($event->includes) : []);
    @endphp
    <div class="card-body">
        <div class="mb-3">
            <label class="form-label">Includes</label>
            <div id="includesContainer">
                @forelse ($includes as $include)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="includes[]" placeholder="Include item" value="{{ $include }}">
                            <button class="btn btn-danger remove-include" type="button">-</button>
                        </div>
                        @empty
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="includes[]" placeholder="Include item">
                            <button class="btn btn-danger remove-include" type="button">-</button>
                        </div>
                    @endforelse
            </div>
            <button type="button" class="btn btn-primary add-include">Add Include</button>
        </div>

        <div class="mb-3">
            <label class="form-label">Excludes</label>
            <div id="excludesContainer">
                @php
                $excludes = old('excludes', $event->excludes ? json_decode($event->excludes) : []);
                @endphp

                @forelse ($excludes as $exclude)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="excludes[]" placeholder="Exclude item" value="{{ $exclude }}">
                            <button class="btn btn-danger remove-exclude" type="button">-</button>
                        </div>
                        @empty
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="excludes[]" placeholder="Exclude item">
            <button class="btn btn-danger remove-exclude" type="button">-</button>
        </div>
    @endforelse
            </div>
            <button type="button" class="btn btn-primary add-exclude">Add Exclude</button>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const includesContainer = document.getElementById('includesContainer');
        const excludesContainer = document.getElementById('excludesContainer');

        document.querySelector('.add-include').addEventListener('click', function () {
            const newInclude = document.createElement('div');
            newInclude.classList.add('input-group', 'mb-2');
            newInclude.innerHTML = `
                <input type="text" class="form-control" name="includes[]" placeholder="Include item">
                <button class="btn btn-danger remove-include" type="button">-</button>
            `;
            includesContainer.appendChild(newInclude);
        });

        document.querySelector('.add-exclude').addEventListener('click', function () {
            const newExclude = document.createElement('div');
            newExclude.classList.add('input-group', 'mb-2');
            newExclude.innerHTML = `
                <input type="text" class="form-control" name="excludes[]" placeholder="Exclude item">
                <button class="btn btn-danger remove-exclude" type="button">-</button>
            `;
            excludesContainer.appendChild(newExclude);
        });

        includesContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-include')) {
                e.target.parentNode.remove();
            }
        });

        excludesContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-exclude')) {
                e.target.parentNode.remove();
            }
        });
    });
</script>
        <!-- Event Plan -->
        <div class="card mt-4 shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Event Plan</h5>
            </div>
            <div class="card-body">
                <div id="event-plan-container">
                    @if(isset($event->event_plan))
                        @foreach($event->event_plan as $index => $plan)
                        <div class="event-plan-item mb-3">
                            <input type="text" class="form-control mb-2" name="event_plan[{{ $index }}][title]"
                                placeholder="Day {{ $index + 1 }} Title" value="{{ $plan['title'] }}" required>
                            <textarea class="form-control mb-2" name="event_plan[{{ $index }}][description]" rows="2"
                                placeholder="Day {{ $index + 1 }} Description" required>{{ $plan['description'] }}</textarea>
                            <button type="button" class="btn btn-danger btn-sm remove-plan-item">Remove</button>
                        </div>
                        @endforeach
                    @else
                        <div class="event-plan-item mb-3">
                            <input type="text" class="form-control mb-2" name="event_plan[0][title]" placeholder="Day 1 Title" required>
                            <textarea class="form-control mb-2" name="event_plan[0][description]" rows="2" placeholder="Day 1 Description" required></textarea>
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-success btn-sm" id="add-event-plan-btn">Add Day</button>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-1"></i> {{ isset($event) ? 'Update Event' : 'Create Event' }}
            </button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">
                <i class="ti ti-arrow-left me-1"></i> Cancel
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    let index = {{ isset($event->event_plan) ? count($event->event_plan) : 1 }};
    const planContainer = document.getElementById('event-plan-container');
    const addPlanBtn = document.getElementById('add-event-plan-btn');

    addPlanBtn.addEventListener('click', function () {
        const planItem = document.createElement('div');
        planItem.classList.add('event-plan-item', 'mb-3');
        planItem.innerHTML = `
            <input type="text" class="form-control mb-2" name="event_plan[${index}][title]" placeholder="Day ${index + 1} Title" required>
            <textarea class="form-control mb-2" name="event_plan[${index}][description]" rows="2" placeholder="Day ${index + 1} Description" required></textarea>
            <button type="button" class="btn btn-danger btn-sm remove-plan-item">Remove</button>
        `;
        planContainer.appendChild(planItem);
        index++;
    });

    planContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-plan-item')) {
            event.target.closest('.event-plan-item').remove();
        }
    });
});
</script>
@endsection
