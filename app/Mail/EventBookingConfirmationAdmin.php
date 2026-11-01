<?php

namespace App\Mail;

use App\Models\EventBooking; // Make sure this is correct
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventBookingConfirmationAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(EventBooking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->markdown('mail.event.booking_confirmation_admin')
                    ->subject('New Event Booking Confirmation')
                    ->with([
                        'bookingId' => $this->booking->id,
                        'eventName' => $this->booking->event->name,
                        'userName' => $this->booking->user->full_name,
                        'bookingType' => $this->booking->booking_type,
                        'bookingStatus' => $this->booking->status,
                    ]);
    }
}