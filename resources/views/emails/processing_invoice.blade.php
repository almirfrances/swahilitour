@component('mail::message')
# Payment Instructions and Invoice Details

Hello,

Thank you for your booking with {{ config('app.name') }}. Below are the details of your booking and instructions on how to proceed with your payment.

## Booking Details

@component('mail::table')
| **Detail**            | **Description**                                  |
|-----------------------|--------------------------------------------------|
| **Booking Reference** | `{{ $booking->id }}`                             |
| **Bookable Type**     | `{{ ucfirst($booking->bookable_type) }}`         |
| **Destination**       | `{{ $booking->destination }}`                   |
| **Hotel/Tour Package**| `{{ $booking->hotel_name ?? $booking->tour_name }}` |
                   |
| **Total Amount** | `$ {{ number_format($booking->total_price, 2) }}` |
@endcomponent

## Payment Information

### M-Pesa Payment Details
- **Paybill Company Name:** {{ $settings['lipa_number_company'] ?? 'N/A' }}
- **Business Number:** {{ $settings['lipa_number'] ?? 'N/A' }}
- **Account Name:** {{ $settings['lipa_name'] ?? 'N/A' }}

### Bank Transfer Details
- **Bank Name:** {{ $settings['bank_name'] ?? 'N/A' }}
- **Swift Code:** {{ $settings['swift_code'] ?? 'N/A' }}
- **Account Number:** {{ $settings['bank_account_number'] ?? 'N/A' }}
- **Account Name:** {{ $settings['bank_account_name'] ?? 'N/A' }}
- **Branch:** {{ $settings['bank_branch'] ?? 'N/A' }}

Please make your payment via the above details and upload the payment proof to confirm your booking.


Please review the invoice attached to this email and use the following link to complete your payment.

@component('mail::button', ['url' => route('user.booking.payment', $booking->id)])
Pay Now
@endcomponent

@component('mail::panel')
### Additional Information
If you have any special requests or need further assistance, please do not hesitate to contact us directly.
@endcomponent

Thank you for choosing {{ config('app.name') }}. We look forward to providing you with an exceptional experience.

Warm regards,<br>
**{{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
