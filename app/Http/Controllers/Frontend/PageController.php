<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Faq;
use App\Models\Admin;
use App\Models\Author;
use App\Mail\Websitemail;
use App\Helper\Helpers;
use Hash;
use Auth;

class PageController extends Controller
{
    public function about()
    {
        Helpers::read_json();

        $data = Page::where('id', 1)->first();
        return view('frontend.pages.about', compact('data'));
    }

    public function faq()
    {
        Helpers::read_json();

        $data = Page::where('id', 1)->first();
        $faq = Faq::get();
        return view('frontend.pages.faq', compact('data', 'faq'));
    }
    
    public function terms()
    {
        Helpers::read_json();

        $data = Page::where('id', 1)->first();
        return view('frontend.pages.terms', compact('data'));
    }

    public function privacy()
    {
        Helpers::read_json();

        $data = Page::where('id', 1)->first();
        return view('frontend.pages.privacy', compact('data'));
    }

    public function disclaimer()
    {
        Helpers::read_json();

        $data = Page::where('id', 1)->first();
        return view('frontend.pages.disclaimer', compact('data'));
    }

/**------------------------------------Login Function --------------------------------------- */

    public function login()
    {
        Helpers::read_json();

        $data = Page::where('id', 1)->first();
        return view('frontend.pages.login', compact('data'));
    }
    
    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('author')->attempt($credentials)) {
            return redirect()->route('author-dashboard')->with('success', 'Welcome! You have successfully logged in');
        } else {
            return redirect()->route('page-login')->with('error', 'Email or password is incorrect!');
        }
    }

    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('page-login')->with('success', 'You have successfully logged out!');
    }

/**----------------------------------------------------------------------------------------- */

/**------------------------------------Forget Password-------------------------------------- */

    public function forget_password()
    {
        Helpers::read_json();
        return view('author.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $author = Author::where('email', $request->email)->first();
        if (!$author) {
            return redirect()->back()->with('error', 'Email address not found!');   
        }
        
        $token = hash('sha256', time());
        $reset_link = url('/reset-password/'.$token.'/'.$request->email);

        $author->token = $token;
        $author->update();
            
        $subject = 'Reset Password';
        $message = 'Please click on the following link: ';
        $message .= '<br><a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('page-login')->with('success', 'Please check your email!');
    }

    public function reset_password($token, $email)
    {
        $author = Author::where('token', $token)->where('email', $email)->first();
        if (!$author) {
            return redirect()->route('page-login');
        }

        return view('author.reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $author = Author::where('token', $request->token)->where('email', $request->email)->first();
        $author->password = Hash::make($request->password);
        $author->token = '';
        $author->update();

        return redirect()->route('page-login')->with('success', 'Your password is reset successfuly');
    }

/**----------------------------------------------------------------------------------------- */

    public function contact()
    {
        Helpers::read_json();
        
        $data = Page::where('id', 1)->first();
        return view('frontend.pages.contact', compact('data'));
    }
    
    public function contact_submit(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required | email',
            'message' => 'required',
        ]);

        if (!$validator->passes())
        {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        }
        else 
        {
            /** Sending email */
            $admin = Admin::where('id', 1)->first();
            $subject = 'Contact Form Email';
            $message = '<b>Sender:</b><br>';
            $message .= $request->name.' ('.$request->email.')'.'<br><br>';
            $message .= '<b>Message: </b><br>'.$request->message;
            \Mail::to($admin->email)->send(new Websitemail($subject, $message));

            return response()->json(['code' => 1, 'success_message' => 'Message is sent!']);
            
        }
    }
}
