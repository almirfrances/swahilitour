<?php

namespace App\Mail;

use App\Models\EventBooking;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventBookingCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(EventBooking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        return $this->markdown('mail.booking_completed')
                    ->subject('Your Booking is Completed')
                    ->with([
                        'booking' => $this->booking,
                        'eventName' => $this->booking->event->name,
                        'bookingDate' => $this->booking->created_at->format('Y-m-d'),
                    ]);
    }
}