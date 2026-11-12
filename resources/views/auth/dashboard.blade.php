<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">
    <title>ProfitPilot - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="container">

    <aside class="sidebar" id="sidebar">

        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}" class="logo">
                <span class="logo-icon">
                    <svg viewBox="0 0 64 64"
                         xmlns="http://www.w3.org/2000/svg"
                         role="img"
                         aria-label="Logo ProfitPilot">
                        <rect x="5" y="39" width="9" height="17"
                              rx="2" fill="#0F2A43"/>
                        <rect x="18" y="30" width="9" height="26"
                              rx="2" fill="#0F2A43"/>
                        <rect x="31" y="21" width="9" height="35"
                              rx="2" fill="#0F2A43"/>

                        <path d="M7 31 L21 22 L34 24 L45 13"
                              fill="none"
                              stroke="#FFFFFF"
                              stroke-width="3.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>

                        <path d="M43 12 L59 3 L53 19 L48 16 L44 22 L41 20 L44 14 Z"
                              fill="#FFFFFF"
                              stroke="#FFFFFF"
                              stroke-width="1"
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
            <div class="sidebar-user">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->nama_toko, 0, 1)) }}
                </div>

                <div class="user-info">
                    <strong>{{ Auth::user()->nama_toko }}</strong>
                    <small>Pengguna ProfitPilot</small>
                </div>
            </div>

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
                    ☰
                </button>

                <div>
                    <h1>Dashboard</h1>
                    <p>Ringkasan bisnis kamu hari ini.</p>
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

                    <span class="account-arrow">⌄</span>
                </button>

                <div id="accountMenu" class="account-menu">
                    <a href="{{ url('/profil') }}">Profil Saya</a>
                </div>
            </div>
        </header>

        <section class="welcome">
            <div class="welcome-content">
                <span class="welcome-label">RINGKASAN BISNIS</span>
                <h2>Selamat datang, {{ Auth::user()->nama_toko }}!</h2>
                <p>
                    Pantau pemasukan, pengeluaran, dan saldo bersih
                    bisnis kamu melalui ProfitPilot.
                </p>
            </div>

            <div class="welcome-decoration" aria-hidden="true">↗</div>
        </section>

        <section class="cards">

            <article class="card pemasukan">
                <div class="card-top">
                    <span class="card-label">Total Pemasukan</span>
                    <span class="card-icon">↗</span>
                </div>

                <h2>Rp {{ number_format($pemasukan, 0, ',', '.') }}</h2>
                <p class="card-description">Akumulasi pemasukan</p>
            </article>

            <article class="card pengeluaran">
                <div class="card-top">
                    <span class="card-label">Total Pengeluaran</span>
                    <span class="card-icon">↙</span>
                </div>

                <h2>Rp {{ number_format($pengeluaran, 0, ',', '.') }}</h2>
                <p class="card-description">Akumulasi pengeluaran</p>
            </article>

            <article class="card omzet">
                <div class="card-top">
                    <span class="card-label">Saldo Bersih</span>
                    <span class="card-icon">＝</span>
                </div>

                <h2>Rp {{ number_format($omzet, 0, ',', '.') }}</h2>
                <p class="card-description">Pemasukan dikurangi pengeluaran</p>
            </article>

        </section>

        <section class="transaction">
            <div class="section-header">
                <div>
                    <h2>Transaksi Terbaru</h2>
                    <p>Ringkasan catatan transaksi bisnis kamu.</p>
                </div>

                <a href="{{ url('/transaksi') }}" class="primary-button">
                    + Tambah Transaksi
                </a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>

                    <tbody id="transactionTable">
                        @forelse ($transaksi as $data)
                            <tr>
                                <td>{{ $data->tanggal->format('d/m/Y') }}</td>

                                <td class="transaction-description">
                                    {{ $data->keterangan }}
                                </td>

                                <td>
                                    <span class="transaction-type {{ $data->jenis === 'pemasukan' ? 'jenis-pemasukan' : 'jenis-pengeluaran' }}">
                                        {{ ucfirst($data->jenis) }}
                                    </span>
                                </td>

                                <td class="transaction-amount">
                                    Rp {{ number_format($data->jumlah, 0, ',', '.') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    <span class="empty-icon">▤</span>
                                    <strong>Belum ada transaksi</strong>
                                    <span>Transaksi kamu akan muncul di sini.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <footer class="dashboard-footer">
            ProfitPilot &copy; {{ date('Y') }} · Kelola bisnis lebih terarah.
        </footer>

    </main>
</div>

<script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
