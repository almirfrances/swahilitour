@extends('admin.layouts.admin')

@section('title', 'Manage Destinations')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Destination Management</h4>
    <p>Welcome to the Destination Management page. Here you can add, edit, and delete destination entries as needed.</p>
    <div class="card mt-4 shadow-sm">
        {{-- resources/views/admin/destinations/index.blade.php --}}
<div class="card-header">
    <div class="row">
        <div class="col-12 col-md-auto mb-2 mb-md-0"> <!-- Responsive column sizing and margin -->
            <a href="{{ route('admin.destinations.create') }}" class="btn btn-primary w-100">Add New Destination</a> <!-- Full width on small screens -->
        </div>
        {{-- resources/views/admin/destinations/index.blade.php --}}
<div class="col-12 col-md"> <!-- Responsive column sizing -->
    <div class="row">
        <div class="col-12 col-md-6 ms-auto"> <!-- Responsive column sizing and auto margin start for alignment -->
            <form action="{{ route('admin.destinations.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Search destinations..." value="{{ request()->get('search') }}">
                <button type="submit" class="btn btn-secondary">Search</button>
            </form>
        </div>
    </div>
</div>
    </div>
</div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="destinations-table">
                <thead class="thead-light">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Language</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($destinations as $destination)
                        <tr>
                            <td>
                                @if(is_array($destination->images) && count($destination->images) > 0)
                                @php
                                    $randomImage = $destination->images[array_rand($destination->images)];
                                @endphp
                                <img class="rounded" src="{{ Storage::url($randomImage) }}" alt="Destination Image" style="width: 60px; height: auto;">
                            @else
                                No image available
                            @endif
                            </td>
                            <td> {{ $destination->name }}</td>
                            <td>{{ $destination->country }}</td>
                            <td>{{ $destination->language_spoken }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.destinations.edit', $destination->id) }}"><i
                                                    class="ti ti-pencil me-2"></i>Edit</a></li>
                                        <li>

                                                <button data-destination-id="{{ $destination->id }}" class="dropdown-item text-danger" onclick="deleteDestination({{ $destination->id }})"><i
                                                        class="ti ti-trash me-2"></i>Delete</button>

                                        </li>
                                    </ul>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($destinations->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No destinations found</h5>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $destinations->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
function deleteDestination(id) {
    if (confirm('Are you sure you want to delete this destination?')) {
        fetch(`/admin/destinations/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to delete destination');
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
