<nav class="nav-side-bar">
    <div class="nav-side-brand">
        <a href="{{route('home')}}">
            <img src="{{url('resources/img/Parallax/layer3.png')}}" alt="">
        </a>
    </div>
    <div class="username-bar">
        <span>{{Auth::user()->username}}</span>
    </div>
    <div class="nav-side-list-container">
        <ul class="nav-side-list">
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard') active @endif">
                <a href="{{route('dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard/profile') active @endif">
                <a href="{{route('dashboard.profile')}}">Profile</a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard/competition') active @endif">
                <a href="{{route('dashboard')}}">Sumbit Karya</a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard/payment') active @endif">
                <a href="{{route('dashboard')}}">Payment</a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard/logout') active @endif">
                <a href="{{route('dashboard')}}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<header class="dashboard-header">
    <div class="header-container">
        <div>
            <span class="team-name">
                Dynamic Team
            </span>
            <span class="team-competition">
                Lomba Cipta Animasi
            </span>
        </div>
        <div class="back-home-section">
            <a href="{{route('home')}}">
                <div class="symbol-back">
                    &#60;
                </div>
                <div class="message-back">
                    Kembali Ke Website
                </div>
            </a>
        </div>
    </div>
</header>