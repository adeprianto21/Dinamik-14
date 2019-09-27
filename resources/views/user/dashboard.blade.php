@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Dashboard | Dinamik')

@section('content')

@include('templates.dashboard-header')

<main>
    <section class="dashboard">
        Dashboard
    </section>
</main>

@endsection