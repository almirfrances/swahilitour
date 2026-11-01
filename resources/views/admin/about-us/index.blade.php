@extends('admin.layouts.admin')

@section('title', 'Edit About Us')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3">Edit About Us</h4>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.settings.about-us.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}

        <div class="card mb-4">
            <div class="card-body">
                <!-- Title and Description -->
                <div class="mb-3">
                    <label for="about_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="about_title" name="about_title" value="{{ $settings['about_title'] ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="about_description" class="form-label">Description</label>
                    <textarea class="form-control" id="about_description" name="about_description" rows="4">{{ $settings['about_description'] ?? '' }}</textarea>
                </div>

                <!-- Images -->
                <div class="mb-3">
                    <label for="about_big_image" class="form-label">Big Image</label>
                    <input type="file" class="form-control" id="about_big_image" name="about_big_image">
                    @if(isset($settings['about_big_image']))
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $settings['about_big_image']) }}" alt="Big Image" style="width: 150px; height: auto;">
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="about_small_image" class="form-label">Small Image</label>
                    <input type="file" class="form-control" id="about_small_image" name="about_small_image">
                    @if(isset($settings['about_small_image']))
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $settings['about_small_image']) }}" alt="Small Image" style="width: 150px; height: auto;">
                    </div>
                    @endif
                </div>

                <!-- Lists, Icons, and Titles -->
                @foreach(range(1, 2) as $index)
                <div class="mb-3">
                    <label for="about_list_{{ $index }}_title" class="form-label">List {{ $index }} Title</label>
                    <input type="text" class="form-control" id="about_list_{{ $index }}_title" name="about_list_{{ $index }}_title" value="{{ $settings['about_list_' . $index . '_title'] ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="about_list_{{ $index }}_icon" class="form-label">List {{ $index }} Icon</label>
                    <input type="text" class="form-control" id="about_list_{{ $index }}_icon" name="about_list_{{ $index }}_icon" value="{{ $settings['about_list_' . $index . '_icon'] ?? '' }}">
                </div>
                @endforeach

                <!-- Experience Percentages -->
                <div class="mb-3">
                    <label for="about_experience_percentages" class="form-label">Experience Percentages</label>
                    <input type="text" class="form-control" id="about_experience_percentages" name="about_experience_percentages" value="{{ $settings['about_experience_percentages'] ?? '' }}">
                </div>

                <!-- Why Us Section -->
                <div class="mb-3">
                    <label for="about_why_us_title" class="form-label">Why Us Title</label>
                    <input type="text" class="form-control" id="about_why_us_title" name="about_why_us_title" value="{{ $settings['about_why_us_title'] ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="about_why_us_description" class="form-label">Why Us Description</label>
                    <textarea class="form-control" id="about_why_us_description" name="about_why_us_description" rows="3">{{ $settings['about_why_us_description'] ?? '' }}</textarea>
                </div>

                <!-- Why Us List Items -->
                @foreach(range(1, 2) as $index)
                <div class="mb-3">
                    <label for="about_why_us_list_{{ $index }}_title" class="form-label">Why Us List {{ $index }} Title</label>
                    <input type="text" class="form-control" id="about_why_us_list_{{ $index }}_title" name="about_why_us_list_{{ $index }}_title" value="{{ $settings['about_why_us_list_' . $index . '_title'] ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="about_why_us_list_{{ $index }}_icon" class="form-label">Why Us List {{ $index }} Icon</label>
                    <input type="text" class="form-control" id="about_why_us_list_{{ $index }}_icon" name="about_why_us_list_{{ $index }}_icon" value="{{ $settings['about_why_us_list_' . $index . '_icon'] ?? '' }}">
                </div>
                @endforeach

                <!-- Additional Why Us Images -->
                @foreach(range(1, 4) as $index)
                <div class="mb-3">
                    <label for="about_why_image_{{ $index }}" class="form-label">Why Us Image {{ $index }}</label>
                    <input type="file" class="form-control" id="about_why_image_{{ $index }}" name="about_why_image_{{ $index }}">
                    @if(isset($settings["about_why_image_$index"]))
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $settings["about_why_image_$index"]) }}" alt="Why Us Image {{ $index }}" style="width: 150px; height: auto;">
                    </div>
                    @endif
                </div>
                @endforeach

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update About Us</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
