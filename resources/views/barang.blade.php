<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">
    <title>ProfitPilot - Data Barang</title>
    <link rel="stylesheet" href="{{ asset('css/barang.css') }}">
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
                    <h1>Data Barang</h1>
                    <p>Kelola persediaan barang bisnis kamu.</p>
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

        <section class="page-heading">
            <div>
                <span class="eyebrow">MANAJEMEN INVENTARIS</span>
                <h2>Data Barang</h2>
                <p>Tambah, cari, edit, dan pantau stok barang bisnis kamu.</p>
            </div>
        </section>

        @if (session('success'))
            <div class="success-message">
                <svg viewBox="0 0 24 24" width="20" height="20"
                     fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="m5 12 4 4L19 6"/>
                    <circle cx="12" cy="12" r="10"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="error-message">
                <svg viewBox="0 0 24 24" width="20" height="20"
                     fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
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
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="3"/>
                        <path d="M12 8v8M8 12h8"/>
                    </svg>
                </span>

                <div>
                    <h2>Tambah Barang</h2>
                    <p>Masukkan informasi barang baru.</p>
                </div>
            </div>

            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" id="nama_barang"
                               name="nama_barang"
                               value="{{ old('nama_barang') }}"
                               placeholder="Contoh: Buku Tulis"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga Satuan (Rp)</label>
                        <input type="number" id="harga" name="harga"
                               value="{{ old('harga') }}"
                               min="0" step="1"
                               placeholder="Contoh: 10000"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="stok">Stok Awal</label>
                        <input type="number" id="stok" name="stok"
                               value="{{ old('stok') }}"
                               min="0" step="1"
                               placeholder="Jumlah barang"
                               required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="primary-button">
                        <svg viewBox="0 0 24 24" width="18" height="18"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                        Simpan Barang
                    </button>
                </div>
            </form>
        </section>
                <section class="table-card">
            <div class="section-heading">
                <span class="section-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M4 5h16M4 12h16M4 19h16"/>
                        <circle cx="7" cy="5" r="1"/>
                        <circle cx="7" cy="12" r="1"/>
                        <circle cx="7" cy="19" r="1"/>
                    </svg>
                </span>

                <div>
                    <h2>Daftar Barang</h2>
                    <p>Pantau harga dan ketersediaan stok barang.</p>
                </div>
            </div>

            <div class="filter-grid">
                <div class="form-group search-group">
                    <label for="cariBarang">Cari Barang</label>
                    <div class="search-box">
                        <svg viewBox="0 0 24 24" width="19" height="19"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round">
                            <circle cx="11" cy="11" r="7"/>
                            <path d="m20 20-4-4"/>
                        </svg>
                        <input type="text" id="cariBarang"
                               placeholder="Cari nama barang...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="filterStok">Filter Stok</label>
                    <select id="filterStok">
                        <option value="semua">Semua Stok</option>
                        <option value="habis">Stok Habis</option>
                        <option value="rendah">Stok Rendah (1–5)</option>
                        <option value="tersedia">Stok Tersedia</option>
                    </select>
                </div>
            </div>

            <div class="table-wrapper">
                <table id="daftarBarang">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($barang as $index => $data)
                            <tr data-stok="{{ $data->stok }}">
                                <td>{{ $index + 1 }}</td>

                                <td class="nama-barang">
                                    {{ $data->nama_barang }}
                                </td>

                                <td class="price-cell">
                                    Rp {{ number_format($data->harga, 0, ',', '.') }}
                                </td>

                                <td>
                                    @if ($data->stok <= 0)
                                        <span class="stock-badge stock-empty">Habis</span>
                                    @elseif ($data->stok <= 5)
                                        <span class="stock-badge stock-low">
                                            {{ $data->stok }} tersisa
                                        </span>
                                    @else
                                        <span class="stock-badge stock-normal">
                                            {{ $data->stok }} tersedia
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('barang.edit', $data->id) }}"
                                           class="edit-button" title="Edit barang">
                                            <svg viewBox="0 0 24 24" width="17" height="17"
                                                 fill="none" stroke="currentColor"
                                                 stroke-width="1.8" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path d="M12 20h9"/>
                                                <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L9 17l-4 1 1-4Z"/>
                                            </svg>
                                            Edit
                                        </a>

                                        <button type="button"
                                                class="restock-button"
                                                title="Tambah stok"
                                                onclick="bukaRestok({{ $data->id }}, @js($data->nama_barang), {{ $data->stok }})">
                                            <svg viewBox="0 0 24 24" width="17" height="17"
                                                 fill="none" stroke="currentColor"
                                                 stroke-width="1.8" stroke-linecap="round"
                                                 stroke-linejoin="round">
                                                <path d="M12 5v14M5 12h14"/>
                                            </svg>
                                            Restok
                                        </button>

                                        <form action="{{ route('barang.destroy', $data->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="delete-button"
                                                    title="Hapus barang">
                                                <svg viewBox="0 0 24 24" width="17" height="17"
                                                     fill="none" stroke="currentColor"
                                                     stroke-width="1.8" stroke-linecap="round"
                                                     stroke-linejoin="round">
                                                    <path d="M3 6h18"/>
                                                    <path d="M8 6V4h8v2"/>
                                                    <path d="m19 6-1 14H6L5 6"/>
                                                    <path d="M10 11v5M14 11v5"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr id="barisKosong">
                                <td colspan="5" class="empty">
                                    <span class="empty-icon">
                                        <svg viewBox="0 0 24 24" width="34" height="34"
                                             fill="none" stroke="currentColor"
                                             stroke-width="1.6" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M4 4h16v16H4z"/>
                                            <path d="M8 9h8M8 13h8M8 17h5"/>
                                        </svg>
                                    </span>
                                    <strong>Belum ada barang</strong>
                                    <span>Tambahkan barang melalui formulir di atas.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div id="tidakDitemukan" class="empty" style="display:none;">
                    <strong>Barang tidak ditemukan</strong>
                    <span>Coba gunakan kata kunci atau filter lain.</span>
                </div>
            </div>
        </section>

        <section class="table-card restock-history-card">
            <div class="section-heading">
                <span class="section-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22"
                         fill="none" stroke="currentColor"
                         stroke-width="1.8" stroke-linecap="round"
                         stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 7v5l3 2"/>
                    </svg>
                </span>

                <div>
                    <h2>Riwayat Restok</h2>
                    <p>Catatan penambahan stok barang.</p>
                </div>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Restok</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($riwayatRestok as $riwayat)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($riwayat->tanggal)->format('d/m/Y') }}</td>
                                <td class="nama-barang">
                                    {{ $riwayat->barang->nama_barang ?? 'Barang dihapus' }}
                                </td>
                                <td>
                                    <span class="stock-badge stock-normal">
                                        +{{ $riwayat->jumlah }}
                                    </span>
                                </td>
                                <td>{{ $riwayat->keterangan ?: '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty">
                                    <span class="empty-icon">
                                        <svg viewBox="0 0 24 24" width="34" height="34"
                                             fill="none" stroke="currentColor"
                                             stroke-width="1.6" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="9"/>
                                            <path d="M12 8v4M12 16h.01"/>
                                        </svg>
                                    </span>
                                    <strong>Belum ada riwayat restok</strong>
                                    <span>Riwayat akan muncul setelah kamu menambah stok.</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <footer class="page-footer">
            ProfitPilot &copy; {{ date('Y') }} · Kelola bisnis lebih terarah.
        </footer>

    </main>
</div>

<div class="modal-overlay" id="modalRestok" style="display:none;">
    <div class="modal-card" role="dialog" aria-modal="true"
         aria-labelledby="judulModalRestok">

        <div class="section-heading">
            <span class="section-icon">
                <svg viewBox="0 0 24 24" width="22" height="22"
                     fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M12 5v14M5 12h14"/>
                </svg>
            </span>

            <div>
                <h2 id="judulModalRestok">Tambah Stok Barang</h2>
                <p>Masukkan jumlah stok yang ingin ditambahkan.</p>
            </div>
        </div>

        <div class="modal-info">
            <span>Nama Barang</span>
            <strong id="namaBarangRestok">-</strong>
            <span>Stok Saat Ini</span>
            <strong id="stokSaatIni">0</strong>
        </div>

        <form id="formRestok" method="POST">
            @csrf

            <div class="form-group">
                <label for="jumlahRestok">Jumlah Restok</label>
                <input type="number" name="jumlah" id="jumlahRestok"
                       min="1" step="1" placeholder="Masukkan jumlah"
                       required>
            </div>

            <div class="form-group">
                <label for="tanggalRestok">Tanggal Restok</label>
                <input type="date" name="tanggal" id="tanggalRestok"
                       value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group">
                <label for="keteranganRestok">Keterangan (Opsional)</label>
                <input type="text" name="keterangan" id="keteranganRestok"
                       placeholder="Contoh: Pembelian stok baru">
            </div>

            <div class="modal-actions">
                <button type="button" class="cancel-button"
                        onclick="tutupRestok()">Batal</button>

                <button type="submit" class="primary-button">
                    <svg viewBox="0 0 24 24" width="18" height="18"
                         fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round">
                        <path d="M12 5v14M5 12h14"/>
                    </svg>
                    Simpan Restok
                </button>
            </div>
        </form>
    </div>
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
        const modalRestok = document.getElementById('modalRestok');
        const formRestok = document.getElementById('formRestok');

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

        window.bukaRestok = function (id, nama, stok) {
            if (!modalRestok || !formRestok) return;

            const namaBarang = document.getElementById('namaBarangRestok');
            const stokSaatIni = document.getElementById('stokSaatIni');
            const jumlahRestok = document.getElementById('jumlahRestok');
            const tanggalRestok = document.getElementById('tanggalRestok');
            const keteranganRestok = document.getElementById('keteranganRestok');

            if (namaBarang) namaBarang.textContent = nama;
            if (stokSaatIni) stokSaatIni.textContent = stok;
            if (jumlahRestok) jumlahRestok.value = '';
            if (tanggalRestok && !tanggalRestok.value) {
                tanggalRestok.value = new Date().toISOString().slice(0, 10);
            }
            if (keteranganRestok) keteranganRestok.value = '';

            formRestok.action = @json(url('/barang')) + '/' + encodeURIComponent(id) + '/restok';
            modalRestok.style.display = 'flex';

            if (jumlahRestok) jumlahRestok.focus();
        };

        window.tutupRestok = function () {
            if (modalRestok) {
                modalRestok.style.display = 'none';
            }
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

        if (modalRestok) {
            modalRestok.addEventListener('click', function (event) {
                if (event.target === modalRestok) {
                    window.tutupRestok();
                }
            });
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                window.tutupRestok();

                if (accountMenu && accountButton) {
                    accountMenu.classList.remove('show');
                    accountButton.setAttribute('aria-expanded', 'false');
                }
            }
        });

        const inputCari = document.getElementById('cariBarang');
        const filterStok = document.getElementById('filterStok');
        const tabelBarang = document.getElementById('daftarBarang');
        const pesanTidakDitemukan = document.getElementById('tidakDitemukan');

        function filterDaftarBarang() {
            if (!tabelBarang) return;

            const kataKunci = inputCari ? inputCari.value.trim().toLowerCase() : '';
            const jenisFilter = filterStok ? filterStok.value : 'semua';
            const baris = tabelBarang.querySelectorAll('tbody tr[data-stok]');
            let jumlahTampil = 0;

            baris.forEach(function (row) {
                const nama = row.querySelector('.nama-barang');
                const namaTeks = nama ? nama.textContent.toLowerCase() : '';
                const stok = Number(row.dataset.stok || 0);

                const cocokNama = namaTeks.includes(kataKunci);
                let cocokStok = true;

                if (jenisFilter === 'habis') {
                    cocokStok = stok <= 0;
                } else if (jenisFilter === 'rendah') {
                    cocokStok = stok >= 1 && stok <= 5;
                } else if (jenisFilter === 'tersedia') {
                    cocokStok = stok > 5;
                }

                const tampil = cocokNama && cocokStok;
                row.style.display = tampil ? '' : 'none';

                if (tampil) jumlahTampil++;
            });

            if (pesanTidakDitemukan) {
                pesanTidakDitemukan.style.display =
                    baris.length > 0 && jumlahTampil === 0 ? 'block' : 'none';
            }
        }

        if (inputCari) {
            inputCari.addEventListener('input', filterDaftarBarang);
        }

        if (filterStok) {
            filterStok.addEventListener('change', filterDaftarBarang);
        }
    });
</script>

</body>
</html>
