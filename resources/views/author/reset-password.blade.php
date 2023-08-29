@extends('frontend.layouts.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>New Password</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ HOME }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New password</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <form action="{{ route('reset-password-submit') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Retype Password</label>
                            <input type="password" class="form-control @error('retype_password') is-invalid @enderror" name="retype_password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection