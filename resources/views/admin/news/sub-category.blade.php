@extends('admin.layouts.app')

@section('title', 'Admin - Sub Categories')
@section('heading', 'Sub Categories')

@section('button')
<a href="{{ route('admin-sub-category-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Sub Category</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Sub Category</th>
                                <th>Category Name</th>
                                <th>Show On Menu?</th>
                                <th>Show On Home?</th>
                                <th>Order</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sub_categories as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->sub_category_name }}</td>
                                <td>
                                    {{ $data->rCategory->category_name }}
                                </td>
                                <td>{{ $data->show_on_menu }}</td>
                                <td>{{ $data->show_on_home }}</td>
                                <td>{{ $data->sub_category_order }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-sub-category-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-sub-category-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this sub category?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection