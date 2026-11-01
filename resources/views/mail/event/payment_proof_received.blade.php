@component('mail::message')
# Payment Proof Received

We have received your payment proof for the event **{{ $booking->event->name }}** on **{{ $booking->updated_at }}**.
We are currently reviewing it, and we will update you once the review is complete.

Thanks for your patience,
{{ config('app.name') }}
@endcomponent
