<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class AdminSubCategoryController extends Controller
{
    public function index()
    {
        $sub_categories = SubCategory::with('rCategory')->orderBy('sub_category_order', 'asc')->get();
        return view('admin.news.sub-category', compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('category_order', 'asc')->get();
        return view('admin.news.sub-category-create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);

        $sub_category = new SubCategory();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->category_id = $request->category_id;
        $sub_category->show_on_menu = $request->show_on_menu;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->sub_category_order = $request->sub_category_order;

        $sub_category->save();

        return redirect()->route('admin-sub-categories')->with('success', 'Sub Category is saved successfully.');
    }

    public function edit($id)
    {
        $sub_category = SubCategory::where('id', $id)->first();
        $categories = Category::orderBy('category_order', 'asc')->get();

        return view('admin.news.sub-category-edit', compact('sub_category', 'categories'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);

        $sub_category = SubCategory::where('id', $id)->first();
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->category_id = $request->category_id;
        $sub_category->show_on_menu = $request->show_on_menu;
        $sub_category->show_on_home = $request->show_on_home;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category->update();
        
        return redirect()->route('admin-sub-categories')->with('success', 'Sub Category is updated successfully');
    }

    public function delete($id)
    {
        $sub_category = SubCategory::where('id', $id)->first();
        $sub_category->delete();
        
        return redirect()->back()->with('success', 'Sub Category is deleted successfully.');
    }
}
