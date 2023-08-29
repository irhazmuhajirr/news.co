@extends('admin.layouts.app')

@section('title', 'Admin - Language Source')
@section('heading', 'Language Resource')

@section('button')
<a href="{{ route('admin-languages') }}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin-language-source-submit', $language->id) }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-bordered" id="">
                                <thead>
                                <tr>
                                    <th style="width: 4%;">No</th>
                                    <th style="width: 45%;">Key</th>
                                    <th>Value</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($json_data as $key=>$value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $key }}</td>
                                    <td>
                                        <input type="hidden" name="arr_key[]" class="form-control" value="{{ $key }}">
                                        <input type="text" name="arr_value[]" class="form-control" value="{{ $value }}">
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection