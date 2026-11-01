@component('mail::message')
# Review Received

Thank you for submitting your review. Here is a summary:

@component('mail::panel')
- **Service:** {{ $review->service_rating }}
- **Location:** {{ $review->location_rating }}
- **Amenities:** {{ $review->amenities_rating }}
- **Price:** {{ $review->price_rating }}
@endcomponent

We appreciate your feedback and are reviewing your comments.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
