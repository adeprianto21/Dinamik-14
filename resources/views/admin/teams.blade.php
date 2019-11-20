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
        <span class="dashboard-section-header">Daftar Tim</span>

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">PCA</span>
        </div>
        @if ($teams->where('competition_id', 1)->count() == 0)
        <div class="text-center">
            <span class="text-danger">No Teams</span>
        </div>
        @else
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Anggota</th>
                        <th>Kompetisi Yang Diikuti</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 1)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.team.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td>{{$team->asal_sekolah}}</td>
                        <td>{{$team->jumlah_anggota}} Orang</td>
                        <td>{{$team->competition['singkatan']}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        <hr class="dashboard-divider my-4">

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">NetComp</span>
        </div>
        @if ($teams->where('competition_id', 2)->count() == 0)
        <div class="text-center">
            <span class="text-danger">No Teams</span>
        </div>
        @else
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Anggota</th>
                        <th>Kompetisi Yang Diikuti</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 2)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.team.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td>{{$team->asal_sekolah}}</td>
                        <td>{{$team->jumlah_anggota}} Orang</td>
                        <td>{{$team->competition['singkatan']}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        <hr class="dashboard-divider my-4">

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">CSPC</span>
        </div>
        @if ($teams->where('competition_id', 3)->count() == 0)
        <div class="text-center">
            <span class="text-danger">No Teams</span>
        </div>
        @else
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Anggota</th>
                        <th>Kompetisi Yang Diikuti</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 3)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.team.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td>{{$team->asal_sekolah}}</td>
                        <td>{{$team->jumlah_anggota}} Orang</td>
                        <td>{{$team->competition['singkatan']}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        <hr class="dashboard-divider my-4">

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">Web Dev</span>
        </div>
        @if ($teams->where('competition_id', 4)->count() == 0)
        <div class="text-center">
            <span class="text-danger">No Teams</span>
        </div>
        @else
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Anggota</th>
                        <th>Kompetisi Yang Diikuti</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 4)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.team.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td>{{$team->asal_sekolah}}</td>
                        <td>{{$team->jumlah_anggota}} Orang</td>
                        <td>{{$team->competition['singkatan']}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        @endif

        <hr class="dashboard-divider my-4">

        <div class="text-center">
            <span class="dashboard-section-subtitle bold-italic">Animation</span>
        </div>
        @if ($teams->where('competition_id', 5)->count() == 0)
        <div class="text-center">
            <span class="text-danger">No Teams</span>
        </div>
        @else
        <div class="dashboard-overflow mb-5">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Asal Sekolah</th>
                        <th>Jumlah Anggota</th>
                        <th>Kompetisi Yang Diikuti</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 5)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.team.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td>{{$team->asal_sekolah}}</td>
                        <td>{{$team->jumlah_anggota}} Orang</td>
                        <td>{{$team->competition['singkatan']}}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endif
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
