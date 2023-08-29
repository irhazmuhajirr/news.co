@extends('frontend.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ RESET_PASSWORD }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ RESET_PASSWORD }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <form action="{{ route('forget-password-submit') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">{{ PAGE_EMAIL_ADDRESS }}</label>
                            <input type="text" class="form-control" @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" autofocus>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">{{ SEND_RESET_LINK }}</button>
                            <a href="{{ route('page-login') }}">{{ BACK }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection
