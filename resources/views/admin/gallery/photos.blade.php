@extends('admin.layouts.app')

@section('title', 'Gallery - Photos')
@section('heading', 'Photos')

@section('button')
<a href="{{ route('admin-photo-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Photo</a>
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
                                <th>Photo</th>
                                <th>Caption</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($photos as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/gallery/'.$data->photo) }}" alt="" style="width:100px;">
                                </td>
                                <td>{{ $data->caption }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-photo-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-photo-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this category?')">
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