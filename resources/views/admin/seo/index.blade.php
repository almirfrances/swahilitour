<!-- resources/views/admin/seo/index.blade.php -->

@extends('admin.layouts.admin')

@section('title', 'Manage SEO Settings')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3">Manage SEO Settings</h4>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.seo.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach(['homepage', 'about_us', 'contact_us', 'destinations', 'tours', 'hotels', 'gallery', 'faqs', 'guides'] as $page)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ ucfirst(str_replace('_', ' ', $page)) }} SEO Settings</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="{{ $page }}_meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="{{ $page }}_meta_title" name="{{ $page }}_meta_title" value="{{ $seoSettings[$page]['meta_title'] ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="{{ $page }}_meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="{{ $page }}_meta_description" name="{{ $page }}_meta_description" rows="3" required>{{ $seoSettings[$page]['meta_description'] ?? '' }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="{{ $page }}_meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control" id="{{ $page }}_meta_keywords" name="{{ $page }}_meta_keywords" value="{{ $seoSettings[$page]['meta_keywords'] ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="{{ $page }}_seo_image" class="form-label">SEO Image (Max 2MB)</label>
                        <input type="file" class="form-control" id="{{ $page }}_seo_image" name="{{ $page }}_seo_image">
                        @if(isset($seoSettings[$page]['seo_image']))
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $seoSettings[$page]['seo_image']) }}" alt="{{ ucfirst($page) }} SEO Image" style="width: 150px; height: auto;">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Update SEO Settings</button>
    </form>
</div>
@endsection
