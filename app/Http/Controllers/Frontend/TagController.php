<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Helper\Helpers;

class TagController extends Controller
{
    public function index($tag_name)
    {
        Helpers::read_json();
        
        $tags = Tag::where('tag_name', $tag_name)->get();
        $post_ids = [];
        foreach ($tags as $data) {
            $post_ids[] = $data->post_id;
        }

        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('frontend.tags', compact('post_ids', 'posts', 'tag_name'));
    }
}
