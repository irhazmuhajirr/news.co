@extends('admin.layouts.app')

@section('title', 'Admin - Siderbar Advertisements')
@section('heading', 'Sidebar Advertisements')

@section('button')
<a href="{{ route('admin-sidebar-advertisement-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create Ads</a>
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
                                <th>SL</th>
                                <th>Advertising Photo</th>
                                <th>URL</th>
                                <th>Location</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($sidebar_advertisement_data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'.$data->sidebar_ad) }}" style="width:100px" alt="">
                                </td>
                                <td>{{ $data->sidebar_ad_url }}</td>
                                <td>{{ $data->sidebar_ad_location }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-sidebar-advertisement-edit', $data->id) }}" 
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-sidebar-advertisement-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data?')">
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