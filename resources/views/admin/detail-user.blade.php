<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">
    <title>Detail User - ProfitPilot</title>

    <style>
        :root {
            --navy: #2563A6;
            --navy-light: #1D4F91;
            --cyan: #06B6D4;
            --bg: #F8FAFC;
            --white: #FFFFFF;
            --text: #1E293B;
            --muted: #64748B;
            --border: #E2E8F0;
            --shadow: 0 8px 25px rgba(37, 99, 166, 0.10);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .page-container {
            max-width: 1050px;
            margin: 0 auto;
            padding: 35px;
        }

        /* HEADER */

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 15px;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .back-button {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 11px;
            color: var(--navy);
            text-decoration: none;
            transition: .2s;
        }

        .back-button:hover {
            background: var(--navy);
            color: white;
        }

        .back-button svg {
            width: 20px;
            height: 20px;
        }

        .page-title {
            font-size: 23px;
            font-weight: 700;
            color: var(--navy);
        }

        .page-subtitle {
            font-size: 13px;
            color: var(--muted);
            margin-top: 5px;
        }

        .brand-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--navy);
            font-size: 14px;
            font-weight: 700;
        }

        .brand-icon {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--navy);
            border-radius: 9px;
            color: white;
        }

        .brand-icon svg {
            width: 20px;
            height: 20px;
        }

        /* CONTENT */

        .content-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 17px;
            box-shadow: var(--shadow);
            overflow: hidden;
        }

        .card-header {
            padding: 25px 30px;
            background: linear-gradient(
                120deg,
                var(--navy),
                var(--navy-light)
            );
            color: white;
            display: flex;
            align-items: center;
            gap: 17px;
        }

        .header-icon {
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 14px;
        }

        .header-icon svg {
            width: 27px;
            height: 27px;
        }

        .card-header h2 {
            font-size: 19px;
            margin-bottom: 6px;
        }

        .card-header p {
            color: #E0F2FE;
            font-size: 13px;
        }

        .card-body {
            padding: 30px;
        }

        .section-title {
            color: var(--navy);
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .detail-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px;
        }

        .detail-item {
            padding: 19px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: #F8FAFC;
            min-width: 0;
        }

        .detail-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--muted);
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .detail-label svg {
            width: 17px;
            height: 17px;
            color: var(--cyan);
        }

        .detail-value {
            color: var(--text);
            font-size: 16px;
            font-weight: 700;
            overflow-wrap: anywhere;
        }

        /* PASSWORD */

        .password-cell {
            display: flex;
            align-items: center;
            gap: 12px;
            min-height: 20px;
        }

        .password-button {
            width: 32px;
            height: 32px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: var(--muted);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s;
            flex-shrink: 0;
        }

        .password-button:hover {
            background: #ECFEFF;
            color: var(--cyan);
            border-color: var(--cyan);
        }

        .password-button svg {
            width: 18px;
            height: 18px;
        }

        .eye-off {
            display: none;
        }

        /* FOOTER */

        .card-footer {
            padding: 20px 30px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .footer-note {
            font-size: 12px;
            color: var(--muted);
        }

        .footer-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 12px 19px;
            border-radius: 9px;
            background: var(--navy);
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .footer-button:hover {
            background: var(--navy-light);
            transform: translateY(-1px);
        }

        .footer-button svg {
            width: 17px;
            height: 17px;
        }

        /* RESPONSIVE */

        @media (max-width: 650px) {
            .page-container {
                padding: 20px 15px;
            }

            .topbar {
                align-items: flex-start;
            }

            .brand-label {
                display: none;
            }

            .page-title {
                font-size: 19px;
            }

            .card-header {
                padding: 21px;
            }

            .card-body {
                padding: 20px;
            }

            .detail-list {
                grid-template-columns: 1fr;
                gap: 13px;
            }

            .detail-item {
                padding: 17px;
            }

            .card-footer {
                padding: 18px 20px;
                flex-direction: column;
                align-items: stretch;
            }

            .footer-button {
                width: 100%;
            }

            .footer-note {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="page-container">

    <!-- HEADER -->
    <header class="topbar">

        <div class="topbar-left">

            <a href="{{ url('/admin/dashboard') }}"
               class="back-button"
               aria-label="Kembali">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <path d="m15 18-6-6 6-6"/>
                    <path d="M9 12h12"/>

                </svg>

            </a>

            <div>
                <h1 class="page-title">Detail User</h1>
                <p class="page-subtitle">
                    Informasi lengkap pengguna ProfitPilot
                </p>
            </div>

        </div>

        <div class="brand-label">

            <div class="brand-icon">
                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <path d="M3 17l6-6 4 4 8-9"/>
                    <path d="M15 6h6v6"/>

                </svg>
            </div>

            ProfitPilot

        </div>

    </header>


    <!-- DETAIL CARD -->
    <main class="content-card">

        <div class="card-header">

            <div class="header-icon">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <circle cx="12" cy="8" r="4"/>
                    <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>

                </svg>

            </div>

            <div>
                <h2>Informasi Pengguna</h2>
                <p>Berikut adalah detail akun pengguna.</p>
            </div>

        </div>


        <div class="card-body">

            <h3 class="section-title">
                Informasi Akun
            </h3>

            <div class="detail-list">

                <!-- NAMA TOKO -->
                <div class="detail-item">

                    <div class="detail-label">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <path d="M3 21h18"/>
                            <path d="M5 21V7l8-4 6 4v14"/>
                            <path d="M9 21v-6h6v6"/>

                        </svg>

                        Nama Toko

                    </div>

                    <div class="detail-value">
                        {{ $user->nama_toko }}
                    </div>

                </div>


                <!-- PASSWORD -->
                <div class="detail-item">

                    <div class="detail-label">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <rect x="3" y="11" width="18" height="11" rx="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>

                        </svg>

                        Password

                    </div>

                    <div class="password-cell">

                        <span
                            id="password"
                            class="detail-value"
                            data-password="{{ $user->password_tampil }}"
                        >••••••••</span>

                        <button
                            type="button"
                            class="password-button"
                            onclick="lihatPassword()"
                            id="password-button"
                            aria-label="Lihat password"
                        >

                            <svg
                                id="eye-open"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>

                            <svg
                                id="eye-closed"
                                class="eye-off"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M3 3l18 18"/>
                                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                                <path d="M9.9 5.2A11 11 0 0 1 12 5c6.5 0 10 7 10 7a15 15 0 0 1-3.2 4.1"/>
                                <path d="M6.6 6.6C3.6 8.5 2 12 2 12s3.5 7 10 7c1 0 1.9-.2 2.8-.5"/>
                            </svg>

                        </button>

                    </div>

                </div>


                <!-- TANGGAL DAFTAR -->
                <div class="detail-item">

                    <div class="detail-label">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <rect x="3" y="4" width="18" height="17" rx="2"/>
                            <path d="M16 2v4M8 2v4M3 10h18"/>

                        </svg>

                        Tanggal Daftar

                    </div>

                    <div class="detail-value">
                        {{ $user->created_at->format('d/m/Y') }}
                    </div>

                </div>


                <!-- TERAKHIR DIUBAH -->
                <div class="detail-item">

                    <div class="detail-label">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 7v5l3 2"/>

                        </svg>

                        Terakhir Diubah

                    </div>

                    <div class="detail-value">
                        {{ $user->updated_at->format('d/m/Y') }}
                    </div>

                </div>

            </div>

        </div>


        <!-- FOOTER -->
        <div class="card-footer">

            <p class="footer-note">
                Data pengguna ProfitPilot
            </p>

            <a href="{{ url('/admin/dashboard') }}"
               class="footer-button">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <path d="m15 18-6-6 6-6"/>
                    <path d="M9 12h12"/>

                </svg>

                Kembali ke Dashboard

            </a>

        </div>

    </main>

</div>


<script>
    function lihatPassword() {

        const password = document.getElementById('password');
        const button = document.getElementById('password-button');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');

        const sedangTerlihat = password.dataset.visible === 'true';

        if (sedangTerlihat) {

            password.textContent = '••••••••';
            password.dataset.visible = 'false';

            eyeOpen.style.display = 'block';
            eyeClosed.style.display = 'none';

            button.setAttribute('aria-label', 'Lihat password');

        } else {

            password.textContent = password.dataset.password;
            password.dataset.visible = 'true';

            eyeOpen.style.display = 'none';
            eyeClosed.style.display = 'block';

            button.setAttribute('aria-label', 'Sembunyikan password');

        }
    }
</script>
</body>
</html>
