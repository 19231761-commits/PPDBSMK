<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Login - PPDB SMK Sehati Karawang</title>
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/custom-dashboard.css') }}" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-wrap">
        <div class="auth-left">
            <div class="auth-hero">
                <div class="auth-brand">
                    <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo SMK Sehati" class="auth-logo">
                    <div>
                        <div class="auth-kicker">PPDB Online</div>
                        <h1>SMK Sehati Karawang</h1>
                    </div>
                </div>

                <p class="auth-lead">
                    Pendaftaran siswa baru yang rapi, cepat, dan mudah dipantau dari satu dashboard.
                </p>

                <div class="auth-feature-grid">
                    <div class="auth-feature">
                        <i class="mdi mdi-account-check-outline"></i>
                        <div>
                            <strong>Alur Jelas</strong>
                            <span>Daftar, unggah berkas, dan cek status tanpa bingung.</span>
                        </div>
                    </div>
                    <div class="auth-feature">
                        <i class="mdi mdi-shield-check-outline"></i>
                        <div>
                            <strong>Akses Aman</strong>
                            <span>Role admin dan pendaftar dipisahkan dengan rapi.</span>
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

                <div class="auth-stats">
                    <div class="auth-stat">
                        <strong>1x</strong>
                        <span>Login untuk semua proses</span>
                    </div>
                    <div class="auth-stat">
                        <strong>24/7</strong>
                        <span>Akses dashboard</span>
                    </div>
                    <div class="auth-stat">
                        <strong>Real-time</strong>
                        <span>Status pendaftaran</span>
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