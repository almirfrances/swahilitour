{{-- resources/views/admin/tours/index.blade.php --}}

@extends('admin.layouts.admin')

@section('title', 'Manage Tours')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Tour Management</h4>
    <p>Welcome to the Tour Management page. Here you can add, edit, and delete tour entries as needed.</p>


    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-auto mb-2 mb-md-0">
                    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary w-100">Add New Tour</a>
                </div>
                <div class="col-12 col-md">
                    <div class="row">
                        <div class="col-12 col-md-6 ms-auto">
                            <form action="{{ route('admin.tours.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control me-2" placeholder="Search tours..."
                                    value="{{ request()->get('search') }}">
                                <button type="submit" class="btn btn-secondary">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-datatable table-responsive">
            <table class="table table-hover" id="tours-table">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tours as $tour)
                        <tr>
                            <td>{{ $tour->name }}</td>
                            <td>{{ $tour->duration }}</td>
                            <td>{{ $tour->type->name ?? 'N/A' }}</td>
                            <td>{{ $tour->destination->name ?? 'N/A' }}</td>
                            <td>

                                @php

                                    $currentPricing = $tour->pricing->current_month_pricing;
                                @endphp
                                <ul>
                                    <li> <strong>Resident : </strong>{{$currentPricing['resident_price']}}</li>
                                    <li> <strong>Foreign : </strong>{{$currentPricing['foreign_price']}}</li>
                                    <li> <strong>Discount : </strong>{{$currentPricing['discount']}}%</li>
                                </ul>

                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('admin.tours.edit', $tour->id) }}"><i class="ti ti-pencil me-2"></i>Edit</a></li>
                                        <li>
                                            <button class="dropdown-item text-danger" onclick="deleteTour({{ $tour->id }})"><i class="ti ti-trash me-2"></i>Delete</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($tours->isEmpty())
                <div class="text-center py-4">
                    <h5 class="text-muted">No tours found</h5>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {{ $tours->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<script>
function deleteTour(id) {
    if (confirm('Are you sure you want to delete this tour?')) {
        fetch(`/admin/tours/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Failed to delete tour');
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
