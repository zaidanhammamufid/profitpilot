<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">
    <title>ProfitPilot - Transaksi</title>
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

        <section class="transaction">
            <div class="section-header">
                <div>
                    <h2>Riwayat Transaksi</h2>
                    <p>Daftar pemasukan dan pengeluaran yang tercatat.</p>
                </div>
                <span class="history-count">{{ $transaksi->count() }} transaksi</span>
            </div>

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

function rupiah(angka) {
    return new Intl.NumberFormat('id-ID').format(angka);
}

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

    barang.forEach(item => {
        const option = document.createElement('option');
        option.value = item.id;
        option.textContent =
            `${item.nama_barang} — Rp ${rupiah(Number(item.harga))} (Stok: ${item.stok})`;
        option.dataset.harga = Number(item.harga);
        option.dataset.stok = Number(item.stok);
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

    select.addEventListener('change', () => {
        const option = select.options[select.selectedIndex];
        const stok = Number(option.dataset.stok || 0);

        qty.max = stok > 0 ? String(stok) : '0';
        hitungTotal();
    });

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

    Array.from(itemsContainer.children).forEach(row => {
        const select = row.querySelector('select');
        const qty = row.querySelector('input');
        const option = select.options[select.selectedIndex];

        const harga = Number(option?.dataset.harga || 0);
        const jumlahBarang = Number(qty.value || 0);
        const subtotal = harga * jumlahBarang;

        total += subtotal;
        row.querySelector('.item-subtotal').textContent =
            'Subtotal: Rp ' + rupiah(subtotal);
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

document.addEventListener('click', function(event) {
    const account = document.querySelector('.account');
    const menu = document.getElementById('accountMenu');
    const button = document.querySelector('.account-button');

    if (account && !account.contains(event.target)) {
        menu.classList.remove('show');
        button.setAttribute('aria-expanded', 'false');
    }
});

window.addEventListener('resize', function() {
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

transaksiForm.addEventListener('reset', function() {
    setTimeout(function() {
        itemsContainer.innerHTML = '';
        totalPenjualan.textContent = 'Rp 0';
        updateJenis();
    }, 0);
});

updateJenis();
</script>

</body>
</html>