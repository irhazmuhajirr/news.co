<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{
    public function about()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.about', compact('page_data'));
    }

    public function about_update(Request $request) 
    {
        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->about_title = $request->about_title;
        $page_data->about_detail = $request->about_detail;
        $page_data->about_status = $request->about_status;
        $page_data->update();

        return redirect()->back()->with('success', 'About is updated successfully.');
    }

    public function faq()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.faq', compact('page_data'));
    }

    public function faq_update(Request $request) 
    {
        $request->validate([
            'faq_title' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->faq_title = $request->faq_title;
        $page_data->faq_detail = $request->faq_detail;
        $page_data->faq_status = $request->faq_status;
        $page_data->update();

        return redirect()->back()->with('success', 'FAQ is updated successfully.');
    }

    public function terms()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.terms', compact('page_data'));
    }

    public function terms_update(Request $request) 
    {
        $request->validate([
            'terms_title' => 'required',
            'terms_detail' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->terms_title = $request->terms_title;
        $page_data->terms_detail = $request->terms_detail;
        $page_data->terms_status = $request->terms_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Terms and Conditions are updated successfully.');
    }

    public function privacy()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.privacy', compact('page_data'));
    }

    public function privacy_update(Request $request) 
    {
        $request->validate([
            'privacy_title' => 'required',
            'privacy_detail' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->privacy_title = $request->privacy_title;
        $page_data->privacy_detail = $request->privacy_detail;
        $page_data->privacy_status = $request->privacy_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Policy is updated successfully.');
    }

    public function disclaimer()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.disclaimer', compact('page_data'));
    }

    public function disclaimer_update(Request $request) 
    {
        $request->validate([
            'disclaimer_title' => 'required',
            'disclaimer_detail' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->disclaimer_title = $request->disclaimer_title;
        $page_data->disclaimer_detail = $request->disclaimer_detail;
        $page_data->disclaimer_status = $request->disclaimer_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Disclaimer is updated successfully.');
    }

    public function login()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.login', compact('page_data'));
    }

    public function login_update(Request $request) 
    {
        $request->validate([
            'login_title' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->login_title = $request->login_title;
        $page_data->login_status = $request->login_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Login setting is updated successfully.');
    }

    public function contact()
    {   
        $page_data = Page::where('id', 1)->first();
        return view('admin.pages.contact', compact('page_data'));
    }

    public function contact_update(Request $request) 
    {
        $request->validate([
            'contact_title' => 'required',
        ]);

        $page_data = Page::where('id', 1)->first();
        $page_data->contact_title = $request->contact_title;
        $page_data->contact_detail = $request->contact_detail;
        $page_data->contact_maps = $request->contact_maps;
        $page_data->contact_status = $request->contact_status;
        $page_data->update();

        return redirect()->back()->with('success', 'Contact is updated successfully.');
    }
}