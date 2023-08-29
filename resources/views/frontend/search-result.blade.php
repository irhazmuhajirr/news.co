@extends('frontend.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Search result of </h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Result of</li>
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
                        @if(count($posts))
                            @foreach ($posts as $item)
                            <div class="col-lg-6 col-md-12">
                                <div class="category-page-post-item">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/post-photos/'.$item->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                        <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                    </div>
                                    <h3><a href="{{ route('news-detail', $item->id) }}">{{ $item->post_title }}</a></h3>
                                    <div class="date-user">
                                        <div class="user">
                                            @if($item->author_id == 0)
                                                @php
                                                $author_data = \App\Models\Admin::where('id', $item->admin_id)->first();
                                                @endphp
                                            @else
                                                @php
                                                $author_data = \App\Models\Author::where('id', $item->author_id)->first();
                                                @endphp
                                            @endif
                                            <a href="">{{ $author_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            @php
                                            $ts = strtotime($item->created_at); 
                                            $created_at = date('d F, Y', $ts);    
                                            @endphp
                                            <a href="">{{ $created_at }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <span class="text-danger">No news is found!</span>
                        @endif

                        <div class="col-md-12">
                            {{ $posts->links() }}
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