<?php

namespace App\Mail;

use App\Models\Reply;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketReplyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $reply;

    public function __construct(Ticket $ticket, Reply $reply)
    {
        $this->ticket = $ticket;
        $this->reply = $reply;
    }

    public function build()
    {
        return $this->markdown('emails.ticket_reply')
                    ->subject('Update on Your Ticket #' . $this->ticket->id)
                    ->with([
                        'ticketId' => $this->ticket->id,
                        'title' => $this->ticket->title,
                        'message' => $this->reply->message,
                        'attachmentPath' => $this->reply->attachment_path ?? null
                    ]);
    }
}