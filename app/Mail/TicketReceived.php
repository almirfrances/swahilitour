<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     *
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Ticket Received: ' . $this->ticket->title)
                    ->markdown('emails.ticket_received')
                    ->with([
                        'ticketId' => $this->ticket->id,
                        'title' => $this->ticket->title,
                        'priority' => $this->ticket->priority,
                        'status' => $this->ticket->status,
                        'description' => $this->ticket->description
                    ]);
    }
}