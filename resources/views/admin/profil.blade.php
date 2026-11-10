<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>Profil Admin - ProfitPilot</title>
    <link rel="stylesheet" href="{{ asset('css/admin/profil.css') }}">
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="admin-layout">

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 40 40" fill="none">
                        <rect x="5" y="22" width="6" height="13" rx="2" fill="white"/>
                        <rect x="16" y="15" width="6" height="20" rx="2" fill="white"/>
                        <rect x="27" y="7" width="6" height="28" rx="2" fill="white"/>
                        <path d="M7 17L17 10L24 13L34 4"
                              stroke="#A5F3FC"
                              stroke-width="2.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>
                    </svg>
                </div>

                <h2>Profit<span>Pilot</span></h2>
            </div>

            <button type="button" class="sidebar-close" id="sidebarClose" aria-label="Tutup menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m18 6-12 12M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <nav class="sidebar-menu">
            <a href="{{ url('/admin/dashboard') }}" class="menu-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-6v-7h-4v7H4a1 1 0 0 1-1-1z"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.users') }}" class="menu-link">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="10" cy="7" r="4"/>
                    <path d="M20 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <span>Data Users</span>
            </a>

            <a href="{{ route('admin.profil') }}" class="menu-link active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                </svg>
                <span>Profil</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-link">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M10 17l5-5-5-5M15 12H3"/>
                        <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"/>
                    </svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">

        <header class="topbar">
            <button type="button" class="sidebar-toggle" id="sidebarToggle" aria-label="Buka menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <div class="topbar-title">
                <span>Admin Panel</span>
                <h1>Profil Admin</h1>
            </div>
        </header>

        <section class="page-content">
            <div class="page-heading">
                <h2>Informasi Profil</h2>
                <p>Informasi akun administrator ProfitPilot.</p>
            </div>

            <div class="profile-card">

                <div class="profile-header">
                    <div class="profile-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                        </svg>
                    </div>

                    <div>
                        <h3>{{ $admin->nama_toko }}</h3>
                        <p>Administrator ProfitPilot</p>
                    </div>
                </div>

                <div class="profile-divider"></div>

                <div class="profile-details">
                    <div class="detail-item">
                        <div class="detail-label">Nama Admin</div>
                        <div class="detail-value">{{ $admin->nama_toko }}</div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Role</div>
                        <div class="detail-value">
                            <span class="role-badge">Administrator</span>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-label">Tanggal Dibuat</div>
                        <div class="detail-value">
                            {{ $admin->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                </div>

                <div class="profile-actions">
                    <a href="{{ url('/admin/dashboard') }}" class="back-button">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="m15 18-6-6 6-6"/>
                        </svg>
                        Kembali ke Dashboard
                    </a>
                </div>

            </div>
        </section>

    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggle = document.getElementById('sidebarToggle');
    const close = document.getElementById('sidebarClose');

    function openSidebar() {
        sidebar.classList.add('show');
        overlay.classList.add('show');
    }

    function closeSidebar() {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
    }

    toggle.addEventListener('click', openSidebar);
    close.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
</script>

</body>
</html>
