@extends('admin.layouts.app')

@section('title', 'Admin - Online Polls')
@section('heading', 'Online Polls')

@section('button')
<a href="{{ route('admin-online-poll-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Poll</a>
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
                                <th>Question</th>
                                <th>Yes Vote</th>
                                <th>No Vote</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($online_polls as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->question }}</td>
                                <td>{{ $data->yes_vote }}</td>
                                <td>{{ $data->no_vote }}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-online-poll-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-online-poll-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this question?')">
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