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
    <section class="dashboard-section">
        <h1 class="text-center" style="font-family: 'Mont Bold'; letter-spacing: 3px;">SELAMAT DATANG</h1>
        <h3 class="text-center mt-3" style="font-family: 'Mont Semi Bold'; color: #555;">Di Dashboard Dinamik 14</h3>
        <div class="d-flex justify-content-center mt-3">
            <img src="https://i.ibb.co/0Ymq7qy/layer3.png" alt="" style="width: 200px;">
        </div>
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection