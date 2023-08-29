@extends('admin.layouts.app')

@section('title', 'Live Channel - Edit')
@section('heading', 'Edit Live Channel')

@section('button')
<a href="{{ route('admin-live-channels') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-live-channel-update', $live_channel->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $live_channel->heading }}">
                        </div>
                        <div class="form-group mb-3">
                            <iframe style="width: 575px" width="560" height="250" src="https://www.youtube.com/embed/{{ $live_channel->video_id }}" 
                                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                                encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                            </iframe>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change ID *</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $live_channel->video_id }}">
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