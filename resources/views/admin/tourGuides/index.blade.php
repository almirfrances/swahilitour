@extends('admin.layouts.admin')

@section('title', 'Manage Tour Guides')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Our Team Management</h4>
    <p>Here you can manage tour member, including adding new member, editing their details, and removing them from the list.</p>
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <!-- Trigger modal for adding new tour guide -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTourGuideModal">Add New Member</button>
                </div>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-12 col-md-6 ms-auto">
                            <form action="{{ route('admin.tourGuides.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control me-2" placeholder="Search Members..." value="{{ request()->get('search') }}">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Instagram</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tourGuides as $guide)
                    <tr>
                        <td><img src="{{ asset('storage/' . $guide->picture) }}" alt="Picture of {{ $guide->name }}" style="width: 60px; height: 60px;"></td>
                        <td>{{ $guide->name }}</td>
                        <td>{{ $guide->title }}</td>
                        <td><a href="{{ $guide->instagram_link }}" target="_blank">Instagram</a></td>
                        <td><a href="{{ $guide->facebook_link }}" target="_blank">Facebook</a></td>
                        <td><a href="{{ $guide->twitter_link }}" target="_blank">Twitter</a></td>
                        <td class="text-center">
                            <!-- Buttons for editing and deleting -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editTourGuideModal-{{ $guide->id }}">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteTourGuide({{ $guide->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($tourGuides->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No tour members found</h5>
                </div>
            @endif
            <div class="d-flex justify-content-center mt-4">
                {{ $tourGuides->links() }}
            </div>
        </div>
    </div>
</div>

@include('admin.tourGuides.modals.add')
@include('admin.tourGuides.modals.edit')
@include('admin.tourGuides.modals.delete')

<script>
function deleteTourGuide(id) {
    if (confirm('Are you sure you want to delete this member?')) {
        fetch(`/admin/tourGuides/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to delete member');
            return response.json();
        })
        .then(data => {
            alert(data.message);
            window.location.reload();
        })
        .catch(error => {
            alert('Error: ' + error.message);
        });
    }
}
</script>
@endsection
