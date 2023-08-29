@extends('admin.layouts.app')

@section('title', 'Pages - Privacy Policy')
@section('heading', 'Privacy Settings')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-page-privacy-update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="privacy_title" 
                            value="{{ $page_data->privacy_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="privacy_detail" class="form-control snote" cols="30" rows="10">
                                {{ $page_data->privacy_detail }}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="privacy_status" class="form-control" id="">
                                <option value="Show" @if($page_data->privacy_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($page_data->privacy_status == 'Hide') selected @endif>Hide</option>
                            </select>
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

