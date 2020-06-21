@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Dashboard | Dinamik')

@section('content')

@include('templates.dashboard-header')

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
        @if ($team->competition_id != 1 && $team->competition_id != 3)
        <div class="d-flex justify-content-center">
            <img class="dashboard-dinamik-logo" src="https://i.ibb.co/0Ymq7qy/layer3.png" alt="Logo Dinamik">
        </div>
        @if (strtotime(date('Y-m-d')) >= strtotime('2019-11-17') && strtotime(date('Y-m-d')) <=strtotime('2019-11-24'))
            <div class="countdown">
            <span class="text-countdown bold">Countdown Pengumuman Finalis</span>
            <ul>
                <li><span id="days"></span></li>
                <li>:</li>
                <li><span id="hours"></span></li>
                <li>:</li>
                <li><span id="minutes"></span></li>
                <li>:</li>
                <li><span id="seconds"></span></li>
            </ul>
            </div>
            @else
            @if ($team->lolos_final == 1)
            <div class="alert alert-success mt-5">
                <span>Selamat, tim anda lolos ke babak final !!</span>
            </div>
            @else
            <div class="alert alert-danger mt-5">
                <span>Maaf, tim anda belum lolos ke babak final</span>
            </div>
            @endif
            @endif
            @else
            <h1 class="text-center" style="font-family: 'Mont Bold'; letter-spacing: 3px;">SELAMAT DATANG</h1>
            <h3 class="text-center mt-3" style="font-family: 'Mont Semi Bold'; color: #555;">Di Dashboard Dinamik 14
            </h3>
            <div class="d-flex justify-content-center mt-3">
                <img src="https://i.ibb.co/0Ymq7qy/layer3.png" alt="" style="width: 200px;">
            </div>
            @endif
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>
<script src="{{url('resources/js/countdown.js')}}"></script>

@endsection