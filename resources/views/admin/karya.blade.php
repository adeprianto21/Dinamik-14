@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Karya | Admin | Dinamik')

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
        <span class=" dashboard-section-header bold">Status Submit Karya</span>

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">Web Dev</span>
        </div>
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Kompetisi</th>
                        <th>Upload Karya 1</th>
                        <th>Upload Karya 2</th>
                    </tr>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 4)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.karya.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a></td>
                        <td>{{$team->competition['singkatan']}}</td>
                        <td class="{{$team->creation['link_1'] ? 'text-success' : 'text-danger'}}">
                            {{$team->creation['link_1'] ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->creation['link_2'] ? 'text-success' : 'text-danger'}}">
                            {{$team->creation['link_2'] ? 'Sudah Upload' : 'Belum Upload'}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
                    @endforeach
                </table>
            </div>
        </div>

        <hr class="dashboard-divider my-4">

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">Animation</span>
        </div>
        <div class="dashboard-overflow">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Kompetisi</th>
                        <th>Upload Karya 1</th>
                        <th>Upload Karya 2</th>
                    </tr>
                    @php
                    $i=1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 5)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.karya.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a></td>
                        <td>{{$team->competition['singkatan']}}</td>
                        <td class="{{$team->creation['link_1'] ? 'text-success' : 'text-danger'}}">
                            {{$team->creation['link_1'] ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->creation['link_2'] ? 'text-success' : 'text-danger'}}">
                            {{$team->creation['link_2'] ? 'Sudah Upload' : 'Belum Upload'}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
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
