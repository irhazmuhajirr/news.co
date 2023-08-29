@extends('admin.layouts.app')

@section('title', 'Admin - Edit News Category')
@section('heading', 'Edit Category')

@section('button')
<a href="{{ route('admin-news-categories') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-news-category-update', $category->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Category Name *</label>
                            <input type="text" class="form-control" name="category_name" 
                            value="{{ $category->category_name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Show On Menu?</label>
                            <select name="show_on_menu" class="form-control" id="">
                                <option value="Show" @if($category->show_on_menu == 'Show')
                                    selected @endif>Show</option>
                                <option value="Hide" @if($category->show_on_menu == 'Hide')
                                    selected @endif>Hide</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Order *</label>
                            <input type="text" class="form-control" name="category_order"
                            value="{{ $category->category_order }}">
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