<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">
    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @include('author.layouts.styles')
    @include('author.layouts.scripts')
    
    <style>
        .navbar-bg {
            /* background: #7F7FD5;
            background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); */
            background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); }
        body { font-size: 13px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; }
        body.sidebar-mini .main-sidebar .sidebar-menu > li.active > a { box-shadow: 0 4px 8px #a3daf3; background-color: #71AFCC; }
        .card { box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03); border-radius: 8px; }
        .section .section-header { border-radius: 8px; }
        .dataTables_wrapper { font-size: 12.5px !important; } 
        .main-sidebar .sidebar-menu li ul.dropdown-menu li a:hover { color:#71AFCC; }
        .main-sidebar .sidebar-menu li ul.dropdown-menu li a { font-size: 12.5px; }
        .main-sidebar .sidebar-menu li.active a, .main-sidebar .sidebar-menu li ul.dropdown-menu li.active > a { font-weight: 600; color:#71AFCC; }
        .section .section-header .btn { font-size: 12px !important; }
        .btn { font-size: 12px; border-radius: 7px; }
        .section .section-header h1 { font-size: 21.5px; }
        .card.card-statistic-1 .card-header h4 { font-size: 14.5px; }
        .card.card-statistic-1 .card-body { font-size: 18px; }
        .form-group .control-label, .form-group > label { font-size: 13px; }
        .input-group-text, select.form-control:not([size]):not([multiple]), .form-control:not(.form-control-sm):not(.form-control-lg) { font-size: 12px; }
        .form-control-sm { border-radius: 5px; }
        .input-group-text, select.form-control:not([size]):not([multiple]), .form-control:not(.form-control-sm):not(.form-control-lg) {
            padding-top: 8px; padding-right: 21px; padding-bottom: 8px; padding-left: 10px; }
        .btn-primary, .btn-primary.disabled { background-color: #7F7FD5; border-color: #7F7FD5; }
        .section .section-header .btn:hover, .section-body button[type="submit"]:hover, 
        .btn-primary:active, .btn-primary:hover, .btn-primary.disabled:active, .btn-primary.disabled:hover { background: #86A8E7 !important; }
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link { background-color: #7F7FD5; }
        /* .btn-warning, .btn-warning.disabled {
            box-shadow: 0 2px 4px #d7d7d737;
            background-color: #ffa426;
            border-color: #ffa426;
            color: #fff; 
        } */
        .btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active, .btn-outline-primary.disabled:hover, .btn-outline-primary.disabled:focus, .btn-outline-primary.disabled:active {
            background-color: #7F7FD5 !important;
        }
    </style>

</head>

<body>
<div id="app">
    <div class="main-wrapper">
        
        @include('author.layouts.nav')
        @include('author.layouts.sidebar')        

        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    <div class="ml-auto">
                        {{-- <a href="" class="btn btn-primary"><i class="fas fa-plus"></i> Button</a> --}}
                        @yield('button')
                    </div>
                </div>

                @yield('main_content')

            </section>
        </div>

    </div>
</div>

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'bottomRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'bottomRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

    @include('author.layouts.scripts-custom')

</body>
</html>