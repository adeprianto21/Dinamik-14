@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Seminar Registration | Dinamik')

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
        <span>Sem Nas</span>
        <span>Sem Nas</span>
        <span>Sem Nas</span>
        <span class="text-white">Sem Nas</span>
    </div>
</div>

<div class="form-container">

    <form method="POST" action="{{route('seminar.insert.peserta')}}">

        @csrf

        <div class="form-group">

            <label class="form-label">
                <i class="far fa-user"></i>
                Nama Lengkap
            </label>

            <input type="text" class="form-input @error('nama') form-input-error @enderror" name="nama"
                value="{{old('nama')}}" required>

            @error('nama')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @enderror

        </div>

        @error('nama')
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
                value="{{old('email')}}" required>

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
                <i class="fas fa-phone-alt"></i>
                Phone Number
            </label>

            <input type="number" class="form-input @error('phone') form-input-error @enderror" name="phone"
                value="{{old('phone')}}" required>

            @error('phone')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @enderror

        </div>

        @error('phone')
        <div class="form-message-error">
            {{$message}}
        </div>
        @enderror

        <div class="form-group">

            <label class="form-label">
                <i class="fas fa-briefcase"></i>
                Instansi
            </label>

            <input type="text" class="form-input @error('instansi') form-input-error @enderror" name="instansi"
                value="{{old('instansi')}}" required>

            @error('instansi')
            <div class="form-icon-error">
                <i class="far fa-times-circle"></i>
            </div>
            @enderror

        </div>

        @error('instansi')
        <div class="form-message-error">
            {{$message}}
        </div>
        @enderror

        <button type="submit" class="button-form" style="margin-top: 40px; margin-left: auto">Register</button>
    </form>
</div>

@endsection

@section('script')

<script src="{{url('resources/js/form.js')}}"></script>

@endsection