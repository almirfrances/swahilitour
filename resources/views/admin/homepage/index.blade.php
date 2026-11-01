<!-- resources/views/admin/homepage/index.blade.php -->
@extends('admin.layouts.admin')

@section('title', 'Homepage Customization')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Homepage Customization</h4>
    <p class="mb-4">
        Here you can manage all the essential settings of your homepage. Customize your homepage's appearance and more to suit your needs.
    </p>
    <div class="row g-4">

        <!-- Homepage 1 Customization Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Homepage 1 Customization</h5>
                        <p class="card-text text-muted small">Customize the main elements of the first homepage variant.</p>
                    </div>
                    <a href="{{ route('admin.homepages.homepage1') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-layout-grid2 me-1"></i> Customize
                    </a>
                </div>
            </div>
        </div>

        <!-- Homepage 2 Customization Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Homepage 2 Customization</h5>
                        <p class="card-text text-muted small">Adjust settings for the second homepage layout.</p>
                    </div>
                    <a href="#" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-layout-sidebar-left me-1"></i> Customize
                    </a>
                </div>
            </div>
        </div>

        <!-- Homepage 3 Customization Card -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Homepage 3 Customization</h5>
                        <p class="card-text text-muted small">Modify the third homepage variant's features and appearance.</p>
                    </div>
                    <a href="#" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-layout-width-full me-1"></i> Customize
                    </a>
                </div>
            </div>
        </div>

              

    </div>
</div>
@endsection
