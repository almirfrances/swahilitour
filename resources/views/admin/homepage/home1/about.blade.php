@extends('admin.layouts.admin')

@section('title', 'Manage Home-1 About Us')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold py-3 mb-3">Manage Home-1 About Us</h4>
        <a href="{{ route('admin.homepages.homepage1') }}" class="btn btn-secondary">
            <i class="ti ti-arrow-left"></i> Back to Home-1 Settings
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.homepages.home1.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- About Us Section -->
        <div class="card mb-4">
            <div class="card-body">
                @foreach (['title', 'description', 'subtitle', 'list_1', 'list_2', 'button', 'discount'] as $field)
                    <div class="mb-3">
                        <label class="form-label" for="home_1_about_{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                        <input type="text" class="form-control" id="home_1_about_{{ $field }}" name="home_1_about_{{ $field }}" value="{{ $settings['home_1_about_' . $field] ?? '' }}" required>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="home_1_about_big_image" class="form-label">Big Image (Max 2MB)</label>
                            <input type="file" class="form-control" id="home_1_about_big_image" name="home_1_about_big_image" onchange="previewBigImage(this);">
                            <div class="mt-2">
                                <img id="bigImagePreview" src="{{ $settings['home_1_about_big_image'] ? asset('storage/' . $settings['home_1_about_big_image']) : '' }}" alt="Big Image Preview" style="width: 150px; height: auto; display: {{ $settings['home_1_about_big_image'] ? 'block' : 'none' }};">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="home_1_about_small_image" class="form-label">Small Image (Max 2MB)</label>
                            <input type="file" class="form-control" id="home_1_about_small_image" name="home_1_about_small_image" onchange="previewSmallImage(this);">
                            <div class="mt-2">
                                <img id="smallImagePreview" src="{{ $settings['home_1_about_small_image'] ? asset('storage/' . $settings['home_1_about_small_image']) : '' }}" alt="Small Image Preview" style="width: 150px; height: auto; display: {{ $settings['home_1_about_small_image'] ? 'block' : 'none' }};">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update About Us</button>
            </div>
        </div>
    </form>
</div>

<script>
    function previewBigImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('bigImagePreview').src = e.target.result;
                document.getElementById('bigImagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }

    function previewSmallImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('smallImagePreview').src = e.target.result;
                document.getElementById('smallImagePreview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
    </script>
@endsection
