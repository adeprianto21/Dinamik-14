@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Registration | Dinamik')

@section('content')

@include('templates/header')

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
        <span>Register</span>
        <span>Register</span>
        <span>Register</span>
        <span class="text-white">Register</span>
    </div>
</div>

<div class="form-container">

    <form method="POST" action="{{route('register')}}">

        @csrf

        <div class="form-group">

            <label class="form-label">
                <i class="far fa-user"></i>
                Username
            </label>

            <input type="text" class="form-input @error('username') form-input-error @enderror" name="username"
                value="{{old('username')}}">

            @error('username')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @enderror

        </div>

        @error('username')
        <div class="form-message-error">
            {{$message}}
        </div>
        @enderror

        <div class="form-group">

            <label class="form-label">
                <i class="far fa-envelope"></i>
                E-mail
            </label>

            <input type="email" class="form-input @error('email') form-input-error @enderror" name="email"
                value="{{old('email')}}">

            @error('email')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @enderror

        </div>

        @error('email')
        <div class="form-message-error">
            {{$message}}
        </div>
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

        <div class="form-group">

            <label class="form-label">
                <i class="fas fa-key"></i>
                Re-Password
            </label>

            <input type="password" class="form-input" name="password_confirmation">

            <div class="show-pass">
                <i class="far fa-eye-slash"></i>
            </div>
        </div>

        <button type="submit" class="button-form" style="margin-top: 40px; margin-left: auto">Register</button>
    </form>

    <div class="link">
        <span class="link-span">Already have an account? <a href="{{route('register')}}" class="link-href">Login
                Here</a></span>
    </div>
</div>

@endsection

@section('script')

<script src="{{url('resources/js/form.js')}}"></script>

@endsection