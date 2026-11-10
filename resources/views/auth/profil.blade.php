<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>ProfitPilot - Profil Saya</title>

    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">

    <style>
        /* KHUSUS HALAMAN PROFIL */

        .profile-card {
            max-width: 760px;
            margin: 0 auto;
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(37,99,166,.06);
            overflow: hidden;
        }

        .profile-banner {
            height: 115px;
            position: relative;
            background: linear-gradient(120deg, #2563A6, #1D4F91);
        }

        .profile-avatar {
            position: absolute;
            left: 30px;
            bottom: -35px;
            width: 76px;
            height: 76px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FFFFFF;
            border: 5px solid #FFFFFF;
            border-radius: 18px;
            color: #2563A6;
            box-shadow: 0 4px 12px rgba(37,99,166,.12);
        }

        .profile-avatar svg {
            width: 36px;
            height: 36px;
        }

        .profile-main {
            padding: 48px 30px 30px;
        }

        .profile-name {
            margin: 0;
            color: #2563A6;
            font-size: 22px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        .profile-caption {
            margin-top: 6px;
            color: #64748B;
            font-size: 13px;
        }

        .profile-section-heading {
            margin: 30px 0 17px;
            padding-bottom: 13px;
            border-bottom: 1px solid #E2E8F0;
            color: #2563A6;
            font-size: 15px;
            font-weight: 700;
        }

        .profile-info {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .info-item {
            min-width: 0;
            padding: 18px;
            border: 1px solid #E2E8F0;
            border-radius: 11px;
            background: #F8FAFC;
        }

        .info-label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 12px;
            color: #64748B;
            font-size: 12px;
            font-weight: 600;
        }

        .info-label svg {
            width: 17px;
            height: 17px;
            color: #06B6D4;
            flex-shrink: 0;
        }

        .info-item strong {
            display: block;
            color: #1E293B;
            font-size: 15px;
            overflow-wrap: anywhere;
        }

        .password-value {
            letter-spacing: 2px;
        }

        .profile-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 27px;
            padding-top: 22px;
            border-top: 1px solid #E2E8F0;
        }

        .profile-edit-button,
        .profile-back-button {
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 0 19px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .profile-edit-button {
            background: #2563A6;
            color: #FFFFFF;
        }

        .profile-edit-button:hover {
            background: #1D4F91;
            transform: translateY(-1px);
        }

        .profile-back-button {
            background: #FFFFFF;
            color: #64748B;
            border: 1px solid #E2E8F0;
        }

        .profile-back-button:hover {
            background: #F8FAFC;
            color: #2563A6;
        }

        .profile-buttons svg {
            width: 17px;
            height: 17px;
            flex-shrink: 0;
        }

        @media (max-width: 550px) {
            .profile-banner {
                height: 100px;
            }

            .profile-avatar {
                left: 20px;
                width: 70px;
                height: 70px;
            }

            .profile-main {
                padding: 45px 18px 22px;
            }

            .profile-name {
                font-size: 19px;
            }

            .profile-info {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .profile-buttons {
                flex-direction: column;
            }

            .profile-edit-button,
            .profile-back-button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}" class="logo">
                <span class="logo-icon">
                    <svg viewBox="0 0 64 64"
                         xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Logo ProfitPilot">
                        <rect x="5" y="39" width="9" height="17"
                              rx="2" fill="#2563A6"/>
                        <rect x="18" y="30" width="9" height="26"
                              rx="2" fill="#2563A6"/>
                        <rect x="31" y="21" width="9" height="35"
                              rx="2" fill="#2563A6"/>

                        <path d="M7 31 L21 22 L34 24 L45 13"
                              fill="none" stroke="#FFFFFF"
                              stroke-width="3.5" stroke-linecap="round"
                              stroke-linejoin="round"/>

                        <path d="M43 12 L59 3 L53 19 L48 16 L44 22 L41 20 L44 14 Z"
                              fill="#FFFFFF" stroke="#FFFFFF"
                              stroke-width="1" stroke-linejoin="round"/>
                    </svg>
                </span>

                <span class="logo-text">
                    Profit<span class="brand-accent">Pilot</span>
                </span>
            </a>

            <button type="button" class="sidebar-close"
                    onclick="toggleSidebar()" aria-label="Tutup menu">
                <svg viewBox="0 0 24 24" width="20" height="20"
                     fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round">
                    <path d="M18 6 6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <p class="nav-label">MENU UTAMA</p>

        <nav class="sidebar-nav">

            <a href="{{ url('/dashboard') }}"
               class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
               title="Dashboard">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" width="21" height="21"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m3 10 9-7 9 7"/>
                        <path d="M5 9v12h14V9"/>
                        <path d="M9 21v-7h6v7"/>
                    </svg>
                </span>
                <span class="nav-text">Dashboard</span>
            </a>

            <a href="{{ url('/transaksi') }}"
               class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}"
               title="Transaksi">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" width="21" height="21"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M7 7h14l-4-4"/>
                        <path d="M21 7l-4 4"/>
                        <path d="M17 17H3l4 4"/>
                        <path d="m3 17 4-4"/>
                    </svg>
                </span>
                <span class="nav-text">Transaksi</span>
            </a>

            <a href="{{ url('/barang') }}"
               class="nav-link {{ request()->is('barang*') ? 'active' : '' }}"
               title="Data Barang">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" width="21" height="21"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </span>
                <span class="nav-text">Data Barang</span>
            </a>

            <a href="{{ url('/omzet') }}"
               class="nav-link {{ request()->is('omzet*') ? 'active' : '' }}"
               title="Omzet">
                <span class="nav-icon">
                    <svg viewBox="0 0 24 24" width="21" height="21"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 3v18h18"/>
                        <path d="m7 14 4-4 4 3 6-7"/>
                    </svg>
                </span>
                <span class="nav-text">Omzet</span>
            </a>

        </nav>

        <div class="sidebar-bottom">

            <a href="{{ url('/profil') }}" class="profile-link">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->nama_toko, 0, 1)) }}
                </div>

                <div class="user-info">
                    <strong>{{ Auth::user()->nama_toko }}</strong>
                    <small>Pengguna ProfitPilot</small>
                </div>
            </a>

            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf

                <button type="submit" class="logout">
                    <span class="nav-icon">
                        <svg viewBox="0 0 24 24" width="21" height="21"
                             fill="none" stroke="currentColor"
                             stroke-width="1.8" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M10 17l5-5-5-5"/>
                            <path d="M15 12H3"/>
                            <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"/>
                        </svg>
                    </span>
                    <span class="nav-text">Logout</span>
                </button>
            </form>

        </div>

    </aside>

    <!-- CONTENT -->
    <main class="content">

        <!-- TOPBAR -->
        <header class="topbar">

            <div class="topbar-left">
                <button type="button" class="menu-toggle"
                        onclick="toggleSidebar()" aria-label="Buka atau lipat menu">
                    <svg viewBox="0 0 24 24" width="23" height="23"
                         fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div>
                    <h1>Profil Saya</h1>
                    <p>Informasi akun toko kamu.</p>
                </div>
            </div>

            <div class="account">
                <button type="button" class="account-button"
                        onclick="toggleAccount()"
                        aria-expanded="false">
                    <span class="account-avatar">
                        {{ strtoupper(substr(Auth::user()->nama_toko, 0, 1)) }}
                    </span>

                    <span class="account-name">
                        {{ Auth::user()->nama_toko }}
                    </span>

                    <span class="account-arrow">
                        <svg viewBox="0 0 24 24" width="16" height="16"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"/>
                        </svg>
                    </span>
                </button>

                <div id="accountMenu" class="account-menu">
                    <a href="{{ url('/profil') }}">Profil Saya</a>
                </div>
            </div>

        </header>

        <!-- PAGE HEADING -->
        <section class="page-heading">
            <div>
                <span class="eyebrow">PENGATURAN AKUN</span>
                <h2>Profil Saya</h2>
                <p>Lihat informasi akun dan identitas toko kamu.</p>
            </div>
        </section>

        <!-- PROFILE CARD -->
        <section class="profile-card">

            <div class="profile-banner">

                <div class="profile-avatar">
                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                    </svg>
                </div>

            </div>

            <div class="profile-main">

                <h2 class="profile-name">
                    {{ $user->nama_toko }}
                </h2>

                <p class="profile-caption">
                    Akun pengguna ProfitPilot
                </p>

                <h3 class="profile-section-heading">
                    Informasi Akun
                </h3>

                <div class="profile-info">

                    <!-- NAMA TOKO -->
                    <div class="info-item">

                        <div class="info-label">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21h18"/>
                                <path d="M5 21V7l8-4 6 4v14"/>
                                <path d="M9 21v-6h6v6"/>
                            </svg>
                            Nama Toko
                        </div>

                        <strong>{{ $user->nama_toko }}</strong>

                    </div>

                    <!-- PASSWORD -->
                    <div class="info-item">

                        <div class="info-label">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2"/>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            Password
                        </div>

                        <strong class="password-value">
                            ••••••••
                        </strong>

                    </div>

                    <!-- TANGGAL DAFTAR -->
                    <div class="info-item">

                        <div class="info-label">
                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="17" rx="2"/>
                                <path d="M16 2v4M8 2v4M3 10h18"/>
                            </svg>
                            Tanggal Daftar
                        </div>

                        <strong>
                            {{ $user->created_at->format('d-m-Y') }}
                        </strong>

                    </div>

                </div>

                <!-- BUTTONS -->
                <div class="profile-buttons">

                    <a href="{{ route('profil.edit') }}" class="profile-edit-button">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"/>
                        </svg>
                        Edit Profil
                    </a>

                    <a href="{{ url('/dashboard') }}" class="profile-back-button">
                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"/>
                            <path d="M9 12h12"/>
                        </svg>
                        Kembali ke Dashboard
                    </a>

                </div>

            </div>

        </section>

        <footer class="page-footer">
            ProfitPilot &copy; {{ date('Y') }} · Kelola bisnis lebih terarah.
        </footer>

    </main>

