@extends('admin.layouts.app')

@section('title', 'Admin - Social Media Settings')
@section('heading', 'Social Media')

@section('button')
<a href="{{ route('admin-social-media-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
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
                                <th>Preview</th>
                                <th>Icon (code)</th>
                                <th>URL</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($socials as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <i class="{{ $data->icon }}" style="font-size: 20px;"></i>
                                </td>
                                <td>{{ $data->icon }}</td>
                                <td>{{ $data->url }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-social-media-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-social-media-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this social media?')">
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