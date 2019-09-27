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
        <div id="nav-menu-container">
            <div class="close-btn-group">
                <div class="bar1"></div>
                <div class="bar2"></div>
            </div>
            <div class="nav-dinamik-item" id="nav-item-list">
                <ul>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="dropdown">
                        <span>Competition</span>
                        <i class="fas fa-chevron-down"></i>
                        <div class="dropdown-menu">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </div>
                    </li>
                    <li><a href="#">Acara</a></li>
                    <li><a href="#">Info</a></li>
                    <li>|</li>

                    @if ((!Auth::check()) && (!Auth::guard('admin')->check()))
                    <li><a href="{{route('register')}}">Register</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                    @endif

                    @auth('web')
                    <li class="dropdown">
                        <span>
                            {{Auth::user()->username}}
                        </span>
                        <i class="fas fa-chevron-down"></i>
                        <div class="dropdown-menu">
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
                    <li class="dropdown">
                        <span>
                            {{Auth::guard('admin')->user()->username}}
                        </span>
                        <i class="fas fa-chevron-down"></i>
                        <div class="dropdown-menu">
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

<main>

    <section class="home-sections" id="abstraction-section">

        <div class="header-section">
            <div class="header-stroke header-animation">
                <span>about</span>
                <span>about</span>
                <span>about</span>
                <span>about</span>
                <span>about</span>
            </div>
        </div>

        <div class="dinamik-abstract">
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est ipsa recusandae id reiciendis placeat
                enim
                dolor optio, excepturi, veniam aliquid aliquam tempora reprehenderit illo deleniti ex! Saepe atque
                et
                doloribus!''
            </p>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est ipsa recusandae id reiciendis placeat
                enim
                dolor optio, excepturi, veniam aliquid aliquam tempora reprehenderit illo deleniti ex! Saepe atque
                et
                doloribus!''
            </p>
            <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est ipsa recusandae id reiciendis placeat
                enim
                dolor optio, excepturi, veniam aliquid aliquam tempora reprehenderit illo deleniti ex! Saepe atque
                et
                doloribus!''
            </p>
        </div>

    </section>

    <section class="home-sections" id="competition-section">

        <div class="header-section">
            <div class="header-stroke header-animation">
                <span>competition</span>
                <span>competition</span>
                <span>competition</span>
                <span>competition</span>
                <span>competition</span>
            </div>
        </div>

        <div class="competition-slide owl-carousel">
            <div class="competition-container">
                <img src="{{url('resources/img/Parallax/layer2.png')}}" alt="">
                <span>Lomba 1</span>
            </div>
            <div class="competition-container">
                <img src="{{url('resources/img/Parallax/layer2.png')}}" alt="">
                <span>Lomba 2</span>
            </div>
            <div class="competition-container">
                <img src="{{url('resources/img/Parallax/layer2.png')}}" alt="">
                <span>Lomba 3</span>
            </div>
            <div class="competition-container">
                <img src="{{url('resources/img/Parallax/layer2.png')}}" alt="">
                <span>Lomba 4</span>
            </div>
            <div class="competition-container">
                <img src="{{url('resources/img/Parallax/layer2.png')}}" alt="">
                <span>Lomba 5</span>
            </div>
        </div>

        <div class="competition-button-group">
            <div class="competition-prev">
                <button id="prev-competition-carousel">
                    &#60;
                </button>
            </div>
            <div class="competition-next">
                <button id="next-competition-carousel">
                    &#62;
                </button>
            </div>
        </div>

    </section>

</main>

@include('templates.footer')

@endsection

@section('script')

<script src="{{url('resources/js/owl-carousel.js')}}"></script>
<script src="{{url('resources/js/parallax.js')}}"></script>

@endsection