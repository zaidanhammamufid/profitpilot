@extends('admin.layouts.app')

@section('title', 'ProfitPilot — Dashboard Admin')
@section('page-title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Admin/dashboard.css') }}">
@endpush

@section('content')

    <section class="page-intro">
        <h2>Selamat Datang, Admin!</h2>
        <p>
            Kelola data pengguna dan pantau informasi
            ProfitPilot melalui halaman administrasi.
        </p>
    </section>

    <section class="statistics">

        <div class="stat-card">

            <div class="stat-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21V19C16 16.8 14.2 15 12 15H6C3.8 15 2 16.8 2 19V21"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M20 21V19C20 17.2 18.8 15.7 17 15.2"/>
                    <path d="M16 3.2C17.8 3.7 19 5.2 19 7C19 8.8 17.8 10.3 16 10.8"/>
                </svg>
            </div>

            <div class="stat-info">
                <p>Total User Terdaftar</p>
                <h2>{{ $totalUser }}</h2>
                <small>Jumlah seluruh pengguna ProfitPilot</small>
            </div>

        </div>

    </section>

    <section class="quick-section">

        <h3>Akses Cepat</h3>

        <div class="quick-card">

            <div>
                <h4>Kelola Data Users</h4>
                <p>Lihat dan kelola akun pengguna ProfitPilot.</p>
            </div>

            <a href="{{ route('admin.users') }}" class="quick-button">
                Lihat Users

                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12H19"/>
                    <path d="M12 5L19 12L12 19"/>
                </svg>
            </a>

        </div>

    </section>

@endsection
