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

    <section class="dashboard-section">
        <span class=" dashboard-section-header bold">Status Pembayaran Tim</span>
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
                        <th>Upload Bukti</th>
                        <th>Validasi</th>
                        <th>Pembayaran</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 1)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.payment.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td class="{{$team->payment->status_upload_bukti == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_upload_bukti == 1 ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->payment->status_validasi == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_validasi == 1 ? 'Sudah Divalidasi' : 'Belum Divalidasi'}}</td>
                        <td class="{{$team->payment->status_pembayaran == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_pembayaran == 1 ? 'Sudah Diterima' : 'Belum Diterima'}}</td>
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
                        <th>Upload Bukti</th>
                        <th>Validasi</th>
                        <th>Pembayaran</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 2)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.payment.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td class="{{$team->payment->status_upload_bukti == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_upload_bukti == 1 ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->payment->status_validasi == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_validasi == 1 ? 'Sudah Divalidasi' : 'Belum Divalidasi'}}</td>
                        <td class="{{$team->payment->status_pembayaran == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_pembayaran == 1 ? 'Sudah Diterima' : 'Belum Diterima'}}</td>
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
                        <th>Upload Bukti</th>
                        <th>Validasi</th>
                        <th>Pembayaran</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 3)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.payment.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td class="{{$team->payment->status_upload_bukti == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_upload_bukti == 1 ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->payment->status_validasi == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_validasi == 1 ? 'Sudah Divalidasi' : 'Belum Divalidasi'}}</td>
                        <td class="{{$team->payment->status_pembayaran == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_pembayaran == 1 ? 'Sudah Diterima' : 'Belum Diterima'}}</td>
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
                        <th>Upload Bukti</th>
                        <th>Validasi</th>
                        <th>Pembayaran</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 4)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.payment.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td class="{{$team->payment->status_upload_bukti == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_upload_bukti == 1 ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->payment->status_validasi == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_validasi == 1 ? 'Sudah Divalidasi' : 'Belum Divalidasi'}}</td>
                        <td class="{{$team->payment->status_pembayaran == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_pembayaran == 1 ? 'Sudah Diterima' : 'Belum Diterima'}}</td>
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
                        <th>Upload Bukti</th>
                        <th>Validasi</th>
                        <th>Pembayaran</th>
                    </tr>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($teams as $team)
                    @if ($team->competition_id == 5)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{route('admin.payment.detail', ['id' => $team->id])}}">{{$team->nama_tim}}</a>
                        </td>
                        <td class="{{$team->payment->status_upload_bukti == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_upload_bukti == 1 ? 'Sudah Upload' : 'Belum Upload'}}</td>
                        <td class="{{$team->payment->status_validasi == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_validasi == 1 ? 'Sudah Divalidasi' : 'Belum Divalidasi'}}</td>
                        <td class="{{$team->payment->status_pembayaran == 1 ? 'text-success' : 'text-danger'}}">
                            {{$team->payment->status_pembayaran == 1 ? 'Sudah Diterima' : 'Belum Diterima'}}</td>
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
