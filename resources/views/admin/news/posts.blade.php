@extends('admin.layouts.app')

@section('title', 'Admin - News Posts')
@section('heading', 'News Posts')

@section('button')
<a href="{{ route('admin-post-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Post</a>
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
                                <th>Title</th>
                                <th>Sub Category</th>
                                <th>Category</th>
                                <th>Visitors</th>
                                <th>Author</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->post_title }}</td>
                                <td>{{ $data->rSubCategory->sub_category_name }}</td>
                                <td>{{ $data->rSubCategory->rCategory->category_name }}</td>
                                <td>{{ $data->visitors }}</td>
                                <td>
                                    @if($data->author_id != 0 AND $data->admin_id == 0)
                                        {{-- {{ \App\Models\Author::where('id', $data->author_id)->first()->name }} --}}
                                        @php
                                        $author = \App\Models\Author::where('id', $data->author_id)->first();
                                        @endphp
                                        {{ $author->name }}
                                    @else
                                        {{ Auth::guard('admin')->user()->name }}
                                    @endif
                                </td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-post-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-post-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this post?')">
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