@component('mail::message')
# Booking Completed

Your booking for the event **{{ $eventName }}**  has been marked as completed.

@component('mail::button', ['url' => url('/user/events/bookings')])
View Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
