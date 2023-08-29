<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveChannel;

class AdminLiveController extends Controller
{
    public function index()
    {
        $live_channels = LiveChannel::get();
        return view('admin.live-channels.live', compact('live_channels'));
    }

    public function create()
    {
        return view('admin.live-channels.live-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required'
        ]);

        $live_channel = new LiveChannel();
        $live_channel->heading = $request->heading;
        $live_channel->video_id = $request->video_id;
        $live_channel->save();

        return redirect()->route('admin-live-channels')->with('success', 'Live channel is added successfully');
    }

    public function edit($id)
    {
        $live_channel = LiveChannel::where('id', $id)->first();
        return view('admin.live-channels.live-edit', compact('live_channel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required',
            'video_id' => 'required',
            
        ]);
        
        $live_channel = LiveChannel::where('id', $id)->first();
        $live_channel->video_id = $request->video_id;
        $live_channel->heading = $request->heading;
        $live_channel->update();

        return redirect()->route('admin-live-channels')->with('success', 'Live channel is updated successfully');
    }

    public function delete($id)
    {
        $live_channel = LiveChannel::where('id', $id)->first();
        $live_channel->delete();

        return redirect()->back()->with('success', 'Live channel is deleted successfully');
    }
}
