@extends('admin.layouts.app')

@section('title', 'FAQs - Create FAQs')
@section('heading', 'Add FAQs')

@section('button')
<a href="{{ route('admin-faq') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-faq-store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="faq_title">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="faq_detail" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection