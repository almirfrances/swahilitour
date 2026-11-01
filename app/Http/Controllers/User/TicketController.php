<?php

namespace App\Http\Controllers\User;

use App\Models\Reply;
use App\Models\Ticket;
use App\Mail\TicketReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class TicketController extends Controller
{
    /**
     * Display a listing of the user's tickets.
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('user.tickets.index', compact('tickets'));
    }


    /**
     * Store a newly created ticket in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|in:Low,Medium,High',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048'
        ]);

        $filePath = $request->file ? $request->file('file')->store('tickets', 'public') : null;

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'Open',
            'file_path' => $filePath
        ]);

        // Send email notification
        Mail::to(Auth::user()->email)->send(new TicketReceived($ticket));

        return redirect()->route('user.tickets.index')->with('success', 'Ticket created successfully.');
    }



public function show(Ticket $ticket)
{
    // Authorization check
    if ($ticket->user_id !== Auth::id()) {
        abort(403);
    }
    $currentTicket = $ticket;



    // Fetch other tickets of the user, excluding the current one
    $otherTickets = Ticket::where('user_id', Auth::id())
                         ->where('id', '!=', $ticket->id)
                         ->orderBy('updated_at', 'desc')
                         ->get();

    return view('user.tickets.show', compact('ticket', 'otherTickets', 'currentTicket'));
}





    /**
     * Store a reply for a ticket.
     */

     public function storeReply(Request $request, Ticket $ticket)
     {
        Log::info($request->all());

         // Validate the request
         $request->validate([
             'message' => 'required|string',
             'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048' // Adjust as necessary
         ]);

         // Create a new reply for the ticket
         $reply = new Reply(); // Assuming you have a Reply model
         $reply->ticket_id = $ticket->id;
         $reply->user_id = Auth::id(); // Assuming the user is authenticated
         $reply->message = $request->message;

         // Handle file upload if there's an attachment
         if ($request->hasFile('attachment')) {
             $path = $request->file('attachment')->store('attachments', 'public');
             $reply->attachment_path = $path; // Save the path in the database
         }

         // Save the reply
         $reply->save();

          // Change the ticket status to 'Open' when the user replies
    if ($ticket->status !== 'Open') {
        $ticket->status = 'Open';
        $ticket->save();
    }

         // Optionally return a response
         return response()->json(['success' => true, 'message' => 'Message sent successfully!']);

     }


}