</div>

<!-- NAVIGASI BAWAH MOBILE -->
<nav class="mobile-bottom-nav">

    <a href="{{ url('/dashboard') }}"
       class="{{ request()->is('dashboard') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="21" height="21"
             fill="none" stroke="currentColor" stroke-width="1.8"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="m3 10 9-7 9 7"/>
            <path d="M5 9v12h14V9"/>
            <path d="M9 21v-7h6v7"/>
        </svg>
        <span>Dashboard</span>
    </a>

    <a href="{{ url('/transaksi') }}"
       class="{{ request()->is('transaksi*') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="21" height="21"
             fill="none" stroke="currentColor" stroke-width="1.8"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M7 7h14l-4-4"/>
            <path d="M21 7l-4 4"/>
            <path d="M17 17H3l4 4"/>
            <path d="m3 17 4-4"/>
        </svg>
        <span>Transaksi</span>
    </a>

    <a href="{{ url('/barang') }}"
       class="{{ request()->is('barang*') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="21" height="21"
             fill="none" stroke="currentColor" stroke-width="1.8"
             stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="7" height="7" rx="1"/>
            <rect x="14" y="3" width="7" height="7" rx="1"/>
            <rect x="3" y="14" width="7" height="7" rx="1"/>
            <rect x="14" y="14" width="7" height="7" rx="1"/>
        </svg>
        <span>Barang</span>
    </a>

    <a href="{{ url('/omzet') }}"
       class="{{ request()->is('omzet*') ? 'active' : '' }}">
        <svg viewBox="0 0 24 24" width="21" height="21"
             fill="none" stroke="currentColor" stroke-width="1.8"
             stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 3v18h18"/>
            <path d="m7 14 4-4 4 3 6-7"/>
        </svg>
        <span>Omzet</span>
    </a>

</nav>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");

    if (!sidebar) return;

    if (window.innerWidth <= 850) {
        const isOpen = sidebar.classList.toggle("open");

        if (overlay) {
            overlay.classList.toggle("show", isOpen);
        }
    } else {
        document.body.classList.toggle("sidebar-collapsed");
    }
}

function toggleAccount() {
    const menu = document.getElementById("accountMenu");
    const button = document.querySelector(".account-button");

    if (!menu || !button) return;

    const isOpen = menu.classList.toggle("show");
    button.setAttribute("aria-expanded", isOpen);
}

document.addEventListener("click", function(event) {
    const account = document.querySelector(".account");
    const menu = document.getElementById("accountMenu");
    const button = document.querySelector(".account-button");

    if (account && !account.contains(event.target) && menu) {
        menu.classList.remove("show");

        if (button) {
            button.setAttribute("aria-expanded", "false");
        }
    }
});

document.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        const menu = document.getElementById("accountMenu");
        const button = document.querySelector(".account-button");

        if (menu) menu.classList.remove("show");

        if (button) {
            button.setAttribute("aria-expanded", "false");
        }
    }
});
</script>

</body>
</html>
