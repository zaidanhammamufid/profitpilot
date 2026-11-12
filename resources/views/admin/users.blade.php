<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0F2A43">

    <title>Data Users - ProfitPilot</title>

    <link rel="stylesheet" href="{{ asset('css/admin/users.css') }}">
</head>

<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<div class="container">

    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <div class="brand-icon">
                <svg viewBox="0 0 40 40" fill="none">
                    <rect x="5" y="22" width="6" height="13" rx="2" fill="white"/>
                    <rect x="16" y="15" width="6" height="20" rx="2" fill="white"/>
                    <rect x="27" y="7" width="6" height="28" rx="2" fill="white"/>
                    <path d="M7 17L17 10L24 13L34 4" stroke="#67E8F9" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>

            <h2 class="brand-text">Profit<span>Pilot</span></h2>

            <button type="button" class="sidebar-close"
                    onclick="toggleSidebar()" aria-label="Tutup menu">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M18 6L6 18M6 6L18 18"/>
                </svg>
            </button>
        </div>

        <p class="menu-label">MENU UTAMA</p>

        <nav class="sidebar-nav">

            <a href="{{ url('/admin/dashboard') }}" class="menu-link" title="Dashboard">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="8" height="8" rx="2"/>
                    <rect x="13" y="3" width="8" height="5" rx="2"/>
                    <rect x="13" y="10" width="8" height="11" rx="2"/>
                    <rect x="3" y="13" width="8" height="8" rx="2"/>
                </svg>
                <span class="nav-text">Dashboard</span>
            </a>

            <a href="{{ route('admin.users') }}" class="menu-link active" title="Data Users">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21V19C16 16.8 14.2 15 12 15H6C3.8 15 2 16.8 2 19V21"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M20 21V19C20 17.2 18.8 15.7 17 15.2"/>
                    <path d="M16 3.2C17.8 3.7 19 5.2 19 7C19 8.8 17.8 10.3 16 10.8"/>
                </svg>
                <span class="nav-text">Data Users</span>
            </a>

            <a href="{{ route('admin.profil') }}" class="menu-link" title="Profil">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 21C4 16.6 7.6 13 12 13C16.4 13 20 16.6 20 21"/>
                </svg>
                <span class="nav-text">Profil</span>
            </a>

        </nav>

        <div class="sidebar-bottom">
            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit" class="logout-link" title="Logout">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 17L15 12L10 7"/>
                        <path d="M15 12H3"/>
                        <path d="M12 3H19C20.1 3 21 3.9 21 5V19C21 20.1 20.1 21 19 21H12"/>
                    </svg>
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
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M4 6H20M4 12H20M4 18H20"/>
                    </svg>
                </button>

                <div>
                    <p class="topbar-label">ADMIN PANEL</p>
                    <h1>Data Users</h1>
                </div>

            </div>

        </header>

        <section class="page-intro">
            <h2>Data Pengguna</h2>
            <p>
                Kelola dan lihat seluruh data pengguna ProfitPilot.
            </p>
        </section>

        <section class="table-card">

            <div class="table-heading">
                <div>
                    <h2>Daftar Pengguna</h2>
                    <p>Informasi akun pengguna yang terdaftar.</p>
                </div>
            </div>

            <div class="table-responsive">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Toko</th>
                            <th>Password</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($users as $index => $user)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td class="nama-toko">
                                    {{ $user->nama_toko }}
                                </td>

                                <td>
                                    <div class="password-cell">

                                        <span
                                            id="password-{{ $user->id }}"
                                            data-password="{{ $user->password_tampil }}"
                                        >••••••••</span>

                                        <button
                                            type="button"
                                            class="password-button"
                                            onclick="lihatPassword({{ $user->id }})"
                                            id="button-{{ $user->id }}"
                                            aria-label="Lihat password"
                                        >
                                            <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M2 12C4.5 7.5 8 5 12 5C16 5 19.5 7.5 22 12C19.5 16.5 16 19 12 19C8 19 4.5 16.5 2 12Z"/>
                                                <circle cx="12" cy="12" r="3"/>
                                            </svg>
                                        </button>

                                    </div>
                                </td>

                                <td>
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>

                                <td>
                                    <div class="action-buttons">

                                        <a
                                            href="{{ route('admin.user.show', $user->id) }}"
                                            class="detail-button"
                                        >
                                            Detail
                                        </a>

                                        <a
                                            href="{{ route('admin.user.edit', $user->id) }}"
                                            class="edit-button"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.user.destroy', $user->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="delete-button">
                                                Hapus
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="empty-data">
                                    Belum ada user.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>

    </main>

</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('active');
            document.body.classList.toggle('sidebar-open');
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }
    }

    function lihatPassword(id) {
        const password = document.getElementById('password-' + id);
        const button = document.getElementById('button-' + id);

        if (password.textContent.trim() === '••••••••') {
            password.textContent = password.dataset.password;
            button.classList.add('password-visible');
            button.setAttribute('aria-label', 'Sembunyikan password');
        } else {
            password.textContent = '••••••••';
            button.classList.remove('password-visible');
            button.setAttribute('aria-label', 'Lihat password');
        }
    }
</script>

</body>
</html>
