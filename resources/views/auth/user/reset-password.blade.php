@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Reset Password | Dinamik')

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
        <span>Reset</span>
        <span>Reset</span>
        <span>Reset</span>
        <span class="text-white">Reset</span>
    </div>
</div>

<div class="form-container">

    @error('email')
    @if ($message == 'This password reset token is invalid.')
    <div class="alert alert-danger mb-5">
        {{$message}}
    </div>
    @endif
    @enderror

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">

            <label class="form-label">
                <i class="far fa-envelope"></i>
                E-mail
            </label>

            <input type="email"
                class="form-input @error('email') @if ($message != 'This password reset token is invalid.') form-input-error @endif @enderror"
                name="email" value="{{old('email')}}" required>

            @error('email')
            @if ($message != 'This password reset token is invalid.')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @endif
            @enderror

        </div>

        @error('email')
        @if ($message != 'This password reset token is invalid.')
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

            <input type="password" class="form-input @error('password') form-input-error @enderror" name="password"
                required>

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

            <input type="password" class="form-input" name="password_confirmation" required>

            <div class="show-pass">
                <i class="far fa-eye-slash"></i>
            </div>
        </div>

        <button type="submit" class="button-form" style="margin-top: 40px; margin-left: auto">Reset Password</button>
    </form>
</div>

@endsection

@section('script')

<script src="{{url('resources/js/form.js')}}"></script>

@endsection