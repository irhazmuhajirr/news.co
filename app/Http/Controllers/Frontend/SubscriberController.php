<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Websitemail;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required | email'
        ]);

        if (!$validator->passes())
        {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        }
        else 
        {
            $token = hash('sha256', time());

            $subscriber = new Subscriber();
            $subscriber->email = $request->email;
            $subscriber->token = $token;
            $subscriber->status = 'Pending';
            $subscriber->save();
            /** Sending email */
            $verification_link = url('subscriber/verify/'.$token.'/'.$request->email);
            
            $subject = 'Subscriber Verify Email';
            $message = 'Please click on the following link to verify your subscription: ';
            $message .= '<a href="'.$verification_link.'">';
            $message .= $verification_link;
            $message .= '</a>';
            

            \Mail::to($request->email)->send(new Websitemail($subject, $message));

            return response()->json(['code' => 1, 'success_message' => 'Please check your email!']);
            
        }
    }

    public function verify($token, $email)
    {
        $subscriber_data = Subscriber::where('token', $token)->where('email', $email)->first();
        if($subscriber_data) 
        {
            $subscriber_data->token = '';
            $subscriber_data->status = 'Active';
            $subscriber_data->update();
            
            return redirect()->route('home')->with('success', 'You are successfully verified as a subscriber');
        } else {
            return redirect()->route('home');
        }
        
    }
}
