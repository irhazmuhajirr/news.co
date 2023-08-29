<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Hash;
use Auth;

class AuthorController extends Controller
{
    public function index()
    {
        return view('author.home');
    }
    
    public function edit_profile()
    {
        return view('author.profile');
    }

    public function profile_submit(Request $request)
    {
        $author = Author::where('email', Auth::guard('author')->user()->email)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
        ]);

        if ($request->password!='' || $request->retype_password!='') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required|same:password',
            ]);

            $author->password = Hash::make($request->password);
        }

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required | image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            if (file_exists(public_path('uploads/'.$author->photo))
                AND !empty($author->photo))
            {
                unlink(public_path('uploads/'.$author->photo));
            }

            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_'.$now.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $author->photo = $final_name;
        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->update();

        return redirect()->route('author-dashboard')->with('success', 'Profile is updated successfully');
    }
}
