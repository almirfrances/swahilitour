@component('mail::message')
# Payment Confirmation

Hello,

We are pleased to inform you that your payment has been successfully received and your booking is now confirmed. Thank you for choosing **{{ config('app.name') }}**.

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

Attached to this email, you will find the invoice for your booking. Please keep it for your records.

@component('mail::button', ['url' => route('user.bookings.list')])
View Booking Details
@endcomponent

We look forward to welcoming you and ensuring a pleasant experience.

Best regards,<br>
**{{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
