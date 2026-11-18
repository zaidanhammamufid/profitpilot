@extends('admin.layouts.app')

@section('title', 'ProfitPilot — Profil Admin')
@section('page-title', 'Profil Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Admin/profil.css') }}">
@endpush

@section('content')

    <section class="page-intro">
        <h2>Informasi Profil</h2>
        <p>Informasi akun administrator ProfitPilot.</p>
    </section>

    <div class="profile-card">

        <div class="profile-header">
            <div class="profile-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                </svg>
            </div>

            <div>
                <h3>{{ $admin->nama_toko }}</h3>
                <p>Administrator ProfitPilot</p>
            </div>
        </div>

        <div class="profile-divider"></div>

        <div class="profile-details">
            <div class="detail-item">
                <div class="detail-label">Nama Admin</div>
                <div class="detail-value">{{ $admin->nama_toko }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Role</div>
                <div class="detail-value">
                    <span class="role-badge">Administrator</span>
                </div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Tanggal Dibuat</div>
                <div class="detail-value">
                    {{ $admin->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>

        <div class="profile-actions">
            <a href="{{ route('admin.dashboard') }}" class="back-button">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>

    </div>

@endsection
