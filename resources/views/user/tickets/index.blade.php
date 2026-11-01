@extends('user.layouts.user')

@section('title', 'Your Tickets')

@section('user')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tickets /</span> Overview</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Your Tickets</h5>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createTicketModal">
                        Create New Ticket
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->title }}</td>
                                        <td>
                                            <span class="badge {{ $ticket->status == 'Open' ? 'bg-success' : ($ticket->status == 'Closed' ? 'bg-danger' : ($ticket->status == 'Pending' ? 'bg-warning' : 'bg-info')) }}">
                                                {{ $ticket->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $ticket->priority == 'High' ? 'bg-danger' : ($ticket->priority == 'Medium' ? 'bg-warning' : 'bg-primary') }}">
                                                {{ $ticket->priority }}
                                            </span>
                                        </td>
                                        <td>{{ $ticket->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('user.tickets.show', $ticket->id) }}" class="btn btn-sm btn-primary">View</a>
                                            {{-- @if(!in_array($ticket->status, ['Closed', 'Pending']))
                                                <a href="{{ route('user.tickets.reply', $ticket->id) }}" class="btn btn-sm btn-secondary">Reply</a>
                                            @else
                                                <button class="btn btn-sm btn-secondary disabled" aria-disabled="true">Reply</button>
                                            @endif --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No tickets found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Creating New Ticket -->
    <div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTicketModalLabel">Create New Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.tickets.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority" name="priority">
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="file_path" class="form-label">Attachment</label>
                            <input type="file" class="form-control" id="file_path" name="file_path">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('createTicketModal'), {
            keyboard: false
        });

        var modalTriggerButton = document.querySelector('[data-bs-toggle="modal"]');
        modalTriggerButton.addEventListener('click', function () {
            myModal.show();
        });
    });
</script>
@endsection
