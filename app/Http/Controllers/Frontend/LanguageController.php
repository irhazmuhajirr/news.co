<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function switch_lang(Request $request)
    {
        // $language = Language::where('short_name', $request->short_name);
        session()->put('session_short_name', $request->short_name);
        
        return redirect()->back();
    }
}
