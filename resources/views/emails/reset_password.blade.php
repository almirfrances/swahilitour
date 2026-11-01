@component('mail::message')
# Reset Your Password

We received a request to reset the password for your account. Click the button below to reset your password:

@component('mail::button', ['url' => $resetLink])
Reset Password
@endcomponent

If you did not request a password reset, please ignore this email.

Thanks,
**{{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
