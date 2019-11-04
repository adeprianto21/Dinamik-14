@extends('templates/main')

@section('judul', 'Login | Admin | Dinamik')

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
        <span>admin</span>
        <span>admin</span>
        <span>admin</span>
        <span class="text-white">admin</span>
    </div>
</div>

<div class="form-container">

    <form method="POST" action="{{route('admin.login')}}">

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

        <button type="submit" class="button-form admin-login-form">login</button>
    </form>
</div>

@endsection

@section('script')

<script src="{{url('resources/js/form.js')}}"></script>

@endsection