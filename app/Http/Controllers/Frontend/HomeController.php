<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Video;
use App\Helper\Helpers;

class HomeController extends Controller
{
    public function index()
    {   
        Helpers::read_json();

        $advertisement_data = HomeAdvertisement::where('id', 1)->first();
        $setting_data = Setting::where('id', 1)->first();
        $post_data = Post::with('rSubCategory')->orderBy('id', 'desc')->get();
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order', 'asc')->where('show_on_home', 'Show')->get();
        $video_data = Video::orderBy('id', 'desc')->get();
        $categories = Category::orderBy('category_order', 'asc')->get();
        
        return view('frontend.home', compact('advertisement_data', 'setting_data', 'post_data',
                                            'sub_category_data', 'video_data', 'categories'));
    }

    public function get_sub_category_by_category($id)
    {
        $sub_categories = SubCategory::where('category_id', $id)->orderBy('sub_category_order', 'asc')->get();
        $response = "<option value=''>Select SubCategory</option>";
        foreach ($sub_categories as $data) {
            $response .= '<option value="'.$data->id.'">'.$data->sub_category_name.'</option>';
        }

        return response()->json(['sub_categories'=>$response]);
    }

    public function search(Request $request)
    {   
        Helpers::read_json();
        
        $posts = Post::with('rSubCategory')->orderBy('id', 'desc');
        if($request->text_item != '') {
            $posts = $posts->where('post_title', 'like', '%'.$request->text_item.'%');
        }
        if($request->sub_category != '') {
            $posts = $posts->where('sub_category_id', $request->sub_category);
        }

        $posts = $posts->paginate(10);

        return view('frontend.search-result', compact('posts'));
    }
}
