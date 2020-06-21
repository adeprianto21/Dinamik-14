@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Seminar Nasional | Admin | Dinamik')

@section('content')

@include('templates.dashboard-admin-header')

<main class="dashboard">

    @if(session()->has('status'))
    <div class="alert alert-success">
        {{ session()->get('status') }}
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
    @endif

    <section class="dashboard-section">
        <span class="header-competition text-center">{{$participant->nama}}</span>
        <span class="header-competition-subtitle text-center">{{$participant->no_telp}}</span>
        <span class="header-competition-subtitle text-center">({{$participant->email}})</span>
        <span class="header-competition-subtitle text-center">{{$participant->instansi}}</span>
    </section>

    <section class="dashboard-section">
        <span class="dashboard-section-header">Konfirmasi Pembayaran</span>
        <div class="row">
            <div class="col-md">
                <div class="seminar-register-container mx-auto text-center">
                    <span class="place-text-bold">Mohon periksa apakah ada transaksi yang masuk atas nama peserta
                        diatas.</span>
                    <a href="{{route('admin.seminar.send', ['id' => $participant->id])}}"
                        class="guide-book-button mt-3">Kirim Ticket Seminar</a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection