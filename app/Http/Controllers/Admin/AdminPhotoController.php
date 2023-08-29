<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::orderBy('id', 'desc')->get();
        return view('admin.gallery.photos', compact('photos'));
    }

    public function create()
    {
        return view('admin.gallery.photo-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'photo' => 'required | image | mimes:jpg,jpeg,png,gif | max:2048',
            
        ],);

        $photo_time = time();

        $ext = $request->file('photo')->extension();
        $final_name = 'photo_'.$photo_time.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/gallery/'), $final_name);

        $photo = new Photo();
        $photo->photo = $final_name;
        $photo->caption = $request->caption;

        $photo->save();

        return redirect()->route('admin-photos')->with('success', 'Photo is added successfully.');
    }

    public function edit($id)
    {
        $photo_data = Photo::where('id', $id)->first();
        
        return view('admin.gallery.photo-edit', compact('photo_data'));
    }

    public function update(Request $request, $id)
    {
        $photo_data = Photo::where('id', $id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            if (file_exists(public_path('uploads/gallery/'.$photo_data->photo)) 
                AND !empty($photo_data->photo))
            {
                unlink(public_path('uploads/gallery/'.$photo_data->photo));
            }

            $photo_time = time();

            $ext = $request->file('photo')->extension();
            $final_name = 'photo_'.$photo_time.'.'.$ext;

            $request->file('photo')->move(public_path('uploads/gallery/'), $final_name);

            $photo_data->photo = $final_name;
        }

        $photo_data->caption = $request->caption;
        $photo_data->update();

        return redirect()->back()->with('success', 'Photo is updated successfully.');
    }

    public function delete($id)
    {
        $photo_data = Photo::where('id', $id)->first();

        if (file_exists(public_path('uploads/gallery/'.$photo_data->photo)) 
            AND !empty($photo_data->photo)) 
        {
            unlink(public_path('uploads/gallery/'.$photo_data->photo));
        }

        $photo_data->delete();

        return redirect()->back()->with('success', 'Photo is deleted successfully.');
    }
}
