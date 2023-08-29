<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\LiveChannel;
use App\Helper\Helpers;

class SubCategoryController extends Controller
{
    public function index($id)
    {
        Helpers::read_json();
        $sub_category_data = SubCategory::where('id', $id)->first();
        $post_data = Post::where('sub_category_id', $id)->orderBy('id', 'desc')->paginate(10);
        $live_channels = LiveChannel::get();

        return view('frontend.sub-category', compact('sub_category_data', 'post_data', 'live_channels'));
    }
}
