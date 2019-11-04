@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Teams | Admin | Dinamik')

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
        <span class=" dashboard-section-header bold">Daftar Tim</span>
        <div class="dashboard-overflow">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Anggota</th>
                        <th>Kompetisi Yang Diikuti</th>
                    </tr>
                    @foreach ($teams as $team)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('admin.team.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a></td>
                        <td>{{$team->asal_sekolah}}</td>
                        <td>{{$team->jumlah_anggota}} Orang</td>
                        <td>{{$team->competition['singkatan']}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection