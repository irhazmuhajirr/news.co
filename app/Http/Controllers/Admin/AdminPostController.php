<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\SubCategory;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Auth;
use DB;


class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('rSubCategory.rCategory')->orderBy('id', 'desc')->get();
        return view('admin.news.posts', compact('posts'));
    }

    public function create()
    {
        $sub_categories = SubCategory::with('rCategory')->get();
        return view('admin.news.post-create', compact('sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_description' => 'required',
            'sub_category_id' => 'required',
            'post_photo' => 'required | image | mimes:jpg,jpeg,png,gif | max:2048',
            
        ],[
            'post_title' => 'Title field is required!',
            'post_description' => 'Description field is required!',
        ]);

        $query = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $auto_increment_id = $query[0]->Auto_increment;

        $post_photo_time = time();
        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo_'.$post_photo_time.'.'.$ext;
        $request->file('post_photo')->move(public_path('uploads/post-photos/'), $final_name);

        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_description = $request->post_description;
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->save();

        if($request->tags != '') {
            $tags_array = explode(',', $request->tags);
            for($i=0; $i<count($tags_array); $i++)
            {
                $tags_data = new Tag();
                $tags_data->post_id = $auto_increment_id;
                $tags_data->tag_name = trim($tags_array[$i]);
                $tags_data->save();
            }
        }
        
        // Sending this post to subscribers
        if($request->subscriber_send_option == 1)
        {
            
            $subject = 'A news update is up!';
            $message = 'Hi, A news is just published into our media. Please check this link below to see!<br>';
            $message .= '<a target="_blank" href="'.route('news-detail', $auto_increment_id).'">';
            $message .= $request->post_title;
            $message .= '</a>';

            $subscribers = Subscriber::where('status', 'Active')->get();
            foreach ($subscribers as $data) {
                \Mail::to($data->email)->send(new Websitemail($subject, $message));
            }
        }

        return redirect()->route('admin-posts')->with('success', 'Post is added successfully.');
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $sub_categories = SubCategory::with('rCategory')->get();
        $tags_data = Tag::where('post_id', $id)->get();
        
        return view('admin.news.post-edit', compact('post', 'sub_categories', 'tags_data'));
    }

    public function tag_delete($id, $post_id)
    {
        $tag = Tag::where('id', $id)->first();
        $tag->delete();

        return redirect()->route('admin-post-edit', $post_id)->with('success', 'Tag is deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        
        $post = Post::where('id', $id)->first();

        $request->validate([
            'post_title' => 'required',
            'post_description' => 'required',
            'sub_category_id' => 'required',
            
        ],[
            'post_title' => 'Title field is required!',
            'post_description' => 'Description field is required!',
        ]);

        if($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'image | mimes:jpg,jpeg,png,gif | max:2048'
                
            ]);
            
            if (file_exists(public_path('uploads/post-photos/'.$post->post_photo))
                AND !empty($post->post_photo)) 
            {
                unlink(public_path('uploads/post-photos/'.$post->post_photo));
            }

            $post_photo_time = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo_'.$post_photo_time.'.'.$ext;
            $request->file('post_photo')->move(public_path('uploads/post-photos/'), $final_name);

            $post->post_photo = $final_name;
        }
        
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_description = $request->post_description;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->update();

        if($request->tags != '') {
            $tags_array = [];
            $tags = explode(',', $request->tags);
            for ($i=0; $i < count($tags) ; $i++) { 
                $tags_array[] = trim($tags[$i]);
            }
            $tags_array = array_values(array_unique($tags_array));

            for($i=0; $i<count($tags_array); $i++)
            {
                $duplicated_tag = Tag::where('post_id', $id)->where('tag_name', trim($tags_array[$i]))->count();
                if (!$duplicated_tag) {
                    $tags_data = new Tag();
                    $tags_data->post_id = $id;
                    $tags_data->tag_name = trim($tags_array[$i]);
                    $tags_data->save();
                }
            }
        }
        
        return redirect()->route('admin-posts')->with('success', 'Post is updated successfully.');
    }

    public function delete($id) 
    {
        $post = Post::where('id', $id)->first();

        if (file_exists(public_path('uploads/post-photos/'.$post->post_photo))
            AND !empty($post->post_photo)) 
        {
            unlink(public_path('uploads/post-photos/'.$post->post_photo));
        }

        $post->delete();
        Tag::where('post_id', $id)->delete();

        return redirect()->back()->with('success', 'Post is deleted successfully.');
    }
}
