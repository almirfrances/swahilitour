@extends('admin.layouts.admin')

@section('title', 'Manage Tickets')

@section('admin')
<div class="container-xxl flex-grow-1 container-p-y">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="app-chat card overflow-hidden">
        <div class="row g-0">

            <!-- Chat & Contacts (Sidebar with Ticket List) -->
            <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
                <div class="sidebar-header">
                    <div class="d-flex align-items-center me-3 me-lg-0">
                        <div class="flex-shrink-0 avatar avatar-online me-3">
                            <span class="avatar-initial rounded-circle bg-primary text-white">
                                {{ strtoupper(substr(config('app.name'), 0, 1)) }}
                            </span>
                        </div>
                    </div>
                    <i class="ti ti-x cursor-pointer d-lg-none d-block position-absolute mt-2 me-1 top-0 end-0"
                        data-overlay="" data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                </div>
                <hr class="container-m-nx m-0">
                <div class="sidebar-body">
                    <div class="chat-contact-list-item-title">
                        <h5 class="text-primary mb-0 px-4 pt-3 pb-2">All Tickets</h5>
                    </div>
                    <ul class="list-unstyled chat-contact-list" id="chat-list">
                        @forelse($tickets as $ticket)
                            <li class="chat-contact-list-item">
                                <a href="#" class="ticket-link d-flex align-items-center" data-ticket-id="{{ $ticket->id }}">
                                    <div class="flex-shrink-0 avatar">
                                        <span class="avatar-initial rounded-circle bg-secondary text-white">
                                            {{ strtoupper(substr($ticket->user->username, 0, 1)) }}
                                        </span>
                                    </div>

                                    <div class="chat-contact-info flex-grow-1 ms-2">
                                        <small class="chat-contact-name text-truncate m-0">{{ $ticket->user->username }}</small> <br>
                                        <small class="chat-contact-name m-0">{{ $ticket->title }}</small>
                                    </div>
                                    <div class="chat-contact-info flex text-end ms-2">
                                        <small class="text-muted mb-auto">{{ $ticket->updated_at->diffForHumans() }}</small><br>
                                        <small class="chat-contact-status text-truncate mb-0">
                                            @if($ticket->status == 'Open')
                                                <span class="badge bg-success">{{ $ticket->status }}</span>
                                            @elseif($ticket->status == 'Answered')
                                                <span class="badge bg-primary">{{ $ticket->status }}</span>
                                            @elseif($ticket->status == 'Pending')
                                                <span class="badge bg-warning">{{ $ticket->status }}</span>
                                            @elseif($ticket->status == 'Closed')
                                                <span class="badge bg-danger">{{ $ticket->status }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $ticket->status }}</span>
                                            @endif
                                        </small>

                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="chat-contact-list-item">
                                <h6 class="text-muted mb-0">No Tickets Found</h6>
                            </li>
                        @endforelse
                    </ul>

                </div>
            </div>

            <!-- Chat History (Current Ticket Conversation) -->
            <div class="col app-chat-history bg-body">
                <div class="chat-history-wrapper">
                    <div class="chat-history-header border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex overflow-hidden align-items-center">
                                <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                                    data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
                                <div class="avatar">
                                    <span class="avatar-initial rounded-circle bg-secondary text-white" id="ticket-avatar">
                                        <!-- Avatar will be updated with JavaScript -->
                                    </span>
                                </div>
                                <div class="chat-contact-info flex-grow-1 ms-2">
                                    <h6 class="m-0" id="ticket-header">Select a ticket to view messages</h6>
                                    <small class="user-status text-muted" id="ticket-priority">Priority: N/A</small>
                                </div>
                            </div>

                            <!-- Ticket Status Dropdown -->
                            <div>
                                <form id="status-form" action="{{ route('admin.tickets.status', 'placeholder') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="ticket_id" id="ticket-id-status" value="">

                                    <select name="status" id="status-select" class="form-select">
                                        <option value="Open" {{ $ticket->status == 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="Pending" {{ $ticket->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Closed" {{ $ticket->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="chat-history-body bg-body" style="max-height: 600px; overflow-y: auto;">
                        @include('admin.partials.ticket_chat', ['messages' => []]) <!-- Start with no messages -->
                        <!-- Scrollbars -->
                        <div class="ps__rail-x" style="left: 0px; bottom: -295px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 295px; height: 718px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 210px; height: 508px;"></div>
                        </div>
                    </div>

                    <div class="chat-history-footer shadow-sm" id="message-footer">
                        <form class="form-send-message d-flex justify-content-between align-items-center" action="{{ route('admin.tickets.reply', 'placeholder') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="user-id" name="user_id" value="">

                            <div class="d-flex align-items-center w-100">
                                <textarea class="form-control message-input border-0 me-3 shadow-none" name="message" id="message" rows="1" placeholder="Type your message..." required></textarea>

                                <!-- File preview area -->
                                <div id="file-preview" class="d-none me-3">
                                    <span id="file-name" class="text-muted"></span>
                                    <i id="close-icon" class="ti ti-x cursor-pointer ms-2" style="color: red;"></i>
                                </div>

                                <div class="message-actions d-flex align-items-center">
                                    <label for="attach-doc" class="form-label mb-0">
                                        <i class="ti ti-photo ti-sm cursor-pointer mx-3"></i>
                                        <input type="file" id="attach-doc" name="attachment" hidden>
                                    </label>
                                    <button type="submit" class="btn btn-primary d-flex send-msg-btn waves-effect waves-light">
                                        <i class="ti ti-send me-md-1 me-0"></i>
                                        <span class="align-middle d-md-inline-block d-none">Send</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

document.addEventListener('DOMContentLoaded', () => {
    const statusSelect = document.getElementById('status-select');
    const ticketIdStatus = document.getElementById('ticket-id-status');
    const statusForm = document.getElementById('status-form');

    // Function to update the form action and enable the status dropdown
    function loadTicketDetails(ticketId) {
        ticketIdStatus.value = ticketId; // Set the hidden ticket ID field
        statusSelect.disabled = false;   // Enable the status select dropdown
    }

    // Event listener for ticket selection from the list
    document.getElementById('chat-list').addEventListener('click', function(event) {
        const target = event.target.closest('.ticket-link');
        if (target) {
            event.preventDefault();
            const ticketId = target.dataset.ticketId;
            loadTicketDetails(ticketId); // Load the ticket ID and enable the status dropdown
        }
    });

    // Function to update ticket status using AJAX
    function updateTicketStatus(ticketId, newStatus) {
        const url = `/admin/tickets/${ticketId}/status`;

        const formData = new FormData();
        formData.append('status', newStatus);
        formData.append('_method', 'PATCH');
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        fetch(url, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Status updated successfully!');
            } else {
                console.error('Failed to update status:', data.message);
            }
        })
        .catch(error => console.error('Error updating status:', error));
    }

    // Listen for changes in the status select dropdown
    statusSelect.addEventListener('change', function() {
        const newStatus = this.value;
        const ticketId = ticketIdStatus.value;

        if (ticketId) {
            updateTicketStatus(ticketId, newStatus);
        }
    });
});



</script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const formSendMessage = document.querySelector('.form-send-message');
    const messageInput = document.querySelector('#message');
    const userIdInput = document.querySelector('#user-id'); // Get the user_id input
    const fileInput = document.querySelector('#attach-doc');
    const filePreview = document.getElementById('file-preview');
    const fileName = document.getElementById('file-name');

    // Function to update form action and load ticket details
    function updateFormAction(ticketId) {
        formSendMessage.action = `/admin/tickets/${ticketId}/reply`; // Update the form action to include the ticket ID
        loadTicketDetails(ticketId); // Load ticket details into the chat history
    }

    // Load ticket details into the chat history
    function loadTicketDetails(ticketId) {
        fetch(`/admin/tickets/${ticketId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.chat-history-body').innerHTML = data.ticketHtml;
                    document.getElementById('ticket-header').textContent = `Ticket #${data.ticket.id} - ${data.ticket.title}`;
                    document.getElementById('ticket-avatar').textContent = data.ticket.user.username[0].toUpperCase();
                    document.getElementById('ticket-priority').textContent = `Priority: ${data.ticket.priority}`;
                    userIdInput.value = data.ticket.user_id; // Set the user_id for the reply form
                } else {
                    console.error('Failed to load ticket details:', data.message);
                }
            })
            .catch(error => console.error('Error loading ticket details:', error));
    }

    // Handle form submission
    formSendMessage.addEventListener('submit', function(event) {
        event.preventDefault();
        let formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Append new message to chat history
                const newMessage = document.createElement('div');
                newMessage.className = 'chat-message chat-message-right';
                newMessage.innerHTML = `<p>${messageInput.value}</p><small>Just now</small>`;
                document.querySelector('.chat-history-body').appendChild(newMessage);

                // Clear input fields
                messageInput.value = '';
                if (fileInput) fileInput.value = '';
                if (filePreview) filePreview.style.display = 'none';
            } else {
                console.error('Error sending message:', data.message);
            }
        })
        .catch(error => console.error('Error sending message:', error));
    });

    // Event delegation to handle clicks on ticket links
    document.getElementById('chat-list').addEventListener('click', function(event) {
        const target = event.target.closest('.ticket-link');
        if (target) {
            event.preventDefault();
            const ticketId = target.dataset.ticketId;
            updateFormAction(ticketId);
        }
    });
});
</script>

@endsection
