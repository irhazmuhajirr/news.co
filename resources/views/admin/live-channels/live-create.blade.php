@extends('admin.layouts.app')

@section('title', 'Live Channel - Add')
@section('heading', 'Add Live Channel')

@section('button')
<a href="{{ route('admin-live-channels') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-live-channel-store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading">
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