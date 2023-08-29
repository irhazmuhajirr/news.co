@extends('admin.layouts.app')

@section('title', 'Gallery - Videos')
@section('heading', 'Edit Video')

@section('button')
<a href="{{ route('admin-videos') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-video-update', $video_data->id) }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="caption" value="{{ $video_data->caption }}">
                        </div>
                        <div class="form-group mb-3">
                            <iframe style="width: 575px" width="560" height="250" src="https://www.youtube.com/embed/{{ $video_data->video_id }}" 
                                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                                encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change ID *</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $video_data->video_id }}">
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