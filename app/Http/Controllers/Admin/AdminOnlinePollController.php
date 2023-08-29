<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlinePoll;

class AdminOnlinePollController extends Controller
{
    public function index()
    {
        $online_polls = OnlinePoll::get();
        return view('admin.online-polls.online-poll', compact('online_polls'));
    }

    public function create()
    {
        return view('admin.online-polls.online-poll-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
        ]);

        $online_poll = new OnlinePoll();
        $online_poll->question = $request->question;
        $online_poll->yes_vote = 0;
        $online_poll->no_vote = 0;
        $online_poll->no_comment_vote = 0;
        $online_poll->save();

        return redirect()->route('admin-online-polls')->with('success', 'Online poll is added successfully');
    }

    public function edit($id)
    {
        $online_poll = OnlinePoll::where('id', $id)->first();
        return view('admin.online-polls.online-poll-edit', compact('online_poll'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
        ]);

        $online_poll = OnlinePoll::where('id', $id)->first();
        $online_poll->question = $request->question;
        $online_poll->update();

        return redirect()->route('admin-online-polls')->with('success', 'Online poll is updated successfully');
    }

    public function delete($id)
    {
        $online_poll = OnlinePoll::where('id', $id)->first();
        $online_poll->delete();

        return redirect()->route('admin-online-polls')->with('success', 'Online poll is deleted successfully');
    }
}
