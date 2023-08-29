@extends('admin.layouts.app')

@section('title', 'Admin - Top Advertisement')
@section('heading', 'Top Advertisements')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-top-advertisement-update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h5>Top Ad Section</h5>
                        <div class="form-group mb-3">
                            <label>Advertising Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$top_advertisement_data->top_ad) }}"
                                style="width: 100%" alt="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Update Photo</label>
                            <div>
                                <input type="file" name="top_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="top_ad_url" 
                            value="{{ $top_advertisement_data->top_ad_url }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="top_ad_status" class="form-control" id="">
                                <option value="Show" @if($top_advertisement_data->top_ad_status == 'Show')
                                    selected @endif>Show</option>
                                <option value="Hide" @if($top_advertisement_data->top_ad_status == 'Hide')
                                    selected @endif>Hide</option>
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