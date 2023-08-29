@extends('admin.layouts.app')

@section('title', 'Admin - All Authors')
@section('heading', 'List of Authors')

@section('button')
<a href="{{ route('admin-authors-dashboard') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
<a href="{{ route('admin-author-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
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
                                <th>Thumbnail</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($authors as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'.$data->photo) }}" alt="" style="width: 80px;">
                                </td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-author-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-author-delete', $data->id) }}"
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this author?')">
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
