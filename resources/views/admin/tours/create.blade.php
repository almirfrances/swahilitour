{{-- resources/views/admin/tours/form.blade.php --}}

@extends('admin.layouts.admin')

@section('title', isset($tour) ? 'Edit Tour' : 'Add Tour')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <form action="{{ isset($tour) ? route('admin.tours.update', $tour->id) : route('admin.tours.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($tour))
        @method('PUT')
        @endif

        <div class="row g-4">
            <!-- Tour Information -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tour Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Tour Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $tour->name ?? '') }}" required>
                            <small class="form-text text-muted">Enter the name of the tour.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="duration">Duration</label>
                            <input type="text" class="form-control" id="duration" name="duration"
                                value="{{ old('duration', $tour->duration ?? '') }}" required>
                            <small class="form-text text-muted">Specify the duration of the tour (e.g., "3
                                days").</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="min_age">Minimum Age</label>
                            <input type="number" class="form-control" id="min_age" name="min_age"
                                value="{{ old('min_age', $tour->min_age ?? '') }}" required>
                            <small class="form-text text-muted">Enter the minimum age for participants.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="type_id">Tour Type</label>
                            <select class="form-select" id="type_id" name="type_id" required>
                                <option value="">Select Tour Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ (old('type_id', $tour->type_id ?? '') == $type->id) ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select the type of the tour.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="destination_id">Destination</label>
                            <select class="form-select" id="destination_id" name="destination_id" required>
                                <option value="">Select Destination</option>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}"
                                    {{ (old('destination_id', $tour->destination_id ?? '') == $destination->id) ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select the destination for the tour.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="overview">Overview</label>
                            <textarea class="form-control" id="overview" name="overview" rows="4"
                                required>{{ old('overview', $tour->overview ?? '') }}</textarea>
                            <small class="form-text text-muted">Provide a brief overview of the tour.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="featured">Featured</label>
                            <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                   value="1" {{ old('featured', $tour->featured ?? false) ? 'checked' : '' }}>
                            <small class="form-text text-muted">Check this box if the tour is featured.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="video_link">YouTube Video Link</label>
                            <input type="url" class="form-control" id="video_link" name="video_link"
                                   value="{{ old('video_link', $tour->video_link ?? '') }}">
                            <small class="form-text text-muted">Enter the full URL of the YouTube video.</small>
                        </div>

                    </div>
                </div>

                <!-- Images -->
                <div class="mb-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Images</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label" for="images">Images (370x501 px)</label>
                                <input type="file" class="form-control" id="images" name="images[]" multiple>
                                <small class="form-text text-muted">Upload multiple images for the tour. Images are
                                    uploaded instantly as you select them.</small>
                                <div id="imagePreview" class="d-flex flex-wrap gap-2 mt-3">
                                    @if(isset($tour->images) && is_array($tour->images))
                                    @foreach($tour->images as $index => $image)
                                    <div class="img-wrap position-relative"
                                        style="border: 1px solid #ccc; padding: 5px; cursor: pointer;">
                                        <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center"
                                            style="background-color: rgba(0,0,0,0.5); display: none;">
                                            <button type="button" class="btn btn-danger remove-image"
                                                data-image-index="{{ $index }}" aria-label="Remove">
                                                <i class="tf-icons ti ti-trash"></i>
                                            </button>
                                        </div>
                                        <img src="{{ Storage::url($image) }}" alt="Image" class="img-fluid"
                                            style="width: 100px; height: 100px;">
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pricing Information Section -->
            <div class="col-12 col-lg-6">
                <div class="row g-4">
                    <!-- Residential Prices Card -->
                    <div class="col-12 col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Residential Prices</h5>
                            </div>
                            <div class="card-body">
                                @foreach(['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov',
                                'dec'] as $month)
                                <div class="mb-3">
                                    <label class="form-label" for="{{ $month }}_resident_price">{{ ucfirst($month) }}
                                        Resident Price</label>
                                    <input type="number" class="form-control" id="{{ $month }}_resident_price"
                                        name="pricing[{{ $month }}_resident_price]"
                                        value="{{ old("pricing.{$month}_resident_price", $tour->pricing["{$month}_resident_price"] ?? '') }}"
                                        required>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Foreign Prices Card -->
                    <div class="col-12 col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Foreign Prices</h5>
                            </div>
                            <div class="card-body">
                                @foreach(['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov',
                                'dec'] as $month)
                                <div class="mb-3">
                                    <label class="form-label" for="{{ $month }}_foreign_price">{{ ucfirst($month) }}
                                        Foreign Price</label>
                                    <input type="number" class="form-control" id="{{ $month }}_foreign_price"
                                        name="pricing[{{ $month }}_foreign_price]"
                                        value="{{ old("pricing.{$month}_foreign_price", $tour->pricing["{$month}_foreign_price"] ?? '') }}"
                                        required>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Discounts Card -->
                    <div class="col-12 col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Discounts</h5>
                            </div>
                            <div class="card-body">
                                @foreach(['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov',
                                'dec'] as $month)
                                <div class="mb-3">
                                    <label class="form-label" for="{{ $month }}_discount">{{ ucfirst($month) }}
                                        Discount</label>
                                    <input type="number" class="form-control" id="{{ $month }}_discount"
                                        name="pricing[{{ $month }}_discount]"
                                        value="{{ old("pricing.{$month}_discount", $tour->pricing["{$month}_discount"] ?? '') }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">



            <div class="col-12 col-lg-6">
                <!-- Includes and Excludes -->
                <div class="mb-4">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Includes and Excludes</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Includes</label>
                                <div id="includesContainer">
                                    <input type="text" class="form-control mb-2" name="includes[]"
                                        placeholder="Include item"
                                        value="{{ old('includes.0', $tour->includes[0] ?? '') }}">
                                </div>
                                <button type="button" class="btn btn-primary add-include">Add Include</button>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Excludes</label>
                                <div id="excludesContainer">
                                    <input type="text" class="form-control mb-2" name="excludes[]"
                                        placeholder="Exclude item"
                                        value="{{ old('excludes.0', $tour->excludes[0] ?? '') }}">
                                </div>
                                <button type="button" class="btn btn-primary add-exclude">Add Exclude</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">

                <!-- Amenities Section -->
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
                                    {{ (isset($tour) && in_array($amenity->id, $tour->amenities ?? [])) ? 'checked' : '' }}>
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



        <div class="col-12 col-lg-12">
            <!-- Tour Plan -->
            <div class="mb-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Tour Plan</h5>
                    </div>
                    <div class="card-body">
                        <div id="tourPlanContainer">
                            @if(isset($tour->tour_plan) && is_array($tour->tour_plan))
                            @foreach($tour->tour_plan as $index => $day)
                            <div class="tour-plan-item mb-3">
                                <input type="text" class="form-control mb-2" name="tour_plan[{{ $index }}][title]"
                                    placeholder="Day Title" value="{{ $day['title'] ?? '' }}" required>
                                <textarea class="form-control mb-2" name="tour_plan[{{ $index }}][description]"
                                    placeholder="Day Description" rows="2"
                                    required>{{ $day['description'] ?? '' }}</textarea>
                                <button type="button" class="btn btn-danger remove-tour-plan">Remove</button>
                            </div>
                            @endforeach
                            @endif
                        </div>
                        <button type="button" class="btn btn-primary add-tour-plan">Add Day Plan</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-1"></i> {{ isset($tour) ? 'Update' : 'Create' }}
            </button>
            <button type="button" class="btn btn-label-secondary" onclick="window.history.back();">
                <i class="ti ti-arrow-left me-1"></i> Cancel
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add Tour Plan functionality
        document.querySelector('.add-tour-plan').addEventListener('click', function () {
            const container = document.getElementById('tourPlanContainer');
            const newIndex = container.children.length;
            const newPlan = `
                <div class="tour-plan-item mb-3">
                    <input type="text" class="form-control mb-2" name="tour_plan[${newIndex}][title]" placeholder="Day Title" required>
                    <textarea class="form-control mb-2" name="tour_plan[${newIndex}][description]" placeholder="Day Description" rows="2" required></textarea>
                    <button type="button" class="btn btn-danger remove-tour-plan">Remove</button>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', newPlan);
            attachRemoveTourPlanEvent();
        });

        // Attach event to remove Tour Plan items
        function attachRemoveTourPlanEvent() {
            document.querySelectorAll('.remove-tour-plan').forEach(button => {
                button.addEventListener('click', function () {
                    this.closest('.tour-plan-item').remove();
                });
            });
        }

        // Initialize remove Tour Plan events
        attachRemoveTourPlanEvent();

        // Add Include functionality
        document.querySelector('.add-include').addEventListener('click', function () {
            const container = document.getElementById('includesContainer');
            const newInclude = `
                <input type="text" class="form-control mb-2" name="includes[]" placeholder="Include item">
            `;
            container.insertAdjacentHTML('beforeend', newInclude);
        });

        // Add Exclude functionality
        document.querySelector('.add-exclude').addEventListener('click', function () {
            const container = document.getElementById('excludesContainer');
            const newExclude = `
                <input type="text" class="form-control mb-2" name="excludes[]" placeholder="Exclude item">
            `;
            container.insertAdjacentHTML('beforeend', newExclude);
        });
    });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Image overlay interactions
        document.querySelectorAll('.img-wrap').forEach(item => {
            item.addEventListener('mouseenter', function () {
                this.querySelector('.overlay').style.display = 'flex';
            });
            item.addEventListener('mouseleave', function () {
                this.querySelector('.overlay').style.display = 'none';
            });
        });

        // Remove image functionality
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function (event) {
                event.stopPropagation(); // Prevent triggering any parent event
                const imageIndex = this.getAttribute('data-image-index');
                let tourId = '{{ $tour->id ?? '
                ' }}'; // Use Blade's null coalesce operator
                if (tourId) {
                    // AJAX request to remove the image
                    fetch(`/admin/tours/remove-image/${imageIndex}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                index: imageIndex,
                                tour_id: tourId
                            }) // Ensure tour_id is passed correctly
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('.img-wrap')
                                    .remove(); // Remove the image wrapper
                            } else {
                                alert('Failed to delete the image.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    alert('No tour ID available.');
                }
            });
        });


    });

</script>
@endsection
