<ul class="list-unstyled chat-history">
    <li class="chat-message chat-message-left"> <!-- Change to left for user messages -->
        <div class="d-flex overflow-hidden">
            <div class="user-avatar flex-shrink-0 me-3"> <!-- User's avatar on the left -->
                <div class="avatar avatar-sm bg-primary text-white d-flex align-items-center justify-content-center rounded-circle">
                    {{ strtoupper(substr($ticket->user->username, 0, 1)) }} <!-- Display user's avatar initial -->
                </div>
            </div>
            <div class="chat-message-wrapper flex-grow-1">
                <div class="chat-message-text">
                    <p class="mb-0"><strong>{{ $ticket->user->username }}:</strong> {{ $ticket->description }}</p> <!-- User's name and description -->
                </div>
                <div class="text-muted mt-1">
                    <small>{{ $ticket->created_at->format('M d, Y H:i') }}</small>
                </div>
            </div>
        </div>
    </li>



    @foreach($ticket->replies as $reply)
    @php
        $isAdmin = $reply->admin_id; // Check if the reply is from admin
        $username = $isAdmin ? 'You' : $reply->user->username; // Set username or "You" for admin
        $avatarBg = $isAdmin ? 'bg-info' : 'bg-primary'; // Set background color based on sender
        $messageAlignment = $isAdmin ? 'chat-message-right' : 'chat-message-left'; // Align messages
    @endphp
    <li class="chat-message {{ $messageAlignment }}">
        <div class="d-flex overflow-hidden">
            <div class="user-avatar flex-shrink-0 {{ $isAdmin ? 'me-3' : 'me-3' }}">
                <div class="avatar avatar-sm {{ $avatarBg }} text-white d-flex align-items-center justify-content-center rounded-circle">
                    {{ strtoupper(substr($username, 0, 1)) }} <!-- Display initial -->
                </div>
            </div>
            <div class="chat-message-wrapper flex-grow-1">
                <div class="chat-message-text">
                    <p class="mb-0">
                        <strong>{{ $username }}:</strong> <!-- Show "You" or username -->
                        {{ $reply->message }}
                    </p>
                </div>
                @if($reply->attachment_path)
                <div class="mt-2">
                    <a href="{{ asset('storage/' . $reply->attachment_path) }}" target="_blank" class="text-decoration-none">View Attachment</a>
                </div>
                @endif
                <div class="text-muted mt-1">
                    <small>{{ $reply->created_at->format('M d, Y H:i') }}</small>
                </div>
            </div>
        </div>
    </li>
    @endforeach
</ul>
