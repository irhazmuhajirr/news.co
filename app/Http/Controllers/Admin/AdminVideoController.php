<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('id', 'desc')->get();
        return view('admin.gallery.videos', compact('videos'));
    }

    public function create()
    {
        return view('admin.gallery.video-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'video_id' => 'required',
            
        ],);

        $video = new Video();
        $video->video_id = $request->video_id;
        $video->caption = $request->caption;

        $video->save();

        return redirect()->route('admin-videos')->with('success', 'Video is added successfully');
    }

    public function edit($id)
    {
        $video_data = Video::where('id', $id)->first();
        
        return view('admin.gallery.video-edit', compact('video_data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'caption' => 'required',
            'video_id' => 'required',
            
        ]);
        
        $video_data = Video::where('id', $id)->first();
        $video_data->video_id = $request->video_id;
        $video_data->caption = $request->caption;
        $video_data->update();

        return redirect()->back()->with('success', 'Video is updated successfully.');
    }

    public function delete($id)
    {
        $video_data = Video::where('id', $id)->first();
        $video_data->delete();

        return redirect()->back()->with('success', 'Video is deleted successfully.');
    }
}
