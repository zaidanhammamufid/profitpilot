<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">

    <title>Dashboard Admin - ProfitPilot</title>

    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="container">

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

            <a href="{{ url('/admin/dashboard') }}" class="menu-link active" title="Dashboard">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="8" height="8" rx="2"/>
                    <rect x="13" y="3" width="8" height="5" rx="2"/>
                    <rect x="13" y="10" width="8" height="11" rx="2"/>
                    <rect x="3" y="13" width="8" height="8" rx="2"/>
                </svg>
                <span class="nav-text">Dashboard</span>
            </a>

            <a href="{{ route('admin.users') }}" class="menu-link" title="Data Users">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21V19C16 16.8 14.2 15 12 15H6C3.8 15 2 16.8 2 19V21"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M20 21V19C20 17.2 18.8 15.7 17 15.2"/>
                    <path d="M16 3.2C17.8 3.7 19 5.2 19 7C19 8.8 17.8 10.3 16 10.8"/>
                </svg>
                <span class="nav-text">Data Users</span>
            </a>

            <a href="{{ route('admin.profil') }}" class="menu-link" title="Profil">
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
                    <h1>Dashboard</h1>
                </div>

            </div>

        </header>

        <section class="page-intro">
            <h2>Selamat Datang, Admin!</h2>
            <p>
                Kelola data pengguna dan pantau informasi
                ProfitPilot melalui halaman administrasi.
            </p>
        </section>

        <section class="statistics">

            <div class="stat-card">

                <div class="stat-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21V19C16 16.8 14.2 15 12 15H6C3.8 15 2 16.8 2 19V21"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M20 21V19C20 17.2 18.8 15.7 17 15.2"/>
                        <path d="M16 3.2C17.8 3.7 19 5.2 19 7C19 8.8 17.8 10.3 16 10.8"/>
                    </svg>
                </div>

                <div class="stat-info">
                    <p>Total User Terdaftar</p>
                    <h2>{{ $totalUser }}</h2>
                    <small>Jumlah seluruh pengguna ProfitPilot</small>
                </div>

            </div>

        </section>

        <section class="quick-section">

            <h3>Akses Cepat</h3>

            <div class="quick-card">

                <div>
                    <h4>Kelola Data Users</h4>
                    <p>Lihat dan kelola akun pengguna ProfitPilot.</p>
                </div>

                <a href="{{ route('admin.users') }}" class="quick-button">
                    Lihat Users

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12H19"/>
                        <path d="M12 5L19 12L12 19"/>
                    </svg>
                </a>

            </div>

        </section>

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
</body>
</html>
