<!-- resources/views/admin/settings/index.blade.php -->
@extends('admin.layouts.admin')

@section('title', 'Settings')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Settings</h4>
    <p class="mb-4">
        Here you can manage all the essential settings of your application. Customize your site's appearance, behavior, and more to suit your needs.
    </p>
    <div class="row g-4">

        <!-- General Settings Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">General Settings</h5>
                        <p class="card-text text-muted small">Manage the general settings of the site, including site title, description, and more.</p>
                    </div>
                    <a href="{{ route('admin.settings.general') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-settings me-1"></i> View General Settings
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Advanced Site Configurations</h5>
                        <p class="card-text text-muted small">
                            Access and customize advanced configurations to tailor the site's functionality and appearance. Control dynamic features, layout options, and more.
                        </p>
                    </div>
                    <a href="{{ route('admin.settings.configurations') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-settings me-1"></i> Manage Configurations
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Email Settings</h5>
                        <p class="card-text text-muted small">Configure outgoing email settings such as SMTP server, email templates, and more.</p>
                    </div>
                    <a href="{{ route('admin.settings.email') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-mail me-1"></i> View Email Settings
                    </a>
                </div>
            </div>
        </div>

        <!-- Logo Settings Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Logo Settings</h5>
                        <p class="card-text text-muted small">Update and manage the logos and branding images used across the site.</p>
                    </div>
                    <a href="{{ route('admin.settings.logo') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-picture-in-picture me-1"></i> View Logo Settings
                    </a>
                </div>
            </div>
        </div>

        <!-- Menu Settings Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Menu Settings</h5>
                        <p class="card-text text-muted small">Manage navigation menus, including adding, editing, and arranging menu items.</p>
                    </div>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-menu me-1"></i> Manage Menus
                    </a>
                </div>
            </div>
        </div>

        <!-- Page Settings Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Page Settings</h5>
                        <p class="card-text text-muted small">Manage site pages, including adding, editing, and arranging page content.</p>
                    </div>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-file me-1"></i> Manage Pages
            </a>
        </div>
            </div>
        </div>

        <!-- New About Us Card -->
<div class="col-md-6 col-lg-3">
    <div class="card h-100 text-center mb-3 shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
                <h5 class="card-title mb-2">About Us Management</h5>
                <p class="card-text text-muted small">Edit and customize the About Us section of your homepage.</p>
            </div>
            <a href="{{ route('admin.settings.about-us.index') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                <i class="ti ti-layout-media-overlay me-1"></i> Customize About Us
            </a>
        </div>
    </div>
</div>


<!-- Add to the admin dashboard view -->

<div class="col-md-6 col-lg-3">
    <div class="card h-100 text-center mb-3 shadow-sm">
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
                <h5 class="card-title mb-2">SEO Management</h5>
                <p class="card-text text-muted small">Update SEO settings for different pages to improve your site's ranking.</p>
            </div>
            <a href="{{ route('admin.seo.index') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                <i class="ti ti-search me-1"></i> Manage SEO
            </a>
        </div>
    </div>
</div>



        <!-- Custom Code Settings Card -->
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 text-center mb-3 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="mb-3">
                        <h5 class="card-title mb-2">Custom Code</h5>
                        <p class="card-text text-muted small">Insert custom HTML, CSS, or JavaScript code to modify your site's appearance or behavior.</p>
                    </div>
                    <a href="{{ route('admin.settings.custom_code') }}" class="btn btn-primary mt-auto waves-effect waves-light">
                        <i class="ti ti-code me-1"></i> View Custom Code
                    </a>
                </div>
            </div>
        </div>





    </div>
</div>
@endsection
