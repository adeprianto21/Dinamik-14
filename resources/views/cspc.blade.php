@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'CSPC | Dinamik')

@section('content')

@include('templates.header')

<main class="main-competition">
    <section>
        <span class="header-competition">CSPC</span>
        <span class="header-competition-subtitle">Computer Science Programming Contest</span>

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
                CSPC (Computer Science Programming Contest) merupakan suatu ajang untuk menguji nalar/logika peserta
                dalam menyelesaikan persoalan yang diberikan dengan menggunakan bahasa Pemrograman tertentu. Kompetisi
                ini menggunakan sistem online judge. Peserta akan diberi sejumlah soal Pemrograman (Problem Solving)
                yang harus diselesaikan dalam waktu yang telah ditentukan kemudian mengunggah jawaban berupa file kode
                program ke server panitia. Bahasa Pemrograman yang bisa digunakan dalam kompetisi Pemrograman ini adalah
                Pascal, C, dan C++.
            </p>
            <p>
                Melalui CPSC dalam acara DINAMIK 14, peserta diharapkan dapat menambah pengetahuan dalam bidang
                Pemrograman dan bekal berupa pengalaman berkompetisi dalam dunia pemrograman. Sehingga peserta dapat
                memiliki kemampuan untuk bersaing dalam persaingan di masa kini.
            </p>
        </div>

        <a href="http://bit.ly/DINAMIK14-CSPC" target="_blank" class="guide-book-button">Download Guide Book</a>

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
                            <span class="time">19 November - 22 November 2019</span>
                            <span class="agenda">Warming Up</span>
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
                            <span class="time">25 November 2019</span>
                            <span class="agenda">Semi Final</span>
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
            <span class="contact-person-name">Robi Naufal Kaosar </span>
            <i class="fab fa-line"></i>
            <span class="contact-person-number">naufal_kkaaoossaar</span>
            <br>
            <i class="fas fa-phone-alt"></i>
            <span class="contact-person-number">08970102260</span>
        </div>

    </section>
</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection