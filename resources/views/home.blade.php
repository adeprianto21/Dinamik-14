@extends('templates.main')

@section('css')
<link rel="stylesheet" href="{{url('/resources/css/home-scrollbar.css')}}">
@endsection

@section('judul', 'Home | Dinamik')

@section('content')

<section id="landing-page-hero">
    <div class="parallax-go-up">
        <div class="bg-dinamik">
        </div>
        <div class="bg-dinamik">
        </div>
    </div>

    <div class="layer" data-speed="0">
        <img class="gradient" src="{{url('resources/img/Parallax/layer1.png')}}" alt="">
    </div>
    <div class="layer" data-speed="-0.70">
        <div class="layer-2">
            <img src="{{url('resources/img/Parallax/layer2.png')}}" class="map" alt="">
            <span class="diesnatalis">diesnatalis</span>
            <span class="nov-2019">November 2019</span>
            <span class="number">008980555555400000</span>
        </div>
    </div>
    <div class="layer layer-3" data-speed="-0.63">
        <img src="{{url('resources/img/Parallax/layer3.png')}}" class="dinamik" alt="">
    </div>
    <div class="layer" data-speed="-0.20">
        <div class="layer-4">
            <img src="{{url('resources/img/Parallax/layer4.png')}}" class="tv" alt="">
            <img src="{{url('resources/img/rotate.png')}}" class="rotate-scroll" alt="">
        </div>
    </div>
    <div class="layer" data-speed="0">
        <img src="{{url('resources/img/Parallax/layer5.png')}}" class="gradient" alt="">
    </div>
</section>

<header class="header" id="header-home">

    <nav class="nav">
        <div class="brand-dinamik">
            <a href="{{route('home')}}">
                <img src="{{url('resources/img/Parallax/layer3.png')}}" alt="">
            </a>
        </div>
        <div class="navbar-toggle">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div id="nav-dinamik-item-container">
            <div class="nav-dinamik-item">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="dinamik-dropdown" tabindex="-1">
                        <span>
                            Competition
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <div class="dinamik-dropdown-menu">
                            <a href="{{route('pca')}}">PCA</a>
                            <a href="{{route('netcomp')}}">Net Comp</a>
                            <a href="{{route('cspc')}}">CSPC</a>
                            <a href="{{route('webdev')}}">Web Dev</a>
                            <a href="{{route('animation')}}">Animation</a>
                        </div>
                    </li>
                    <li><a href="#">Acara</a></li>
                    <li><a href="#">Info</a></li>
                    <li class="divider">|</li>

                    @if ((!Auth::check()) && (!Auth::guard('admin')->check()))
                    <li><a href="{{route('register')}}">Register</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                    @endif

                    @auth('web')
                    <li class="dinamik-dropdown" tabindex="-1">
                        <span>
                            {{Auth::user()->username}}
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <div class="dinamik-dropdown-menu">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth

                    @auth('admin')
                    <li class="dinamik-dropdown" tabindex="-1">
                        <span>
                            {{Auth::guard('admin')->user()->name}}
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <div class="dinamik-dropdown-menu">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="overlay-navbar">
    <div class="close-btn-group">
        <div class="bar1"></div>
        <div class="bar2"></div>
    </div>
    <div class="overlay-navbar-item">
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li class="dinamik-dropdown" tabindex="-1">
                <span>
                    Competition
                    <i class="fas fa-chevron-down"></i>
                </span>
                <div class="dinamik-dropdown-menu">
                    <a href="{{route('pca')}}">PCA</a>
                    <a href="{{route('netcomp')}}">Net Comp</a>
                    <a href="{{route('cspc')}}">CSPC</a>
                    <a href="{{route('webdev')}}">Web Dev</a>
                    <a href="{{route('animation')}}">Animation</a>
                </div>
            </li>
            <li><a href="#">Acara</a></li>
            <li><a href="#">Info</a></li>
            <li class="divider">|</li>

            @if ((!Auth::check()) && (!Auth::guard('admin')->check()))
            <li><a href="{{route('register')}}">Register</a></li>
            <li><a href="{{route('login')}}">Login</a></li>
            @endif

            @auth('web')
            <li class="dinamik-dropdown user" tabindex="-1">
                <span>
                    {{Auth::user()->username}}
                    <i class="fas fa-chevron-down"></i>
                </span>
                <div class="dinamik-dropdown-menu">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth

            @auth('admin')
            <li class="dinamik-dropdown user" tabindex="-1">
                <span>
                    {{Auth::guard('admin')->user()->username}}
                    <i class="fas fa-chevron-down"></i>
                </span>
                <div class="dinamik-dropdown-menu">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endauth
        </ul>
    </div>
