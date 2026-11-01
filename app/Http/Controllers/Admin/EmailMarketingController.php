<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\EmailCampaign;
use App\Models\EmailRecipient;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EmailMarketingController extends Controller
{
    /**
     * Display the form for creating a new email campaign.
     */
    public function create()
    {
        return view('admin.emails.create');
    }

    public function index()
{
    $campaigns = EmailCampaign::paginate(10);
    return view('admin.emails.index', compact('campaigns'));
}





    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'url' => 'nullable|url',
            'recipient_types' => 'required|array',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed for email campaign: ' . json_encode($validator->errors()->all()));
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $campaign = EmailCampaign::create([
            'subject' => $request->subject,
            'content' => $request->content,
            'url' => $request->url,
        ]);

        // Collect emails based on the selected recipient types and attach recipients to the campaign
        $emails = $this->collectAndAttachRecipients($campaign, $request->recipient_types);
        if (empty($emails)) {
            Log::info('No emails collected for the campaign.');
            return redirect()->route('admin.emails.create')->with('error', 'No recipients found.');
        }

        // Dispatch the job with the collected emails
        dispatch(new SendEmailJob($emails, $campaign));

        Log::info('Email campaign created and dispatch initiated for campaign ID: ' . $campaign->id);
        return redirect()->route('admin.emails.index')->with('success', 'Email campaign created and queued for sending.');
    }

    /**
     * Collects emails based on recipient types and attaches recipients to the campaign.
     *
     * @param EmailCampaign $campaign
     * @param array $types
     * @return array
     */
    private function collectAndAttachRecipients(EmailCampaign $campaign, array $types)
    {
        $emails = [];
        $recipients = [];

        if (in_array('users', $types)) {
            $users = User::all();
            foreach ($users as $user) {
                $emails[] = $user->email;
                $recipients[] = new EmailRecipient(['recipientable_id' => $user->id, 'recipientable_type' => User::class]);
            }
        }

        if (in_array('subscribers', $types)) {
            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                $emails[] = $subscriber->email;
                $recipients[] = new EmailRecipient(['recipientable_id' => $subscriber->id, 'recipientable_type' => Subscriber::class]);
            }
        }

        $campaign->recipients()->saveMany($recipients);
        return $emails;
    }


    /**
     * Attach recipients to the email campaign based on the selected type.
     */
    private function attachRecipients(EmailCampaign $campaign, array $types)
    {
        $recipients = collect();

        if (in_array('users', $types)) {
            $users = User::select('id', 'email')->get();
            foreach ($users as $user) {
                $recipients->push(new EmailRecipient([
                    'email_campaign_id' => $campaign->id,
                    'recipientable_id' => $user->id,
                    'recipientable_type' => User::class,
                    'email' => $user->email // Storing email directly for easier access
                ]));
            }
        }

        if (in_array('subscribers', $types)) {
            $subscribers = Subscriber::select('id', 'email')->get();
            foreach ($subscribers as $subscriber) {
                $recipients->push(new EmailRecipient([
                    'email_campaign_id' => $campaign->id,
                    'recipientable_id' => $subscriber->id,
                    'recipientable_type' => Subscriber::class,
                    'email' => $subscriber->email // Storing email directly for easier access
                ]));
            }
        }

        $campaign->recipients()->saveMany($recipients);
        return $recipients;
    }




    public function resend(Request $request, $campaignId)
{
    $campaign = EmailCampaign::findOrFail($campaignId);
    $recipientTypes = $request->input('recipient_types', []);

    $emails = $this->collectEmails($recipientTypes);
    if (empty($emails)) {
        return redirect()->route('admin.emails.index')->with('error', 'No recipients found.');
    }

    dispatch(new SendEmailJob($emails, $campaign));
    return redirect()->route('admin.emails.index')->with('success', 'Email campaign has been resent.');
}







    private function collectEmails($types)
    {
        $emails = collect();

        if (in_array('users', $types)) {
            $emails = $emails->merge(User::pluck('email'));
        }
        if (in_array('subscribers', $types)) {
            $emails = $emails->merge(Subscriber::pluck('email'));
        }

        // Convert the collection to an array
        return $emails->all();
    }



}