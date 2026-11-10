<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#2563A6">

    <title>Edit User - ProfitPilot</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #2563A6;
            --navy-light: #1D4F91;
            --cyan: #06B6D4;
            --bg: #F8FAFC;
            --text: #1E293B;
            --muted: #64748B;
            --border: #E2E8F0;
            --white: #FFFFFF;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* CONTAINER */

        .container {
            min-height: 100vh;
            padding: 40px 20px;
        }

        /* CARD */

        .card {
            max-width: 620px;
            margin: 0 auto;
            background: var(--white);
            padding: 32px;
            border-radius: 14px;
            border: 1px solid var(--border);
            box-shadow: 0 4px 15px rgba(37, 99, 166, 0.10);
        }

        /* HEADER */

        .page-header {
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }

        .page-label {
            color: var(--cyan);
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.3px;
            margin-bottom: 8px;
        }

        h1 {
            color: var(--navy);
            font-size: 25px;
            margin-bottom: 8px;
        }

        .description {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
        }

        /* ERROR */

        .error {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 22px;
            font-size: 13px;
            line-height: 1.6;
        }

        .error ul {
            margin-top: 8px;
            margin-left: 20px;
        }

        /* FORM */

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 9px;
            color: var(--text);
            font-size: 13px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: var(--white);
            color: var(--text);
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: var(--cyan);
            box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.12);
        }

        input::placeholder {
            color: #94A3B8;
        }

        .input-hint {
            display: block;
            margin-top: 8px;
            color: var(--muted);
            font-size: 11px;
            line-height: 1.5;
        }

        /* BUTTONS */

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }

        .buttons button,
        .buttons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            transition: 0.2s;
        }

        .save {
            background: var(--navy);
            color: var(--white);
        }

        .save:hover {
            background: var(--navy-light);
        }

        .cancel {
            background: #F1F5F9;
            color: var(--text);
        }

        .cancel:hover {
            background: #E2E8F0;
        }

        .buttons svg {
            width: 17px;
            height: 17px;
        }

        /* MOBILE */

        @media (max-width: 600px) {

            .container {
                padding: 22px 14px;
            }

            .card {
                padding: 23px 18px;
                border-radius: 11px;
            }

            h1 {
                font-size: 22px;
            }

            .description {
                font-size: 13px;
            }

            .buttons {
                flex-direction: column;
            }

            .buttons button,
            .buttons a {
                width: 100%;
                padding: 13px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <div class="page-header">

            <p class="page-label">ADMIN PANEL</p>

            <h1>Edit User</h1>

            <p class="description">
                Ubah data pengguna ProfitPilot melalui formulir berikut.
            </p>

        </div>

        @if ($errors->any())

            <div class="error">

                <strong>Terjadi kesalahan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

        <form
            action="{{ route('admin.user.update', $user->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="nama_toko">
                    Nama Toko
                </label>

                <input
                    type="text"
                    id="nama_toko"
                    name="nama_toko"
                    value="{{ old('nama_toko', $user->nama_toko) }}"
                    placeholder="Masukkan nama toko"
                    required
                >

            </div>

            <div class="form-group">

                <label for="password">
                    Password Baru
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password baru"
                >

                <small class="input-hint">
                    Kosongkan jika tidak ingin mengubah password.
                </small>

            </div>

            <div class="buttons">

                <button type="submit" class="save">

                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/>
                        <path d="M17 21v-8H7v8"/>
                        <path d="M7 3v5h8"/>
                    </svg>

                    Simpan Perubahan

                </button>

                <a
                    href="{{ url('/admin/dashboard') }}"
                    class="cancel"
                >

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>
</body>
</html>
