@component('mail::message')
# Your Ticket Has Been Received

Thank you for contacting us. Here are the details of your ticket:

@component('mail::table')
| **Ticket ID** | **Title**     | **Priority** | **Status** |
|---------------|---------------|--------------|------------|-----------------------|
| {{ $ticketId }} | {{ $title }} | {{ $priority }} | {{ $status }} |
@endcomponent

We will address your issue as soon as possible.

Thanks,
**{{ config('app.name') }} Support Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
