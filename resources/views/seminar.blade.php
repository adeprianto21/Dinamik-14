@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Seminar | Dinamik')

@section('content')

@include('templates.header')

<main class="main-competition">
    <section>
        <span class="header-competition">Seminar Nasional</span>
        <span class="header-competition-subtitle">Optimalisasi Digital Skill untuk Menunjang Terciptanya Society
            5.0</span>

        <div class="header-section mt-5">
            <div class="header-stroke header-animation">
                <span>Speaker</span>
                <span>Speaker</span>
                <span>Speaker</span>
                <span>Speaker</span>
                <span>Speaker</span>
            </div>
        </div>

        <div class="speaker-container my-5">
            <div class="row">
                <div class="col-md mb-4">
                    <div class="speaker mx-auto">
                        <img src="{{url('resources/img/Seminar/pemateri_4.png')}}" alt="">
                        <div class="container-nama-speaker">
                            <span class="nama-speaker bold">Hasbi Asyadiq</span>
                            <br>
                            <span class="jabatan-speaker">CEO & FOUNDER ASSEMBLER</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-4">
                    <div class="speaker mx-auto">
                        <img src="{{url('resources/img/Seminar/pemateri_1.png')}}" alt="">
                        <div class="container-nama-speaker">
                            <span class="nama-speaker bold">Yusep Rosmansyah</span>
                            <br>
                            <span class="jabatan-speaker">LEKTOR KEPALA STEI ITB & PAKAR LEARNING TECHNOLOGY</span>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-4">
                    <div class="speaker mx-auto">
                        <img src="{{url('resources/img/Seminar/pemateri_2.png')}}" alt="">
                        <div class="container-nama-speaker">
                            <span class="nama-speaker bold">Abur Mustikawanto</span>
                            <br>
                            <span class="jabatan-speaker">TIKOMDIK DISDIK JAWA BARAT</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-4">
                    <div class="speaker mx-auto">
                        <img src="{{url('resources/img/Seminar/pemateri_3.png')}}" alt="">
                        <div class="container-nama-speaker">
                            <span class="nama-speaker bold">Enjang Ali Nurdin</span>
                            <br>
                            <span class="jabatan-speaker">DOSEN DEPILKOM UPI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-section">
            <div class="header-stroke header-animation">
                <span>Benefit</span>
                <span>Benefit</span>
                <span>Benefit</span>
                <span>Benefit</span>
                <span>Benefit</span>
            </div>
        </div>

        <div class="seminar-kit-container my-5">
            <div class="row">
                <div class="col-md mb-3">
                    <div class="kit-container">
                        <img src="{{url('resources/img/Seminar/certificate.png')}}" alt="">
                        <div class="mt-3">
                            <span class="kit-text bold">Sertifikat</span>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-3">
                    <div class="kit-container">
                        <img src="{{url('resources/img/Seminar/restaurant.png')}}" alt="">
                        <div class="mt-3">
                            <span class="kit-text bold">Snack</span>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-3">
                    <div class="kit-container">
                        <img src="{{url('resources/img/Seminar/contract.png')}}" alt="">
                        <div class="mt-3">
                            <span class="kit-text bold">Seminar Kit</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span class="header-competition">Save The Date</span>
        <div class="seminar-place my-5">
            <div class="circle">

            </div>
            <div class="place-container">
                <span class="place-text-bold">AUDITORIUM JICA FPMIPA-A</span>
                <span class="place-text-light">30 NOVEMBER 2019</span>
                <span class="place-text-light">PUKUL 10.00 WIB</span>
            </div>
        </div>

        <span class="header-competition">Register Now</span>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="seminar-register-container mx-auto my-5">
                    <span class="place-text-bold">REGISTRATION FEE</span>
                    <span class="place-text-bold-italic">Rp. 50.000,-</span>
                    <a href="{{route('seminar.register')}}" class="guide-book-button mt-3">Register Now</a>
                </div>
            </div>
        </div>

        <span class="header-competition mt-5">Contact Person</span>
        <div class="contact-person">
            <span class="contact-person-name">Tanti Amelia Sopya</span>
            <i class="fab fa-line"></i>
            <span class="contact-person-number">ameliatanty</span>
            <br>
            <i class="fas fa-phone-alt"></i>
            <span class="contact-person-number">085864832155</span>
        </div>

    </section>
</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection