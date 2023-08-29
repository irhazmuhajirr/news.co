<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_order', 'asc')->get();

        return view('admin.news.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.news.category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->show_on_menu = $request->show_on_menu;
        $category->category_order = $request->category_order;

        $category->save();

        return redirect()->route('admin-news-categories')->with('success', 'Category is saved successfully.');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view('admin.news.category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {   
        $request->validate([
            'category_name' => 'required',
            'category_order' => 'required',
        ]);

        $category = Category::where('id', $id)->first();
        $category->category_name = $request->category_name;
        $category->show_on_menu = $request->show_on_menu;
        $category->category_order = $request->category_order;
        $category->update();
        
        return redirect()->route('admin-news-categories')->with('success', 'Category is updated successfully.');
    }

    public function delete($id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        
        return redirect()->back()->with('success', 'Category is deleted successfully.');
    }
}
