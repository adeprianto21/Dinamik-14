@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Reset Password | Dinamik')

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
        <span>Reset</span>
        <span>Reset</span>
        <span>Reset</span>
        <span class="text-white">Reset</span>
    </div>
</div>

<div class="form-container">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{route('password.email')}}">

        @csrf

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

        <button type="submit" class="button-form" style="margin-top: 40px; margin-left: auto">Send Link</button>
    </form>
</div>

@endsection

@section('script')

<script src="{{url('resources/js/form.js')}}"></script>

@endsection