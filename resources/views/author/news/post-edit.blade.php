@extends('author.layouts.app')

@section('title', 'News - Edit Post')
@section('heading', 'Edit Post')

@section('button')
<a href="{{ route('author-posts') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('author-post-update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="post_title"
                            value="{{ $post->post_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="post_description" class="form-control snote" cols="30" rows="10">
                                {{ $post->post_description }}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Post Image</label>
                            <div>
                                <img src="{{ asset('uploads/post-photos/'.$post->post_photo) }}" style="width: 300px" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Update Image</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach ($sub_categories as $data)
                                    <option value="{{ $data->id}}" @if($post->sub_category_id == $data->id) 
                                        selected @endif>{{ $data->sub_category_name }} ({{ $data->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Shareable?</label>
                            <select name="is_share" class="form-control" id="">
                                <option value="1" @if($post->is_share == '1') selected @endif>Yes</option>
                                <option value="0" @if($post->is_share == '0') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control" id="">
                                <option value="1" @if($post->is_comment == '1') selected @endif>Yes</option>
                                <option value="0" @if($post->is_comment == '0') selected @endif>No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Tags</label>
                            <table class="table table-borderless table-sm table-hover">
                                @foreach($tags_data as $item)
                                    <tr>
                                        <td>{{ $item->tag_name }}</td>
                                        <td>
                                            <a href="{{ route('author-post-tag-delete', [$item->id, $post->id]) }}"
                                                onclick="return confirm('Are you sure want to delete this tag?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" class="form-control" name="tags" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection