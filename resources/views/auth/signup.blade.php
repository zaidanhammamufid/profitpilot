<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>Daftar - ProfitPilot</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #2563a6;
            --navy-light: #1d4f91;
            --cyan: #06b6d4;
            --cyan-light: #a5f3fc;
            --bg: #f8fafc;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --white: #ffffff;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .signup-container {
            display: flex;
            min-height: 100vh;
        }

        .left-panel {
            width: 50%;
            min-height: 100vh;
            padding: 45px 65px 30px;
            background: linear-gradient(145deg, var(--navy), var(--navy-light));
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--white);
            text-decoration: none;
            font-size: 25px;
            font-weight: 800;
            width: fit-content;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--cyan-light);
            border-radius: 12px;
            padding: 5px;
        }

        .brand-icon svg {
            width: 100%;
            height: 100%;
        }

        .brand-accent {
            color: var(--cyan-light);
        }

        .hero-content {
            max-width: 510px;
            margin: 55px 0;
        }

        .eyebrow {
            display: inline-block;
            color: var(--cyan-light);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .hero-content h1 {
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .hero-content h1 span {
            color: var(--cyan-light);
        }

        .hero-content p {
            color: #dbeafe;
            font-size: 15px;
            line-height: 1.8;
            max-width: 430px;
        }

        .hero-graphic {
            width: 100%;
            max-width: 430px;
            height: 190px;
            margin-top: 35px;
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: space-around;
            padding: 0 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .graphic-bar {
            width: 45px;
            border-radius: 8px 8px 0 0;
            background: rgba(165, 243, 252, 0.13);
            border: 1px solid rgba(165, 243, 252, 0.2);
        }

        .bar-one {
            height: 45px;
        }

        .bar-two {
            height: 80px;
        }

        .bar-three {
            height: 110px;
        }

        .bar-four {
            height: 145px;
        }

        .hero-graphic svg {
            position: absolute;
            width: 100%;
            height: 120px;
            top: 15px;
            left: 0;
            overflow: visible;
        }

        .left-footer {
            color: #bfdbfe;
            font-size: 12px;
        }

        .right-panel {
            width: 50%;
            min-height: 100vh;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg);
        }

        .signup-card {
            width: 100%;
            max-width: 440px;
            background: var(--white);
            padding: 42px;
            border-radius: 20px;
            box-shadow: 0 15px 45px rgba(37, 99, 166, 0.1);
        }

        .mobile-brand {
            display: none;
        }

        .form-heading {
            margin-bottom: 30px;
        }

        .form-label {
            color: var(--cyan);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.5px;
        }

        .form-heading h2 {
            font-size: 30px;
            color: var(--navy);
            margin: 10px 0;
        }

        .form-heading p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        .alert-error {
            padding: 12px 15px;
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: 9px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: var(--text);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-group input {
            width: 100%;
            height: 48px;
            padding: 0 15px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            color: var(--text);
            transition: 0.2s;
        }

        .form-group input:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.12);
        }

        .form-group input::placeholder {
            color: #94a3b8;
        }

        .signup-button {
            width: 100%;
            height: 49px;
            border: none;
            border-radius: 9px;
            background: var(--navy);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: 0.2s;
            margin-top: 8px;
        }

        .signup-button:hover {
            background: var(--navy-light);
            transform: translateY(-1px);
        }

        .form-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 27px 0 20px;
            color: var(--muted);
            font-size: 12px;
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .login-link {
            text-align: center;
            font-size: 13px;
            color: var(--muted);
        }

        .login-link a {
            color: #0891b2;
            font-weight: 700;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .security-note {
            text-align: center;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 25px;
            line-height: 1.6;
        }

        @media (max-width: 900px) {
            .left-panel {
                padding: 35px;
            }

            .right-panel {
                padding: 25px;
            }

            .signup-card {
                padding: 32px 25px;
            }
        }

        @media (max-width: 700px) {
            .signup-container {
                flex-direction: column;
            }

            .left-panel {
                width: 100%;
                min-height: auto;
                padding: 30px 25px;
            }

            .brand {
                font-size: 22px;
            }

            .hero-content {
                margin: 45px 0 20px;
            }

            .hero-content h1 {
                font-size: 34px;
            }

            .hero-content p {
                font-size: 13px;
            }

            .hero-graphic {
                max-width: 100%;
                height: 145px;
                margin-top: 20px;
            }

            .hero-graphic svg {
                height: 100px;
            }

            .graphic-bar {
                width: 35px;
            }

            .left-footer {
                margin-top: 15px;
            }

            .right-panel {
                width: 100%;
                min-height: auto;
                padding: 30px 20px;
            }

            .signup-card {
                max-width: 480px;
                padding: 30px 24px;
            }

            .mobile-brand {
                display: none;
            }
        }

        @media (max-width: 400px) {
            .hero-content h1 {
                font-size: 29px;
            }

            .signup-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<div class="signup-container">

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

        <div class="signup-card">

            <div class="form-heading">
                <span class="form-label">MULAI BERSAMA PROFITPILOT</span>
                <h2>Buat Akun</h2>
                <p>
                    Daftarkan toko kamu dan mulai kelola bisnis
                    dengan lebih mudah.
                </p>
            </div>

            @if ($errors->any())
                <div class="alert-error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form id="signupForm"
                  method="POST"
                  action="{{ route('signup') }}">
                @csrf

                <div class="form-group">
                    <label for="username">Nama Toko</label>
                    <input
                        type="text"
                        id="username"
                        name="nama_toko"
                        value="{{ old('nama_toko') }}"
                        placeholder="Masukkan nama toko"
                        autocomplete="organization"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Buat password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Konfirmasi Password</label>
                    <input
                        type="password"
                        id="confirmPassword"
                        name="password_confirmation"
                        placeholder="Masukkan ulang password"
                        autocomplete="new-password"
                        required
                    >
                </div>

                <button type="submit" class="signup-button">
                    <span>Daftar Sekarang</span>
                    <span aria-hidden="true">→</span>
                </button>
            </form>

            <div class="form-divider">
                <span>Sudah punya akun?</span>
            </div>

            <p class="login-link">
                Sudah terdaftar?
                <a href="{{ url('/') }}">Login sekarang</a>
            </p>

            <p class="security-note">
                Data bisnis kamu dikelola melalui akun masing-masing.
            </p>

        </div>

    </section>

</div>
<script src="{{ asset('js/signup.js') }}"></script>
</body>
</html>
