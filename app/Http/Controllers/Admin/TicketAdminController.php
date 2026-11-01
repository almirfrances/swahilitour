<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TicketReplyEmail;
use App\Mail\TicketUpdated;
use App\Models\Reply;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketAdminController extends Controller
{
    /**
     * Display a listing of the tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    // Fetch all tickets with users and replies (and their respective users or admins)
    $tickets = Ticket::with(['user', 'replies.admin', 'replies.user'])->latest()->paginate(10);

    // Determine if a specific ticket should be shown based on the request
    $ticketId = $request->input('ticket'); // Get the ticket ID from the query parameters
    $ticket = $ticketId ? Ticket::with(['user', 'replies.admin', 'replies.user'])->find($ticketId) : null;

    // Return the view with both $ticket and $tickets
    return view('admin.tickets.index', compact('tickets', 'ticket'));
}


public function show($id)
{
    $ticket = Ticket::with('user', 'replies')->findOrFail($id);

    // Prepare HTML for ticket chat history
    $ticketHtml = view('admin.partials.ticket_chat', compact('ticket'))->render();

    return response()->json([
        'success' => true,
        'ticket' => $ticket,
        'ticketHtml' => $ticketHtml
    ]);
}








public function reply(Request $request, $ticketId)
{
    // Validate the request
    $request->validate([
        'message' => 'required|string',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB max size
    ]);

    try {
        $ticket = Ticket::findOrFail($ticketId);

        // Create a new reply for the ticket
        $reply = new Reply();
        $reply->ticket_id = $ticket->id;
        $reply->user_id = $request->user_id;  // Ensure this is being captured
        $reply->admin_id = Auth::guard('admin')->id(); // Assuming you're using an 'admin' guard
        $reply->message = $request->message;

        // Handle file upload if there's an attachment
        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('attachments', 'public');
            $reply->attachment_path = $path;
        }

        // Save the reply
        $reply->save();

        // Update ticket status to 'Answered' if it's not already closed
        if ($ticket->status !== 'Closed') {
            $ticket->update(['status' => 'Answered']);
        }

         // Send email to the ticket owner
         Mail::to($ticket->user->email)->send(new TicketReplyEmail($ticket, $reply));

        return response()->json(['success' => true, 'message' => 'Reply successfully added and ticket status updated.']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error: ' . $e->getMessage()], 500);
    }
}


    /**
     * Change the status of a ticket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $ticketId
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, $ticketId)
{
    $request->validate([
        'status' => 'required|in:Open,Closed,Pending,Answered',
    ]);

    $ticket = Ticket::findOrFail($ticketId);
    $ticket->update(['status' => $request->status]);

    return response()->json(['success' => true, 'message' => 'Ticket status updated successfully.']);
}



}