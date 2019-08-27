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
    <div class="form-header"></div>
    <form action="">
        <div class="form-group">
            <label class="form-label">
                <i class="far fa-user"></i>
                Username
            </label>
            <input type="text" class="form-input">
        </div>
        <div class="form-group">
            <label class="form-label">
                <i class="far fa-envelope"></i>
                E-mail
            </label>
            <input type="email" class="form-input">
        </div>
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-key"></i>
                Password
            </label>
            <input type="password" class="form-input">
            <div class="show-pass">
                <i class="far fa-eye"></i>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">
                <i class="fas fa-key"></i>
                Re-Password
            </label>
            <input type="password" class="form-input">
            <div class="show-pass">
                <i class="far fa-eye"></i>
            </div>
        </div>
        <button type="submit" class="button-form">daftar</button>
    </form>
</div>

@endsection