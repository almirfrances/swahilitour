@component('mail::message')
# Response to Your Ticket

Thank you for your patience. We have updated your ticket.

**Ticket ID:** `{{ $ticketId }}`
**Title:** `{{ $title }}`
**Message:** `{{ $message }}`

@isset($attachmentPath)
**Attached File:**
[View Attachment]({{ asset('storage/' . $attachmentPath) }})
@endisset

@component('mail::button', ['url' => url('/user/tickets/' . $ticketId)])
View Ticket
@endcomponent

Thank you for using our support system.

@endcomponent
