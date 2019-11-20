@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Team | Admin | Dinamik')

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
        <span class=" dashboard-section-header">Data Tim</span>


        <div class="dashboard-overflow">
            <table>
                <tr class="dashboard-form-row">
                    <td class="min">
                        <label for="" class="dashboard-form-label">Nama Tim</label>
                    </td>
                    <td>
                        <input type="text" name="nama_tim" class="dashboard-form-text" value="{{$team->nama_tim}}"
                            disabled>
                    </td>
                </tr>
                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">Asal Sekolah</label></td>
                    <td><input type="text" name="asal_sekolah" class="dashboard-form-text"
                            value="{{$team->asal_sekolah}}" disabled>
                    </td>
                </tr>
                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">Kategori Lomba</label></td>
                    <td>
                        <input type="text" name="lomba" class="dashboard-form-text"
                            value="{{$team->competition['singkatan']}}" disabled>
                    </td>
                </tr>
                <tr class="dashboard-form-row" id="jumlah_anggota">
                    <td class="min"><label for="" class="dashboard-form-label">Jumlah Anggota Tim</label></td>
                    <td>
                        <input type="text" name="jumlah_anggota" class="dashboard-form-text"
                            value="{{$team->jumlah_anggota}}" disabled>
                    </td>
                </tr>
                <tr class="dashboard-form-row" id="jumlah_anggota">
                    <td class="min"><label for="" class="dashboard-form-label">Email Tim</label></td>
                    <td>
                        <input type="text" name="jumlah_anggota" class="dashboard-form-text"
                            value="{{$team->user->email}}" disabled>
                    </td>
                </tr>
            </table>
        </div>

    </section>

    @if (count($team->participant) > 0)

    <section class="dashboard-section">
        <span class=" dashboard-section-header">Data Diri Pembimbing</span>

        <div class="dashboard-overflow">
            <table>

                <tr class="dashboard-form-row">
                    <td class="min">
                        <label for="" class="dashboard-form-label">Nama Pembimbing</label>
                    </td>
                    <td>
                        <input type="text" name="nama_pembimbing" class="dashboard-form-text"
                            value="{{$team->instructor->nama}}" disabled>
                    </td>
                </tr>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">NIP Pembimbing</label></td>
                    <td><input type="text" name="nip_pembimbing" class="dashboard-form-text"
                            value="{{$team->instructor->nip}}" disabled>
                    </td>
                </tr>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">No. Telepon Pembimbing</label></td>
                    <td>
                        <input type="text" name="no_telp_pembimbing" class="dashboard-form-text"
                            value="{{$team->instructor->no_telp}}" disabled>
                    </td>
                </tr>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">No. WA Pembimbing</label></td>
                    <td>
                        <input type="text" name="no_wa_pembimbing" class="dashboard-form-text"
                            value="{{$team->instructor->no_wa}}" disabled>
                    </td>
                </tr>
            </table>
        </div>
    </section>

    @foreach ($team->participant as $peserta)

    <section class="dashboard-section">
        <span class=" dashboard-section-header">
            @if ($loop->iteration == 1 && ($team->competition_id == 4 || $team->competition_id == 5))
            Data Diri Ketua Tim
            @else
            Data Diri Peserta
            @endif
        </span>

        <div class="dashboard-overflow">
            <table>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">Nama Peserta</label></td>
                    <td>
                        <input type="text" name="nama_peserta_1" class="dashboard-form-text" value="{{$peserta->nama}}"
                            disabled>
                    </td>
                </tr>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">NISN</label></td>
                    <td><input type="text" name="nisn_peserta_1" class="dashboard-form-text" value="{{$peserta->nisn}}"
                            disabled>
                    </td>
                </tr>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">No. Telepon</label></td>
                    <td>
                        <input type="text" name="no_telp_peserta_1" class="dashboard-form-text"
                            value="{{$peserta->no_telp}}" disabled>
                    </td>
                </tr>

                <tr class="dashboard-form-row">
                    <td class="min"><label for="" class="dashboard-form-label">No. WA</label></td>
                    <td>
                        <input type="text" name="no_wa_peserta_1" class="dashboard-form-text"
                            value="{{$peserta->no_wa}}" disabled>
                    </td>
                </tr>

            </table>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 p-3">
                    <span class="photo-label">Pas Foto</span>
                    <img src="{{url('resources/img/Participant_Image/' . $peserta->nama_file_foto)}}"
                        class="user-photo " alt="">
                    <div class="upload-file">
                        <span class="file-name">
                            <a href="{{url('resources/img/Participant_Image/' . $peserta->nama_file_foto)}}"
                                download="{{$peserta->nama_file_foto}}">
                                {{$peserta->nama_file_foto}}
                            </a>
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 p-3">
                    <span class="photo-label">Kartu Pelajar</span>
                    <img src="{{url('resources/img/Participant_Image/' . $peserta->nama_file_kartu)}}"
                        class="id-card-photo " alt="">
                    <div class="upload-file">
                        <span class="file-name">
                            <a href="{{url('resources/img/Participant_Image/' . $peserta->nama_file_kartu)}}"
                                download="{{$peserta->nama_file_kartu}}">
                                {{$peserta->nama_file_kartu}}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @endforeach

    @else

    <div class="alert alert-danger">
        Tim Belum Mengisi Data Peserta
    </div>
    @endif


</main>

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection