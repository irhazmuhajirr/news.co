<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;

class AdminAdvertisementController extends Controller
{
    public function home_ad_show()
    {
        $advertisement_data = HomeAdvertisement::where('id', 1)->first();

        return view('admin.advertisements.home-advertisement', compact('advertisement_data'));
    }

    public function home_ad_update(Request $request)
    {
        $advertisement_data = HomeAdvertisement::where('id', 1)->first();

        if($request->hasFile('above_search_ad')) {
            $request->validate([
                'above_search_ad' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            unlink(public_path('uploads/'.$advertisement_data->above_search_ad));

            $ext = $request->file('above_search_ad')->extension();
            $final_name = 'above_search_ad'.'.'.$ext;

            $request->file('above_search_ad')->move(public_path('uploads/'), $final_name);

            $advertisement_data->above_search_ad = $final_name;
        }

        if($request->hasFile('above_footer_ad')) {
            $request->validate([
                'above_footer_ad' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            unlink(public_path('uploads/'.$advertisement_data->above_footer_ad));

            $ext = $request->file('above_footer_ad')->extension();
            $final_name = 'above_footer_ad'.'.'.$ext;

            $request->file('above_footer_ad')->move(public_path('uploads/'), $final_name);
            
            $advertisement_data->above_footer_ad = $final_name;
        }

        $advertisement_data->above_search_ad_url = $request->above_search_ad_url;
        $advertisement_data->above_search_status = $request->above_search_ad_status;
        $advertisement_data->above_footer_ad_url = $request->above_footer_ad_url;
        $advertisement_data->above_footer_status = $request->above_footer_ad_status;
        $advertisement_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function top_ad_show()
    {
        $top_advertisement_data = TopAdvertisement::where('id', 1)->first();

        return view('admin.advertisements.top-advertisement', compact('top_advertisement_data'));
    }

    public function top_ad_update(Request $request)
    {
        $top_advertisement_data = TopAdvertisement::where('id', 1)->first();

        if($request->hasFile('top_ad')) {
            $request->validate([
                'top_ad' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            unlink(public_path('uploads/'.$top_advertisement_data->top_ad));

            $ext = $request->file('top_ad')->extension();
            $final_name = 'top-ad'.'.'.$ext;

            $request->file('top_ad')->move(public_path('uploads/'), $final_name);

            $top_advertisement_data->top_ad = $final_name;
        }

        $top_advertisement_data->top_ad_url = $request->top_ad_url;
        $top_advertisement_data->top_ad_status = $request->top_ad_status;
        $top_advertisement_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
    }

    public function sidebar_ad_show()
    {
        $sidebar_advertisement_data = SidebarAdvertisement::get();

        return view('admin.advertisements.sidebar-advertisement', compact('sidebar_advertisement_data'));
    }

    public function sidebar_ad_create()
    {
        return view('admin.advertisements.sidebar-advertisement-create');
    }

    public function sidebar_ad_store(Request $request)
    {
        $sidebar_advertisement_data = new SidebarAdvertisement();
        $sidebar_advertisement_data->sidebar_ad = '';

        if($request->hasFile('sidebar_ad')) {
            $request->validate([
                'sidebar_ad' => 'required | image | mimes:jpg,jpeg,png,gif | max:2048'
            ], [], [
                'sidebar_ad' => 'Advertisement'
            ]);

            $sidebar_ad_time = time();

            $ext = $request->file('sidebar_ad')->extension();
            $final_name = 'sidebar_ad_'.$sidebar_ad_time.'.'.$ext;

            $request->file('sidebar_ad')->move(public_path('uploads/'), $final_name);
            $sidebar_advertisement_data->sidebar_ad = $final_name;
        }

        $sidebar_advertisement_data->sidebar_ad_url = $request->sidebar_ad_url;
        $sidebar_advertisement_data->sidebar_ad_location = $request->sidebar_ad_location;
        $sidebar_advertisement_data->save();

        return redirect()->route('admin-sidebar-advertisements')->with('success', 'Sidebar Advertisement is added successfully.');
    }

    public function sidebar_ad_edit($id)
    {
        $sidebar_advertisement_data = SidebarAdvertisement::where('id', $id)->first();
        
        return view('admin.advertisements.sidebar-advertisement-edit', compact('sidebar_advertisement_data'));
    }

    public function sidebar_ad_update(Request $request, $id)
    {
        $sidebar_advertisement_data = SidebarAdvertisement::where('id', $id)->first();

        if($request->hasFile('sidebar_ad')) {
            $request->validate([
                'sidebar_ad' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            if (file_exists(public_path('uploads/'.$sidebar_advertisement_data->sidebar_ad)) 
                AND !empty($sidebar_advertisement_data->sidebar_ad)) 
            {
                unlink(public_path('uploads/'.$sidebar_advertisement_data->sidebar_ad));
            }

            $sidebar_ad_time = time();

            $ext = $request->file('sidebar_ad')->extension();
            $final_name = 'sidebar_ad_'.$sidebar_ad_time.'.'.$ext;

            $request->file('sidebar_ad')->move(public_path('uploads/'), $final_name);

            $sidebar_advertisement_data->sidebar_ad = $final_name;
        }

        $sidebar_advertisement_data->sidebar_ad_url = $request->sidebar_ad_url;
        $sidebar_advertisement_data->sidebar_ad_location = $request->sidebar_ad_location;
        $sidebar_advertisement_data->update();

        return redirect()->back()->with('success', 'Sidebar Advertisement is updated successfully.');
    }

    public function sidebar_ad_delete($id)
    {
        $sidebar_advertisement_data = SidebarAdvertisement::where('id', $id)->first();

        if (file_exists(public_path('uploads/'.$sidebar_advertisement_data->sidebar_ad)) 
            AND !empty($sidebar_advertisement_data->sidebar_ad)) 
        {
            unlink(public_path('uploads/'.$sidebar_advertisement_data->sidebar_ad));
        }

        $sidebar_advertisement_data->delete();

        return redirect()->back()->with('success', 'Sidebar Advertisement is deleted successfully.');
    }
}
