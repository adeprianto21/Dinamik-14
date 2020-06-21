@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Seminar | Dinamik')

@section('content')

@include('templates.header')

<main class="main-competition" style="min-height: 87vh; display: flex; align-items: center; justify-content: center;">
    <section>
        <div class="row">
            <div class="col-md">
                <div class="seminar-register-container mx-auto my-5" style="width: 80vw;">
                    <span class="place-text-bold">Prosedur pembayaran telah dikirimkan lewat email. Silahkan cek email
                        Anda beberapa saat lagi.</span>
                    <span class="place-text-bold">Bila tidak ada, silahkan
                        cek di spam box email Anda.</span>
                    <a href="{{route('seminar')}}" class="guide-book-button mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection