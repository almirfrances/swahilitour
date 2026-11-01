@extends('admin.layouts.admin')

@section('title', 'Manage Home-1 Why Us')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Manage Home-1 Why Us</h4>

    <form action="{{ route('admin.homepages.home1.why_us.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label for="home_1_why_us_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="home_1_why_us_title" name="home_1_why_us_title" value="{{ $settings['home_1_why_us_title'] ?? '' }}" required>
                </div>
                <div class="mb-3">
                    <label for="home_1_why_us_description" class="form-label">Description</label>
                    <textarea class="form-control" id="home_1_why_us_description" name="home_1_why_us_description" required>{{ $settings['home_1_why_us_description'] ?? '' }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="home_1_why_us_image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="home_1_why_us_image" name="home_1_why_us_image">
                    @if(isset($settings['home_1_why_us_image']))
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $settings['home_1_why_us_image']) }}" alt="Why Us Image" style="height: 150px;">
                    </div>
                    @endif
                </div>
                @foreach(range(1, 3) as $index)
                    <div class="mb-3">
                        <label for="home_1_why_us_list_{{ $index }}_title" class="form-label">List {{ $index }} Title</label>
                        <input type="text" class="form-control" id="home_1_why_us_list_{{ $index }}_title" name="home_1_why_us_list_{{ $index }}_title" value="{{ $settings['home_1_why_us_list_' . $index . '_title'] ?? '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="home_1_why_us_list_{{ $index }}_description" class="form-label">List {{ $index }} Description</label>
                        <textarea class="form-control" id="home_1_why_us_list_{{ $index }}_description" name="home_1_why_us_list_{{ $index }}_description" required>{{ $settings['home_1_why_us_list_' . $index . '_description'] ?? '' }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="home_1_why_us_list_{{ $index }}_icon" class="form-label">List {{ $index }} Icon</label>
                        <input type="text" class="form-control" id="home_1_why_us_list_{{ $index }}_icon" name="home_1_why_us_list_{{ $index }}_icon" value="{{ $settings['home_1_why_us_list_' . $index . '_icon'] ?? '' }}" required>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update Why Us</button>
            </div>
        </div>
    </form>
</div>
@endsection
