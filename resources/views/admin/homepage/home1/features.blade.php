@extends('admin.layouts.admin')

@section('title', 'Manage Home-1 Features')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3 mb-3">Manage Home-1 Features</h4>
        <a href="{{ route('admin.homepages.homepage1') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Back to Home-1 Settings
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.homepages.home1.features.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}

        @for ($index = 1; $index <= 3; $index++)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Feature {{ $index }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="home_1_feature_{{ $index }}_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="home_1_feature_{{ $index }}_title" name="home_1_feature_{{ $index }}_title" value="{{ old('home_1_feature_' . $index . '_title', $settings['home_1_feature_' . $index . '_title'] ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="home_1_feature_{{ $index }}_description" class="form-label">Description</label>
                    <textarea class="form-control" id="home_1_feature_{{ $index }}_description" name="home_1_feature_{{ $index }}_description" rows="3">{{ old('home_1_feature_' . $index . '_description', $settings['home_1_feature_' . $index . '_description'] ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="home_1_feature_{{ $index }}_icon" class="form-label">Icon</label>
                    <input type="text" class="form-control" id="home_1_feature_{{ $index }}_icon" name="home_1_feature_{{ $index }}_icon" value="{{ old('home_1_feature_' . $index . '_icon', $settings['home_1_feature_' . $index . '_icon'] ?? '') }}">
                </div>
            </div>
        </div>
        @endfor

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update Features</button>
        </div>
    </form>
</div>
@endsection
