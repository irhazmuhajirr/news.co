@extends('admin.layouts.app')

@section('title', 'Subscribers - All Lists')
@section('heading', 'All Subscribers')

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
                                <th>Email</th>
                                <th>Status</th>
                                {{-- <th>Options</th> --}}
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subscribers as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->status }}</td>
                                {{-- <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-news-category-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-news-category-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this category?')">
                                        Delete
                                    </a>
                                </td> --}}
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