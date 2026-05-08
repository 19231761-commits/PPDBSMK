<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Registrasi • PPDB SMK Sehati Karawang</title>

    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/custom-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
</head>

<body class="auth-page">
    <div class="auth-page-wrapper">
        <div class="row g-0 align-items-stretch">
            <!-- Left Side - Hero -->
            <div class="col-12 col-lg-7 d-none d-lg-flex">
                <div class="auth-left">
                    <div class="auth-hero">
                        <div class="auth-brand">
                            <img class="auth-logo" src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo">
                            <div>
                                <div class="auth-kicker">PPDB</div>
                                <h1 class="auth-hero h1 mb-0" style="font-size: 28px;">SMK Sehati Karawang</h1>
                            </div>
                        </div>

                        <h2 style="font-size: 24px; margin: 24px 0 12px; font-weight: 800;">Bergabunglah dengan Kami</h2>
                        <p class="auth-lead">Proses pendaftaran peserta didik baru yang mudah, cepat, dan terpercaya untuk SMK Sehati Karawang.</p>

                        <div class="auth-feature-grid">
                            <div class="auth-feature">
                                <i class="mdi mdi-check-circle"></i>
                                <strong>Daftar Online</strong>
                            </div>
                            <div class="auth-feature">
                                <i class="mdi mdi-file-document"></i>
                                <strong>Upload Berkas</strong>
                            </div>
                            <div class="auth-feature">
                                <i class="mdi mdi-cash"></i>
                                <strong>Pembayaran Mudah</strong>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 24px;">
                            <div class="auth-stat">
                                <strong style="font-size: 20px;">2,500+</strong>
                                <span>Pendaftar Tahun Lalu</span>
                            </div>
                            <div class="auth-stat">
                                <strong style="font-size: 20px;">98%</strong>
                                <span>Tingkat Kepuasan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="col-12 col-lg-5">
                <div class="auth-right">
                    <div class="auth-card">
                        <div class="auth-card-head">
                            <div class="auth-pill">Buat Akun Baru</div>
                            <h3>Registrasi Pendaftar</h3>
                            <p style="color: #64748b; margin: 0; font-size: 14px;">Isi data dengan benar untuk membuat akun Anda.</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <div class="fw-semibold mb-2">Periksa kembali input Anda:</div>
                                <ul class="mb-0 pl-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('backend.register.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label" style="color: #2d1b4e; font-weight: 600;">Nama Lengkap *</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-account-outline"></i>
                                    <input id="nama" type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #2d1b4e; font-weight: 600;">Email *</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-email-outline"></i>
                                    <input id="email" type="email" name="email" class="form-control form-control-lg" placeholder="nama@email.com" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hp" class="form-label" style="color: #2d1b4e; font-weight: 600;">No. Telepon *</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-phone-outline"></i>
                                    <input id="hp" type="tel" name="hp" class="form-control form-control-lg" placeholder="08xxxxxxxxxx" value="{{ old('hp') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #2d1b4e; font-weight: 600;">Password *</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password" required>
                                </div>
                                <small style="color: #64748b; display: block; margin-top: 6px;">Minimal 6 karakter, gunakan kombinasi huruf dan angka.</small>
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label" style="color: #2d1b4e; font-weight: 600;">Konfirmasi Password *</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-lock-check-outline"></i>
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Konfirmasi password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-lg w-100 auth-submit">Buat Akun</button>

                            <div class="auth-card-foot">
                                Sudah punya akun? <a href="{{ route('backend.login') }}" style="color: #a855f7; text-decoration: none; font-weight: 600;">Masuk di sini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .auth-page-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .auth-page-wrapper .row {
            width: 100%;
        }

        @media (max-width: 991px) {
            .auth-left {
                display: none !important;
            }

            .auth-right {
                width: 100% !important;
                padding: 28px 18px !important;
            }

            .auth-card {
                padding: 28px 22px !important;
            }
        }
    </style>

    <script src="{{ asset('backend/dist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>

</body>

</html>