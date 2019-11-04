@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/dashboard-scrollbar.css')}}">
@endsection

@section('judul', 'Profile | Dinamik')

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
        <span class=" dashboard-section-header">Data Tim</span>

        @if($team->competition_id == null)
        <form action="{{route('dashboard.profile.update.team')}}" method="POST" class="dashboard-form"
            id="data-team-form">
            @csrf
            @endif

            <div class="dashboard-overflow">
                <table>
                    <tr class="dashboard-form-row">
                        <td class="min">
                            <label for="" class="dashboard-form-label">Nama Tim</label>
                        </td>
                        <td>
                            <input type="text" name="nama_tim" class="dashboard-form-text"
                                placeholder="Ex : Dynamic Team" required @if($team->competition_id == null)
                            value="{{old('nama_tim')}}" @else
                            value="{{$team->nama_tim}}" disabled @endif>
                        </td>
                    </tr>
                    @error('nama_tim')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('nama_tim')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">Asal Sekolah</label></td>
                        <td><input type="text" name="asal_sekolah" class="dashboard-form-text"
                                placeholder="Ex : SMAN X Bandung" required @if($team->competition_id == null)
                            value="{{old('asal_sekolah')}}" @else
                            value="{{$team->asal_sekolah}}" disabled @endif>
                        </td>
                    </tr>
                    @error('asal_sekolah')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('asal_sekolah')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">Kategori Lomba</label></td>
                        <td>
                            @if($team->competition_id == null)
                            <div class="select-container">
                                <select name="lomba" id="kategori_lomba" class="dashboard-form-select" required>
                                    <option value="">Pilih Kategori Lomba</option>
                                    @foreach ($competition as $lomba)
                                    @if (old('lomba') == $lomba->id)
                                    <option value="{{$lomba->id}}" selected>{{$lomba->singkatan}}</option>
                                    @else
                                    <option value="{{$lomba->id}}">{{$lomba->singkatan}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down dashboard-form-arrow"></i>
                            </div>
                            @else
                            <input type="text" name="lomba" class="dashboard-form-text"
                                placeholder="Ex : SMAN X Bandung" value="{{$team->competition->nama_competition}}"
                                disabled>
                            @endif
                        </td>
                    </tr>
                    @error('lomba')
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('lomba')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                    @if ($team->competition_id == null || $team->competition_id == 4 || $team->competition_id == 5)
                    <tr class="dashboard-form-row" id="jumlah_anggota">
                        <td class="min"><label for="" class="dashboard-form-label">Jumlah Anggota Tim</label></td>
                        <td>
                            @if($team->competition_id == null)
                            <div class="select-container">
                                <select name="jumlah_anggota" id="select_jumlah_anggota" class="dashboard-form-select"
                                    required>
                                    <option value="">Pilih Jumlah Anggota Tim</option>
                                    <option value="1" @if (old('jumlah_anggota')==1) selected @endif>1</option>
                                    <option value="2" @if (old('jumlah_anggota')==2) selected @endif>2</option>
                                    <option value="3" @if (old('jumlah_anggota')==3) selected @endif>3</option>
                                </select>
                                <i class="fas fa-chevron-down dashboard-form-arrow"></i>
                            </div>
                            @else
                            <input type="text" name="jumlah_anggota" class="dashboard-form-text"
                                value="{{$team->jumlah_anggota}}" disabled>
                            @endif
                        </td>
                    </tr>
                    @endif
                    @error('jumlah_anggota')
                    <tr id="error_jumlah_anggota">
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                {{$errors->first('jumlah_anggota')}}
                            </div>
                        </td>
                    </tr>
                    @enderror
                </table>
            </div>

            @if($team->competition_id == null)
            <button type="button" class="dashboard-form-button" data-toggle="modal" data-target="#modal-team-data">
                Submit
            </button>
        </form>
        @endif

    </section>

    @if($team->competition_id != null)

    @if($team->participant->isEmpty())
    <div class="alert alert-danger">
        Harap Untuk Mengisi Data Pembimbing & Peserta
    </div>
    @endif

    @if($team->participant->isEmpty())
    <form action="{{route('dashboard.profile.insert.participant')}}" method="post" enctype="multipart/form-data"
        id="data-participant-form">

        @csrf
        @endif

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
                                placeholder="Nama Pembimbing" required @if($team->participant->isEmpty())
                            value="{{old('nama_pembimbing')}}" @else value="{{$team->instructor->nama}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nama_pembimbing')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nama_pembimbing'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">NIP Pembimbing</label></td>
                        <td><input type="text" name="nip_pembimbing" class="dashboard-form-text"
                                placeholder="NIP Pembimbing" required @if($team->participant->isEmpty())
                            value="{{old('nip_pembimbing')}}" @else value="{{$team->instructor->nip}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nip_pembimbing')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nip_pembimbing'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. Telepon Pembimbing</label></td>
                        <td>
                            <input type="text" name="no_telp_pembimbing" class="dashboard-form-text"
                                placeholder="Nomor Telepon" required @if($team->participant->isEmpty())
                            value="{{old('no_telp_pembimbing')}}" @else value="{{$team->instructor->no_telp}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_telp_pembimbing')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_telp_pembimbing'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. WA Pembimbing</label></td>
                        <td>
                            <input type="text" name="no_wa_pembimbing" class="dashboard-form-text"
                                placeholder="Nomor WA" required @if($team->participant->isEmpty())
                            value="{{old('no_wa_pembimbing')}}" @else value="{{$team->instructor->no_wa}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_wa_pembimbing')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_wa_pembimbing'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </section>

        <section class="dashboard-section">
            <span class=" dashboard-section-header">
                @if ($team->competition_id == 4 || $team->competition_id == 5)
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
                            <input type="text" name="nama_peserta_1" class="dashboard-form-text"
                                placeholder="Nama Peserta" required @if($team->participant->isEmpty())
                            value="{{old('nama_peserta_1')}}" @else value="{{$team->participant[0]->nama}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nama_peserta_1')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nama_peserta_1'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">NISN</label></td>
                        <td><input type="text" name="nisn_peserta_1" class="dashboard-form-text"
                                placeholder="NISN Peserta" required @if($team->participant->isEmpty())
                            value="{{old('nisn_peserta_1')}}" @else value="{{$team->participant[0]->nisn}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nisn_peserta_1')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nisn_peserta_1'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. Telepon</label></td>
                        <td>
                            <input type="text" name="no_telp_peserta_1" class="dashboard-form-text"
                                placeholder="Nomor Telepon" required @if($team->participant->isEmpty())
                            value="{{old('no_telp_peserta_1')}}" @else value="{{$team->participant[0]->no_telp}}"
                            disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_telp_peserta_1')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_telp_peserta_1'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. WA</label></td>
                        <td>
                            <input type="text" name="no_wa_peserta_1" class="dashboard-form-text" placeholder="Nomor WA"
                                required @if($team->participant->isEmpty())
                            value="{{old('no_wa_peserta_1')}}" @else value="{{$team->participant[0]->no_wa}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_wa_peserta_1')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_wa_peserta_1'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                </table>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 p-3">
                        <span class="photo-label">Pas Foto</span>
                        <img @if($team->participant->isEmpty()) src="{{url('resources/img/User/pasfoto.png')}}" @else
                        src="{{url('resources/img/Participant_Image/' . $team->participant[0]->nama_file_foto)}}"
                        @endif
                        class="user-photo @error('foto_peserta_1') photo-error @enderror" alt="">
                        <div class="upload-file">
                            @if($team->participant->isEmpty())
                            <input type="file" name="foto_peserta_1" accept="image/*" hidden>
                            @endif
                            @error('foto_peserta_1')
                            <span class="file-error">{{$errors->first('foto_peserta_1')}}</span>
                            @enderror
                            <span class="file-name">
                                @if($team->participant->isEmpty())
                                No File Choosen, Yet.
                                @else
                                <a href="{{url('resources/img/Participant_Image/' . $team->participant[0]->nama_file_foto)}}"
                                    download="{{$team->participant[0]->nama_file_foto}}">
                                    {{$team->participant[0]->nama_file_foto}}
                                </a>
                                @endif
                            </span>
                            @if($team->participant->isEmpty())
                            <br>
                            <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                            <button class="upload-button">Upload File</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span class="photo-label">Kartu Pelajar</span>
                        <img @if($team->participant->isEmpty()) src="{{url('resources/img/User/kartu_pelajar.png')}}"
                        @else
                        src="{{url('resources/img/Participant_Image/' . $team->participant[0]->nama_file_kartu)}}"
                        @endif
                        class="id-card-photo @error('ktp_peserta_1') photo-error @enderror" alt="">
                        <div class="upload-file">
                            @if($team->participant->isEmpty())
                            <input type="file" name="ktp_peserta_1" accept="image/*" hidden>
                            @endif
                            @error('ktp_peserta_1')
                            <span class="file-error">{{$errors->first('ktp_peserta_1')}}</span>
                            @enderror
                            <span class="file-name">
                                @if($team->participant->isEmpty())
                                No File Choosen, Yet.
                                @else
                                <a href="{{url('resources/img/Participant_Image/' . $team->participant[0]->nama_file_kartu)}}"
                                    download="{{$team->participant[0]->nama_file_kartu}}">
                                    {{$team->participant[0]->nama_file_kartu}}
                                </a>
                                @endif
                            </span>
                            @if($team->participant->isEmpty())
                            <br>
                            <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                            <button class="upload-button">Upload File</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if ($team->jumlah_anggota > 1)

        <section class="dashboard-section">
            <span class=" dashboard-section-header">Data Diri Anggota 1</span>

            <div class="dashboard-overflow">
                <table>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">Nama Peserta</label></td>
                        <td>
                            <input type="text" name="nama_peserta_2" class="dashboard-form-text"
                                placeholder="Nama Peserta" required @if($team->participant->isEmpty())
                            value="{{old('nama_peserta_2')}}" @else value="{{$team->participant[1]->nama}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nama_peserta_2')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nama_peserta_2'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">NISN</label></td>
                        <td><input type="text" name="nisn_peserta_2" class="dashboard-form-text"
                                placeholder="NISN Peserta" required @if($team->participant->isEmpty())
                            value="{{old('nisn_peserta_2')}}" @else value="{{$team->participant[1]->nisn}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nisn_peserta_2')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nisn_peserta_2'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. Telepon</label></td>
                        <td>
                            <input type="text" name="no_telp_peserta_2" class="dashboard-form-text"
                                placeholder="Nomor Telepon" required @if($team->participant->isEmpty())
                            value="{{old('no_telp_peserta_2')}}" @else value="{{$team->participant[1]->no_telp}}"
                            disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_telp_peserta_2')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_telp_peserta_2'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. WA</label></td>
                        <td>
                            <input type="text" name="no_wa_peserta_2" class="dashboard-form-text" placeholder="Nomor WA"
                                required @if($team->participant->isEmpty())
                            value="{{old('no_wa_peserta_2')}}" @else value="{{$team->participant[1]->no_wa}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_wa_peserta_2')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_wa_peserta_2'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                </table>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 p-3">
                        <span class="photo-label">Pas Foto</span>
                        <img @if($team->participant->isEmpty()) src="{{url('resources/img/User/pasfoto.png')}}" @else
                        src="{{url('resources/img/Participant_Image/' . $team->participant[1]->nama_file_foto)}}"
                        @endif
                        class="user-photo @error('foto_peserta_2') photo-error @enderror" alt="">
                        <div class="upload-file">
                            @if($team->participant->isEmpty())
                            <input type="file" name="foto_peserta_2" accept="image/*" hidden>
                            @endif
                            @error('foto_peserta_2')
                            <span class="file-error">{{$errors->first('foto_peserta_2')}}</span>
                            @enderror
                            <span class="file-name">
                                @if($team->participant->isEmpty())
                                No File Choosen, Yet.
                                @else
                                <a href="{{url('resources/img/Participant_Image/' . $team->participant[1]->nama_file_foto)}}"
                                    download="{{$team->participant[1]->nama_file_foto}}">
                                    {{$team->participant[1]->nama_file_foto}}
                                </a>
                                @endif
                            </span>
                            @if($team->participant->isEmpty())
                            <br>
                            <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                            <button class="upload-button">Upload File</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span class="photo-label">Kartu Pelajar</span>
                        <img @if($team->participant->isEmpty()) src="{{url('resources/img/User/kartu_pelajar.png')}}"
                        @else
                        src="{{url('resources/img/Participant_Image/' . $team->participant[1]->nama_file_kartu)}}"
                        @endif
                        class="id-card-photo @error('ktp_peserta_2') photo-error @enderror" alt="">
                        <div class="upload-file">
                            @if($team->participant->isEmpty())
                            <input type="file" name="ktp_peserta_2" accept="image/*" hidden>
                            @endif
                            @error('ktp_peserta_2')
                            <span class="file-error">{{$errors->first('ktp_peserta_2')}}</span>
                            @enderror
                            <span class="file-name">
                                @if($team->participant->isEmpty())
                                No File Choosen, Yet.
                                @else
                                <a href="{{url('resources/img/Participant_Image/' . $team->participant[1]->nama_file_kartu)}}"
                                    download="{{$team->participant[1]->nama_file_kartu}}">
                                    {{$team->participant[1]->nama_file_kartu}}
                                </a>
                                @endif
                            </span>
                            @if($team->participant->isEmpty())
                            <br>
                            <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                            <button class="upload-button">Upload File</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endif

        @if ($team->jumlah_anggota == 3)

        <section class="dashboard-section">
            <span class=" dashboard-section-header">Data Diri Anggota 2</span>

            <div class="dashboard-overflow">
                <table>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">Nama Peserta</label></td>
                        <td>
                            <input type="text" name="nama_peserta_3" class="dashboard-form-text"
                                placeholder="Nama Peserta" required @if($team->participant->isEmpty())
                            value="{{old('nama_peserta_3')}}" @else value="{{$team->participant[2]->nama}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nama_peserta_3')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nama_peserta_3'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">NISN</label></td>
                        <td><input type="text" name="nisn_peserta_3" class="dashboard-form-text"
                                placeholder="NISN Peserta" required @if($team->participant->isEmpty())
                            value="{{old('nisn_peserta_3')}}" @else value="{{$team->participant[2]->nisn}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('nisn_peserta_3')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('nisn_peserta_3'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. Telepon</label></td>
                        <td>
                            <input type="text" name="no_telp_peserta_3" class="dashboard-form-text"
                                placeholder="Nomor Telepon" required @if($team->participant->isEmpty())
                            value="{{old('no_telp_peserta_3')}}" @else value="{{$team->participant[2]->no_telp}}"
                            disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_telp_peserta_3')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_telp_peserta_3'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                    <tr class="dashboard-form-row">
                        <td class="min"><label for="" class="dashboard-form-label">No. WA</label></td>
                        <td>
                            <input type="text" name="no_wa_peserta_3" class="dashboard-form-text" placeholder="Nomor WA"
                                required @if($team->participant->isEmpty())
                            value="{{old('no_wa_peserta_3')}}" @else value="{{$team->participant[2]->no_wa}}" disabled
                            @endif>
                        </td>
                    </tr>
                    <?php if ($errors->has('no_wa_peserta_3')) : ?>
                    <tr>
                        <td class="min"></td>
                        <td>
                            <div class="dashboard-form-error">
                                <?= $errors->first('no_wa_peserta_3'); ?>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>

                </table>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 p-3">
                        <span class="photo-label">Pas Foto</span>
                        <img @if($team->participant->isEmpty()) src="{{url('resources/img/User/pasfoto.png')}}" @else
                        src="{{url('resources/img/Participant_Image/' . $team->participant[2]->nama_file_foto)}}"
                        @endif
                        class="user-photo @error('foto_peserta_3') photo-error @enderror" alt="">
                        <div class="upload-file">
                            @if($team->participant->isEmpty())
                            <input type="file" name="foto_peserta_3" accept="image/*" hidden>
                            @endif
                            @error('foto_peserta_3')
                            <span class="file-error">{{$errors->first('foto_peserta_3')}}</span>
                            @enderror
                            <span class="file-name">
                                @if($team->participant->isEmpty())
                                No File Choosen, Yet.
                                @else
                                <a href="{{url('resources/img/Participant_Image/' . $team->participant[2]->nama_file_foto)}}"
                                    download="{{$team->participant[2]->nama_file_foto}}">
                                    {{$team->participant[2]->nama_file_foto}}
                                </a>
                                @endif
                            </span>
                            @if($team->participant->isEmpty())
                            <br>
                            <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                            <button class="upload-button">Upload File</button>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 p-3">
                        <span class="photo-label">Kartu Pelajar</span>
                        <img @if($team->participant->isEmpty()) src="{{url('resources/img/User/kartu_pelajar.png')}}"
                        @else
                        src="{{url('resources/img/Participant_Image/' . $team->participant[2]->nama_file_kartu)}}"
                        @endif
                        class="id-card-photo @error('ktp_peserta_3') photo-error @enderror" alt="">
                        <div class="upload-file">
                            @if($team->participant->isEmpty())
                            <input type="file" name="ktp_peserta_3" accept="image/*" hidden>
                            @endif
                            @error('ktp_peserta_3')
                            <span class="file-error">{{$errors->first('ktp_peserta_3')}}</span>
                            @enderror
                            <span class="file-name">
                                @if($team->participant->isEmpty())
                                No File Choosen, Yet.
                                @else
                                <a href="{{url('resources/img/Participant_Image/' . $team->participant[2]->nama_file_kartu)}}"
                                    download="{{$team->participant[2]->nama_file_kartu}}">
                                    {{$team->participant[2]->nama_file_kartu}}
                                </a>
                                @endif
                            </span>
                            @if($team->participant->isEmpty())
                            <br>
                            <span class="format-info">(Format JPG, JPEG, PNG. Max 2 MB)</span>
                            <button class="upload-button">Upload File</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endif

        @if($team->participant->isEmpty())
        <button type="button" class="submit-participant-button" data-toggle="modal"
            data-target="#modal-participant-data">
            Submit Data Peserta
        </button>

    </form>
    @endif

    @endif

</main>


@if($team->competition_id == null)
<!-- Modal -->
<div class="modal fade" id="modal-team-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-exclamation-triangle"></i>
                    Peringatan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pastikan data Tim yang Anda masukkan sudah benar, karena Anda tidak bisa merubahnya kembali.
            </div>
            <div class="modal-footer">
                <button type="button" class="dashboard-form-button bg-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="dashboard-form-button bg-success" id="modal-submit-team">Submit</button>
            </div>
        </div>
    </div>
</div>
@endif

@if($team->participant->isEmpty())
<!-- Modal -->
<div class="modal fade" id="modal-participant-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-exclamation-triangle"></i>
                    Peringatan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pastikan data Pembimbing dan Peserta yang Anda masukkan sudah benar, karena Anda tidak bisa merubahnya
                kembali.
            </div>
            <div class="modal-footer">
                <button type="button" class="dashboard-form-button bg-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="dashboard-form-button bg-success"
                    id="modal-submit-participant">Submit</button>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')

<script src="{{url('resources/js/dashboard.js')}}"></script>

@endsection