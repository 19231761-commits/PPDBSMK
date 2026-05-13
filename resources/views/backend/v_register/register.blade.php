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
    <style>
        .auth-contact {
            margin-top: 18px;
            padding: 14px 16px;
            border: 1px solid #dbe7f5;
            border-radius: 14px;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .auth-contact .auth-contact-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .auth-contact .auth-contact-title i {
            font-size: 18px;
        }

        .auth-contact .auth-contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .auth-contact .auth-contact-list li {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 6px;
            color: #334155;
            font-size: 13px;
        }

        .auth-contact .auth-contact-list li:last-child {
            margin-bottom: 0;
        }

        .auth-contact .auth-contact-list i {
            font-size: 16px;
            flex: 0 0 auto;
            color: #7c3aed;
        }

        .auth-brand-slim {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 24px;
        }

        .auth-brand-slim h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 800;
            line-height: 1.15;
        }

        .auth-brand-slim .auth-kicker {
            margin-bottom: 2px;
        }

        .auth-panel-title {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.15;
            margin: 0;
            color: #fff;
        }

        .auth-panel-subtitle {
            font-size: 14px;
            color: rgba(255,255,255,0.9);
            margin: 10px 0 0;
            max-width: 420px;
            line-height: 1.7;
        }

        .auth-hero-callout {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 24px;
        }

        .auth-callout {
            padding: 16px;
            border-radius: 12px;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.12);
            color: #fff;
            text-align: center;
        }

        .auth-callout strong {
            display: block;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .auth-callout span {
            font-size: 12px;
            opacity: 0.9;
        }

        .auth-subtitle {
            color: #64748b;
            margin: 0;
            font-size: 14px;
            line-height: 1.6;
        }

        .auth-note {
            color: #64748b;
            display: block;
            margin-top: 6px;
            font-size: 13px;
        }
    </style>
</head>

<body class="auth-page">
    <div class="auth-page-wrapper">
        <div class="row g-0 align-items-stretch">
            <!-- Left Side - Hero -->
            <div class="col-12 col-lg-7 d-none d-lg-flex">
                <div class="auth-left">
                    <div class="auth-hero">
                        <div class="auth-brand-slim">
                            <img class="auth-logo" src="{{ asset('image/logo_pendaftaran.png') }}" alt="Logo">
                            <div>
                                <div class="auth-kicker">PPDB</div>
                                <h1>SMK Sehati Karawang</h1>
                            </div>
                        </div>

                        <h2 class="auth-panel-title">Bergabunglah dengan Kami</h2>
                        <p class="auth-panel-subtitle">Proses pendaftaran peserta didik baru yang mudah, cepat, dan terpercaya untuk SMK Sehati Karawang.</p>

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

                        <div class="auth-hero-callout">
                            <div class="auth-callout">
                                <strong>Daftar Online</strong>
                                <span>Isi data, unggah berkas, dan lanjutkan proses.</span>
                            </div>
                            <div class="auth-callout">
                                <strong>Upload Berkas</strong>
                                <span>Dokumen pendaftaran tersusun lebih rapi.</span>
                            </div>
                            <div class="auth-callout">
                                <strong>Pembayaran Mudah</strong>
                                <span>Pantau pembayaran dalam satu sistem.</span>
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
                            <p class="auth-subtitle">Isi data dengan benar untuk membuat akun Anda.</p>

                            <div class="auth-contact">
                                <div class="auth-contact-title">
                                    <i class="mdi mdi-headset"></i>
                                    <span>Hubungi Contact Person</span>
                                </div>
                                <ul class="auth-contact-list">
                                    <li><i class="mdi mdi-whatsapp"></i> WhatsApp: 082211445533</li>
                                    <li><i class="mdi mdi-phone"></i> Telp: 082211445533</li>
                                    <li><i class="mdi mdi-email-outline"></i> Email: ppdb@smksehatikarawang</li>
                                </ul>
                            </div>
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
                                <label for="nama" class="form-label" style="color: #2d1b4e; font-weight: 600;">Nama Lengkap</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-account-outline"></i>
                                    <input id="nama" type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #2d1b4e; font-weight: 600;">Email</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-email-outline"></i>
                                    <input id="email" type="email" name="email" class="form-control form-control-lg" placeholder="nama@email.com" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="hp" class="form-label" style="color: #2d1b4e; font-weight: 600;">No. Telepon</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-phone"></i>
                                    <input id="hp" type="tel" name="hp" class="form-control form-control-lg" placeholder="08xxxxxxxxxx" value="{{ old('hp') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label" style="color: #2d1b4e; font-weight: 600;">Password</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password" required>
                                    <button type="button" class="show-pass show-pass-register" onclick="toggleRegisterPass('password','eyeRegister')" aria-label="Tampilkan password"><i id="eyeRegister" class="mdi mdi-eye-outline"></i></button>
                                </div>
                                <small class="auth-note">Minimal 6 karakter, gunakan kombinasi huruf dan angka.</small>
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label" style="color: #2d1b4e; font-weight: 600;">Konfirmasi Password</label>
                                <div class="input-icon-wrap">
                                    <i class="mdi mdi-lock-outline"></i>
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Konfirmasi password" required>
                                    <button type="button" class="show-pass show-pass-register" onclick="toggleRegisterPass('password_confirmation','eyeRegisterConfirm')" aria-label="Tampilkan password"><i id="eyeRegisterConfirm" class="mdi mdi-eye-outline"></i></button>
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
        :root {
            --primary-600: #6d28d9;
            --primary-500: #7c3aed;
            --primary-700: #5b21b6;
            --muted: #64748b;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-700: #334155;
        }
        
        * { transition: all 0.2s ease; }
        
        body.auth-page {
            font-family: 'Sora', system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
            background: linear-gradient(180deg, #f8fafc, #ffffff);
        }
        
        .auth-page-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: stretch;
        }
        
        .auth-left {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500));
            color: #fff;
            padding: 44px;
            display: flex;
            align-items: center;
            animation: slideInLeft 0.5s ease;
            overflow: hidden;
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .auth-hero {
            width: 100%;
            position: relative;
        }

        .auth-hero::before {
            content: '';
            position: absolute;
            left: -70px;
            top: -30px;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            pointer-events: none;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.16), rgba(255,255,255,0.06) 38%, transparent 62%);
        }
        
        .auth-brand {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 28px;
        }
        
        .auth-logo {
            width: 72px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .auth-kicker {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            opacity: 0.9;
        }
        
        .auth-lead {
            color: rgba(255, 255, 255, 0.95);
            max-width: 420px;
            font-size: 15px;
            line-height: 1.7;
            margin: 20px 0 28px;
        }
        
        .auth-feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 28px;
        }
        
        .auth-feature {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: center;
            text-align: center;
            color: #fff;
            font-size: 14px;
        }
        
        .auth-feature i {
            font-size: 24px;
            opacity: 0.9;
        }
        
        .auth-feature strong {
            font-weight: 700;
            font-size: 13px;
        }
        
        .auth-stat {
            text-align: center;
            padding: 16px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            color: #fff;
        }
        
        .auth-stat strong {
            display: block;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 4px;
        }
        
        .auth-stat span {
            font-size: 13px;
            opacity: 0.9;
        }
        
        .auth-right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            animation: slideInRight 0.5s ease;
        }
        
        .auth-card {
            width: 100%;
            max-width: 420px;
            border-radius: 18px;
            padding: 32px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, 0.10);
            background: linear-gradient(180deg, #ffffff, #fbfbff);
            border: 1px solid rgba(124,58,237,0.06);
        }
        
        .auth-card-head {
            margin-bottom: 24px;
        }
        
        .auth-pill {
            background: rgba(109, 40, 217, 0.08);
            color: var(--primary-600);
            padding: 6px 12px;
            border-radius: 999px;
            font-weight: 700;
            display: inline-block;
            font-size: 12px;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
        }
        
        .auth-card-head h3 {
            margin: 0 0 8px 0;
            font-weight: 800;
            color: var(--gray-700);
            font-size: 22px;
        }
        
        .form-label {
            font-weight: 700;
            color: #2d1b4e;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }
        
        .input-icon-wrap {
            position: relative;
            margin-bottom: 16px;
        }
        
        .input-icon-wrap i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af !important;
            font-size: 18px !important;
            pointer-events: none;
            z-index: 10;
            display: inline-block !important;
            visibility: visible !important;
        }
        
        .input-icon-wrap input {
            padding-left: 40px !important;
        }

        .input-icon-wrap input[type="tel"] {
            padding-left: 40px !important;
        }

        .input-icon-wrap .form-control {
            padding-right: 44px !important;
            height: 54px;
            border-radius: 12px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.65), 0 6px 18px rgba(15,23,42,0.03);
        }

        .input-icon-wrap .show-pass {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #9ca3af;
            cursor: pointer;
            font-size: 19px;
            padding: 5px 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s ease;
            border-radius: 6px;
        }

        .input-icon-wrap .show-pass:hover {
            color: var(--primary-600);
            background: rgba(109,40,217,0.05);
        }

        .input-icon-wrap .show-pass i {
            line-height: 1;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e6e9ef;
            padding: 12px 14px;
            font-size: 15px;
            background: #fff;
            transition: all 0.3s ease;
            color: var(--gray-700);
        }
        
        .form-control:focus {
            border-color: var(--primary-600);
            box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
            background: #fff;
            outline: none;
        }
        
        .form-control:hover {
            border-color: #cbd5e1;
        }
        
        .form-control::placeholder {
            color: #9ca3af;
        }
        
        .form-control-lg {
            padding: 12px 14px;
        }
        
        small {
            display: block;
            color: var(--muted);
            font-size: 13px;
            margin-top: 6px;
        }
        
        .auth-submit {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-700));
            color: #fff;
            border-radius: 10px;
            padding: 12px 18px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(109, 40, 217, 0.2);
            font-size: 15px;
        }
        
        .auth-submit:hover {
            background: linear-gradient(135deg, var(--primary-700), var(--primary-600));
            box-shadow: 0 12px 28px rgba(109, 40, 217, 0.3);
            transform: translateY(-2px);
        }
        
        .auth-submit:active {
            transform: translateY(0);
        }
        
        .auth-card-foot {
            text-align: center;
            margin-top: 16px;
            color: var(--muted);
            font-size: 14px;
        }
        
        .alert {
            border-radius: 10px;
            border: 1px solid #fecaca;
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        
        .alert ul {
            margin-bottom: 0;
            padding-left: 20px;
        }
        
        .alert li {
            margin-bottom: 4px;
        }
        
        .fw-semibold {
            font-weight: 700;
        }
        
        @media (max-width: 991px) {
            .auth-left {
                display: none;
            }
            .auth-right {
                padding: 22px;
            }
            .auth-card {
                padding: 24px;
                max-width: 100%;
            }
            .auth-feature-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .auth-hero-callout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 767px) {
            .auth-page-wrapper {
                min-height: auto;
            }

            .auth-right {
                padding: 14px;
                align-items: flex-start;
            }

            .auth-card {
                padding: 20px;
                border-radius: 16px;
            }

            .auth-card-head h3 {
                font-size: 20px;
            }

            .auth-contact {
                margin-top: 14px;
                padding: 12px 14px;
            }

            .auth-contact .auth-contact-list li {
                font-size: 12px;
            }

            .auth-meta-row {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 8px;
            }
        }
    </style>

    <script src="{{ asset('backend/dist/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        function toggleRegisterPass(fieldId, iconId) {
            var p = document.getElementById(fieldId);
            var eye = document.getElementById(iconId);

            if (!p || !eye) return;

            if (p.type === 'password') {
                p.type = 'text';
                eye.className = 'mdi mdi-eye-off-outline';
            } else {
                p.type = 'password';
                eye.className = 'mdi mdi-eye-outline';
            }
        }
    </script>

</body>

</html>