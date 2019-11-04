@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'WebDev | Dinamik')

@section('content')

@include('templates.header')

<main class="main-competition">
    <section>
        <span class="header-competition">WebDev</span>
        <span class="header-competition-subtitle">Web Development</span>

        <div class="header-section mt-5">
            <div class="header-stroke header-animation">
                <span>Deskripsi</span>
                <span>Deskripsi</span>
                <span>Deskripsi</span>
                <span>Deskripsi</span>
                <span>Deskripsi</span>
            </div>
        </div>

        <div class="deskripsi-competition">
            <p>
                Lomba Web Development merupakan sebuah lomba yang diselenggarakan oleh Mahasiswa Departemen Pendidikan
                Ilmu Komputer pada Dinamik 14 untuk menuangkan ide dan kreativitas siswa/i SMA/SMK/sederajat ke dalam
                sebuah website.
            </p>
            <p>
                Tema dari Lomba Web Development Dinamik 14 adalah “Harmonizing Human and Machine in Society 5.0”,
                merupakan sebuah konsep website dimana website tersebut dapat berkolaborasi dengan manusia untuk
                menyelesaikan masalah sosial yang terintegrasi pada ruang dunia maya dan dunia nyata.
            </p>
        </div>

        <a href="http://bit.ly/DINAMIK14-WebDev" target="_blank" class="guide-book-button">Download Guide Book</a>
        <a href="https://drive.google.com/drive/folders/1fp1_Rz42MsAHSsVg1A9iL9g1FWx5PuL9?usp=sharing" target="_blank"
            class="guide-book-button">Download Logo
            Dinamik</a>

        <div class="header-section mt-5">
            <div class="header-stroke header-animation">
                <span>Timeline</span>
                <span>Timeline</span>
                <span>Timeline</span>
                <span>Timeline</span>
                <span>Timeline</span>
            </div>
        </div>

        <div class="time-line-container">
            <div class="time-line">
                <ul>
                    <li>
                        <div class="timeline-item">
                            <span class="time">2 Oktober 2019</span>
                            <span class="agenda">Pembukaan Pendaftaran</span>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <span class="time">10 November 2019</span>
                            <span class="agenda">Penutupan Pendaftaran</span>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <span class="time">10 November 2019</span>
                            <span class="agenda">Batas Akhir Pembayaran</span>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <span class="time">16 November 2019</span>
                            <span class="agenda">Batas Pengumpulan Proposal dan Karya</span>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <span class="time">23 November 2019</span>
                            <span class="agenda">Pengumuman Finalis</span>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <span class="time">29 November 2019</span>
                            <span class="agenda">Technical Meeting</span>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-item">
                            <span class="time">30 November 2019</span>
                            <span class="agenda">Final</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <span class="header-competition">Contact Person</span>
        <div class="contact-person">
            <span class="contact-person-name">Aldian Fallahakbar N</span>
            <i class="fas fa-phone-alt"></i>
            <span class="contact-person-number">082214910198</span>
        </div>

    </section>
</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection