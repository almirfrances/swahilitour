@component('mail::message')
# New Review Notification

A new review has been submitted. Here are the details:

@component('mail::panel')
- **User:** {{ $review->user->full_name }}
- **Username:** {{ $review->user->username }}
- **Service:** {{ $review->service_rating }}
- **Location:** {{ $review->location_rating }}
- **Amenities:** {{ $review->amenities_rating }}
- **Price:** {{ $review->price_rating }}
@endcomponent

Please review and respond if necessary.

@component('mail::button', ['url' => route('admin.reviews.show', $review->id)])
View Review
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
