@extends('admin.layouts.app')

@section('title', 'Sidebar Advertisement - Edit')
@section('heading', 'Edit Sidebar Advertisement')

@section('button')
<a href="{{ route('admin-sidebar-advertisements') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-sidebar-advertisement-update', $sidebar_advertisement_data->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Advertising Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$sidebar_advertisement_data->sidebar_ad) }}"
                                style="width: 100%" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Update Photo</label>
                            <div>
                                <input type="file" name="sidebar_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="sidebar_ad_url" 
                            value="{{ $sidebar_advertisement_data->sidebar_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Sidebar Location</label>
                            <select name="sidebar_ad_location" class="form-control" id="">
                                <option value="Top" @if($sidebar_advertisement_data->sidebar_ad_location == 'Top')
                                    selected @endif>Top</option>
                                <option value="Bottom" @if($sidebar_advertisement_data->sidebar_ad_location == 'Bottom')    
                                    selected @endif>Bottom</option>
                            </select>
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