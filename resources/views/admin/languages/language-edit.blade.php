@extends('admin.layouts.app')

@section('title', 'Admin - Edit Language')
@section('heading', 'Edit Language')

@section('button')
<a href="{{ route('admin-languages') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-language-update', $language->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Language</label>
                            <input type="text" class="form-control" name="name" value="{{ $language->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Name</label>
                            <input type="text" class="form-control" name="short_name" value="{{ $language->short_name }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Default? *</label>
                            <select name="is_default" class="form-control" id="">
                                <option value="Yes" @if($language->is_default == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if($language->is_default == 'No') selected @endif>No</option>
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