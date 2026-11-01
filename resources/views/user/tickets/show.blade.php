@extends('user.layouts.user')

@section('title', 'Ticket Details')

@section('user')

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Display Validation Errors -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Display Success Message -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="app-chat card overflow-hidden">
        <div class="row g-0">

            <!-- Chat & Contacts (Sidebar with Ticket List) -->
            <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
                id="app-chat-contacts">
                <div class="sidebar-header">
                    <div class="d-flex align-items-center me-3 me-lg-0">
                        <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar"
                            data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                            <!-- User Initials Avatar -->
                            <span class="avatar-initial rounded-circle bg-primary text-white">
                                {{ get_initials(Auth::user()->username) }}
                            </span>
                        </div>
                    </div>
                    <i class="ti ti-x cursor-pointer d-lg-none d-block position-absolute mt-2 me-1 top-0 end-0"
                        data-overlay="" data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                </div>
                <hr class="container-m-nx m-0">
                <div class="sidebar-body ps ps--active-y">
                    <div class="chat-contact-list-item-title">
                        <h5 class="text-primary mb-0 px-4 pt-3 pb-2">Your Tickets</h5>
                    </div>
                    <!-- List of Tickets -->
                    <ul class="list-unstyled chat-contact-list" id="chat-list">
                        @forelse($otherTickets as $otherTicket)
                        <li class="chat-contact-list-item {{ $otherTicket->id == $currentTicket->id ? 'active' : '' }}">
                            <a href="{{ route('user.tickets.show', $otherTicket->id) }}"
                                class="d-flex align-items-center">
                                <div class="flex-shrink-0 avatar bg-{{ $otherTicket->status == 'Open' ? 'success' : ($otherTicket->status == 'Closed' ? 'danger' : ($otherTicket->status == 'Pending' ? 'warning' : 'info')) }}">
                                    {{-- <span class="avatar-initial text-white">
                                        {{ strtoupper(substr($otherTicket->title, 0, 1)) }}
                                    <!-- Display first letter of ticket title -->
                                    </span> --}}
                                </div>
                                <div class="chat-contact-info flex-grow-1 ms-2">
                                    <h6 class="chat-contact-name text-truncate m-0">#{{ $otherTicket->id }} -
                                        {{ $otherTicket->title }}</h6>
                                    <p class="chat-contact-status text-muted text-truncate mb-0">
                                        {{ Str::limit($otherTicket->description, 50) }}
                                    </p>
                                </div>

                                    <div class="chat-contact-info flex text-end ms-2">
                                        <small class="text-muted mb-auto">{{ $otherTicket->updated_at->diffForHumans() }}</small><br>
                                        <small class="chat-contact-status text-truncate mb-0">
                                            @if($otherTicket->status == 'Open')
                                                <span class="badge bg-success">{{ $otherTicket->status }}</span>
                                            @elseif($otherTicket->status == 'Answered')
                                                <span class="badge bg-primary">{{ $otherTicket->status }}</span>
                                            @elseif($otherTicket->status == 'Pending')
                                                <span class="badge bg-warning">{{ $otherTicket->status }}</span>
                                            @elseif($otherTicket->status == 'Closed')
                                                <span class="badge bg-danger">{{ $otherTicket->status }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $otherTicket->status }}</span>
                                            @endif
                                        </small>

                                    </div>
                            </a>
                        </li>

                        @empty
                        <li class="chat-contact-list-item chat-list-item-0">
                            <h6 class="text-muted mb-0">No Tickets Found</h6>
                        </li>
                        @endforelse
                    </ul>

                    <!-- Scrollbars -->
                    <div class="ps__rail-x" style="left: 0px; bottom: -295px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 295px; height: 718px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 210px; height: 508px;"></div>
                    </div>
                </div>
            </div>
            <!-- /Chat & Contacts -->

            <!-- Chat History (Current Ticket Conversation) -->
            <div class="col app-chat-history bg-body">
                <div class="chat-history-wrapper">
                    <div class="chat-history-header border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex overflow-hidden align-items-center">
                                <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                                    data-bs-toggle="sidebar" data-overlay="" data-target="#app-chat-contacts"></i>
                                <div class="flex-shrink-0 avatar">
                                    <!-- Current Ticket Owner Initials Avatar -->
                                    <span class="avatar-initial rounded-circle bg-secondary text-white">
                                        {{ get_initials(Auth::user()->username) }}
                                    </span>
                                </div>
                                <div class="chat-contact-info flex-grow-1 ms-2">
                                    <h6 class="m-0">Ticket #{{ $ticket->id }} - {{ $ticket->title }}</h6>
                                    <small class="user-status text-muted">{{ $ticket->priority }} Priority</small>
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
                            </div>
                        </div>
                    </div>
                    <div class="chat-history-body bg-body ps ps--active-y" style="max-height: 600px; overflow-y: auto;">
                        <ul class="list-unstyled chat-history">
                            <!-- Ticket Initiation Message -->
                            <li class="chat-message chat-message-right"> <!-- User's ticket message aligned to the right -->
                                <div class="d-flex overflow-hidden">
                                    <div class="chat-message-wrapper flex-grow-1">
                                        <div class="chat-message-text">
                                            <p class="mb-0"><strong>You:</strong> {{ $ticket->description }}</p>
                                        </div>
                                        @foreach($ticket->replies as $reply)
                                        @if($reply->attachment_path)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $reply->attachment_path) }}" target="_blank"
                                                class="text-decoration-none">View Attachment</a>
                                        </div>
                                        @endif
                                        @endforeach
                                        <div class="text-end text-muted mt-1">
                                            <small>{{ $ticket->created_at->format('M d, Y H:i') }}</small>
                                        </div>
                                    </div>
                                    <div class="user-avatar flex-shrink-0 ms-3">
                                        <div
                                            class="avatar avatar-sm bg-primary text-white d-flex align-items-center justify-content-center rounded-circle">
                                            {{ get_initials(Auth::user()->username) }}
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <!-- Replies -->
                            @if($ticket->replies->isNotEmpty())
                            @foreach($ticket->replies as $reply)
                            @php
                            $isAdmin = $reply->admin_id !== null; // Check if reply is from admin
                            $avatarBg = $isAdmin ? 'bg-info' : 'bg-primary'; // Admin gets a different background
                            $avatarText = $isAdmin ? get_initials($reply->admin->username) : get_initials(Auth::user()->username);
                            @endphp
                            <li class="chat-message {{ $isAdmin ? 'chat-message-left' : 'chat-message-right' }}">
                                <div class="d-flex overflow-hidden">
                                    @if($isAdmin) <!-- Admin message avatar on the left -->
                                    <div class="user-avatar flex-shrink-0 me-3">
                                        <div
                                            class="avatar avatar-sm {{ $avatarBg }} text-white d-flex align-items-center justify-content-center rounded-circle">
                                            {{ $avatarText }}
                                        </div>
                                    </div>
                                    @endif
                                    <div class="chat-message-wrapper flex-grow-1">
                                        <div class="chat-message-text">
                                            <p class="mb-0">
                                                <strong>{{ $isAdmin ? 'Admin' : 'You' }}:</strong> {{ $reply->message }}</p>
                                        </div>
                                        @if($reply->attachment_path)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $reply->attachment_path) }}" target="_blank"
                                                class="text-decoration-none">View Attachment</a>
                                        </div>
                                        @endif
                                        <div class="{{ $isAdmin ? '' : 'text-end' }} text-muted mt-1">
                                            <small>{{ $reply->created_at->format('M d, Y H:i') }}</small>
                                        </div>
                                    </div>
                                    @if(!$isAdmin) <!-- User message avatar on the right -->
                                    <div class="user-avatar flex-shrink-0 ms-3">
                                        <div
                                            class="avatar avatar-sm {{ $avatarBg }} text-white d-flex align-items-center justify-content-center rounded-circle">
                                            {{ $avatarText }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @endforeach
                            @else
                            <li class="chat-message">
                                <div class="d-flex justify-content-center">
                                    <p class="text-muted mb-0">No replies yet.</p>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <!-- Chat Message Form -->
                    @if($ticket->status !== 'Closed')
                    <div class="chat-history-footer shadow-sm">
                        <form class="form-send-message d-flex justify-content-between align-items-center"
                            action="{{ route('user.tickets.reply', $ticket->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex align-items-center w-100">
                                <textarea class="form-control message-input border-0 me-3 shadow-none" name="message"
                                    id="message" rows="1" placeholder="Type your message here..." required></textarea>

                                <!-- File preview area -->
                                <div id="file-preview" class="d-none me-3">
                                    <span id="file-name" class="text-muted"></span>
                                    <i id="close-icon" class="ti ti-x cursor-pointer ms-2" style="color: red;"></i>
                                </div>

                                <div class="message-actions d-flex align-items-center">
                                    <!-- Attach Document -->
                                    <label for="attach-doc" class="form-label mb-0">
                                        <i class="ti ti-photo ti-sm cursor-pointer mx-3"></i>
                                        <input type="file" id="attach-doc" name="attachment" hidden>
                                    </label>
                                    <!-- Send Button -->
                                    <button type="submit"
                                        class="btn btn-primary d-flex send-msg-btn waves-effect waves-light">
                                        <i class="ti ti-send me-md-1 me-0"></i>
                                        <span class="align-middle d-md-inline-block d-none">Send</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>

            <!-- /Chat History -->

            <div class="app-overlay"></div>
        </div>
    </div>
</div>

<style>
    .avatar-initial {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: bold;
    }

    .avatar.bg-primary {
        background-color: #0d6efd;
    }

    .avatar.bg-info {
        background-color: #0dcaf0;
    }

    .avatar.bg-secondary {
        background-color: #6c757d;
    }

    .avatar.bg-success {
        background-color: #198754;
    }

    .avatar.bg-warning {
        background-color: #ffc107;
    }

    .avatar.bg-danger {
        background-color: #dc3545;
    }

</style>

<script>
    document.getElementById('attach-doc').addEventListener('change', function (event) {
        const filePreview = document.getElementById('file-preview');
        const fileName = document.getElementById('file-name');
        const closeIcon = document.getElementById('close-icon');

        // Check if a file was selected
        if (event.target.files.length > 0) {
            const selectedFile = event.target.files[0];
            fileName.textContent = selectedFile.name; // Show the file name
            filePreview.classList.remove('d-none'); // Show the preview area
        } else {
            filePreview.classList.add('d-none'); // Hide the preview area if no file is selected
        }
    });

    // Handle the close icon click to remove the selected file
    document.getElementById('close-icon').addEventListener('click', function () {
        const fileInput = document.getElementById('attach-doc');
        const filePreview = document.getElementById('file-preview');

        // Clear the file input
        fileInput.value = '';
        filePreview.classList.add('d-none'); // Hide the preview area
    });

</script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const formSendMessage = document.querySelector('.form-send-message'); // Select the form
        const messageInput = document.querySelector('#message'); // Select the message input
        const fileInput = document.querySelector('#attach-doc'); // Select the file input
        const filePreview = document.getElementById('file-preview'); // Select the file preview area
        const fileName = document.getElementById('file-name'); // Select the file name display

        formSendMessage.addEventListener('submit', e => {
            e.preventDefault(); // Prevent default form submission

            if (messageInput.value || fileInput.files.length > 0) {
                // Prepare the data to be sent
                let formData = new FormData(formSendMessage);

                // Debug: log the FormData entries
                for (var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]);
                }

                // Send the AJAX request
                fetch(formSendMessage.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Create a new list item for the chat message
                            let newMessage = document.createElement('li');
                            newMessage.className =
                            'chat-message chat-message-right'; // or 'chat-message' depending on the sender

                            // Create the chat message wrapper div
                            let messageWrapper = document.createElement('div');
                            messageWrapper.className = 'd-flex overflow-hidden';

                            // Create the chat message text div
                            let renderMsg = document.createElement('div');
                            renderMsg.className = 'chat-message-wrapper flex-grow-1';

                            // Add the message text
                            renderMsg.innerHTML = `
                            <div class="chat-message-text">
                                <p class="mb-0 text-break"><strong>You:</strong> ${messageInput.value}</p>
                            </div>
                            <div class="text-end text-muted mt-1">
                                <small>${new Date().toLocaleString()}</small> <!-- Update this with your date format -->
                            </div>
                        `;

                            // Check if there's an attachment
                            if (fileInput.files.length > 0) {
                                const selectedFile = fileInput.files[0];
                                const fileLink = document.createElement('a');
                                fileLink.href = URL.createObjectURL(
                                selectedFile); // Create a temporary URL for the file
                                fileLink.textContent = selectedFile.name; // Display the file name
                                fileLink.target = '_blank'; // Open the link in a new tab
                                fileLink.className =
                                'text-primary'; // Optional: add a class for styling

                                // Append file link to the message
                                renderMsg.innerHTML += `
                                <div class="chat-attachment">
                                    <p class="mb-0 text-break">Attachment: ${fileLink.outerHTML}</p>
                                </div>
                            `;
                            }

                            // Append message wrapper to new message
                            messageWrapper.appendChild(renderMsg);
                            newMessage.appendChild(messageWrapper);

                            // Append the new message to the chat history
                            document.querySelector('.chat-history').appendChild(newMessage);

                            // Clear the input fields
                            messageInput.value = '';
                            fileInput.value = ''; // Clear the file input as well
                            filePreview.classList.add('d-none'); // Hide the file preview area

                            // Scroll to the bottom
                            scrollToBottom();
                        } else {
                            console.error('Error saving message:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    });

</script>



@endsection
