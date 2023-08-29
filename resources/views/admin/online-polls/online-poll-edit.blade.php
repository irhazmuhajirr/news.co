@extends('admin.layouts.app')

@section('title', 'Online Polls - Edit')
@section('heading', 'Edit Online Poll')

@section('button')
<a href="{{ route('admin-online-polls') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-online-poll-update', $online_poll->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Question?</label>
                            <input type="text" class="form-control" name="question" value="{{ $online_poll->question }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>
@endsection