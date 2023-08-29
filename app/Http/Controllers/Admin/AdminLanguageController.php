<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use DB;
use File;

class AdminLanguageController extends Controller
{
    public function index()
    {
        $languages = Language::get();
        return view('admin.languages.language', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.language-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_name' => 'required | unique:languages',
            'is_default' => 'required',
        ]);
        
        if($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default' => 'No']);
        }
        
        $language = new Language();
        $language->name = $request->name;
        $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        $language->save();

        $temp_data = file_get_contents(resource_path('languages/sample.json'));
        file_put_contents(resource_path('languages/'.$request->short_name.'.json'), $temp_data);

        return redirect()->route('admin-languages')->with('success', 'Language is added successfully');
    }

    public function edit($id)
    {
        $language = Language::where('id', $id)->first();

        return view('admin.languages.language-edit', compact('language'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'name' => 'required',
            'short_name' => 'required',
            'is_default' => 'required',
        ]);

        if($request->is_default == 'Yes') {
            DB::table('languages')->update(['is_default' => 'No']);
        }

        $language = Language::where('id', $id)->first();
        $language->name = $request->name;
        $language->short_name = $request->short_name;
        $language->is_default = $request->is_default;
        $language->update();
        
        return redirect()->route('admin-languages')->with('success', 'Language is updated successfully');
    }

    public function delete($id)
    {
        $language = Language::where('id', $id)->first();

        if($language->is_default == 'Yes') {
            DB::table('languages')->where('id', 4)->update(['is_default' => 'Yes']);
        }
        unlink(resource_path('languages/'.$language->short_name.'.json'));
        
        $language->delete();
        
        return redirect()->back()->with('success', 'Language is deleted successfully');
    }

    public function source($id)
    {
        $language = Language::where('id', $id)->first();
        $json_data = json_decode(file_get_contents(resource_path('languages/'.$language->short_name.'.json')));

        return view('admin.languages.language-source', compact('json_data', 'language'));
    }

    public function source_submit(Request $request, $id)
    {
        $language = Language::where('id', $id)->first();

        $arr1 = [];
        $arr2 = [];

        foreach($request->arr_key as $value) {
            $arr1[] = $value;
        }

        foreach($request->arr_value as $value) {
            $arr2[] = $value;
        }

        for($i=0; $i<count($arr1); $i++) {
            $data[$arr1[$i]] = $arr2[$i]; 
        }
        
        $after_encode = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('languages/'.$language->short_name.'.json'), $after_encode);

        return redirect()->route('admin-languages')->with('success', 'Source is updated successfully');
    }
}
