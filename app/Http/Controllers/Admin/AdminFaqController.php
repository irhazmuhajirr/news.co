<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faq_data = Faq::orderBy('id', 'desc')->get();
        return view('admin.pages.faq.faq', compact('faq_data'));
    }

    public function create()
    {
        return view('admin.pages.faq.faq-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);

        $faq = new Faq();
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->save();

        return redirect()->route('admin-faq')->with('success', 'FAQs is added successfully.');
    }

    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();

        return view('admin.pages.faq.faq-edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'faq_title' => 'required',
            'faq_detail' => 'required',
        ]);

        $faq = Faq::where('id', $id)->first();
        $faq->faq_title = $request->faq_title;
        $faq->faq_detail = $request->faq_detail;
        $faq->update();
        
        return redirect()->route('admin-faq')->with('success', 'FAQs is updated successfully.');
    }

    public function delete($id)
    {
        $faq = Faq::where('id', $id)->first();
        $faq->delete();
        
        return redirect()->back()->with('success', 'FAQs is deleted successfully.');
    }
}
