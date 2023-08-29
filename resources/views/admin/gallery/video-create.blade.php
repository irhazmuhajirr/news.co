@extends('admin.layouts.app')

@section('title', 'Gallery - Videos')
@section('heading', 'Add Video')

@section('button')
<a href="{{ route('admin-videos') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-video-store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="caption">
                        </div>
                        <div class="form-group mb-3">
                            <label>Video ID *</label>
                            <input type="text" class="form-control" name="video_id">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>
@endsection