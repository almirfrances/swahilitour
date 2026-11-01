@component('mail::message')
# Booking Status Update

Your booking for **{{ $booking->event->name }}** on **{{ $booking->event_date }}** has been updated to **{{ $booking->status }}**.

@component('mail::button', ['url' => route('user.event.bookings')])
View Booking Details
@endcomponent

Thank you for choosing us,
{{ config('app.name') }}
@endcomponent
