@component('mail::message')
# Thank You for Subscribing!

Hello {{ $subscriber->name ?: 'there' }},

Thank you for subscribing to our newsletter. You will now receive updates directly to your email.

@component('mail::button', ['url' => config('app.url')])
Visit Our Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
