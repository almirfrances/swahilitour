@extends('admin.layouts.admin')

@section('title', 'Manage Gallery')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Gallery Management</h4>

    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGalleryModal">Add New Image</button>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($galleries as $gallery)
                <div class="col-md-2 mb-3">
                    <div class="card">
                        <img src="{{ Storage::url($gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="height: 150px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $gallery->title }}</h5>
                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $galleries->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

{{-- Add Gallery Modal --}}
<div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addGalleryModalLabel">Add New Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
