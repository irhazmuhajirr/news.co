@extends('admin.layouts.app')

@section('title', 'Subscribers - Send Email')
@section('heading', 'Send Email to Subscribers')

@section('main_content')
<div class="section-body">
    <form action="{{ route('admin-subscribers-send-email-submit') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Subject *</label>
                            <input type="text" class="form-control" name="subject">
                        </div>
                        <div class="form-group mb-3">
                            <label>Message *</label>
                            <textarea class="form-control snote" name="message" cols="30" rows="20"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
</div>
@endsection