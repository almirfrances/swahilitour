@component('mail::message')
# Payment Processing Underway

Hello,

Thank you for submitting your payment. We are now in the process of finalizing your booking details.

## Booking Details

@component('mail::table')
| **Detail**            | **Description**                                  |
|-----------------------|--------------------------------------------------|
| **Booking Reference** | `{{ $booking->id }}`                             |
| **Bookable Type**     | `{{ ucfirst($booking->bookable_type) }}`         |
| **Destination**       | `{{ $booking->destination }}`                   |
| **Hotel/Tour Package**| `{{ $booking->hotel_name ?? $booking->tour_name }}` |
                    |
| **Total Amount Paid** | `$ {{ number_format($booking->total_price, 2) }}` |
@endcomponent

Your booking is currently being processed, and we will send you a confirmation email once everything is set. This email will include all the details of your booking and any further instructions if necessary.

@component('mail::button', ['url' => route('user.bookings.list' )])
Check Booking Status
@endcomponent

Please ensure to check your email for updates. We appreciate your patience and are excited to confirm your arrangements soon!

Best Regards,<br>
**{{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
