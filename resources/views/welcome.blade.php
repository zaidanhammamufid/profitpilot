<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>ProfitPilot — Kendalikan Bisnis, Kembangkan Profit</title>

    @include('partials.favicon')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>

    <nav class="navbar">
        <div class="nav-inner">
            <a href="/" class="brand">
                <div class="logo">
                    <svg width="29" height="29" viewBox="0 0 64 64" fill="none">
                        <rect x="5" y="36" width="10" height="23" rx="2" fill="#A5F3FC"/>
                        <rect x="21" y="25" width="10" height="34" rx="2" fill="#A5F3FC"/>
                        <rect x="37" y="13" width="10" height="46" rx="2" fill="#A5F3FC"/>
                        <path d="M8 29L24 18L39 22L56 5" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M43 5H56V18" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <div class="brand-name">
                    Profit<span>Pilot</span>
                </div>
            </a>

            <div class="nav-links">
                <a href="#fitur">Fitur</a>
                <a href="#kelebihan">Kelebihan</a>
            </div>

            <div class="nav-actions">
                <a href="{{ route('login') }}" class="nav-login">Login</a>
                <a href="{{ route('signup') }}" class="nav-signup">Daftar</a>
            </div>
        </div>
    </nav>

    <main>
        <section class="hero">
            <div class="hero-inner">
                <div class="hero-content">
                    <div class="hero-label">
                        <span class="label-dot"></span>
                        Aplikasi Pengelolaan Keuangan Usaha
                    </div>

                    <h1>
                        Kendalikan Bisnis,<br>
                        <span>Kembangkan Profit.</span>
                    </h1>

                    <p class="hero-description">
                        ProfitPilot membantu Anda mencatat pemasukan,
                        pengeluaran, mengelola data barang, dan memantau
                        omzet usaha dalam satu aplikasi yang sederhana
                        dan mudah digunakan.
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ route('signup') }}" class="button-primary">
                            Mulai Sekarang
                            <svg width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </a>

                        <a href="{{ route('login') }}" class="button-secondary">
                            Login Akun
                        </a>
                    </div>

                    <div class="hero-meta">
                        <div class="hero-meta-item">
                            <strong>6</strong>
                            <span>Fitur inti</span>
                        </div>
                        <div class="hero-meta-item">
                            <strong>1</strong>
                            <span>Dashboard</span>
                        </div>
                        <div class="hero-meta-item">
                            <strong>100%</strong>
                            <span>Data per toko</span>
                        </div>
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="hero-glow" aria-hidden="true"></div>

                    <div class="visual-wrap">
                        <div class="visual-card">
                            <div class="visual-header">
                                <div>
                                    <div class="visual-title">Ringkasan Keuangan</div>
                                    <div class="visual-period">Contoh dashboard · Bulan ini</div>
                                </div>

                                <div class="visual-badge">LIVE</div>
                            </div>

                            <div class="summary-block">
                                <div class="summary-label">Saldo Bersih</div>

                                <div class="summary-row">
                                    <div class="summary-value">Rp 2.860.000</div>
                                    <div class="summary-trend">+8,6%</div>
                                </div>
                            </div>

                            <svg class="trend-chart" viewBox="0 0 360 150"
                                 role="img" aria-label="Contoh grafik omzet mingguan">
                                <defs>
                                    <linearGradient id="welcomeChartFill" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#2563a6" stop-opacity="0.26"/>
                                        <stop offset="100%" stop-color="#2563a6" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>

                                <g stroke="#e2e8f0" stroke-width="1">
                                    <line x1="0" y1="28" x2="360" y2="28"/>
                                    <line x1="0" y1="70" x2="360" y2="70"/>
                                    <line x1="0" y1="112" x2="360" y2="112"/>
                                </g>

                                <path d="M 6 124 C 34 124 40 94 64 94 C 88 94 100 111 120 107 C 140 103 158 66 180 66 C 202 66 220 88 240 84 C 260 80 280 40 304 42 C 326 44 340 62 354 56 L 354 146 L 6 146 Z"
                                      fill="url(#welcomeChartFill)"/>

                                <path d="M 6 124 C 34 124 40 94 64 94 C 88 94 100 111 120 107 C 140 103 158 66 180 66 C 202 66 220 88 240 84 C 260 80 280 40 304 42 C 326 44 340 62 354 56"
                                      fill="none" stroke="#2563a6" stroke-width="4"
                                      stroke-linecap="round" stroke-linejoin="round"/>

                                <circle cx="304" cy="42" r="7"
                                        fill="#06b6d4" stroke="#ffffff" stroke-width="3"/>
                            </svg>

                            <div class="chart-days">
                                <span>Sen</span>
                                <span>Sel</span>
                                <span>Rab</span>
                                <span>Kam</span>
                                <span>Jum</span>
                                <span>Sab</span>
                                <span>Min</span>
                            </div>

                            <div class="visual-stats">
                                <div class="visual-stat">
                                    <span class="visual-stat-label">Pemasukan</span>
                                    <strong>Rp 3.820.000</strong>
                                </div>

                                <div class="visual-stat visual-stat--expense">
                                    <span class="visual-stat-label">Pengeluaran</span>
                                    <strong>Rp 960.000</strong>
                                </div>
                            </div>
                        </div>

                        <div class="floating-card floating-card--top">
                            <span class="floating-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m5 12 4 4L19 6"/>
                                </svg>
                            </span>

                            <div>
                                <strong>Transaksi tersimpan</strong>
                                <small>Penjualan tercatat otomatis</small>
                            </div>
                        </div>

                        <div class="floating-card floating-card--bottom">
                            <span class="floating-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m21 8-9-5-9 5v8l9 5 9-5V8Z"/>
                                    <path d="m3.3 7.5 8.7 5 8.7-5"/>
                                    <path d="M12 22V12.5"/>
                                </svg>
                            </span>

                            <div>
                                <strong>Stok terkontrol</strong>
                                <small>Restok lebih terencana</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="features" id="fitur">
            <div class="section-intro">
                <span class="section-label">TENTANG PROFITPILOT</span>

                <h2>Satu aplikasi untuk mengelola <span>keuangan usaha.</span></h2>

                <p class="features-description">
                    ProfitPilot membantu pemilik warung, toko, kafe, dan UMKM
                    mencatat pemasukan dan pengeluaran, mengelola barang dan stok,
                    serta memantau omzet dalam satu dashboard. Semua dirancang
                    sederhana agar bisa langsung dipakai tanpa latar belakang
                    akuntansi.
                </p>
            </div>

            <div class="feature-grid">
                <article class="feature-card">
                    <div class="feature-icon">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M12 2v20"/>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                    </div>

                    <h3>Pencatatan Transaksi</h3>

                    <p>
                        Catat pemasukan dan pengeluaran usaha dengan alur
                        yang sederhana dan rapi.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/>
                            <path d="M3 6h18"/>
                            <path d="M16 10a4 4 0 0 1-8 0"/>
                        </svg>
                    </div>

                    <h3>Penjualan Multi-Barang</h3>

                    <p>
                        Masukkan beberapa barang dalam satu transaksi;
                        subtotal dan total dihitung otomatis.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="m21 8-9-5-9 5v8l9 5 9-5V8Z"/>
                            <path d="m3.3 7.5 8.7 5 8.7-5"/>
                            <path d="M12 22V12.5"/>
                        </svg>
                    </div>

                    <h3>Pengelolaan Barang</h3>

                    <p>
                        Atur nama barang, harga, dan stok agar data
                        persediaan lebih tertata.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                            <path d="m3.3 7 8.7 5 8.7-5"/>
                            <path d="M12 22V12"/>
                            <path d="M8 10v4"/>
                            <path d="M6 12h4"/>
                        </svg>
                    </div>

                    <h3>Stok Menipis &amp; Restok</h3>

                    <p>
                        Stok berkurang otomatis setelah transaksi. Barang
                        menipis ditandai, dan restok bisa langsung dicatat.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M3 3v18h18"/>
                            <path d="m7 14 4-4 4 3 6-7"/>
                        </svg>
                    </div>

                    <h3>Laporan Omzet</h3>

                    <p>
                        Lihat ringkasan pemasukan, pengeluaran, dan grafik
                        omzet mingguan dalam satu dashboard.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">
                        <svg width="23" height="23" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M3 9l1.5-5h15L21 9"/>
                            <path d="M4 9v11h16V9"/>
                            <path d="M9 20v-6h6v6"/>
                        </svg>
                    </div>

                    <h3>Data per Toko</h3>

                    <p>
                        Setiap akun toko memiliki data transaksi dan barangnya
                        sendiri, tidak tercampur dengan toko lain.
                    </p>
                </article>
            </div>
        </section>

        <section class="advantages" id="kelebihan">
            <div class="advantages-inner">
                <div class="advantages-intro">
                    <span class="section-label section-label-light">KELEBIHAN</span>

                    <h2>Dibuat untuk usaha yang ingin lebih <span>tertata.</span></h2>

                    <p>
                        ProfitPilot bukan sekadar tempat mencatat. Aplikasi ini
                        merangkum informasi penting usaha agar Anda lebih mudah
                        mengambil keputusan sehari-hari.
                    </p>

                    <a href="{{ route('signup') }}" class="advantages-cta">
                        Mulai Sekarang
                        <svg width="17" height="17" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>

                    <div class="advantages-note">
                        <span>✓</span>
                        Cukup dari browser, tanpa instalasi tambahan.
                    </div>
                </div>

                <div class="advantage-list">
                    <article class="advantage-item">
                        <div class="advantage-icon">
                            <svg width="21" height="21" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <path d="m9 11 3 3L22 4"/>
                            </svg>
                        </div>

                        <div>
                            <h3>Sederhana dipakai</h3>
                            <p>
                                Alur pencatatan dibuat singkat dan bahasanya
                                mudah dipahami, bahkan tanpa latar belakang
                                akuntansi.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-item">
                        <div class="advantage-icon">
                            <svg width="21" height="21" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="3" width="7" height="7" rx="1"/>
                                <rect x="3" y="14" width="7" height="7" rx="1"/>
                                <rect x="14" y="14" width="7" height="7" rx="1"/>
                            </svg>
                        </div>

                        <div>
                            <h3>Satu dashboard, informasi lengkap</h3>
                            <p>
                                Pemasukan, pengeluaran, saldo bersih, dan
                                transaksi terbaru bisa dilihat dalam satu
                                tampilan.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-item">
                        <div class="advantage-icon">
                            <svg width="21" height="21" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="m7.5 4.27 9 5.15"/>
                                <path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                                <path d="m3.3 7 8.7 5 8.7-5"/>
                                <path d="M12 22V12"/>
                            </svg>
                        </div>

                        <div>
                            <h3>Stok lebih terkontrol</h3>
                            <p>
                                Stok berkurang otomatis setelah transaksi,
                                sementara penanda stok menipis membantu Anda tahu
                                kapan harus restok.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-item">
                        <div class="advantage-icon">
                            <svg width="21" height="21" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M3 3v18h18"/>
                                <path d="m7 14 4-4 4 3 6-7"/>
                            </svg>
                        </div>

                        <div>
                            <h3>Omzet lebih mudah dibaca</h3>
                            <p>
                                Grafik omzet mingguan membantu melihat
                                perkembangan usaha tanpa harus menghitung ulang
                                dari tumpukan nota.
                            </p>
                        </div>
                    </article>

                    <article class="advantage-item">
                        <div class="advantage-icon">
                            <svg width="21" height="21" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>
                                <path d="m9 12 2 2 4-4"/>
                            </svg>
                        </div>

                        <div>
                            <h3>Data tiap toko terpisah</h3>
                            <p>
                                Setiap akun toko memiliki data sendiri,
                                sehingga laporan yang ditampilkan sesuai dengan
                                usaha yang sedang dikelola.
                            </p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="cta">
            <div class="cta-card">
                <div class="cta-copy">
                    <span class="section-label section-label-light">SIAP MULAI?</span>

                    <h2>Buat catatan usaha lebih rapi, mulai hari ini.</h2>

                    <p>
                        Daftarkan toko Anda dan kelola transaksi, stok, serta
                        omzet dalam satu dashboard yang sederhana.
                    </p>
                </div>

                <div class="cta-actions">
                    <a href="{{ route('signup') }}" class="button-primary">
                        Daftar Sekarang
                        <svg width="17" height="17" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>

                    <a href="{{ route('login') }}" class="button-secondary">
                        Login Akun
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p class="footer-copy">
            © {{ date('Y') }} ProfitPilot. Aplikasi Pengelolaan Keuangan Usaha.
        </p>
    </footer>

</body>
</html>
