@extends('admin.layouts.app')

@section('title', 'Admin - News Dashboard')
@section('heading', 'Dashboard')

@section('main_content')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Sub Categories</h4>
                </div>
                <div class="card-body">
                    @php
                        $total_sub_category = count(\App\Models\SubCategory::get());
                    @endphp
                    {{ $total_sub_category }}
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
                    <h4>Total News</h4>
                </div>
                <div class="card-body">
                    @php
                        $total_news = count(\App\Models\Post::get());
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
                    <h4>Total Visitors</h4>
                </div>
                <div class="card-body">
                    @php
                        $posts = \App\Models\Post::get();
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