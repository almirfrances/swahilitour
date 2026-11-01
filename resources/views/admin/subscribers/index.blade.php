@extends('admin.layouts.admin')

@section('title', 'Manage Subscribers')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">Subscriber Management</h4>
    <p>Import subscribers to your mailing list. You can add subscribers individually or in bulk via CSV file. Ensure your CSV is formatted with a semicolon (';') as the delimiter.</p>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">Import Subscribers</button>

    {{-- Import Modal --}}
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Subscribers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.subscribers.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose a CSV file</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                            <small class="form-text text-muted">
                                Please upload a CSV file with 'name' and 'email' columns. Names are optional but emails are required. If an email already exists, it will be skipped.
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- List of Subscribers --}}
    <div class="card mt-3">
        <div class="card-header">
            <h5>Current Subscribers</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Avatar</th>

                        <th>Email</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                    <tr>
                        <td>
                            <div class="avatar" style="background-color: #f0f0f0; width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                {{ strtoupper($subscriber->email[0]) }}
                            </div>
                        </td>

                        <td>{{ $subscriber->email }}</td>
                        <td>{{ $subscriber->name }}</td>
                        <td>
                            <form action="{{ route('admin.subscribers.destroy', $subscriber->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subscriber?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
