@extends('admin.layouts.app')

@section('title', 'ProfitPilot — Detail User')
@section('page-title', 'Detail User')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Admin/detail-user.css') }}">
@endpush

@section('content')

    <div class="page-intro detail-heading">
        <div>
            <h2>Detail Akun</h2>
            <p>Lihat informasi lengkap akun pengguna ProfitPilot.</p>
        </div>

        <a href="{{ route('admin.users') }}" class="back-link">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"/>
                <path d="M9 12h12"/>
            </svg>
            Kembali ke Data Users
        </a>
    </div>

    <main class="content-card">

        <div class="card-header">

            <div class="header-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
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

            <h3 class="section-title">Informasi Akun</h3>

            <div class="detail-list">

                <div class="detail-item">

                    <div class="detail-label">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

                <div class="detail-item">

                    <div class="detail-label">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                            <svg id="eye-open" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                <circle cx="12" cy="12" r="3"/>
                            </svg>

                            <svg id="eye-closed" class="eye-off" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3l18 18"/>
                                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"/>
                                <path d="M9.9 5.2A11 11 0 0 1 12 5c6.5 0 10 7 10 7a15 15 0 0 1-3.2 4.1"/>
                                <path d="M6.6 6.6C3.6 8.5 2 12 2 12s3.5 7 10 7c1 0 1.9-.2 2.8-.5"/>
                            </svg>
                        </button>

                    </div>

                </div>

                <div class="detail-item">

                    <div class="detail-label">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="17" rx="2"/>
                            <path d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>
                        Tanggal Daftar
                    </div>

                    <div class="detail-value">
                        {{ $user->created_at->format('d/m/Y') }}
                    </div>

                </div>

                <div class="detail-item">

                    <div class="detail-label">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

        <div class="card-footer">

            <p class="footer-note">
                Data pengguna ProfitPilot
            </p>

            <div class="footer-actions">
                <a href="{{ route('admin.users', ['edit' => $user->id]) }}" class="footer-button secondary">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20h9"/>
                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                    </svg>
                    Edit User
                </a>

                <a href="{{ route('admin.users') }}" class="footer-button">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"/>
                        <path d="M9 12h12"/>
                    </svg>
                    Kembali ke Data Users
                </a>
            </div>

        </div>

    </main>

@endsection

@push('scripts')
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
@endpush
