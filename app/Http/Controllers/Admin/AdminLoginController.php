<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;
use Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
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

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin-dashboard');
        } else {
            return redirect()->route('admin-login')->with('error', 'Email or password is invalid!');
        }
    }

    public function forget_password()
    {
        return view('admin.forget-password');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', 'Email address not found!');   
        }
        
        $token = hash('sha256', time());
        $reset_link = url('/admin/reset-password/'.$token.'/'.$request->email);

        $admin->token = $token;
        $admin->update();
            
        $subject = 'Reset Password';
        $message = 'Please click on this link: ';
        $message .= '<br><a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));

        return redirect()->route('admin-login')->with('success', 'Please check your email!');
    }

    public function reset_password($token, $email)
    {
        $admin = Admin::where('token', $token)->where('email', $email)->first();
        if (!$admin) {
            return redirect()->route('admin-login');
        }

        return view('admin.reset-password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $admin = Admin::where('token', $request->token)->where('email', $request->email)->first();
        $admin->password = Hash::make($request->password);
        $admin->token = '';
        $admin->update();

        return redirect()->route('admin-login')->with('success', 'Password is reset successfuly!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin-login');
    }
}
