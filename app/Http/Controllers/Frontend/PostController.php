<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Admin;
use App\Models\Author;
use App\Models\LiveChannel;
use App\Helper\Helpers;

class PostController extends Controller
{
    public function detail ($id) 
    {
        Helpers::read_json();
        
        $tag_data = Tag::where('post_id', $id)->get();
        $post_detail = Post::with('rSubCategory')->where('id', $id)->first();
        $live_channels = LiveChannel::get();
        
        if($post_detail->author_id == 0)
        {
            $author_data = Admin::where('id', $post_detail->admin_id)->first();
        }
        else 
        {
            $author_data = Author::where('id', $post_detail->author_id)->first();
        }

        $new_visitor = $post_detail->visitors+1;
        $post_detail->visitors = $new_visitor;
        $post_detail->update();

        $related_posts = Post::with('rSubCategory')->where('sub_category_id', $post_detail->sub_category_id)->orderBy('id', 'desc')->get();

        return view('frontend.single-post', compact('post_detail', 'author_data', 'tag_data', 'live_channels', 'related_posts'));
    }
}
