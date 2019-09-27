@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Login | Dinamik')

@section('content')

@include('templates.header')

<div class="bg-form-page">
    <div class="parallax-go-up">
        <div class="bg-dinamik">
        </div>
        <div class="bg-dinamik">
        </div>
    </div>

    <div class="layer">
        <img class="gradient" src="{{url('resources/img/Parallax/layer1.png')}}" alt="">
    </div>
    <div class="layer">
        <img class="gradient" src="{{url('resources/img/Parallax/layer5.png')}}" alt="">
    </div>
</div>

<div class="header-section">
    <div class="header-stroke regular-italic">
        <span>Login</span>
        <span>Login</span>
        <span>Login</span>
        <span class="text-white">Login</span>
    </div>
</div>

<div class="form-container">

    <form method="POST" action="{{route('login')}}">

        @csrf

        @error('username')
        @if ($message != 'The username field is required.')
        <div class="alert alert-danger mb-5">
            {{$message}}
        </div>
        @endif
        @enderror

        <div class="form-group">

            <label class="form-label">
                <i class="far fa-user"></i>
                Username
            </label>

            <input type="text"
                class="form-input @error('username') @if ($message == 'The username field is required.') form-input-error @endif @enderror"
                name="username" value="{{old('username')}}">


            @error('username')
            @if ($message == 'The username field is required.')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @endif
            @enderror

        </div>

        @error('username')
        @if ($message == 'The username field is required.')
        <div class="form-message-error">
            {{$message}}
        </div>
        @endif
        @enderror

        <div class="form-group">

            <label class="form-label">
                <i class="fas fa-key"></i>
                Password
            </label>

            <input type="password" class="form-input @error('password') form-input-error @enderror" name="password">

            <div class="show-pass">
                <i class="far fa-eye-slash"></i>
            </div>

            @error('password')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @enderror

        </div>

        @error('password')
        <div class="form-message-error">
            {{$message}}
        </div>
        @enderror

        <div class="remember-login-section">
            <div class="remember">
                <div class="check-column" id="check-column">
                    <div class="check-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <span class="remember-text">Remeber me ?</span>
                </div>
                <input type="hidden" name="remember" id="remember-me" value="false">
            </div>
            <div class="login">
                <button type="submit" class="button-form">Login</button>
            </div>
        </div>

    </form>

    <div class="link">
        <span class="link-span">Don't have any account yet? <a href="{{route('register')}}" class="link-href">Register
                Here</a></span>
        <span class="link-span">Forgot your password? <a href="{{route('password.request')}}" class="link-href">Click
                Here</a></span>
    </div>
</div>

@endsection

@section('script')

<script src="{{url('resources/js/form.js')}}"></script>

@endsection