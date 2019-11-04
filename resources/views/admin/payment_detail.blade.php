@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Payment | Admin | Dinamik')

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
        <span class="header-competition text-center">{{$team->nama_tim}}</span>
        <span class="header-competition-subtitle text-center">({{$team->asal_sekolah}})</span>
        <span class="header-competition-subtitle text-center">{{$team->competition->nama_competition}}</span>
    </section>

    <section class="dashboard-section">
        <div class="payment-check-section">
            @if (($team->payment->status_upload_bukti == 0) && ($team->payment->status_validasi == 0) &&
            ($team->payment->status_pembayaran == 0))
            <span class="danger">Belum Upload</span>
            <div class="payment-icon">
                <i class="fas fa-times danger"></i>
            </div>
            @endif
            @if (($team->payment->status_upload_bukti == 1) && ($team->payment->status_validasi == 0) &&
            ($team->payment->status_pembayaran == 0))
            <span class="warning">Menunggu Verfikasi</span>
            @endif
            @if (($team->payment->status_upload_bukti == 1) && ($team->payment->status_validasi == 1) &&
            ($team->payment->status_pembayaran == 0))
            <span class="danger">Verfikasi Gagal</span>
            <div class="payment-icon">
                <i class="fas fa-times danger"></i>
            </div>
            @endif
            @if (($team->payment->status_upload_bukti == 1) && ($team->payment->status_validasi == 1) &&
            ($team->payment->status_pembayaran == 1))
            <span class="success">Sudah Bayar</span>
            <div class="payment-icon">
                <i class="fas fa-check success"></i>
            </div>
            @endif
        </div>

        <span class=" dashboard-section-header">Pembayaran</span>

        @if ($team->payment->status_upload_bukti == 1)
        <span class="title-payment">Bukti Pembayaran Telah Diupload</span>

        <p class="payment-paragraph text-center">
            Mohon periksa apakah ada transaksi masuk yang sama dengan bukti transfer berikut ini.
        </p>


        <div class="upload-bukti-pembayaran mt-4">
            <span class="photo-label bold">Bukti Pembayaran</span>
            <img src="{{url('resources/img/Payment_Image/' . $team->payment->nama_file)}}" class="payment-photo "
                alt="">
            <div class="upload-file">
                <span class="file-name">
                    <a href="{{url('resources/img/Payment_Image/' . $team->payment->nama_file)}}"
                        download="{{$team->payment->nama_file}}">
                        {{$team->payment->nama_file}}
                    </a>
                </span>
            </div>
            <div class="dashboard-overflow">
                <table>
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="" class="dashboard-form-label">Nama Pengirim</label>
                        </td>
                        <td>
                            <input type="text" name="nama_pemilik_rekening" class="dashboard-form-text"
                                value="{{$team->payment->nama_pengirim}}" disabled>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="{{route('admin.update.payment', ['id' => $team->id, 'status' => 1])}}"
                class="btn btn-dashboard btn-success">Confirm
                Payment</a>
            <a href="{{route('admin.update.payment', ['id' => $team->id, 'status' => 0])}}"
                class="btn btn-dashboard btn-danger">Cancel
                Payment</a>
        </div>
        @else
        <span class="title-payment">Bukti Pembayaran Belum Diupload</span>

        <div class="alert alert-danger">
            Tim Belum Mengupload Bukti Pembayaran.
        </div>
        @endif
    </section>

</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection