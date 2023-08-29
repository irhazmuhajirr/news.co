<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;
use App\Helper\Helpers;

class OnlinePollController extends Controller
{

    public function index()
    {
        Helpers::read_json();
        
        $online_polls = OnlinePoll::orderBy('id', 'desc')->get();
        return view('frontend.online-polls', compact('online_polls'));
    }

    public function submit(Request $request, $id)
    {
        $online_poll = OnlinePoll::where('id', $id)->first();

        if($request->vote == 'Yes') {
            $online_poll->yes_vote = $online_poll->yes_vote + 1;
        } else if($request->vote == 'No') {
            $online_poll->no_vote = $online_poll->no_vote + 1;
        } else if ($request->vote == 'No Comment') {
            $online_poll->no_comment_vote = $online_poll->no_comment_vote + 1;
        } 

        $online_poll->update();

        session()->put('current_poll_id', $online_poll->id);
        
        return redirect()->back()->with('success', 'The poll is counted successfully');
        
        // return redirect()->route('admin-online-polls')->with('success', 'Online poll is updated successfully');
    }
}
