@extends('frontend.layouts.app')
@section('title', 'Archives - {{ $created_date }}')
@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ ALL_POSTS_OF }} {{ $created_date }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item" style="color: rgb(112, 112, 112)">{{ ARCHIVES }}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ NEWS_IN }} {{ $created_date }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">      
                <div class="category-page">
                    <div class="row">
                        @if(count($archives))
                        @foreach ($archives as $data)
                        <div class="col-lg-6 col-md-12">
                            <div class="category-page-post-item">
                                <div class="photo">
                                    <img src="{{ asset('uploads/post-photos/'.$data->post_photo) }}" alt="">
                                </div>
                                <div class="category">
                                    <span class="badge bg-success">{{ $data->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h3><a href="{{ route('news-detail', $data->id) }}">{{ $data->post_title }}</a></h3>
                                <div class="date-user">
                                    <div class="user">
                                        @if($data->author_id == 0)
                                            @php
                                            $author_data = \App\Models\Admin::where('id', $data->admin_id)->first();
                                            @endphp
                                        @else
                                            @php
                                            $author_data = \App\Models\Author::where('id', $data->author_id)->first();
                                            @endphp
                                        @endif
                                        <a href="">{{ $author_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        @php
                                        $ts = strtotime($data->created_at); 
                                        $created_at = date('d F, Y', $ts);    
                                        @endphp
                                        <a href="">{{ $created_at }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        
                        @endif

                        <div class="col-md-12">
                            {{ $archives->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 sidebar-col">
                @include('frontend.layouts.sidebar')
            </div>

        </div>
    </div>
</div>
@endsection