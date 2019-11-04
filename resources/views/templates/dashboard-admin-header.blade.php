<nav class="nav-side-bar" tabindex="-1">
    <div class="nav-side-brand">
        <a href="{{route('home')}}">
            <img src="https://i.ibb.co/0Ymq7qy/layer3.png" alt="">
        </a>
    </div>
    <div class="hide-dashboard">
        <i class="fas fa-times"></i>
    </div>
    <div class="username-bar">
        <span>{{Auth::guard('admin')->user()->name}}</span>
    </div>
    <div class="nav-side-list-container">
        <ul class="nav-side-list">
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'admin') active @endif">
                <a href="{{route('admin')}}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-side-list-item @if(strstr(Route::currentRouteName(), 'admin.team')) active @endif">
                <a href="{{route('admin.teams')}}">
                    <i class="fas fa-users"></i>
                    <span>Teams</span>
                </a>
            </li>
            <li class="nav-side-list-item @if(strstr(Route::currentRouteName(), 'admin.karya')) active @endif">
                <a href="{{route('admin.karya')}}">
                    <i class="fas fa-file-upload"></i>
                    <span>Karya Peserta</span>
                </a>
            </li>
            <li class="nav-side-list-item @if(strstr(Route::currentRouteName(), 'admin.payment')) active @endif">
                <a href="{{route('admin.payments')}}">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Payment</span>
                </a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard.logout') active @endif">
                <a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ __('Logout') }}</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="dashboard-fullscreen"></div>

<header class="dashboard-header">
    <div class="header-container">
        <div class="show-dashboard">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </div>
        <div class="team-info-section">
            <span class="team-name">
                {{Auth::guard('admin')->user()->name}}
            </span>
            <span class="team-competition">
                Dashboard Admin
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