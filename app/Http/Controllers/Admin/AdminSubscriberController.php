<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;

class AdminSubscriberController extends Controller
{
    public function list()
    {
        $subscribers = Subscriber::get();

        return view('admin.subscribers.list', compact('subscribers'));
    }

    public function send_email()
    {
        return view('admin.subscribers.send-email');
    }

    public function send_email_submit(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->message;

        $subscribers = Subscriber::where('status', 'Active')->get();
        foreach ($subscribers as $data) {
            \Mail::to($data->email)->send(new Websitemail($subject, $message));
        }

        return redirect()->back()->with('success', 'Email is sent successfully');
    }
}
