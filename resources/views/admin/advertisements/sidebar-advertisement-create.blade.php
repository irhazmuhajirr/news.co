@extends('admin.layouts.app')

@section('title', 'Sidebar Advertisement - Add')
@section('heading', 'Add Sidebar Advertisement')

@section('button')
<a href="{{ route('admin-sidebar-advertisements') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-sidebar-advertisement-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Select Photo</label>
                            <div>
                                <input type="file" name="sidebar_ad">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>URL</label>
                            <input type="text" class="form-control" name="sidebar_ad_url">
                        </div>
                        <div class="form-group mb-3">
                            <label>Sidebar Location</label>
                            <select name="sidebar_ad_location" class="form-control" id="">
                                <option value="Top">Top</option>
                                <option value="Bottom">Bottom</option>
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