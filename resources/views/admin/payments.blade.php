@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Payments | Admin | Dinamik')

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
        <span class="dashboard-section-header bold">Status Pembayaran Tim</span>

        <?php
            $belum_bayar = 0;
            $ditolak = 0;
            foreach($payments as $payment) {
                if ($payment->status_upload_bukti == 0 && $payment->team->nama_tim != null) {
                    $belum_bayar++;
                } else if ($payment->status_upload_bukti == 1 && $payment->status_validasi == 1 && $payment->status_pembayaran == 0) {
                    $ditolak++;
                }
            }
        ?>

        <span class="dashboard-section-header bold">Belum Upload :
            <span class="text-danger">{{$belum_bayar}} Tim</span></span>
        <span class="dashboard-section-header bold">Sudah Bayar :
            <span
                class="text-success">{{$payments->where('status_upload_bukti', 1)->where('status_validasi', 1)->where('status_pembayaran', 1)->count()}}
                Tim</span></span>
        <span class="dashboard-section-header bold">Belum Verifikasi :
            <span
                class="text-warning">{{$payments->where('status_upload_bukti', 1)->where('status_validasi', null)->where('status_pembayaran', 0)->count()}}
                Tim</span></span>
        <span class="dashboard-section-header bold">Ditolak :
            <span class="text-danger">{{$ditolak}} Tim</span></span>

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
