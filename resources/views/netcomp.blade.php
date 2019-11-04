@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'NetComp | Dinamik')

@section('content')

@include('templates.header')

<main class="main-competition">
    <section>
        <span class="header-competition">NetComp</span>
        <span class="header-competition-subtitle">Network Competition</span>

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
                Network Competition merupakan kompetisi untuk mengasah kemampuan dan keterampilan peserta dalam
                mengelola suatu jaringan komputer. Dalam lomba ini para peserta akan menghadapi beberapa kasus seputar
                jaringan komputer yang harus diselesaikan dengan memenuhi ketentuan yang telah ditetapkan.
            </p>
        </div>

        <a href="http://bit.ly/DINAMIK14-NetComp" target="_blank" class="guide-book-button">Download Guide Book</a>

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
                            <span class="time">23 November 2019</span>
                            <span class="agenda">Penyisihan</span>
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
            <span class="contact-person-name">Albari Berki Pradhana </span>
            <i class="fas fa-phone-alt"></i>
            <span class="contact-person-number">081912525930</span>
        </div>

    </section>
</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection