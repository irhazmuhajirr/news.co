<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialItem;

class AdminSocialController extends Controller
{
    public function index() 
    {
        $socials = SocialItem::get();

        return view('admin.settings.socials', compact('socials'));
    }

    public function create() 
    {
        return view('admin.settings.social-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $social = new SocialItem();
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->save();

        return redirect()->route('admin-social-media')->with('success', 'Social is added successfully');
    }

    public function edit($id)
    {
        $social = SocialItem::where('id', $id)->first();

        return view('admin.settings.social-edit', compact('social'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'icon' => 'required',
            'url' => 'required',
        ]);

        $social = SocialItem::where('id', $id)->first();
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->update();
        
        return redirect()->route('admin-social-media')->with('success', 'Social item is updated successfully');
    }

    public function delete($id)
    {
        $social = SocialItem::where('id', $id)->first();
        $social->delete();
        
        return redirect()->back()->with('success', 'Social item is deleted successfully');
    }
}
