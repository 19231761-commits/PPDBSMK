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
                <div class="mb-4">
                    <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo" class="auth-logo mb-3">
                    <h1 class="h2 font-weight-bold text-white mb-3">PPDB SMK Sehati Karawang</h1>
                    <p class="text-white-50 mb-0" style="line-height: 1.8;">Platform pendaftaran siswa baru dengan pengalaman seperti aplikasi startup: cepat, rapi, dan jelas untuk pendaftar maupun admin sekolah.</p>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <div class="p-3 rounded" style="background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); border-radius: 14px;">
                            <div class="font-weight-bold text-white">Alur Terarah</div>
                            <div class="text-white-50 small">Data diri, upload berkas, pembayaran, dan verifikasi dalam satu alur.</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 rounded" style="background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.18); border-radius: 14px;">
                            <div class="font-weight-bold text-white">Dashboard Terpusat</div>
                            <div class="text-white-50 small">Pantau status pendaftaran, pembayaran, dan informasi sekolah tanpa berpindah halaman.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="auth-right">
            <div class="auth-card">
                <div class="mb-3">
                    <div class="text-uppercase" style="font-size: 11px; letter-spacing: .08em; color: #64748b; font-weight: 800;">Akses Sistem</div>
                    <h3 class="mb-2">Masuk ke akun Anda</h3>
                    <p class="text-muted mb-0">Gunakan email dan password yang sudah terdaftar.</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
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
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror" placeholder="nama@email.com">
                        @error('email')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3 position-relative">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" required class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password">
                        <button type="button" class="show-pass" onclick="togglePass()" aria-label="Tampilkan password">
                            <i id="eyeIcon" class="mdi mdi-eye-outline"></i>
                        </button>
                        @error('password')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <span class="small text-muted">Akses aman</span>
                    </div>

                    <button class="btn btn-primary btn-block btn-lg" type="submit">Masuk ke Dashboard</button>
                </form>

                <div class="mt-4 small text-muted text-center">
                    Dengan login, Anda dapat melanjutkan proses pendaftaran dan memantau status terbaru secara real-time.
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePass() {
            var p = document.getElementById('password');
            var eye = document.getElementById('eyeIcon');

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
