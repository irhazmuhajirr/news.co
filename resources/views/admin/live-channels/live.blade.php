@extends('admin.layouts.app')

@section('title', 'Admin - Live Channels')
@section('heading', 'Live Channels')

@section('button')
<a href="{{ route('admin-live-channel-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Live</a>
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
                                <th>Video</th>
                                <th>Heading</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($live_channels as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <iframe style="width: 230px" width="560" height="100" src="https://www.youtube.com/embed/{{ $data->video_id }}" 
                                                title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                                                encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                            </iframe>
                                        </td>
                                        <td>{{ $data->heading }}</td>
                                        <td class="pt_10 pb_10">
                                            <a href="{{ route('admin-live-channel-edit', $data->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('admin-live-channel-delete', $data->id) }}" 
                                                class="btn btn-danger" onclick="return confirm('Are you sure want to delete this live channel?')">
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