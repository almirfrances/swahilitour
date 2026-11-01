@component('mail::message')
# Password Changed Successfully

Dear User,

This is to confirm that your account password has been successfully changed. If you did not initiate this change, please contact our support team immediately to ensure your account security.

If you require any further assistance, do not hesitate to reach out.

Thank you for being with us.

Best Regards,
**{{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
