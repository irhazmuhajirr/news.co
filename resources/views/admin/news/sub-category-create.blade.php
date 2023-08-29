@extends('admin.layouts.app')

@section('title', 'Admin - Add Sub Category')
@section('heading', 'Add Sub Category')

@section('button')
<a href="{{ route('admin-sub-categories') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-sub-category-store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Sub Category Name *</label>
                            <input type="text" class="form-control" name="sub_category_name">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $data)
                                <option value="{{ $data->id }}">
                                    {{ $data->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Show On Menu?</label>
                            <select name="show_on_menu" class="form-control" id="">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Show On Home?</label>
                            <select name="show_on_home" class="form-control" id="">
                                <option value="Show">Show</option>
                                <option value="Hide">Hide</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label> Sub Category Order *</label>
                            <input type="text" class="form-control" name="sub_category_order">
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