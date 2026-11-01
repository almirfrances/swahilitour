@component('mail::message')
# Admin Reply

Your review has received a reply from the admin:

@component('mail::panel')
{{ $review->admin_reply }}
@endcomponent

Thank you for engaging with us.


Best regards,<br>
{{ config('app.name') }}
@endcomponent
