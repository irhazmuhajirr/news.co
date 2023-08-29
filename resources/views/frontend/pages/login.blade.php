@extends('frontend.layouts.app')
@section('title', 'News.com - Login')
@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $data->login_title }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $data->login_title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <form action="{{ route('login-submit') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">{{ PAGE_EMAIL_ADDRESS }}</label>
                            <input type="text" class="form-control" name="email" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">{{ PASSWORD }}</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">{{ SIGN_IN }}</button>
                            <a href="{{ route('forget-password') }}">{{ FORGET_PASSWORD }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection