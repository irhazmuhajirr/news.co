@extends('admin.layouts.app')

@section('title', 'Admin - Create Author')
@section('heading', 'Add Author')

@section('button')
<a href="{{ route('admin-authors') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-author-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Photo</label>
                            <div><input type="file" name="photo"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Full Name *</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email *</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group mb-3">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password">
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