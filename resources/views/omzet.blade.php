<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">
    <title>ProfitPilot - Omzet</title>
    <link rel="stylesheet" href="{{ asset('css/omzet.css') }}">
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
                     fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round">
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
                         fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <div>
                    <h1>Omzet</h1>
                    <p>Pantau pemasukan, pengeluaran, dan perkembangan bisnis kamu.</p>
                </div>
            </div>

            <div class="account">
                <button type="button" class="account-button"
                        onclick="toggleAccount()"
                        aria-expanded="false" id="accountButton">
                    <span class="account-avatar">
                        {{ strtoupper(substr(Auth::user()->nama_toko, 0, 1)) }}
                    </span>
                    <span class="account-name">{{ Auth::user()->nama_toko }}</span>
                    <span class="account-arrow">
                        <svg viewBox="0 0 24 24" width="16" height="16"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round">
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
                <span class="eyebrow">LAPORAN KEUANGAN</span>
                <h2>Ringkasan Omzet</h2>
                <p>Lihat ringkasan keuangan dan perkembangan omzet bisnis kamu.</p>
            </div>
        </section>

        <section class="summary">
            <article class="summary-card pemasukan">
                <div class="summary-top">
                    <span class="summary-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 19V5"/>
                            <path d="m5 12 7-7 7 7"/>
                            <path d="M4 21h16"/>
                        </svg>
                    </span>
                    <span class="summary-label">TOTAL PEMASUKAN</span>
                </div>
                <h2>Rp {{ number_format($pemasukan, 0, ',', '.') }}</h2>
                <p>Jumlah seluruh pemasukan aktif</p>
            </article>

            <article class="summary-card pengeluaran">
                <div class="summary-top">
                    <span class="summary-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"/>
                            <path d="m5 12 7 7 7-7"/>
                            <path d="M4 3h16"/>
                        </svg>
                    </span>
                    <span class="summary-label">TOTAL PENGELUARAN</span>
                </div>
                <h2>Rp {{ number_format($pengeluaran, 0, ',', '.') }}</h2>
                <p>Jumlah seluruh pengeluaran aktif</p>
            </article>

            <article class="summary-card omzet">
                <div class="summary-top">
                    <span class="summary-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24"
                             fill="none" stroke="currentColor" stroke-width="1.8"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18"/>
                            <path d="m7 14 4-4 4 3 6-7"/>
                        </svg>
                    </span>
                    <span class="summary-label">TOTAL OMZET</span>
                </div>
                <h2>Rp {{ number_format($omzet, 0, ',', '.') }}</h2>
                <p>Pemasukan dikurangi pengeluaran</p>
            </article>
        </section>

        <section class="chart-card">
            <div class="section-heading">
                <span class="section-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 3v18h18"/>
                        <path d="m7 14 4-4 4 3 6-7"/>
                    </svg>
                </span>
                <div>
                    <h2>Grafik Omzet Mingguan</h2>
                    <p>Perkembangan pemasukan, pengeluaran, dan omzet per minggu.</p>
                </div>
            </div>
            <div class="grafik-container" id="grafikContainer">
                <canvas id="grafikOmzet"></canvas>
            </div>
        </section>

        <section class="table-card">
            <div class="section-heading">
                <span class="section-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22"
                         fill="none" stroke="currentColor" stroke-width="1.8"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 5h16M4 12h16M4 19h16"/>
                        <circle cx="7" cy="5" r="1"/>
                        <circle cx="7" cy="12" r="1"/>
                        <circle cx="7" cy="19" r="1"/>
                    </svg>
                </span>
                <div>
                    <h2>Riwayat Omzet Mingguan</h2>
                    <p>Rincian pemasukan dan pengeluaran setiap minggu.</p>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Minggu</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                            <th>Omzet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mingguan as $data)
                            <tr>
                                <td>{{ $data['minggu'] }}</td>
                                <td class="income-cell">
                                    Rp {{ number_format($data['pemasukan'], 0, ',', '.') }}
                                </td>
                                <td class="expense-cell">
                                    Rp {{ number_format($data['pengeluaran'], 0, ',', '.') }}
                                </td>
                                <td class="omzet-cell">
                                    Rp {{ number_format($data['omzet'], 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    <span class="empty-icon">
                                        <svg viewBox="0 0 24 24" width="32" height="32"
                                             fill="none" stroke="currentColor"
                                             stroke-width="1.6" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="17" rx="2"/>
                                            <path d="M16 2v4M8 2v4M3 10h18"/>
                                        </svg>
                                    </span>
                                    <strong>Belum ada data omzet</strong>
                                    <span>Data akan tampil setelah ada transaksi.</span>
                                </td>
                            </tr>
                        @endforelse

                        @if ($mingguan->count() > 0)
                            <tr class="total-row">
                                <td>TOTAL</td>
                                <td>Rp {{ number_format($pemasukan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($pengeluaran, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($omzet, 0, ',', '.') }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
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
            <path d="M7 7h14l-4-4M21 7l-4 4M17 17H3l4 4m-4-4 4-4"/>
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
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (!sidebar) return;

        if (window.innerWidth <= 850) {
            const isOpen = sidebar.classList.toggle('open');
            if (overlay) overlay.classList.toggle('show', isOpen);
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }
    }

    function toggleAccount() {
        const menu = document.getElementById('accountMenu');
        const button = document.getElementById('accountButton');

        if (!menu || !button) return;

        const isOpen = menu.classList.toggle('show');
        button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }

    document.addEventListener('click', function (event) {
        const account = document.querySelector('.account');
        const menu = document.getElementById('accountMenu');
        const button = document.getElementById('accountButton');

        if (account && menu && !account.contains(event.target)) {
            menu.classList.remove('show');
            if (button) button.setAttribute('aria-expanded', 'false');
        }
    });
</script>

<script>
    const dataMingguan = @json($mingguan);
</script>
<script src="{{ asset('js/omzet.js') }}"></script>

</body>
</html>
