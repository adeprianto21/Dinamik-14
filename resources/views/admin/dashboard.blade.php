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

<div
    style="display: flex; justify-content: center; align-items: center; width: 100%; height: 100vh; position: absolute; top: 0;">
    <h1 style="color: white;">You're logged in as Admin!</h1>
</div>

@endsection