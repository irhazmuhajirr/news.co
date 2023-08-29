@extends('admin.layouts.app')

@section('title', 'FAQs - Edit FAQs')
@section('heading', 'Edit FAQs')

@section('button')
<a href="{{ route('admin-faq') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-faq-update', $faq->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="faq_title" value="{{ $faq->faq_title }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="faq_detail" class="form-control snote" cols="30" rows="10">
                                {{ $faq->faq_detail }}
                            </textarea>
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