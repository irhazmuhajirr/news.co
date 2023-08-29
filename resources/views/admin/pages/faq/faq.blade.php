@extends('admin.layouts.app')

@section('title', 'FAQs - All Questions')
@section('heading', 'FAQs Lists')

@section('button')
<a href="{{ route('admin-page-faq') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
<a href="{{ route('admin-faq-create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
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
                                <th>Description</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($faq_data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->faq_title }}</td>
                                <td class="post-short-text">{!! $data->faq_detail !!}</td>
                                <td class="pt_10 pb_10">
                                    <a href="{{ route('admin-faq-edit', $data->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="{{ route('admin-faq-delete', $data->id) }}" 
                                        class="btn btn-danger" onclick="return confirm('Are you sure want to delete this FAQs?')">
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