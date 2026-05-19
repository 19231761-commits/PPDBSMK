@extends('layouts.auth-ppdb')

@section('title', 'Daftar Akun - PPDB SMK Sehati Karawang')
@section('form_title', 'Daftar Akun')

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
            flex-direction: column;
            align-items: flex-start;
        }
    }
</style>
@endpush

@section('card_content')
    <h2 style="margin: 0 0 8px 0; font-size: 28px; font-weight: 900; letter-spacing: -0.5px;">Daftar Akun</h2>
    <p style="margin: 0 0 24px 0; color: #6b7280; font-size: 15px; line-height: 1.5;">Buat akun baru untuk calon pendaftar</p>

    <form action="{{ route('backend.register.store') }}" method="POST" id="registerForm">
        @csrf

        <div class="form-group">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <div class="input-wrap">
                <i class="mdi mdi-account-outline icon"></i>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required class="auth-input" placeholder="Nama lengkap">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <div class="input-wrap">
                <i class="mdi mdi-email-outline icon"></i>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="auth-input" placeholder="Email aktif">
            </div>
        </div>

        <div class="form-group">
            <label for="hp" class="form-label">No. Telepon</label>
            <div class="input-wrap">
                <i class="mdi mdi-phone icon"></i>
                <input id="hp" type="tel" name="hp" value="{{ old('hp') }}" class="auth-input" placeholder="08xxxxxxxxxx">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Kata Sandi</label>
            <div class="input-wrap">
                <i class="mdi mdi-lock-outline icon"></i>
                <input id="password" type="password" name="password" required class="auth-input" placeholder="Buat kata sandi">
                <button type="button" class="show-pass" data-toggle-password data-target="password" data-icon="eyeIcon" aria-label="Tampilkan password" aria-pressed="false"><span id="eyeIcon" class="password-eye"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg></span></button>
            </div>
        </div>

        <button class="btn-main" type="submit">Daftar</button>

        <div class="foot-link">Sudah punya akun? <a href="{{ route('backend.login') }}">Masuk di sini</a></div>
    </form>
@endsection


