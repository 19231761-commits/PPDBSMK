@extends('layouts.auth-ppdb')

@section('title', 'Login - PPDB SMK Sehati Karawang')
@section('form_title', 'Login')

@section('hero_title')
    Sistem Penerimaan Murid Baru<br><span>Tahun 2025/2026</span>
@endsection

@section('hero_desc')
    Alamat: Jl. Raya Kosambi – Telagasari (Area Perumahan Citra Swarna Grande) Desa Pancawati, Kec. Klari, Kab. Karawang, Provinsi Jawa Barat (41371)
@endsection

@push('styles')
<style>
    .form-group { margin-bottom: 14px; }
    
    .row-meta {
        margin-top: 18px;
        margin-bottom: 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        color: #475467;
    }

    .row-meta label {
        margin: 0;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    @media (max-width: 640px) {
        .row-meta {
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .row-meta a {
            flex-shrink: 0;
        }
    }
</style>
@endpush

@section('card_content')
    <h2 style="margin: 0 0 6px 0; font-size: 20px; font-weight: 800;">Masuk</h2>
    <p style="margin: 0 0 18px 0; color: #6b7280;">Gunakan email dan kata sandi Anda</p>

    <form method="POST" action="{{ route('backend.login.authenticate') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <div class="input-wrap">
                <i class="mdi mdi-account-outline icon"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="auth-input" placeholder="Masukkan email">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-wrap">
                <i class="mdi mdi-lock-outline icon"></i>
                <input id="password" type="password" name="password" required class="auth-input" placeholder="Masukkan kata sandi">
                <button type="button" class="show-pass" data-toggle-password data-target="password" data-icon="eyeIcon" aria-label="Tampilkan password" aria-pressed="false"><span id="eyeIcon" class="password-eye"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg></span></button>
            </div>
        </div>

        <div class="row-meta">
            <label><input type="checkbox" name="remember" id="remember"> Ingat saya</label>
            <a href="javascript:void(0)" style="color: #7c3aed; text-decoration: none; font-weight: 600;">Lupa kata sandi?</a>
        </div>

        <button class="btn-main" type="submit">Masuk</button>

        <div class="foot-link">Belum punya akun? <a href="{{ route('backend.register') }}">Daftar sekarang</a></div>
    </form>
@endsection


