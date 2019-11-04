@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Payment | Dinamik')

@section('content')

@include('templates.dashboard-header')

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

        @if (($team->payment->status_upload_bukti == 0) && ($team->payment->status_validasi == 0) &&
        ($team->payment->status_pembayaran == 0))
        <p class="payment-paragraph">
            Silahkan melakukan pembayaran sebesar <span class="bold">Rp.
                {{ number_format($team->competition->biaya_pendaftaran,0,',','.')}}</span>
            melalui Transfer Bank dengan nomor rekening berikut :
        </p>
        <span class="bank-name">BANK BNI</span>
        <span class="bank-number">0552163502</span>
        <span class="bank-owner">a/n Meirista Puspa Anggraeni</span>

        <p class="payment-paragraph">
            Kemudian lakukan konfirmasi pembayaran dengan mengunggah bukti pembayaran di bawah ini.
        </p>
        @endif

        @if (($team->payment->status_upload_bukti == 1) && ($team->payment->status_validasi == 0) &&
        ($team->payment->status_pembayaran == 0))
        <span class="title-payment">Bukti Pembayaran Telah Diupload</span>

        <p class="payment-paragraph text-center">
            Mohon menunggu sampai tim kami selesai melakukan verifikasi pembayaran yang anda lakukan.
        </p>
        @endif

        @if (($team->payment->status_upload_bukti == 1) && ($team->payment->status_validasi == 1) &&
        ($team->payment->status_pembayaran == 0))
        <span class="title-payment">Bukti Pembayaran Telah Diupload</span>

        <p class="payment-paragraph text-center">
            Mohon maaf, pembayaran tidak dapat kami validasi.
        </p>
        <p class="payment-paragraph text-center">
            Silahkan upload ulang bukti pembayaran atau hubungi
            0877237173727.
        </p>
        @endif

        @if (($team->payment->status_upload_bukti == 1) && ($team->payment->status_validasi == 1) &&
        ($team->payment->status_pembayaran == 1))
        <span class="title-payment">Bukti Pembayaran Telah Diupload</span>

        <p class="payment-paragraph text-center">
            Terima kasih, pembayaran anda telah kami validasi dan telah kami terima.
        </p>
        @endif

        @if ($team->payment->status_upload_bukti == 0)
        <form action="{{route('dashboard.insert.payment')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @endif

            <div class="upload-bukti-pembayaran mt-4">
                <span class="photo-label bold">Bukti Pembayaran</span>
                <img @if ($team->payment->status_upload_bukti == 0) src="{{url('resources/img/User/tax.png')}}" @else
                src="{{url('resources/img/Payment_Image/' . $team->payment->nama_file)}}" @endif
                class="payment-photo @error('foto_payment') photo-error @enderror" alt="">
                <div class="upload-file">
                    @if ($team->payment->status_upload_bukti == 0)
                    <input type="file" name="foto_payment" accept="image/*" hidden>
                    @endif
                    @error('foto_payment')
                    <span class="file-error">{{$errors->first('foto_payment')}}</span>
                    @enderror
                    <span class="file-name">
                        @if ($team->payment->status_upload_bukti == 0)
                        No File Choosen, Yet.
                        @else
                        <a href="{{url('resources/img/Payment_Image/' . $team->payment->nama_file)}}"
                            download="{{$team->payment->nama_file}}">
                            {{$team->payment->nama_file}}
                        </a>
                        @endif
                    </span>
                    @if ($team->payment->status_upload_bukti == 0)
                    <br>
                    <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                    <button class="upload-button">Upload File</button>
                    @endif
                </div>
                <div class="dashboard-overflow">
                    <table>
                        <tr class="dashboard-form-row">
                            <td class="min">
                                <label for="" class="dashboard-form-label">Nama Pengirim</label>
                            </td>
                            <td>
                                <input type="text" name="nama_pemilik_rekening" class="dashboard-form-text"
                                    placeholder="Nama Pemilik Rekening Yang Digunakan" required
                                    @if($team->payment->status_upload_bukti == 0)
                                value="{{old('nama_pemilik_rekening')}}"
                                @else
                                value="{{$team->payment->nama_pengirim}}" disabled
                                @endif>
                            </td>
                        </tr>
                        @error('nama_pemiliki_rekening')
                        <tr>
                            <td class="min"></td>
                            <td>
                                <div class="dashboard-form-error">
                                    {{$errors->first('nama_pemiliki_rekening')}}
                                </div>
                            </td>
                        </tr>
                        @enderror
                    </table>
                </div>
                @if ($team->payment->status_upload_bukti == 0)
                <button type="submit" class="submit-participant-button">
                    Submit Pembayaran
                </button>
                @else
                @if ($team->payment->status_pembayaran != 1)
                <a href="{{route('dashboard.payment.edit')}}" class="edit-payment-button">Edit Pembayaran</a>
                @endif
                @endif
            </div>
            @if ($team->payment->status_upload_bukti == 0)
        </form>
        @endif
    </section>

</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection