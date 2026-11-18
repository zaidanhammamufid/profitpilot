@php
    $isDashboard = request()->routeIs('admin.dashboard');
    $isUsers = request()->routeIs('admin.users') || request()->routeIs('admin.user.*');
    $isProfil = request()->routeIs('admin.profil');
@endphp

<aside class="sidebar" id="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <svg viewBox="0 0 40 40" fill="none">
                <rect x="5" y="22" width="6" height="13" rx="2" fill="white"/>
                <rect x="16" y="15" width="6" height="20" rx="2" fill="white"/>
                <rect x="27" y="7" width="6" height="28" rx="2" fill="white"/>
                <path d="M7 17L17 10L24 13L34 4" stroke="#A5F3FC" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <h2 class="brand-text">Profit<span>Pilot</span></h2>

        <button type="button" class="sidebar-close"
                onclick="toggleSidebar()" aria-label="Tutup menu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M18 6L6 18M6 6L18 18"/>
            </svg>
        </button>
    </div>

    <p class="menu-label">MENU UTAMA</p>

    <nav class="sidebar-nav">

        <a href="{{ route('admin.dashboard') }}"
           class="menu-link {{ $isDashboard ? 'active' : '' }}"
           title="Dashboard">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="8" height="8" rx="2"/>
                <rect x="13" y="3" width="8" height="5" rx="2"/>
                <rect x="13" y="10" width="8" height="11" rx="2"/>
                <rect x="3" y="13" width="8" height="8" rx="2"/>
            </svg>
            <span class="nav-text">Dashboard</span>
        </a>

        <a href="{{ route('admin.users') }}"
           class="menu-link {{ $isUsers ? 'active' : '' }}"
           title="Data Users">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21V19C16 16.8 14.2 15 12 15H6C3.8 15 2 16.8 2 19V21"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M20 21V19C20 17.2 18.8 15.7 17 15.2"/>
                <path d="M16 3.2C17.8 3.7 19 5.2 19 7C19 8.8 17.8 10.3 16 10.8"/>
            </svg>
            <span class="nav-text">Data Users</span>
        </a>

        <a href="{{ route('admin.profil') }}"
           class="menu-link {{ $isProfil ? 'active' : '' }}"
           title="Profil">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="4"/>
                <path d="M4 21C4 16.6 7.6 13 12 13C16.4 13 20 16.6 20 21"/>
            </svg>
            <span class="nav-text">Profil</span>
        </a>

    </nav>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-link" title="Logout">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 17L15 12L10 7"/>
                    <path d="M15 12H3"/>
                    <path d="M12 3H19C20.1 3 21 3.9 21 5V19C21 20.1 20.1 21 19 21H12"/>
                </svg>
                <span class="nav-text">Logout</span>
            </button>
        </form>
    </div>

</aside>
