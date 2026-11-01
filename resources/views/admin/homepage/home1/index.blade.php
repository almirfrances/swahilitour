<!-- resources/views/admin/homepage/home1/index.blade.php -->
@extends('admin.layouts.admin')

@section('title', 'Homepage-1 Customization')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="mb-4">Manage Homepage-1</h4>
        <a href="{{ route('admin.homepages.index') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left me-1"></i> Back to Homepages
        </a>
    </div>
    <p class="mb-4">
        Manage and customize the specific elements of Homepage-1. Tailor the appearance and functionality to better suit your audience.
    </p>
    <div class="row g-4">

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Hero Section Customization</h5>
                        <p class="card-text text-muted small">Adjust the layout, background, and content of the hero section to make a strong first impression.</p>
                    </div>
                    <a href="{{ route('admin.homepages.homepage1.hero.edit') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-layout-slider me-1"></i> Customize
                    </a>
                </div>
            </div>
        </div>



        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Home Features Customization</h5>
                        <p class="card-text text-muted small">Edit the features displayed on Home-1, including titles, descriptions, and icons.</p>
                    </div>
                    <a href="{{ route('admin.homepages.home1.features') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-star me-1"></i> Customize Features
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Home About Us Customization</h5>
                        <p class="card-text text-muted small">Configure the About Us section for Home-1, including title, description, subtitles, list items, and more.</p>
                    </div>
                    <a href="{{ route('admin.homepages.home1.about') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-info-alt me-1"></i> Customize About Us
                    </a>
                </div>
            </div>
        </div>

 <!-- Why Us Customization Card -->
 <div class="ccol-md-6 col-lg-3">
    <div class="card h-100 text-center mb-3 shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
                <h5 class="card-title mb-2">Home-1 Why Us Customization</h5>
                <p class="card-text text-muted small">Edit the "Why Us" section for Home-1, including titles, descriptions, images, and list items.</p>
            </div>
            <a href="{{ route('admin.homepages.home1.why_us') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                <i class="ti ti-star me-1"></i> Customize Why Us
            </a>
        </div>
    </div>
</div>


    </div>
</div>
@endsection
