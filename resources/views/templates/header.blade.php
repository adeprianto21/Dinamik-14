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