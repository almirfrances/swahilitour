@component('mail::message')
# Booking Confirmation

Thank you for your booking! Please find your booking details below:

- **Event Name:** {{ $booking->event->name }}
- **Status:** Pending

To complete your booking, please upload your payment proof using the button below:

@component('mail::button', ['url' => $url])
Upload Payment Proof
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

If you have any questions or need further assistance, feel free to get in touch with us.

Thanks,
{{ config('app.name') }}
@endcomponent
