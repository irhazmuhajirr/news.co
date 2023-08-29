@extends('admin.layouts.app')

@section('title', 'Admin - Author Dashboard')
@section('heading', 'Author Settings')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <a href="{{ route('admin-authors') }}"><h4>List of Authors</h4></a>
                </div>
                <div class="card-body">
                    @php
                        $total_author = count(\App\Models\Author::get());
                    @endphp
                    {{ $total_author }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <a href="{{ route('admin-author-news') }}"><h4>Total News</h4></a>
                </div>
                <div class="card-body">
                    @php
                        $total_news = count(\App\Models\Post::where('admin_id', 0)->get());
                    @endphp
                    {{ $total_news }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Visitor</h4>
                </div>
                <div class="card-body">
                    @php
                        $posts = \App\Models\Post::where('admin_id', 0)->get();
                        $total_visitors = 0;
                        foreach ($posts as $data) {
                            $total_visitors += $data->visitors;
                        }
                    @endphp
                    {{ $total_visitors }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection