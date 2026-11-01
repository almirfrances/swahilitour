<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MarketingEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $url;

    public function __construct($subject, $content, $url = null)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->url = $url;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->markdown('emails.marketing', [
                        'content' => $this->content,
                        'url' => $this->url
                    ]);
    }
}