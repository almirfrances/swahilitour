@component('mail::message')

@component('mail::header', ['url' => config('app.url')])
# Welcome to {{ config('app.name') }}
@endcomponent

Hello {{ $user->full_name }},

Thank you for joining us at {{ config('app.name') }}! We're excited to have you on board and to help you discover incredible experiences and accommodations. Below are your credentials to access your account, where you can manage your bookings, view upcoming trips, and much more.

@component('mail::panel')
- **Username:** {{ $user->username }}
- **Password:** {{ $password }}
@endcomponent

Please ensure to change your password after your first login for security reasons.

@component('mail::button', ['url' => url('/login')])
Log In Now
@endcomponent

We are committed to providing you with exceptional customer service and an unforgettable experience. If you have any questions, feel free to contact our support team.

Thanks for choosing us and happy travels!

Warm regards,<br>
**The {{ config('app.name') }} Team**

@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
@endslot

@endcomponent
