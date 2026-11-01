{{-- resources/views/admin/destinations/form.blade.php --}}
@extends('admin.layouts.admin')

@section('title', isset($destination) ? 'Edit Destination' : 'Add Destination')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <form
        action="{{ isset($destination) ? route('admin.destinations.update', $destination->id) : route('admin.destinations.store') }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($destination))
        @method('PUT')
        @endif

        <div class="row g-4">
            <!-- Destination Information -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Destination Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $destination->name ?? '') }}" required>
                            <small class="form-text text-muted">Enter the name of the destination.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ old('country', $destination->country ?? '') }}" required>
                            <small class="form-text text-muted">Enter the country where the destination is
                                located.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"
                                rows="4">{{ old('description', $destination->description ?? '') }}</textarea>
                            <small class="form-text text-muted">Provide a brief description of the destination.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="visa_requirements">Visa Requirements</label>
                            <input type="text" class="form-control" id="visa_requirements" name="visa_requirements"
                                value="{{ old('visa_requirements', $destination->visa_requirements ?? '') }}" required>
                            <small class="form-text text-muted">Specify the visa requirements for this
                                destination.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="language_spoken">Language Spoken</label>
                            <input type="text" class="form-control" id="language_spoken" name="language_spoken"
                                value="{{ old('language_spoken', $destination->language_spoken ?? '') }}" required>
                            <small class="form-text text-muted">Enter the primary languages spoken at the
                                destination.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="currency_used">Currency Used</label>
                            <input type="text" class="form-control" id="currency_used" name="currency_used"
                                value="{{ old('currency_used', $destination->currency_used ?? '') }}" required>
                            <small class="form-text text-muted">Enter the currency used at the destination.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="area">Area (in sq km)</label>
                            <input type="number" class="form-control" id="area" name="area"
                                value="{{ old('area', $destination->area ?? '') }}" required>
                            <small class="form-text text-muted">Enter the area of the destination in square
                                kilometers.</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Images and FAQs -->
            <div class="col-12 col-lg-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Images and FAQs</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="images">Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            <small class="form-text text-muted">Upload multiple images for the destination. Images are uploaded instantly as you select them.</small>
                            <div id="imagePreview" class="d-flex flex-wrap gap-2 mt-3">
                                @if(isset($destination->images) && is_array($destination->images))
                                    @foreach($destination->images as $index => $image)
                                    <div class="img-wrap position-relative" style="border: 1px solid #ccc; padding: 5px; cursor: pointer;">
                                        <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center" style="background-color: rgba(0,0,0,0.5); display: none;">
                                            <button type="button" class="btn btn-danger remove-image" data-image-index="{{ $index }}" aria-label="Remove">
                                                <i class="tf-icons ti ti-trash"></i>
                                            </button>
                                        </div>
                                        <img src="{{ Storage::url($image) }}" alt="Image" class="img-fluid" style="width: 100px; height: 100px;">
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3" id="faqList">
                            <label class="form-label">FAQs</label>
                            @if(isset($destination->faq) && is_array($destination->faq))
                            @foreach($destination->faq as $index => $faq)
                            <div class="faq-item mb-3">
                                <input type="text" class="form-control mb-2" name="faq[{{ $index }}][question]"
                                    placeholder="Question" value="{{ $faq['question'] ?? '' }}">
                                <textarea class="form-control mb-2" name="faq[{{ $index }}][answer]"
                                    placeholder="Answer" rows="2">{{ $faq['answer'] ?? '' }}</textarea>
                                <button type="button" class="btn btn-danger remove-faq">Remove</button>
                            </div>
                            @endforeach
                            @endif
                            <button type="button" class="btn btn-primary add-faq mt-2">Add FAQ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-check me-1"></i> {{ isset($destination) ? 'Update' : 'Create' }}
            </button>
            <button type="button" class="btn btn-label-secondary" onclick="window.history.back();">
                <i class="ti ti-arrow-left me-1"></i> Cancel
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Image overlay interactions
        document.querySelectorAll('.img-wrap').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.querySelector('.overlay').style.display = 'flex';
            });
            item.addEventListener('mouseleave', function() {
                this.querySelector('.overlay').style.display = 'none';
            });
        });

        // Remove image functionality
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent triggering any parent event
                const imageIndex = this.getAttribute('data-image-index');
                let destinationId = '{{ $destination->id ?? '' }}'; // Use Blade's null coalesce operator
                if (destinationId) {
                    // AJAX request to remove the image
                    fetch(`/admin/destinations/remove-image/${imageIndex}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ index: imageIndex, destination_id: destinationId }) // Ensure destination_id is passed correctly
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.closest('.img-wrap').remove(); // Remove the image wrapper
                        } else {
                            alert('Failed to delete the image.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                } else {
                    alert('No destination ID available.');
                }
            });
        });

        // Add FAQ functionality
        document.querySelector('.add-faq').addEventListener('click', function() {
            const faqList = document.getElementById('faqList');
            const newIndex = document.querySelectorAll('.faq-item').length;
            const newFaq = `
                <div class="faq-item mb-3 mt-3">
                    <input type="text" class="form-control mb-2" name="faq[${newIndex}][question]" placeholder="Question">
                    <textarea class="form-control mb-2" name="faq[${newIndex}][answer]" placeholder="Answer" rows="2"></textarea>
                    <button type="button" class="btn btn-danger remove-faq">Remove</button>
                </div>
            `;
            faqList.insertAdjacentHTML('beforeend', newFaq);
            attachRemoveFaqEvent();
        });

        // Attach event to remove FAQ items
        function attachRemoveFaqEvent() {
            document.querySelectorAll('.remove-faq').forEach(button => {
                button.removeEventListener('click', removeFaqHandler); // Remove existing event to prevent duplicates
                button.addEventListener('click', removeFaqHandler);
            });
        }

        function removeFaqHandler(event) {
            event.target.closest('.faq-item').remove();
        }

        // Initialize remove FAQ events
        attachRemoveFaqEvent();
    });
</script>
@endsection
