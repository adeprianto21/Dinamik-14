@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'PCA | Dinamik')

@section('content')

@include('templates.header')

<main class="main-competition">
    <section>
        <span class="header-competition">PCA</span>
        <span class="header-competition-subtitle">PC Assembling</span>

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
                Lomba PC Assembly ini merupakan kompetisi beradu ketepatan, kecepatan dan kerapihan dalam merakit
                komponen – komponen kebutuhan minimum PC, sehingga PC dapat beroperasi. Lomba ini mengasah kemampuan
                untuk ketelitian dan pengetahuan mengenai perakitan komponen PC dengan meminimalisir penggunaan waktu.
            </p>
            <p>
                Kompetisi PC Assembly akan diperlombakan untuk SMK/SMA sederajat. lomba akan diadakan pada 29 November
                2019. Lomba akan dibagi menjadi beberapa sesi dan akan diseleksi 5 peserta terbaik berdasarkan penilaian
                dewan juri untuk melanjutkan ke babak final.
            </p>
        </div>

        <a href="http://bit.ly/DINAMIK14-PCA" target="_blank" class="guide-book-button">Download Guide Book</a>

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
                            <span class="time">20 November 2019</span>
                            <span class="agenda">Batas Akhir Pembayaran</span>
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
                            <span class="agenda">Penyisihan</span>
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
            <span class="contact-person-name">Fachri Veryawan Mahkota</span>
            <i class="fas fa-phone-alt"></i>
            <span class="contact-person-number">089664800595</span>
        </div>

    </section>
</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection