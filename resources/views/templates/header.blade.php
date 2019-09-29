<header class="header" id="header-top">

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
                    <li class="dinamik-dropdown" tabindex="-1">
                        <span>
                            Competition
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <div class="dinamik-dropdown-menu">
                            <a href="#">PCA</a>
                            <a href="#">Net Comp</a>
                            <a href="#">CSPC</a>
                            <a href="#">Web Dev</a>
                            <a href="#">Animation</a>
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
    </nav>
</header>