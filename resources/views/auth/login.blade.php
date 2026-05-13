<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Login - PPDB SMK Sehati Karawang</title>
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/custom-dashboard.css') }}" rel="stylesheet">
    <style>
        .auth-contact {
            margin-top: 14px;
            padding: 12px 14px;
            border: 1px solid #dbe7f5;
            border-radius: 14px;
            background: linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
        }

        .auth-contact .auth-contact-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .auth-contact .auth-contact-title i {
            color: #7c3aed;
            font-size: 18px;
        }

        .auth-contact .auth-contact-list {
            margin: 0;
            padding: 0;
            list-style: none;
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
            color: #7c3aed;
            font-size: 16px;
            flex: 0 0 auto;
        }

        .auth-panel-title {
            font-size: 28px;
            font-weight: 800;
            line-height: 1.15;
            margin: 0;
        }

        .auth-panel-subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.9);
            margin: 10px 0 0;
            max-width: 420px;
            line-height: 1.7;
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

        @media (max-width: 991px) {
            .auth-contact {
                margin-top: 14px;
            }
        }
    </style>
</head>
<body class="auth-page">
    <div class="auth-wrap">
        <div class="auth-left">
            <div class="auth-hero">
                <div class="auth-brand-slim">
                    <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo SMK Sehati" class="auth-logo">
                    <div>
                        <div class="auth-kicker">PPDB</div>
                        <h1>SMK Sehati Karawang</h1>
                    </div>
                </div>

                <h2 class="auth-panel-title">Pendaftaran siswa baru yang rapi, cepat, dan mudah dipantau.</h2>
                <p class="auth-panel-subtitle">Gunakan akun yang sudah terdaftar untuk masuk ke dashboard PPDB dan melanjutkan proses pendaftaran tanpa ribet.</p>

                <div class="auth-feature-grid">
                    <div class="auth-feature">
                        <i class="mdi mdi-account-check-outline"></i>
                        <div>
                            <strong>Alur Jelas</strong>
                            <span>Daftar, unggah berkas, dan cek status dengan mudah.</span>
                        </div>
                    </div>
                    <div class="auth-feature">
                        <i class="mdi mdi-shield-check-outline"></i>
                        <div>
                            <strong>Akses Aman</strong>
                            <span>Role admin dan pendaftar dipisahkan dengan aman.</span>
                        </div>
                    </div>
                    <div class="auth-feature">
                        <i class="mdi mdi-clipboard-text-outline"></i>
                        <div>
                            <strong>Informasi Lengkap</strong>
                            <span>Data pendaftaran, pembayaran, dan pengumuman terpusat.</span>
                        </div>
                    </div>
                </div>

                <div class="auth-hero-callout">
                    <div class="auth-callout">
                        <strong>Alur Terarah</strong>
                        <span>Data diri, berkas, dan pembayaran dalam satu alur.</span>
                    </div>
                    <div class="auth-callout">
                        <strong>Dashboard Terpusat</strong>
                        <span>Pantau status pendaftaran dan informasi sekolah.</span>
                    </div>
                    <div class="auth-callout">
                        <strong>Contact Person</strong>
                        <span>Siap membantu jika ada kendala login.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="auth-right">
            <div class="auth-card">
                <div class="auth-card-head">
                    <div class="auth-pill">Akses Sistem</div>
                    <h3 class="mb-2">Masuk ke akun Anda</h3>
                    <p class="text-muted mb-0">Gunakan email dan password yang sudah terdaftar.</p>

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

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 pl-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('backend.login.authenticate') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <div class="input-icon-wrap">
                            <i class="mdi mdi-email-outline"></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control form-control-lg" placeholder="nama@email.com">
                        </div>
                    </div>
                    <div class="form-group mb-3 position-relative">
                        <label for="password">Password</label>
                        <div class="input-icon-wrap">
                            <i class="mdi mdi-lock-outline"></i>
                            <input id="password" type="password" name="password" required class="form-control form-control-lg" placeholder="Masukkan password">
                            <button type="button" class="show-pass" onclick="togglePass()" aria-label="Tampilkan password"><i id="eyeIcon" class="mdi mdi-eye-outline"></i></button>
                        </div>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between mb-3 auth-meta-row">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <span class="small text-muted">Akses aman dan privat</span>
                    </div>

                    <button class="btn btn-primary btn-block btn-lg auth-submit" type="submit">
                        <i class="mdi mdi-login-variant mr-2"></i> Masuk ke Dashboard
                    </button>

                    <a href="{{ route('backend.register') }}" class="btn btn-block btn-lg auth-register mt-3">
                        <i class="mdi mdi-account-plus mr-2"></i> Daftar Akun Baru
                    </a>
                </form>

                <div class="auth-card-foot">
                    <span class="text-muted">Belum punya akun? Klik tombol daftar di atas.</span>
                </div>
            </div>
        </div>
    </div>

<script>
    function togglePass(){
        var p = document.getElementById('password');
        var eye = document.getElementById('eyeIcon');

        if(p.type === 'password') {
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