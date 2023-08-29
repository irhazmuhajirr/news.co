<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Post;
use Hash;

class AdminAuthorController extends Controller
{
    public function dashboard()
    {
        return view('admin.authors.dashboard');
    }

    public function index()
    {
        $authors = Author::get();
        return view('admin.authors.authors', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.author-create');
    }

    public function store(Request $request)
    {   
        $author = new Author();
        $request->validate([
            'name' => 'required',
            'email' => 'required | email | unique:authors',
            'password' => 'required',
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required | image | mimes:jpg,jpeg,png,gif | max:2048' 
            ]);
            
            $now = time();
            $ext = $request->file('photo')->extension();
            $final_name = 'author_photo_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);

            $author->photo = $final_name;
        } else {
            $author->photo = '';
        }

        $author->name = $request->name;
        $author->email = $request->email;
        $author->password = Hash::make($request->password);
        $author->token = '';
        $author->save();

        return redirect()->route('admin-authors')->with('success', 'Author is added successfully');
    }

    public function edit($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.authors.author-edit', compact('author'));
    }

    public function update(Request $request, $id)
    {   
        $author = Author::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required | email ',
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
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

        if($request->password != '') {
            $request->validate([
                'password' => 'required',
                'retype_password' => 'required | same:password',
            ]);

            $author->password = Hash::make($request->password);
        }
        
        $author->name = $request->name;
        $author->email = $request->email;
        $author->update();
        
        return redirect()->route('admin-authors')->with('success', 'Author is updated successfully');
    }

    public function delete($id)
    {
        $author = Author::where('id', $id)->first();

        if (file_exists(public_path('uploads/'.$author->photo)) AND !empty($author->photo))
        {
            unlink(public_path('uploads/'.$author->photo));
        }

        $author->delete();
        
        return redirect()->back()->with('success', 'Author is deleted successfully');
    }

    public function author_news()
    {
        $author_news = Post::where('admin_id', 0)->orderBy('id', 'desc')->get();
        return view('admin.authors.author-news', compact('author_news'));
    }
}
