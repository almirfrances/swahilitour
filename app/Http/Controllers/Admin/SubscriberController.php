<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\SubscribersImport;
use App\Mail\SubscriptionConfirmation;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;


class SubscriberController extends Controller
{
    /**
     * Display a listing of subscribers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = Subscriber::paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Store a newly created subscriber in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create($request->all());

        return redirect()->back()->with('success', 'Subscriber added successfully.');
    }

    /**
     * Remove the specified subscriber from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();

        return redirect()->back()->with('success', 'Subscriber deleted successfully.');
    }







    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:csv,txt'  // Ensure the MIME types include 'txt' if your CSV is plain text
    ]);

    try {
        Excel::import(new SubscribersImport, $request->file('file'));

        return back()->with('success', 'Subscribers imported successfully.');
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
        foreach ($failures as $failure) {
            foreach ($failure->errors() as $error) {
                // Collect errors and perhaps flash them back to the session
                $request->session()->flash('import.errors', $failure->row() . ': ' . $error);
            }
        }

        return back()->withInput()->withErrors($failures);
    }
}




public function subscribe(Request $request)
{
    $validated = $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'required|email|unique:subscribers,email'
    ]);

    $subscriber = Subscriber::create($validated);

    Mail::to($subscriber->email)->send(new SubscriptionConfirmation($subscriber));

    return redirect()->back()->with('success', 'Thank you for subscribing!');
}


}