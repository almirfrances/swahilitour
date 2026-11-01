@extends('admin.layouts.admin')

@section('title', 'Edit Hero Section')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3">Edit Homepage-1 Hero Section</h4>
        <a href="{{ route('admin.homepages.homepage1') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Back to Home-1 Settings
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.homepages.homepage1.hero.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <small class="text-muted">Enter the main title for the hero section.</small>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $heroSection->title }}" required>
                            <small class="text-muted">Use HTML tags for formatting. eg. use <code>&lt;br&gt;</code> for line breaks.</small>

                        </div>
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">Subtitle</label>
                            <small class="text-muted">Provide a catchy subtitle for the hero section.</small>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $heroSection->subtitle }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="satisfied_customers" class="form-label">Total Satisfied Customers</label>
                            <small class="text-muted">Showcase the number of satisfied customers, e.g., '5K'.</small>
                            <input type="text" class="form-control" id="satisfied_customers" name="satisfied_customers" value="{{ $heroSection->satisfied_customers }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="button_text" class="form-label">Button Text</label>
                            <small class="text-muted">Set the text for the call-to-action button.</small>
                            <input type="text" class="form-control" id="button_text" name="button_text" value="{{ $heroSection->button_text }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="button_link" class="form-label">Button Link</label>
                            <small class="text-muted">Provide the URL the button should link to.</small>
                            <input type="text" class="form-control" id="button_link" name="button_link" value="{{ $heroSection->button_link }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image (1153x767 px)</label>
                            <small class="text-muted">Upload an image for the hero section. Recommended dimensions: 1153x767 pixels.</small>
                            <input type="file" class="form-control" id="image" name="image">
                            @if($heroSection->image)
                            <div class="mt-2">
                                <img src="{{ Storage::url($heroSection->image) }}" alt="Current Image" style="height: 100px;">
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
