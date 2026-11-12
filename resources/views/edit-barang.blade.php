<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">
    <title>ProfitPilot - Edit Barang</title>
    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="container">

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}" class="logo">
                <span class="logo-icon">
                    <svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Logo ProfitPilot">
                        <rect x="5" y="39" width="9" height="17" rx="2" fill="#0F2A43"/>
                        <rect x="18" y="30" width="9" height="26" rx="2" fill="#0F2A43"/>
                        <rect x="31" y="21" width="9" height="35" rx="2" fill="#0F2A43"/>
                        <path d="M7 31 L21 22 L34 24 L45 13"
                              fill="none" stroke="#FFFFFF" stroke-width="3.5"
                              stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M43 12 L59 3 L53 19 L48 16 L44 22 L41 20 L44 14 Z"
                              fill="#FFFFFF" stroke="#FFFFFF" stroke-width="1"
                              stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="logo-text">Profit<span class="brand-accent">Pilot</span></span>
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
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
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
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
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
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
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
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
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
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
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

    <main class="content">

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
                    <h1>Edit Barang</h1>
                    <p>Perbarui informasi barang bisnis kamu.</p>
                </div>
            </div>

            <div class="account">
                <button type="button" class="account-button"
                        onclick="toggleAccount()" aria-expanded="false">
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

        <section class="page-heading">
            <div>
                <span class="eyebrow">MANAJEMEN INVENTARIS</span>
                <h2>Edit Barang</h2>
                <p>Ubah nama, harga, atau stok barang kamu.</p>
            </div>
        </section>

        @if ($errors->any())
            <div class="error-message">
                <svg viewBox="0 0 24 24" width="20" height="20"
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 8v4M12 16h.01"/>
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <section class="form-card">

            <div class="section-heading">
                <span class="section-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                        <path d="M12 8v8M8 12h8"/>
                    </svg>
                </span>

                <div>
                    <h2>Edit Data Barang</h2>
                    <p>Perbarui informasi barang yang kamu miliki.</p>
                </div>
            </div>

            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">

                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input
                            type="text"
                            id="nama_barang"
                            name="nama_barang"
                            value="{{ old('nama_barang', $barang->nama_barang) }}"
                            placeholder="Contoh: Buku Tulis"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Satuan (Rp)</label>
                        <input
                            type="number"
                            id="harga"
                            name="harga"
                            value="{{ old('harga', $barang->harga) }}"
                            min="1"
                            step="1"
                            placeholder="Contoh: 10000"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok Barang</label>
                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            value="{{ old('stok', $barang->stok) }}"
                            min="0"
                            step="1"
                            placeholder="Jumlah stok barang"
                            required>
                    </div>

                </div>

                <div class="form-actions">
                    <a href="{{ route('barang.index') }}" class="cancel-button">
                        Batal
                    </a>

                    <button type="submit" class="primary-button">
                        <svg viewBox="0 0 24 24" width="18" height="18"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12l4 4L19 6"/>
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </section>

        <footer class="page-footer">
            ProfitPilot &copy; {{ date('Y') }} · Kelola bisnis lebih terarah.
        </footer>

    </main>
</div>

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
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const accountMenu = document.getElementById('accountMenu');
        const accountButton = document.querySelector('.account-button');

        window.toggleSidebar = function () {
            if (!sidebar) return;

            if (window.innerWidth <= 850) {
                const isOpen = sidebar.classList.toggle('open');

                if (overlay) {
                    overlay.classList.toggle('show', isOpen);
                }
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        };

        window.toggleAccount = function () {
            if (!accountMenu || !accountButton) return;

            const isOpen = accountMenu.classList.toggle('show');
            accountButton.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        };

        document.addEventListener('click', function (event) {
            if (
                accountMenu &&
                accountButton &&
                !accountMenu.contains(event.target) &&
                !accountButton.contains(event.target)
            ) {
                accountMenu.classList.remove('show');
                accountButton.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                if (sidebar && sidebar.classList.contains('open')) {
                    sidebar.classList.remove('open');

                    if (overlay) {
                        overlay.classList.remove('show');
                    }
                }

                if (accountMenu && accountButton) {
                    accountMenu.classList.remove('show');
                    accountButton.setAttribute('aria-expanded', 'false');
                }
            }
        });
    });
</script>

</body>
</html>
