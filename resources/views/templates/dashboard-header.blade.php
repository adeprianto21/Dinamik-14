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
        <span>{{Auth::user()->username}}</span>
    </div>
    <div class="nav-side-list-container">
        <ul class="nav-side-list">
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard') active @endif">
                <a href="{{route('dashboard')}}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard.profile') active @endif">
                <a href="{{route('dashboard.profile')}}">
                    <i class="fas fa-users"></i>
                    <span>Profile</span>
                </a>
            </li>
            @if (($team->competition_id != null) && ($team->competition_id == 4 || $team->competition_id == 5))
            <li class="nav-side-list-item @if(strstr(Route::currentRouteName(), 'dashboard.karya')) active @endif">
                <a href="{{route('dashboard.karya')}}">
                    <i class="fas fa-file-upload"></i>
                    <span>Submit Karya</span>
                </a>
            </li>
            @endif
            <li class="nav-side-list-item @if(strstr(Route::currentRouteName(), 'dashboard.payment')) active @endif">
                <a href="{{route('dashboard.payment')}}">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Payment</span>
                </a>
            </li>
            <li class="nav-side-list-item @if(Route::currentRouteName() == 'dashboard.logout') active @endif">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>{{ __('Logout') }}</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                @if ($team->nama_tim == null)
                No Team Name
                @else
                {{$team->nama_tim}}
                @endif
            </span>
            <span class="team-competition">
                @if ($team->competition_id == null)
                No Competition
                @else
                {{$team->competition->nama_competition}}
                @endif
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