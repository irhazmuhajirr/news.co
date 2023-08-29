@extends('admin.layouts.app')

@section('title', 'Admin - All Languages')
@section('heading', 'Language Settings')

@section('button')
<a href="{{ route('admin-language-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
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
                                <th>Language</th>
                                <th>Short Name</th>
                                <th>Is Default</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($languages as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->short_name }}</td>
                                <td>{{ $data->is_default }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-language-source', $data->id) }}" class="btn btn-outline-primary">Source</a>
                                    <a href="{{ route('admin-language-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    @if($loop->iteration != 1)  
                                    <a href="{{ route('admin-language-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this language?')">
                                        Delete
                                    </a>
                                    @endif
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