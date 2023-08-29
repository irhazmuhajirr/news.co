@extends('admin.layouts.app')

@section('title', 'Pages - Contact')
@section('heading', 'Contact Settings')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-page-contact-update') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="contact_title" 
                            value="{{ $page_data->contact_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="contact_detail" class="form-control snote" cols="30" rows="10">
                                {{ $page_data->contact_detail }}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Map (iFrame Code)</label>
                            <textarea name="contact_maps" class="form-control" cols="" rows="10" style="height: 120px">
                                {{ $page_data->contact_maps }}
                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="contact_status" class="form-control" id="">
                                <option value="Show" @if($page_data->contact_status == 'Show') selected @endif>Show</option>
                                <option value="Hide" @if($page_data->contact_status == 'Hide') selected @endif>Hide</option>
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
