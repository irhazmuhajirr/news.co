@extends('admin.layouts.app')

@section('title', 'Admin - Edit Social Media')
@section('heading', 'Edit Social Media')

@section('button')
<a href="{{ route('admin-social-media') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-social-media-update', $social->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Icon Preview </label>
                            <div>
                                <i class="{{ $social->icon }}" style="font-size: 50px"></i>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon (code) </label>
                            <input type="text" class="form-control" name="icon" value="{{ $social->icon }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>URL </label>
                            <input type="text" class="form-control" name="url" value="{{ $social->url }}">
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