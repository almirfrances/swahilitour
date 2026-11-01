@extends('admin.layouts.admin')

@section('title', 'Manage Hotels')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Hotel Management</h4>
    <p>Welcome to the Hotel Management page. Here you can add, edit, and delete hotel entries as needed.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary w-100">Add New Hotel</a>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="hotels-table">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Destination</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $hotel)
                        <tr>
                            <td>{{ $hotel->name }}</td>
                            <td>{{ $hotel->destination->name }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $hotel->status)) }}</td>
                            <td>
                                @if($hotel->featured)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('admin.hotels.edit', $hotel->id) }}"><i class="ti ti-pencil me-2"></i>Edit</a></li>
                                        <li>
                                            <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger" type="submit" onclick="return confirm('Are you sure you want to delete this hotel?')"><i class="ti ti-trash me-2"></i>Delete</button>
                                            </form>
                                        </li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addRoomModal{{ $hotel->id }}"><i class="ti ti-plus me-2"></i>Add Room</a></li>
                                        
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($hotels->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No hotels found</h5>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $hotels->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- Add Room Modal -->
@foreach($hotels as $hotel)
<div class="modal fade" id="addRoomModal{{ $hotel->id }}" tabindex="-1"  aria-labelledby="addRoomModalLabel{{ $hotel->id }}" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomModalLabel{{ $hotel->id }}">Add Room to {{ $hotel->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.hotels.addRoom', $hotel->id) }}" method="POST">
                @csrf

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="room_name">Room Name</label>
                            <input type="text" name="room_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input type="number" name="price" class="form-control" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" name="capacity" class="form-control" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="room_type">Room Type</label>
                            <select name="room_type" class="form-control" required>
                                <option value="single">Single</option>
                                <option value="double">Double</option>
                                <option value="suite">Suite</option>
                                <option value="family">Family</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_available">Is Available</label>
                            <select name="is_available" class="form-control" required>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Room Status</label>
                            <select name="status" class="form-control" required>
                                <option value="available">Available</option>
                                <option value="booked">Booked</option>
                                <option value="under_maintenance">Under Maintenance</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Room</button>
                    </div>

                </form>
        </div>
    </div>
</div>
@endforeach

{{-- <script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('show');
            modal.style.display = 'block';
            modal.setAttribute('aria-hidden', 'false');
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('show');
            modal.style.display = 'none';
            modal.setAttribute('aria-hidden', 'true');
        }
    }
</script> --}}
@endsection
