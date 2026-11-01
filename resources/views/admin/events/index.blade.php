@extends('admin.layouts.admin')

@section('title', 'Manage Events')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Event Management</h4>
    <p>Welcome to the Event Management page. Here you can add, edit, and delete events as needed.</p>

    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <a href="{{ route('admin.events.create') }}" class="btn btn-primary w-100">Add New Event</a>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="events-table">
                <thead class="thead-light">
                    <tr>
                        <th>Event Name</th>
                        <th>Type</th>
                        <th>Destination</th>
                        <th>Status</th>
                        <th>Price (Residential)</th>
                        <th>Price (Foreign)</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->type->name }}</td>
                            <td>{{ $event->destination->name }}</td>
                            <td>
                                @if($event->status === 'active')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>${{ number_format($event->residential_price_single, 2) }}</td>
                            <td>${{ number_format($event->foreign_price_single, 2) }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('admin.events.edit', $event->id) }}"><i class="ti ti-pencil me-2"></i>Edit</a></li>
                                        <li>
                                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger" type="submit" onclick="return confirm('Are you sure you want to delete this event?')"><i class="ti ti-trash me-2"></i>Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($events->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No events found</h5>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $events->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
