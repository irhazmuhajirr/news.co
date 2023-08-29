<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function index() {
        $setting_data = Setting::where('id', 1)->first();
        return view('admin.settings.setting', compact('setting_data'));
    }

    public function update(Request $request) {

        $request->validate([
            'news_ticker_total' => 'required',
            'video_total' => 'required'
        ]);

        // dd($request->video_total, $request->video_status);

        $setting = Setting::where('id', 1)->first();
        $setting->news_ticker_total = $request->news_ticker_total;
        $setting->news_ticker_status = $request->news_ticker_status;
        $setting->video_total = $request->video_total;
        $setting->video_status = $request->video_status;

        if($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'image | mimes:jpg,jpeg,png,gif | max:2048',
            ]);
            
            if (file_exists(public_path('uploads/'.$setting->logo)) AND !empty($setting->logo)) 
            {
                unlink(public_path('uploads/'.$setting->logo));
            }

            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.'.'.$ext;
            $request->file('logo')->move(public_path('uploads/'), $final_name);

            $setting->logo = $final_name;
        }

        if($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'image | mimes:jpg,jpeg,png,gif | max:2048',
            ]);
            
            if (file_exists(public_path('uploads/'.$setting->favicon)) AND !empty($setting->favicon)) 
            {
                unlink(public_path('uploads/'.$setting->favicon));
            }

            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.'.'.$ext;
            $request->file('favicon')->move(public_path('uploads/'), $final_name);

            $setting->favicon = $final_name;
        }

        $setting->theme_color_1 = $request->theme_color_1;
        $setting->theme_color_2 = $request->theme_color_2;
        $setting->analytic_id = $request->analytic_id;
        $setting->analytic_status = $request->analytic_status;
        $setting->disqus_code = $request->disqus_code;

        $setting->update();
        
        return redirect()->back()->with('success', 'Settings are updated successfully');
    }
}
