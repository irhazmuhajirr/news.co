@extends('author.layouts.app')

@section('title', 'Author - News Dashboard')
@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-book-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>My Active News</h4>
                </div>
                <div class="card-body">
                    @php
                        $total_news = count(\App\Models\Post::where('author_id',Auth::guard('author')->user()->id)->get());
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
                    <h4>My News Visitors</h4>
                </div>
                <div class="card-body">
                    @php
                        $posts = \App\Models\Post::where('author_id',Auth::guard('author')->user()->id)->get();
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