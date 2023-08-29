@extends('admin.layouts.app')

@section('title', 'Online Polls - Add')
@section('heading', 'Add Online Poll')

@section('button')
<a href="{{ route('admin-online-polls') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-online-poll-store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Question?</label>
                            <textarea name="question" class="form-control" style="height: 125px;" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>
@endsection