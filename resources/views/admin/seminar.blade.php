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
        <span class="dashboard-section-header">Daftar Peserta Seminar ({{$participants->count()}} orang)</span>

        @if ($participants->count() == 0)
        <div class="text-center">
            <span class="text-danger">No Participants</span>
        </div>
        @else
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>No. Telp</th>
                        <th>Instansi</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($participants as $participant)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a
                                href="{{route('admin.seminar.detail', ['id' => $participant->id])}}">{{$participant->nama}}</a>
                        </td>
                        <td>{{$participant->email}}</td>
                        <td>{{$participant->no_telp}}</td>
                        <td>{{$participant->instansi}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                </table>
            </div>
        </div>
        @endif
    </section>
</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection