<?php

namespace App\Jobs;

use App\Mail\MarketingEmail;
use App\Models\EmailCampaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;
    protected $campaign;

    public function __construct(array $emails, EmailCampaign $campaign)
    {
        $this->emails = $emails;
        $this->campaign = $campaign;
    }

    public function handle()
    {
        foreach ($this->emails as $email) {
            Mail::to($email)->send(new MarketingEmail(
                $this->campaign->subject,
                $this->campaign->content,
                $this->campaign->url
            ));
        }
    }
}