</div>

<main>

    <section class="home-sections" id="abstraction-section">

        <div class="header-section">
            <div class="header-stroke header-animation">
                <span>About</span>
                <span>About</span>
                <span>About</span>
                <span>About</span>
                <span>About</span>
            </div>
        </div>

        <div class="dinamik-abstract">
            <p>
                Dies Natalis Ilmu Komputer ke-14 atau Dinamik 14 merupakan perayaan ulang tahun Keluarga Mahasiswa Ilmu
                Komputer yang ke 14
            </p>
            <p>
                Dinamik 14 bertujuan untuk menyosialisasikan dan memperkenalkan Departemen Ilmu Komputer Universitas
                Pendidikan Indonesia kepada segmentasi yang berbeda tergantung kepada rangkaian acara yang ada di
                Dinamik itu sendiri dan juga mengedukasi tiap-tiap individu yang akan mengikuti rangkaian acara tersebut
                tentang tema yang sedang diangkat dan berbeda tiap tahunnya.
            </p>
            <p>
                Dinamik 14 mengangkat tema utama tentang Society 5.0 yang artinya adalah suatu konsep masyarakat yang
                berpusat pada manusia (human-centered) dan berbasis teknologi (technology based)
            </p>
        </div>

    </section>

    <section class="home-sections" id="competition-section">

        <div class="header-section">
            <div class="header-stroke header-animation">
                <span>Competition</span>
                <span>Competition</span>
                <span>Competition</span>
                <span>Competition</span>
                <span>Competition</span>
            </div>
        </div>

        <div class="competition-slide owl-carousel">
            <a href="#">
                <div class="competition-container">
                    <img src="{{url('resources/img/Competition/pca.jpg')}}" alt="">
                    <span>PCA</span>
                </div>
            </a>
            <a href="#">
                <div class="competition-container">
                    <img src="{{url('resources/img/Competition/net_comp.jpg')}}" alt="">
                    <span>Network Competition</span>
                </div>
            </a>
            <a href="#">
                <div class="competition-container">
                    <img src="{{url('resources/img/Competition/cspc.jpg')}}" alt="">
                    <span>CSPC</span>
                </div>
            </a>
            <a href="#">
                <div class="competition-container">
                    <img src="{{url('resources/img/Competition/web.jpg')}}" alt="">
                    <span>Web Development</span>
                </div>
            </a>
            <a href="#">
                <div class="competition-container">
                    <img src="{{url('resources/img/Competition/animation.jpg')}}" alt="">
                    <span>Animmation Contest</span>
                </div>
            </a>
        </div>

        <div class="competition-button-group">
            <div class="competition-prev">
                <button id="prev-competition-carousel">
                    <i class="fas fa-chevron-circle-left"></i>
                </button>
            </div>
            <div class="competition-next">
                <button id="next-competition-carousel">
                    <i class="fas fa-chevron-circle-right"></i>
                </button>
            </div>
        </div>

    </section>

    <section class="home-sections" id="timeline-section">
        <div class="header-section">
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
                            <span class="time">30 November 2019</span>
                            <span class="agenda">Final</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/parallax.js')}}"></script>
<script src="{{url('resources/js/owl-carousel.js')}}"></script>

@endsection