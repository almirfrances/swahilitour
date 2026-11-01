<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    public $booking;
    public $url;

    public function __construct($booking)
    {
        $this->booking = $booking;
        $this->url = route('user.event.bookings.payment', ['bookingId' => $this->booking->id]);
    }

    public function build()
    {
        return $this->markdown('mail.event.booking_confirmation')
                ->subject('Your Booking Confirmation')
                ->with('url', $this->url);
    }
}