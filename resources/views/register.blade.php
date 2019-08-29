@extends('templates/main')

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

    <div class="layer" data-speed="0">
        <img class="gradient" src="resources/img/Parallax/layer1.png" alt="">
    </div>
    <div class="layer" data-speed="0">
        <img class="gradient" src="resources/img/Parallax/layer5.png" alt="">
    </div>
</div>

<div class="header-section">
    <div class="header-stroke regular-italic">
        <span>daftar</span>
        <span>daftar</span>
        <span>daftar</span>
        <span class="text-white">daftar</span>
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
                <i class="far fa-eye"></i>
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
                <i class="far fa-eye"></i>
            </div>
        </div>
        <button type="submit" class="button-form">daftar</button>
    </form>
</div>

@endsection

@section('script')

<script src="resources/js/form.js"></script>

@endsection