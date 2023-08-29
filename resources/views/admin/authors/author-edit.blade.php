@extends('admin.layouts.app')

@section('title', 'Admin - Edit Author')
@section('heading', 'Edit Author')

@section('button')
<a href="{{ route('admin-authors') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-author-update', $author->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$author->photo) }}" alt="" style="width: 200px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Update Photo</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Full Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $author->name }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body"><div class="form-group mb-3">
                            <label>Email *</label>
                            <input type="text" class="form-control" name="email" value="{{ $author->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group mb-3">
                            <label>Retype Password</label>
                            <input type="password" class="form-control" name="retype_password">
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