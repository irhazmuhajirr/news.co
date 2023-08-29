@extends('author.layouts.app')

@section('title', 'News - Add Post')
@section('heading', 'Add Post')

@section('button')
<a href="{{ route('author-posts') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('author-post-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="post_title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="post_description" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Image *</label>
                            <div><input type="file" name="post_photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="sub_category_id" class="form-control">
                                @foreach ($sub_categories as $data)
                                    <option value="{{ $data->id}}">{{ $data->sub_category_name }}
                                        ({{ $data->rCategory->category_name }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Shareable?</label>
                            <select name="is_share" class="form-control" id="">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Is Comment?</label>
                            <select name="is_comment" class="form-control" id="">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Tags</label>
                            <input type="text" class="form-control" name="tags">
                        </div>
                        <div class="form-group mb-3">
                            <label>Want to send this news to subscribers?</label>
                            <select name="subscriber_send_option" class="form-control" id="">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection