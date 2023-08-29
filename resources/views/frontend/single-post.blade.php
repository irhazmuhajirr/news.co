@extends('frontend.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post_detail->post_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('news-sub-category', $post_detail->sub_category_id) }}">
                                {{ $post_detail->rSubCategory->sub_category_name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post_detail->post_title }}</li>
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
                <div class="featured-photo">
                    <img src="{{ asset('uploads/post-photos/'.$post_detail->post_photo) }}" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fas fa-user"></i></b>
                        <a href="">{{ $author_data->name }}</a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-edit"></i></b>
                        <a href="{{ route('news-sub-category', $post_detail->sub_category_id) }}">
                            {{ $post_detail->rSubCategory->sub_category_name }}
                        </a>
                    </div>
                    <div class="item">
                        <b><i class="fas fa-clock"></i></b>
                        @php
                            $ts = strtotime($post_detail->created_at); 
                            $created_at = date('d F, Y', $ts);    
                        @endphp
                        {{ $created_at }}
                    </div>
                    <div class="item">
                        <b><i class="fas fa-eye"></i></b>
                        {{ $post_detail->visitors }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post_detail->post_description !!}
                </div>
                <div class="tag-section">
                    <h2>Tags</h2>
                    <div class="tag-section-content">
                        @foreach ($tag_data as $data)
                            <a href="{{ route('tags', $data->tag_name) }}"><span class="badge bg-success">{{ $data->tag_name }}</span></a>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="share-content">
                    <h2>Share</h2>
                    <div class="addthis_inline_share_toolbox"></div>
                </div> --}}

                @if($post_detail->is_comment == 1)
                <div class="comment-fb">
                    <h2>{{ COMMENT }}</h2>
                    <div id="disqus_thread"></div>
                    <script>
                        (function() { // DON'T EDIT BELOW THIS LINE
                        var d = document, s = d.createElement('script');
                        s.src = '{{ $global_setting_data->disqus_code }}';
                        s.setAttribute('data-timestamp', +new Date());
                        (d.head || d.body).appendChild(s);
                        })();
                    </script>
                </div>
                @endif

                <div class="related-news">
                    <div class="related-news-heading">
                        <h2>{{ RELATED_NEWS }}</h2>
                    </div>
                    <div class="related-post-carousel owl-carousel owl-theme">
                        @foreach ($related_posts as $data)
                            @if($data->id == $post_detail->id)
                                @continue
                            @endif
                            <div class="item">
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
                        @endforeach
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