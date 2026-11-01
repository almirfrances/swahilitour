@component('mail::message')
# Booking Cancellation Notice

Hello,

We regret to inform you that your booking (Reference: **{{ $booking->id }}**) has been cancelled. We understand that changes can be disappointing and apologize for any inconvenience this may have caused.

## Cancellation Details
- **Booking Reference:** `{{ $booking->id }}`
- **Scheduled Dates:** From `{{ $booking->start_date }}` to `{{ $booking->end_date }}`
- **Type of Booking:** `{{ ucfirst($booking->bookable_type) }}`

If the cancellation was initiated by you, we hope to serve you again in the future. If this cancellation is unexpected, please contact us immediately so we can assist you in resolving any issues or misunderstandings.

@component('mail::button', ['url' => route('user.tickets.index')])
Contact Support
@endcomponent

We value your business and are here to assist you with any further inquiries or to help you plan a new booking whenever you are ready.

Warm Regards,<br>
**{{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
