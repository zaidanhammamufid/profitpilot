<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">

    <title>@yield('title', 'ProfitPilot — Admin Panel')</title>

    @include('partials.favicon')

    <link rel="stylesheet" href="{{ asset('css/Admin/layout.css') }}">

    @stack('styles')
</head>

<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="container">

    @include('admin.partials.sidebar')

    <main class="content">

        <header class="topbar">

            <div class="topbar-left">

                <button type="button" class="menu-toggle"
                        onclick="toggleSidebar()" aria-label="Buka atau lipat menu">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M4 6H20M4 12H20M4 18H20"/>
                    </svg>
                </button>

                <div>
                    <p class="topbar-label">ADMIN PANEL</p>
                    <h1>@yield('page-title', 'Dashboard')</h1>
                </div>

            </div>

            @php
                $adminName = Auth::user()->nama_toko ?: 'Admin';
            @endphp

            <div class="topbar-actions">
                @yield('topbar-actions')

                @unless (request()->routeIs('admin.profil'))
                    <a href="{{ route('admin.profil') }}"
                       class="admin-profile-link"
                       title="Profil Admin"
                       aria-label="Buka profil admin">
                        <span class="admin-profile-avatar">
                            {{ strtoupper(substr($adminName, 0, 1)) }}
                        </span>

                        <span class="admin-profile-copy">
                            <strong>{{ $adminName }}</strong>
                            <small>Administrator</small>
                        </span>
                    </a>
                @endunless
            </div>

        </header>

        @yield('content')

    </main>

</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('active');
            document.body.classList.toggle('sidebar-open');
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }
    }
</script>

@stack('scripts')

</body>
</html>
