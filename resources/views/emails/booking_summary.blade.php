@component('mail::message')
# Booking Confirmation Awaiting Review

Thank you for choosing **{{ config('app.name') }}** for your travel needs. We are currently reviewing the details of your booking. We aim to process all bookings within the next 24 hours, and you will receive another email once your booking is confirmed with further instructions for payment.

### Booking Preliminary Details
@component('mail::table')
| **Element**             | **Details**                                    |
|-------------------------|------------------------------------------------|
| **Booking Type**        | {{ ucfirst($booking->bookable_type) }}         |
| **Booking ID**          | {{ $booking->id }}                             |
@if($booking->bookable_type == 'tour')
| **Tour Name**           | {{ $booking->tour_name ?? 'N/A' }}             |
| **Destination**         | {{ $booking->destination ?? 'N/A' }}           |
| **Arrival Date**        | {{ $booking->start_date }}                     |
| **Guests**              | {{ $booking->guests }}                         |
| **Children**            | {{ $booking->children_count }}                 |
| **Discount**            | {{ $booking->discount }}%                      |
| **Note**                | _Pricing may vary depending on the month of your visit._ |
@endif
@if($booking->bookable_type == 'hotel')
| **Hotel Name**          | {{ $booking->hotel_name ?? 'N/A' }}            |
| **Room Name**           | {{ $booking->room_name }}                      |
| **Room Price Per Night**| ${{ number_format($booking->room_price, 2) }}  |
| **Room Type**           | {{ $booking->room_type ?? 'N/A' }}             |
| **Check-in Date**       | {{ $booking->start_date }}                     |
| **Check-out Date**      | {{ $booking->end_date }}                       |
@endif
| **Total Price**         | ${{ number_format($booking->total_price, 2) }} |
@endcomponent

This is a preliminary confirmation. Final details, including payment instructions, will be provided once your booking has been reviewed. Pricing indicated is subject to change based on the specific month of your booking for tours.

@component('mail::button', ['url' => config('app.url') . '/user/bookings'])
View Booking Details
@endcomponent

We appreciate your patience and look forward to confirming your plans soon. Should you have any questions in the meantime, please do not hesitate to contact our support team.

Warm regards,<br>
**{{ config('app.name') }} Team**
@endcomponent
