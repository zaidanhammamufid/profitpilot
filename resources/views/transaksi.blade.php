<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">
    <title>ProfitPilot — Transaksi</title>

    @include('partials.favicon')
    <link rel="stylesheet" href="{{ asset('css/transaksi.css') }}">
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
                        <path d="M7 31 L21 22 L34 24 L45 13" fill="none"
                              stroke="#FFFFFF" stroke-width="3.5"
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
               class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
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
               class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}">
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
               class="nav-link {{ request()->is('barang*') ? 'active' : '' }}">
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
               class="nav-link {{ request()->is('omzet*') ? 'active' : '' }}">
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
                        onclick="toggleSidebar()" aria-label="Buka atau lipat menu">☰</button>
                <div>
                    <h1>Transaksi</h1>
                    <p>Kelola pemasukan, penjualan, dan pengeluaran bisnis.</p>
                </div>
            </div>

            <div class="account">
                <button type="button" class="account-button"
                        onclick="toggleAccount()" aria-expanded="false">
                    <span class="account-avatar">
                        {{ strtoupper(substr(Auth::user()->nama_toko, 0, 1)) }}
                    </span>
                    <span class="account-name">{{ Auth::user()->nama_toko }}</span>
                    <span class="account-arrow">⌄</span>
                </button>

                <div id="accountMenu" class="account-menu">
                    <a href="{{ url('/profil') }}">Profil Saya</a>
                </div>
            </div>
        </header>

        @if (session('success'))
            <div class="alert alert-success">
                <span>✓</span>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Transaksi belum berhasil disimpan.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="welcome">
            <div class="welcome-content">
                <span class="welcome-label">MANAJEMEN KEUANGAN</span>
                <h2>Catat Transaksi Bisnis</h2>
                <p>
                    Catat setiap pemasukan dan pengeluaran agar kondisi
                    keuangan toko kamu lebih mudah dipantau.
                </p>
            </div>
            <div class="welcome-decoration" aria-hidden="true">⇄</div>
        </section>

        <section class="cards">
            <article class="card pemasukan">
                <div class="card-top">
                    <span class="card-label">Total Pemasukan</span>
                    <span class="card-icon">↗</span>
                </div>
                <h2>Rp {{ number_format($pemasukan, 0, ',', '.') }}</h2>
                <p class="card-description">Akumulasi pemasukan aktif</p>
            </article>

            <article class="card pengeluaran">
                <div class="card-top">
                    <span class="card-label">Total Pengeluaran</span>
                    <span class="card-icon">↙</span>
                </div>
                <h2>Rp {{ number_format($pengeluaran, 0, ',', '.') }}</h2>
                <p class="card-description">Akumulasi pengeluaran aktif</p>
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

        <section class="form-card">
            <div class="section-header">
                <div>
                    <h2>Tambah Transaksi</h2>
                    <p>Isi informasi transaksi yang ingin dicatat.</p>
                </div>
                <span class="section-icon">＋</span>
            </div>

            <form id="transaksiForm" method="POST" action="{{ route('transaksi.store') }}">
                @csrf

                <div class="form-grid">
                    <div class="form-group">
                        <label for="jenis">Jenis Transaksi <span>*</span></label>
                        <select id="jenis" name="jenis" required>
                            <option value="">Pilih jenis transaksi</option>
                            <option value="pemasukan" {{ old('jenis') === 'pemasukan' ? 'selected' : '' }}>
                                Pemasukan
                            </option>
                            <option value="pengeluaran" {{ old('jenis') === 'pengeluaran' ? 'selected' : '' }}>
                                Pengeluaran
                            </option>
                        </select>
                    </div>

                    <div class="form-group" id="modeSection" style="display:none;">
                        <label for="mode_pemasukan">Jenis Pemasukan <span>*</span></label>
                        <select id="mode_pemasukan" name="mode_pemasukan">
                            <option value="barang" {{ old('mode_pemasukan', 'barang') === 'barang' ? 'selected' : '' }}>
                                Penjualan Barang
                            </option>
                            <option value="manual" {{ old('mode_pemasukan') === 'manual' ? 'selected' : '' }}>
                                Pemasukan Manual
                            </option>
                        </select>
                    </div>
                </div>

                <div id="barangSection" class="product-section" style="display:none;">
                    <div class="product-heading">
                        <div>
                            <h3>Barang yang Dijual</h3>
                            <p>Pilih barang dan jumlahnya. Total dihitung otomatis.</p>
                        </div>
                        <span class="product-heading-icon">▦</span>
                    </div>

                    <div id="itemsContainer"></div>

                    <button type="button" id="tambahBarang" class="secondary-button">
                        <span>＋</span> Tambah Barang
                    </button>

                    <div class="total-box">
                        <span>Total Penjualan</span>
                        <strong id="totalPenjualan">Rp 0</strong>
                    </div>
                </div>

                <div class="form-group" id="nominalSection">
                    <label for="jumlah">Nominal (Rp) <span>*</span></label>
                    <input
                        type="number"
                        id="jumlah"
                        name="jumlah"
                        min="1"
                        step="0.01"
                        value="{{ old('jumlah') }}"
                        placeholder="Contoh: 50000"
                    >
                    <small id="nominalHelp">Untuk pemasukan manual atau pengeluaran.</small>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan <span>*</span></label>
                    <input
                        type="text"
                        id="keterangan"
                        name="keterangan"
                        maxlength="255"
                        value="{{ old('keterangan') }}"
                        placeholder="Contoh: Penjualan harian"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Transaksi <span>*</span></label>
                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal', now()->format('Y-m-d')) }}"
                        required
                    >
                </div>

                <div class="form-actions">
                    <button type="reset" class="reset-button" id="resetForm">
                        Reset Form
                    </button>
                    <button type="submit" class="primary-button">
                        <span>＋</span> Simpan Transaksi
                    </button>
                </div>
            </form>
        </section>

        <section class="transaction" id="riwayat-transaksi">
            <div class="section-header">
                <div>
                    <h2>Riwayat Transaksi</h2>
                    <p>Daftar pemasukan dan pengeluaran yang tercatat.</p>
                </div>
                <span class="history-count">{{ $transaksi->count() }} transaksi</span>
            </div>

            <form method="GET" action="{{ route('transaksi.index') }}"
                  class="history-filter" id="historyFilter">
                <div class="filter-row">
                    <div class="filter-group">
                        <label for="periode">Tampilkan</label>
                        <select name="periode" id="periode">
                            <option value="semua" @selected($periode === 'semua')>
                                Semua Transaksi
                            </option>
                            <option value="mingguan" @selected($periode === 'mingguan')>
                                Per Minggu
                            </option>
                            <option value="bulanan" @selected($periode === 'bulanan')>
                                Per Bulan
                            </option>
                        </select>
                    </div>

                    <div class="filter-group" data-filter="mingguan"
                         @if ($periode !== 'mingguan') hidden @endif>
                        <label for="minggu">Pilih Minggu</label>
                        <select name="minggu" id="minggu"
                                @disabled($periode !== 'mingguan')>
                            @foreach ($mingguOptions as $option)
                                <option value="{{ $option['value'] }}"
                                        @selected($minggu === $option['value'])>
                                    {{ $option['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group" data-filter="bulanan"
                         @if ($periode !== 'bulanan') hidden @endif>
                        <label for="bulan">Pilih Bulan</label>
                        <select name="bulan" id="bulan"
                                @disabled($periode !== 'bulanan')>
                            @foreach ($bulanOptions as $option)
                                <option value="{{ $option['value'] }}"
                                        @selected($bulan === $option['value'])>
                                    {{ $option['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-actions">
                        <button type="submit" class="filter-apply">Terapkan</button>

                        @if ($periode !== 'semua')
                            <a href="{{ route('transaksi.index') }}"
                               class="filter-reset">
                                Reset
                            </a>
                        @endif
                    </div>
                </div>

                <p class="filter-hint">
                    Pilih periode dan waktu, lalu klik Terapkan.
                </p>
            </form>

            @if ($periode !== 'semua')
                <div class="period-summary">
                    <div class="period-summary-header">
                        <span class="period-chip">{{ $labelPeriode }}</span>
                        <span class="period-caption">
                            Ringkasan transaksi aktif pada periode ini
                        </span>
                    </div>

                    <div class="period-summary-grid">
                        <div class="period-stat period-income">
                            <span>Pemasukan</span>
                            <strong>Rp {{ number_format($pemasukanPeriode, 0, ',', '.') }}</strong>
                        </div>

                        <div class="period-stat period-expense">
                            <span>Pengeluaran</span>
                            <strong>Rp {{ number_format($pengeluaranPeriode, 0, ',', '.') }}</strong>
                        </div>

                        <div class="period-stat period-net">
                            <span>Saldo Periode</span>
                            <strong @class(['negative' => $omzetPeriode < 0])>
                                Rp {{ number_format($omzetPeriode, 0, ',', '.') }}
                            </strong>
                        </div>
                    </div>
                </div>
            @endif

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Barang</th>
                            <th>Keterangan</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($transaksi as $data)
                            <tr>
                                <td class="date-cell">{{ $data->tanggal->format('d/m/Y') }}</td>

                                <td class="product-cell">
                                    @if ($data->detailTransaksis->isNotEmpty())
                                        @foreach ($data->detailTransaksis as $detail)
                                            <div class="history-product">
                                                <span>{{ $detail->nama_barang }}</span>
                                                <small>× {{ $detail->jumlah_barang }}</small>
                                            </div>
                                        @endforeach
                                    @elseif ($data->barang)
                                        <div class="history-product">
                                            <span>{{ $data->barang->nama_barang }}</span>
                                            @if ($data->jumlah_barang)
                                                <small>× {{ $data->jumlah_barang }}</small>
                                            @endif
                                        </div>
                                    @else
                                        <span class="muted-cell">—</span>
                                    @endif
                                </td>

                                <td class="transaction-description">{{ $data->keterangan }}</td>

                                <td>
                                    <span class="transaction-type {{ $data->jenis === 'pemasukan' ? 'jenis-pemasukan' : 'jenis-pengeluaran' }}">
                                        {{ ucfirst($data->jenis) }}
                                    </span>
                                </td>

                                <td class="transaction-amount">
                                    Rp {{ number_format($data->jumlah, 0, ',', '.') }}
                                </td>

                                <td>
                                    <span class="status-badge {{ $data->status === 'batal' ? 'status-batal' : 'status-aktif' }}">
                                        {{ $data->status === 'batal' ? 'Dibatalkan' : 'Aktif' }}
                                    </span>
                                </td>

                                <td class="action-cell">
                                    @if ($data->status !== 'batal')
                                        <form
                                            method="POST"
                                            action="{{ route('transaksi.destroy', $data->id) }}"
                                            onsubmit="return confirm('Batalkan transaksi ini? Stok barang akan dikembalikan jika transaksi memiliki detail barang.')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            @if ($periode === 'mingguan')
                                                <input type="hidden" name="periode" value="mingguan">
                                                <input type="hidden" name="minggu" value="{{ $minggu }}">
                                            @elseif ($periode === 'bulanan')
                                                <input type="hidden" name="periode" value="bulanan">
                                                <input type="hidden" name="bulan" value="{{ $bulan }}">
                                            @endif

                                            <button type="submit" class="cancel-button">Batalkan</button>
                                        </form>
                                    @else
                                        <span class="muted-cell">—</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="empty">
                                    <span class="empty-icon">▤</span>

                                    @if ($periode !== 'semua')
                                        <strong>Tidak ada transaksi pada periode ini</strong>
                                        <span>
                                            Coba pilih minggu atau bulan lain,
                                            atau tampilkan semua transaksi.
                                        </span>
                                        <a href="{{ route('transaksi.index') }}"
                                           class="empty-reset">
                                            Tampilkan semua transaksi
                                        </a>
                                    @else
                                        <strong>Belum ada transaksi</strong>
                                        <span>Transaksi kamu akan muncul di sini.</span>
                                    @endif
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

<div class="stock-modal" id="stockModal" role="alertdialog" aria-modal="true"
     aria-labelledby="stockModalTitle" aria-describedby="stockModalMessage" hidden>
    <div class="stock-modal-backdrop" data-close-stock-modal></div>

    <div class="stock-modal-card">
        <span class="stock-modal-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                 stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3 2.6 20h18.8L12 3Z"/>
                <path d="M12 9v5"/>
                <path d="M12 17.5h.01"/>
            </svg>
        </span>

        <button type="button" class="stock-modal-close" data-close-stock-modal
                aria-label="Tutup peringatan">&times;</button>

        <h2 id="stockModalTitle">Stok barang tidak mencukupi</h2>

        <p id="stockModalMessage">
            Jumlah barang yang kamu masukkan melebihi stok yang tersedia.
            Kurangi jumlahnya sebelum menyimpan transaksi.
        </p>

        <ul class="stock-modal-list" id="stockModalList"></ul>

        <div class="stock-modal-actions">
            <button type="button" class="stock-modal-button" data-close-stock-modal>
                Mengerti
            </button>
        </div>
    </div>
</div>

<script>
    const barang = @json($barang);

    const jenis = document.getElementById('jenis');
    const modeSection = document.getElementById('modeSection');
    const modePemasukan = document.getElementById('mode_pemasukan');
    const barangSection = document.getElementById('barangSection');
    const itemsContainer = document.getElementById('itemsContainer');
    const jumlah = document.getElementById('jumlah');
    const totalPenjualan = document.getElementById('totalPenjualan');
    const tambahBarang = document.getElementById('tambahBarang');
    const transaksiForm = document.getElementById('transaksiForm');
    const historyFilter = document.getElementById('historyFilter');
    const periodeFilter = document.getElementById('periode');
    const stockModal = document.getElementById('stockModal');
    const stockModalList = document.getElementById('stockModalList');
    const stockModalMessage = document.getElementById('stockModalMessage');
    let stockModalTrigger = null;

    if (historyFilter && periodeFilter) {
        const filterScrollKey = 'profilpilot:transaksi-scroll';
        const filterGroups = historyFilter.querySelectorAll('[data-filter]');

        function syncFilterFields() {
            filterGroups.forEach(function (group) {
                const selected = group.dataset.filter === periodeFilter.value;
                const select = group.querySelector('select');

                group.hidden = !selected;

                if (select) {
                    select.disabled = !selected;
                }
            });
        }

        function saveFilterScroll() {
            try {
                sessionStorage.setItem(filterScrollKey, String(window.scrollY));
            } catch (error) {
                // sessionStorage bisa diblokir browser.
            }
        }

        function restoreFilterScroll() {
            try {
                const saved = sessionStorage.getItem(filterScrollKey);

                if (saved === null) {
                    return;
                }

                sessionStorage.removeItem(filterScrollKey);

                const scrollY = Number(saved);

                if (! Number.isFinite(scrollY) || scrollY <= 0) {
                    return;
                }

                window.scrollTo(0, scrollY);

                window.addEventListener('load', function () {
                    window.scrollTo(0, scrollY);
                }, { once: true });
            } catch (error) {
                // sessionStorage bisa diblokir browser.
            }
        }

        periodeFilter.addEventListener('change', syncFilterFields);
        historyFilter.addEventListener('submit', saveFilterScroll);

        document.querySelectorAll('.filter-reset, .empty-reset').forEach(function (link) {
            link.addEventListener('click', saveFilterScroll);
        });

        syncFilterFields();
        restoreFilterScroll();
    }

    function rupiah(angka) {
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    function getStockShortages() {
        const requested = {};

        Array.from(itemsContainer.children).forEach(function (row) {
            const select = row.querySelector('select');
            const qty = row.querySelector('input');

            if (! select || ! qty || ! select.value) {
                return;
            }

            const option = select.options[select.selectedIndex];
            const id = String(select.value);
            const jumlah = Number(qty.value || 0);

            if (! requested[id]) {
                requested[id] = {
                    nama: option.dataset.nama || option.textContent,
                    stok: Number(option.dataset.stok || 0),
                    jumlah: 0,
                };
            }

            requested[id].jumlah += jumlah;
        });

        return Object.values(requested).filter(function (item) {
            return item.jumlah > item.stok;
        });
    }

    function openStockModal() {
        stockModalTrigger = document.activeElement;
        stockModal.hidden = false;
        document.body.classList.add('stock-modal-open');
        stockModal.querySelector('.stock-modal-button').focus();
    }

    function closeStockModal() {
        if (stockModal.hidden) {
            return;
        }

        stockModal.hidden = true;
        document.body.classList.remove('stock-modal-open');

        if (stockModalTrigger && typeof stockModalTrigger.focus === 'function') {
            stockModalTrigger.focus();
        }
    }

    function showStockWarning(shortages) {
        stockModalMessage.textContent = 'Jumlah barang yang kamu masukkan melebihi stok yang tersedia. Kurangi jumlahnya sebelum menyimpan transaksi.';
        stockModalList.innerHTML = '';

        shortages.forEach(function (item) {
            const row = document.createElement('li');
            const name = document.createElement('strong');

            name.textContent = item.nama;

            row.append(
                name,
                document.createTextNode(
                    ` — diminta ${rupiah(item.jumlah)}, stok tersedia ${rupiah(item.stok)}.`
                )
            );

            stockModalList.appendChild(row);
        });

        openStockModal();
    }

    function showServerStockWarning(messages) {
        stockModalMessage.textContent = 'Transaksi belum disimpan karena jumlah barang melebihi stok yang tersedia.';
        stockModalList.innerHTML = '';

        messages.forEach(function (message) {
            const row = document.createElement('li');
            row.textContent = message;
            stockModalList.appendChild(row);
        });

        openStockModal();
    }

    stockModal.addEventListener('click', function (event) {
        if (event.target.closest('[data-close-stock-modal]')) {
            closeStockModal();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' && ! stockModal.hidden) {
            closeStockModal();
        }
    });

    transaksiForm.addEventListener('submit', function (event) {
        const penjualan = jenis.value === 'pemasukan'
            && modePemasukan.value === 'barang';

        if (! penjualan) {
            return;
        }

        const shortages = getStockShortages();

        if (shortages.length > 0) {
            event.preventDefault();
            showStockWarning(shortages);
        }
    });

    function updateJenis() {
        const pemasukan = jenis.value === 'pemasukan';

        modeSection.style.display = pemasukan ? 'block' : 'none';
        modePemasukan.disabled = !pemasukan;

        updateMode();
    }

    function updateMode() {
        const pemasukan = jenis.value === 'pemasukan';
        const penjualan = pemasukan && modePemasukan.value === 'barang';

        barangSection.style.display = penjualan ? 'block' : 'none';
        jumlah.disabled = penjualan;
        jumlah.required = !penjualan;

        if (penjualan) {
            jumlah.value = '';

            if (itemsContainer.children.length === 0) {
                tambahBarisBarang();
            }
        } else {
            itemsContainer.innerHTML = '';
            hitungTotal();
        }
    }

    function tambahBarisBarang() {
        if (barang.length === 0) {
            alert('Belum ada barang aktif. Tambahkan barang terlebih dahulu di menu Data Barang.');
            return;
        }

        const row = document.createElement('div');
        row.className = 'item-row';

        const productGroup = document.createElement('div');
        productGroup.className = 'form-group';

        const labelBarang = document.createElement('label');
        labelBarang.textContent = 'Pilih Barang';

        const select = document.createElement('select');
        select.name = `items[${itemsContainer.children.length}][barang_id]`;
        select.required = true;

        const empty = document.createElement('option');
        empty.value = '';
        empty.textContent = 'Pilih barang';
        select.appendChild(empty);

        barang.forEach((item) => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = `${item.nama_barang} — Rp ${rupiah(Number(item.harga))} (Stok: ${item.stok})`;
            option.dataset.harga = Number(item.harga);
            option.dataset.stok = Number(item.stok);
            option.dataset.nama = item.nama_barang;
            select.appendChild(option);
        });

        productGroup.append(labelBarang, select);

        const qtyGroup = document.createElement('div');
        qtyGroup.className = 'form-group';

        const labelQty = document.createElement('label');
        labelQty.textContent = 'Jumlah';

        const qty = document.createElement('input');
        qty.type = 'number';
        qty.name = `items[${itemsContainer.children.length}][jumlah_barang]`;
        qty.min = '1';
        qty.step = '1';
        qty.value = '1';
        qty.required = true;

        qtyGroup.append(labelQty, qty);

        const subtotal = document.createElement('div');
        subtotal.className = 'item-subtotal';
        subtotal.textContent = 'Subtotal: Rp 0';

        const remove = document.createElement('button');
        remove.type = 'button';
        remove.className = 'remove-item';
        remove.textContent = 'Hapus';

        remove.addEventListener('click', () => {
            row.remove();
            rapikanNamaInput();
            hitungTotal();
        });

        select.addEventListener('change', hitungTotal);

        qty.addEventListener('input', hitungTotal);

        const fields = document.createElement('div');
        fields.className = 'item-fields';
        fields.append(productGroup, qtyGroup);

        row.append(fields, subtotal, remove);
        itemsContainer.appendChild(row);

        hitungTotal();
    }

    function rapikanNamaInput() {
        Array.from(itemsContainer.children).forEach((row, index) => {
            row.querySelector('select').name = `items[${index}][barang_id]`;
            row.querySelector('input').name = `items[${index}][jumlah_barang]`;
        });
    }

    function hitungTotal() {
        let total = 0;

        Array.from(itemsContainer.children).forEach((row) => {
            const select = row.querySelector('select');
            const qty = row.querySelector('input');
            const option = select.options[select.selectedIndex];

            const harga = Number(option?.dataset.harga || 0);
            const jumlahBarang = Number(qty.value || 0);
            const subtotal = harga * jumlahBarang;

            total += subtotal;
            row.querySelector('.item-subtotal').textContent = 'Subtotal: Rp ' + rupiah(subtotal);
        });

        totalPenjualan.textContent = 'Rp ' + rupiah(total);
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (window.innerWidth <= 850) {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }
    }

    function toggleAccount() {
        const menu = document.getElementById('accountMenu');
        const button = document.querySelector('.account-button');
        const isOpen = menu.classList.toggle('show');

        button.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    }

    document.addEventListener('click', function (event) {
        const account = document.querySelector('.account');
        const menu = document.getElementById('accountMenu');
        const button = document.querySelector('.account-button');

        if (account && !account.contains(event.target)) {
            menu.classList.remove('show');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 850) {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebarOverlay').classList.remove('show');
        } else {
            document.body.classList.remove('sidebar-collapsed');
        }
    });

    tambahBarang.addEventListener('click', tambahBarisBarang);
    jenis.addEventListener('change', updateJenis);
    modePemasukan.addEventListener('change', updateMode);

    transaksiForm.addEventListener('reset', function () {
        setTimeout(function () {
            itemsContainer.innerHTML = '';
            totalPenjualan.textContent = 'Rp 0';
            updateJenis();
        }, 0);
    });

    updateJenis();

    const serverErrors = @json($errors->all());
    const serverStockErrors = serverErrors.filter(function (message) {
        return typeof message === 'string'
            && message.includes('Stok ')
            && message.includes('tidak mencukupi');
    });

    if (serverStockErrors.length > 0) {
        showServerStockWarning(serverStockErrors);
    }
</script>

</body>
</html>
