<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>Login - ProfitPilot</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-container">

    <section class="left-panel">

        <a href="{{ url('/') }}" class="brand">
            <span class="brand-icon">
                <svg viewBox="0 0 64 64"
                     xmlns="http://www.w3.org/2000/svg"
                     role="img"
                     aria-label="Logo ProfitPilot">

                    <rect x="5" y="39" width="9" height="17"
                          rx="2" fill="#2563A6"/>
                    <rect x="18" y="30" width="9" height="26"
                          rx="2" fill="#2563A6"/>
                    <rect x="31" y="21" width="9" height="35"
                          rx="2" fill="#2563A6"/>

                    <path d="M7 31 L21 22 L34 24 L45 13"
                          fill="none"
                          stroke="#FFFFFF"
                          stroke-width="3.5"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>

                    <path d="M43 12
                             L59 3
                             L53 19
                             L48 16
                             L44 22
                             L41 20
                             L44 14
                             Z"
                          fill="#FFFFFF"
                          stroke="#FFFFFF"
                          stroke-width="1"
                          stroke-linejoin="round"/>
                </svg>
            </span>

            <span>Profit<span class="brand-accent">Pilot</span></span>
        </a>

        <div class="hero-content">
            <span class="eyebrow">BUSINESS MANAGEMENT</span>

            <h1>
                Kendalikan Bisnis.<br>
                <span>Kembangkan Profit.</span>
            </h1>

            <p>
                Kelola pemasukan, pengeluaran, dan omzet bisnis
                dengan lebih mudah dalam satu tempat.
            </p>

            <div class="hero-graphic" aria-hidden="true">
                <div class="graphic-bar bar-one"></div>
                <div class="graphic-bar bar-two"></div>
                <div class="graphic-bar bar-three"></div>
                <div class="graphic-bar bar-four"></div>

                <svg viewBox="0 0 300 120"
                     xmlns="http://www.w3.org/2000/svg"
                     preserveAspectRatio="xMidYMid meet">

                    <path d="M12 99 L76 78 L125 84 L185 44 L242 51 L266 27"
                          fill="none"
                          stroke="#06B6D4"
                          stroke-width="4"
                          stroke-linecap="round"
                          stroke-linejoin="round"/>

                    <g transform="translate(263 4) scale(1.15) rotate(0 10 10)">
                        <path d="M0 10
                                 L25 0
                                 L17 20
                                 L11 15
                                 L6 25
                                 L2 23
                                 L6 13
                                 Z"
                              fill="#A5F3FC"
                              stroke="#A5F3FC"
                              stroke-width="1"
                              stroke-linejoin="round"/>
                    </g>
                </svg>
            </div>
        </div>

        <p class="left-footer">
            ProfitPilot &copy; {{ date('Y') }} · Kelola bisnis lebih terarah.
        </p>

    </section>

    <section class="right-panel">
        <div class="login-card">

            <div class="mobile-brand">
                <span class="brand-icon">
                    <svg viewBox="0 0 64 64"
                         xmlns="http://www.w3.org/2000/svg"
                         role="img"
                         aria-label="Logo ProfitPilot">

                        <rect x="5" y="39" width="9" height="17"
                              rx="2" fill="#2563A6"/>
                        <rect x="18" y="30" width="9" height="26"
                              rx="2" fill="#2563A6"/>
                        <rect x="31" y="21" width="9" height="35"
                              rx="2" fill="#2563A6"/>

                        <path d="M7 31 L21 22 L34 24 L45 13"
                              fill="none"
                              stroke="#FFFFFF"
                              stroke-width="3.5"
                              stroke-linecap="round"
                              stroke-linejoin="round"/>

                        <path d="M43 12
                                 L59 3
                                 L53 19
                                 L48 16
                                 L44 22
                                 L41 20
                                 L44 14
                                 Z"
                              fill="#FFFFFF"
                              stroke="#FFFFFF"
                              stroke-width="1"
                              stroke-linejoin="round"/>
                    </svg>
                </span>

                <span>Profit<span class="brand-accent">Pilot</span></span>
            </div>

            <div class="form-heading">
                <span class="form-label">SELAMAT DATANG </span>
                <h2>Login</h2>
                <p>Masuk untuk mengelola bisnis kamu.</p>
            </div>

            @if ($errors->any())
                <div class="alert-error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form id="loginForm"
                  method="POST"
                  action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Nama Toko</label>
                    <input
                        type="text"
                        id="username"
                        name="nama_toko"
                        value="{{ old('nama_toko') }}"
                        placeholder="Masukkan nama toko"
                        autocomplete="username"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >
                </div>

                <button type="submit" class="login-button">
                    <span>LOGIN</span>
                    <span aria-hidden="true">→</span>
                </button>
            </form>

            <div class="form-divider">
                <span>Pengguna baru?</span>
            </div>

            <p class="signup-link">
                Belum punya akun?
                <a href="{{ route('signup') }}">Daftar sekarang</a>
            </p>

            <p class="security-note">
                Data bisnis kamu dikelola melalui akun masing-masing.
            </p>
        </div>
    </section>
</div>
<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
