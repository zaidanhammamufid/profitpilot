<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>Welcome - ProfitPilot</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>

    <nav class="navbar">
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

        <div class="nav-actions">
            <a href="{{ route('login') }}" class="nav-login">Login</a>
            <a href="{{ route('signup') }}" class="nav-signup">Daftar</a>
        </div>

    </nav>

    <main>
        <section class="hero">
            <div class="hero-content">
                <div class="hero-label">
                    <span class="label-dot"></span>
                    Aplikasi Pengelolaan Keuangan Usaha
                </div>

                <h1>
                    Kelola Keuangan Usaha Lebih <span>Mudah.</span>
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
            </div>

            <div class="hero-visual">

                <div class="visual-decoration"></div>

                <div class="visual-card">

                    <div class="visual-header">
                        <div class="visual-title">
                            Ringkasan Keuangan
                        </div>

                        <div class="visual-badge">
                            PROFITPILOT
                        </div>
                    </div>

                    <div class="summary-label">
                        Contoh Total Omzet
                    </div>

                    <div class="summary-value">
                        Rp 5.250.000
                    </div>

                    <div class="chart">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>

                    <div class="chart-days">
                        <span>Sen</span>
                        <span>Sel</span>
                        <span>Rab</span>
                        <span>Kam</span>
                        <span>Jum</span>
                        <span>Sab</span>
                        <span>Min</span>
                    </div>

                </div>

            </div>

        </section>

        <section class="features">

            <h2>Fitur ProfitPilot</h2>

            <p class="features-description">
                Berbagai fitur untuk membantu pengelolaan
                keuangan dan data usaha Anda.
            </p>

            <div class="feature-grid">

                <div class="feature-card">

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
                        Catat pemasukan dan pengeluaran usaha
                        dengan lebih mudah dan terorganisir.
                    </p>

                </div>

                <div class="feature-card">

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
                        Kelola nama barang, harga, dan stok
                        agar data persediaan lebih tertata.
                    </p>

                </div>

                <div class="feature-card">

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
                        Pantau hasil keuangan usaha melalui
                        ringkasan dan grafik omzet.
                    </p>

                </div>

            </div>

        </section>

    </main>

    <footer>
        © {{ date('Y') }} ProfitPilot. Aplikasi Pengelolaan Keuangan Usaha.
        <br>
        Kelola usaha dengan lebih teratur dan efisien.
    </footer>

</body>
</html>
