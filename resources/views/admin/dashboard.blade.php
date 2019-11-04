@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Dashboard | Admin | Dinamik')

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
        <span class=" dashboard-section-header bold">Total Pendaftar :
            {{$teams->count()}} Tim</span>
        <div class="dashboard-overflow">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>PCA</th>
                        <th>Net Comp</th>
                        <th>CSPC</th>
                        <th>Web Dev</th>
                        <th>Animation</th>
                    </tr>
                    <tr>
                        <th>{{$teams->where('competition_id' , '1')->count()}} Tim</th>
                        <th>{{$teams->where('competition_id' , '2')->count()}} Tim</th>
                        <th>{{$teams->where('competition_id' , '3')->count()}} Tim</th>
                        <th>{{$teams->where('competition_id' , '4')->count()}} Tim</th>
                        <th>{{$teams->where('competition_id' , '5')->count()}} Tim</th>
                    </tr>
                </table>
            </div>
        </div>

    </section>

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

    <section class="dashboard-section">
        <span class=" dashboard-section-header bold">Status Submit Karya</span>
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
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 4 || $team->competition_id == 5)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('admin.karya.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a></td>
                        <td>{{$team->competition['singkatan']}}</td>
                        <td class="{{$team->creation['link_1'] ? 'text-success' : 'text-danger'}}">
                            {{$team->creation['link_1'] ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->creation['link_2'] ? 'text-success' : 'text-danger'}}">
                            {{$team->creation['link_2'] ? 'Sudah Upload' : 'Belum Upload'}}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </section>

    <section class="dashboard-section">
        <span class=" dashboard-section-header bold">Status Pembayaran Tim</span>
        <div class="dashboard-overflow">
            <div class="table-admin-dashboard">
                <table>
                    <tr class="row-header">
                        <th>No</th>
                        <th>Nama Tim</th>
                        <th>Upload Bukti</th>
                        <th>Validasi</th>
                        <th>Pembayaran</th>
                    </tr>
                    @foreach ($teams as $team)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('admin.payment.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td class="{{$team->payment->status_upload_bukti == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_upload_bukti == 1 ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->payment->status_validasi == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_validasi == 1 ? 'Sudah Divalidasi' : 'Belum Divalidasi'}}</td>
                        <td class="{{$team->payment->status_pembayaran == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_pembayaran == 1 ? 'Sudah Diterima' : 'Belum Diterima'}}</td>
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