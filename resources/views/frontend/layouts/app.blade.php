@if(!session()->get('session_short_name'))
    @php
    $current_short_name = $global_default_lang->short_name;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif

{{-- @php
    $json_data = json_decode(file_get_contents(resource_path('lang/'.$current_short_name.'.json')));
    foreach($json_data as $key=>$value) {
        define($key, $value);
    }
@endphp --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
		<title>@yield('title')</title>

        <link rel="icon" type="image/png" href="{{ asset('uploads/'.$global_setting_data->favicon) }}">

        @include('frontend.layouts.styles')
        @include('frontend.layouts.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

        <!-- Google Analytics -->
        @if($global_setting_data->analytic_status == "Show")
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ $global_setting_data->analytic_id }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{{ $global_setting_data->analytic_id }}');
            </script>
        @endif

        <style>
            /* Home */
            body { font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                font-size: 13px; }
            .top { font-size: 11.5px; }
            .website-menu, .acme-news-ticker-label, .search-section button[type="submit"], .home-content .left .news-total-item .see-all a, .video-content,
            .nav-pills .nav-link.active, .nav-pills .show>.nav-link, .widget .poll button, .footer ul.social li a, .footer input[type="submit"], .scroll-top,
            .page-item.active .page-link, .related-news .owl-nav .owl-prev, .related-news .owl-nav .owl-next { 
                /* background: #c2b96b; */
                /* background: -webkit-linear-gradient(to right, #a9ea91, #86A8E7, #8f8fdc); */
                background: linear-gradient(to right, #{{ $global_setting_data->theme_color_1 }}, #{{ $global_setting_data->theme_color_2 }}); }
                /* background: #{{ $global_setting_data->theme_color_1 }}; } */
            .acme-news-ticker { border: 1px solid #{{ $global_setting_data->theme_color_2 }}; }
            .website-menu .bg-primary, .bg-website, .widget .news-item .right .category span, .widget .news-item .right .category span a, 
            .home-main .inner .text-inner .category span, .home-main .inner .text-inner .category span a, 
            .home-content .left .news-total-item .left-side .category span, .home-content .left .news-total-item .left-side .category span a,
            .home-content .left .news-total-item .right-side-item .right .category span, .home-content .left .news-total-item .right-side-item .right .category span a,
            .category-page-post-item .category span, .category-page-post-item .category span a, .related-news .item .category span, .related-news .item .category span a { 
                /* background: #c2b96b !important; */
                /* background: -webkit-linear-gradient(to right, #a9ea91, #86A8E7, #8f8fdc) !important; */
                background: linear-gradient(to right, #{{ $global_setting_data->theme_color_1 }}, #{{ $global_setting_data->theme_color_2 }}) !important; }
                /* background: #{{ $global_setting_data->theme_color_1 }} !important; } */
            /* a, a:hover { color: #7d9dd7; } */
            /* .home-main .inner .text-inner .category span, .home-main .inner .text-inner .category span a, 
            .home-content .left .news-total-item .left-side .category span, .home-content .left .news-total-item .left-side .category span a,
            .home-content .left .news-total-item .right-side-item .right .category span, .home-content .left .news-total-item .right-side-item .right .category span a { 
                background: #{{ $global_setting_data->theme_color_2 }} !important; } */
            /* .nav-pills .nav-link.active, .nav-pills .show>.nav-link { background-color: #{{ $global_setting_data->theme_color_1 }}; } */
            /* .nav-link { color: #{{ $global_setting_data->theme_color_1 }}; } */
            .nav-link:focus, .nav-link:hover { color: #{{ $global_setting_data->theme_color_2 }}; }
            /* .widget .news-item .right .category span, .widget .news-item .right .category span a {
                background: #{{ $global_setting_data->theme_color_2 }} !important; } */
            .form-check-input:checked { border-color: #E4E4E4; background: #{{ $global_setting_data->theme_color_1 }}; }
            /* .widget .poll button { background: #{{ $global_setting_data->theme_color_1 }}; } */
            /* .video-content { background: #{{ $global_setting_data->theme_color_1 }}; } */
            /* .footer ul.social li a { background: #{{ $global_setting_data->theme_color_1 }}; }
            .footer input[type="submit"] { background: #{{ $global_setting_data->theme_color_1 }}; }
            .scroll-top { background: #{{ $global_setting_data->theme_color_1 }}; } */
            .page-item.active .page-link {  border-color: #{{ $global_setting_data->theme_color_1 }}; }
            .page-link { color: #{{ $global_setting_data->theme_color_1 }}; }
            /* .category-page-post-item .category span, .category-page-post-item .category span a {
                background: #{{ $global_setting_data->theme_color_2 }} !important; } */
            /* .bg-website { background: #{{ $global_setting_data->theme_color_1 }} !important; } */
            /* .related-news .owl-nav .owl-prev, .related-news .owl-nav .owl-next { background: #{{ $global_setting_data->theme_color_1 }}; } */
            /* .related-news .item .category span, .related-news .item .category span a { 
                background: #{{ $global_setting_data->theme_color_2 }} !important; } */
            .video-carousel .owl-nav .owl-next, .video-carousel .owl-nav .owl-prev { background: #fff; }
            h1, h2, h3, h4, h5, h6 { font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }
            .home-content .left .news-total-item .left-side h3 a:hover, .home-content .left .news-total-item .left-side .date-user .user a:hover, 
            .home-content .left .news-total-item .left-side .date-user .date a:hover, .home-content .left .news-total-item .right-side-item .right h2 a:hover, a, a:hover,
            .home-content .left .news-total-item .right-side-item .right .date-user .user a:hover, .home-content .left .news-total-item .right-side-item .right .date-user .date a:hover,
            .nav-link, .widget .news-item .right h2 a:hover, .widget .news-item .right .date-user .user a:hover, .widget .news-item .right .date-user .date a:hover,
            .related-news .item h3 a:hover, .related-news .item .date-user .user a:hover, .related-news .item .date-user .date a:hover, .category-page-post-item h3 a:hover,
            .category-page-post-item .date-user .user a:hover, .category-page-post-item .date-user .date a:hover, .page-link:hover { 
                color: #{{ $global_setting_data->theme_color_1 }}; }
            .form-control:focus, .form-select:focus { border-color: #{{ $global_setting_data->theme_color_1 }}; box-shadow: 0 0 0 0.25rem rgba(201, 201, 201, 0.253); }
            .page-link:focus, .btn-check:active, .btn-primary:focus, .btn-check:checked, .btn-primary:focus, .btn-primary.active:focus, .btn-primary:active:focus, .show>.btn-primary.dropdown-toggle:focus { 
                box-shadow: 0 0 0 0.25rem rgba(201, 201, 201, 0.253); }
            .dropdown-item.active, .dropdown-item:active { background-color: #{{ $global_setting_data->theme_color_1 }}; }
        </style>

    </head>
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li class="today-text">{{ TODAY }}: <?php echo date("F d, Y")?></li>
                            <li class="email-text">info@newsmail.com</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="right">
                            @if($global_pages->faq_status == "Show")
                            <li class="menu"><a href="{{ route('page-faq') }}">{{ FAQ }}</a></li>
                            @endif

                            <li class="menu"><a href="{{ route('page-faq') }}">{{ BLOG }}</a></li>

                            @if($global_pages->about_status == "Show")
                            <li class="menu"><a href="{{ route('page-about') }}">{{ ABOUT_US }}</a></li>
                            @endif
                            
                            @if($global_pages->contact_status == "Show")
                            <li class="menu"><a href="{{ route('page-contact') }}">{{ CONTACT }}</a></li>
                            @endif

                            @if($global_pages->login_status == "Show")
                            <li class="menu"><a href="{{ route('page-login') }}">{{ SIGN_IN }}</a></li>
                            @endif

                            <li>
                                <div class="language-switch">
                                    <form action="{{ route('switch-lang') }}" method="post">
                                        @csrf
                                        <select name="short_name" onchange="this.form.submit()">
                                            @foreach($global_languages as $data)
                                                <option value="{{ $data->short_name }}" @if($data->short_name == $current_short_name) 
                                                    selected @endif >{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="heading-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('uploads/'.$global_setting_data->logo) }}" alt="">
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-md-8">                        
                        <div class="ad-section-1">
                            <a href=""><img src="uploads/new-top-ad-name.png" alt="" /></a>
                        </div>
                    </div> --}}
                    <div class="col-md-8">                        
                        <div class="ad-section-1">
                            @if($global_top_ad_data->top_ad_status == 'Show')
                                @if($global_top_ad_data->top_ad_url !== null)
                                <a href="https://www.{{ $global_top_ad_data->top_ad_url }}">
                                    <img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" alt="">
                                </a>
                                @else
                                <img src="{{ asset('uploads/'.$global_top_ad_data->top_ad) }}" alt="">
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('frontend.layouts.nav')

        @yield('main_content')

        @include('frontend.layouts.footer')

        <script>
            (function($){
                $(".form_subscribe_ajax").on('submit', function(e){
                    e.preventDefault();
                    $('#loader').show();
                    var form = this;
                    $.ajax({
                        url:$(form).attr('action'),
                        method:$(form).attr('method'),
                        data:new FormData(form),
                        processData:false,
                        dataType:'json',
                        contentType:false,
                        beforeSend:function(){
                            $(form).find('span.error-text').text('');
                        },
                        success:function(data)
                        {
                            $('#loader').hide();
                            if(data.code == 0)
                            {
                                $.each(data.error_message, function(prefix, val) {
                                    $(form).find('span.'+prefix+'_error').text(val[0]);
                                });
                            }
                            else if (data.code == 1)
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                            else
                            {
                                $(form)[0].reset();
                                iziToast.success({
                                    title: '',
                                    position: 'topRight',
                                    message: data.success_message,
                                });
                            }
                        }
                    });
                });
            })(jQuery);
        </script>
        <div id="loader"></div>
        
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <script>
                    iziToast.error({
                        title: '',
                        position: 'topRight',
                        message: '{{ $error }}',
                    });
                </script>
            @endforeach
        @endif

        @if(session()->get('error'))
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('error') }}',
                });
            </script>
        @endif
        
        @if(session()->get('success'))
            <script>
                iziToast.success({
                    title: '',
                    position: 'topRight',
                    message: '{{ session()->get('success') }}',
                });
            </script>
        @endif

        <div class="copyright">
            {{ COPYRIGHT }}
        </div>
     
        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>
		
        @include('frontend.layouts.scripts-custom')
		
   </body>
</html>