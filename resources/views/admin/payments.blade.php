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
        <span class="dashboard-section-header bold text-success">Sudah Bayar :
            {{$payments->where('status_upload_bukti', 1)->where('status_validasi', 1)->where('status_pembayaran', 1)->count()}}
            Tim</span>
        <span class="dashboard-section-header bold text-warning">Menunggu Verifikasi :
            {{$payments->where('status_upload_bukti', 1)->where('status_validasi', null)->where('status_pembayaran', 0)->count()}}
            Tim</span>
        <?php
            $belum_bayar = 0;
            foreach($payments as $payment) {
                if ($payment->status_upload_bukti == 0 && $payment->team->nama_tim != null) {
                $belum_bayar++;
                }
            }
        ?>
        <span class="dashboard-section-header bold text-danger">Belum Bayar :
            {{$belum_bayar}}
            Tim</span>
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