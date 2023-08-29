<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->password!='' || $request->retype_password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password',
            ]);

            $admin->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required | image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            unlink(public_path('uploads/'.$admin->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'admin'.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $admin->photo = $final_name;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->route('admin-dashboard')->with('success', 'Profile is updated successfully');
        
    }
}
