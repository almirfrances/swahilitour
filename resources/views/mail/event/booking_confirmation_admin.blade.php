@component('mail::message')
# New Event Booking Confirmation

Hello Admin,

A new booking has been made:

- **Booking ID:** {{ $bookingId }}
- **Event Name:** {{ $eventName }}
- **User Name:** {{ $userName }}
- **Booking Type:** {{ $bookingType }}
- **Status:** {{ $bookingStatus }}

@component('mail::button', ['url' => url('/admin/dashboard')])
Manage Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
