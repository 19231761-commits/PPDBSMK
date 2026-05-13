<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Login - PPDB SMK Sehati Karawang</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/custom-dashboard.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: #6d28d9;
            --primary-light: #7c3aed;
            --primary-dark: #5b21b6;
            --gray-100: #f8fafc;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --border-color: #e2e8f0;
        }
        
        * { transition: all 0.2s ease; }
        
        body.auth-page { 
            font-family: 'Sora', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; 
            background: linear-gradient(180deg, #f8fafc, #ffffff);
            color: var(--gray-700);
        }
        
        .auth-wrap { 
            display: flex; 
            min-height: 100vh; 
            gap: 32px; 
            align-items: stretch; 
            padding: 40px; 
        }
        
        .auth-left { 
            flex: 1; 
            display: flex; 
            align-items: center; 
            color: #fff; 
            overflow: hidden;
        }
        
        .auth-hero { 
            background: linear-gradient(135deg, var(--primary), var(--primary-light)); 
            border-radius: 20px; 
            padding: 40px; 
            box-shadow: 0 25px 60px rgba(109, 40, 217, 0.15); 
            animation: slideInLeft 0.5s ease;
            position: relative;
        }

        .auth-hero::before {
            content: '';
            position: absolute;
            left: -80px;
            top: -40px;
            width: 260px;
            height: 260px;
            background: radial-gradient(circle at 30% 30%, rgba(124,58,237,0.18), rgba(124,58,237,0.06) 40%, transparent 60%);
            border-radius: 50%;
            pointer-events: none;
        }
        }
        
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .auth-logo { 
            width: 84px; 
            height: auto; 
            border-radius: 12px; 
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15); 
            border: 2px solid rgba(255, 255, 255, 0.2);
        }
        
        .auth-left h1 { 
            font-size: 28px; 
            font-weight: 800; 
            margin-top: 12px; 
            line-height: 1.3;
        }
        
        .auth-left p {
            font-size: 15px;
            line-height: 1.7;
            opacity: 0.95;
        }
        
        .auth-right { 
            width: 420px; 
            display: flex;
            align-items: center;
            animation: slideInRight 0.5s ease;
        }
        
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .auth-card { 
            background: linear-gradient(180deg, #ffffff, #fbfbff); 
            border-radius: 16px; 
            padding: 32px; 
            box-shadow: 0 18px 48px rgba(15, 23, 42, 0.09); 
            border: 1px solid rgba(124,58,237,0.06);
            width: 100%;
        }
        
        .auth-card h3 { 
            margin-bottom: 8px; 
            font-weight: 800; 
            color: var(--gray-900);
            font-size: 22px;
        }
        
        .auth-card > div:first-child p {
            color: var(--gray-500);
            font-size: 14px;
            margin: 0;
        }
        
        .form-group { margin-bottom: 18px; }
        
        .form-group label { 
            font-weight: 700; 
            color: var(--gray-700); 
            display: block; 
            margin-bottom: 8px; 
            font-size: 14px;
        }
        
        .form-control { 
            border-radius: 10px; 
            border: 2px solid var(--border-color); 
            padding: 12px 14px; 
            height: 54px;
            font-size: 15px;
            background: #fff;
            transition: all 0.25s cubic-bezier(.2,.9,.2,1);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.6), 0 6px 18px rgba(15,23,42,0.03);
        }

        .form-group.position-relative .form-control {
            padding-right: 44px;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
            background: #fff;
            outline: none;
        }
        
        .form-control:hover {
            border-color: var(--gray-300);
        }
        
        .form-control::placeholder {
            color: var(--gray-500);
        }
        
        .form-control.is-invalid {
            border-color: #dc2626;
        }
        
        .show-pass { 
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
            transition: all 0.2s ease;
            border-radius: 6px;
        }
        
        .show-pass:hover {
            color: var(--primary);
            background: rgba(109, 40, 217, 0.05);
        }

        .show-pass i {
            line-height: 1;
        }

        .show-pass:active {
            transform: translateY(-50%) scale(0.95);
        }
        
        .btn {
            border-radius: 10px;
            font-weight: 700;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }
        
        .btn.btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: #fff;
            padding: 12px 18px;
            box-shadow: 0 8px 20px rgba(109, 40, 217, 0.2);
        }
        
        .btn.btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            box-shadow: 0 12px 28px rgba(109, 40, 217, 0.3);
            transform: translateY(-2px);
        }
        
        .btn.btn-primary:active {
            transform: translateY(0);
        }
        
        .auth-register { 
            background: transparent; 
            border: 2px solid #e9e6ff; 
            color: var(--primary); 
            font-weight: 700;
            transition: all 0.3s ease;
        }
        
        .auth-register:hover {
            background: #f5f3ff;
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(109, 40, 217, 0.1);
        }
        
        .form-check-input {
            border-radius: 6px;
            border: 2px solid var(--border-color);
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
        }
        
        .invalid-feedback {
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }
        
        .alert {
            border-radius: 10px;
            border: 1px solid var(--border-color);
            margin-bottom: 20px;
        }
        
        .alert-danger {
            background: #fee2e2;
            border-color: #fecaca;
            color: #991b1b;
        }
        
        @media (max-width: 991px) { 
            .auth-wrap { 
                padding: 20px; 
                flex-direction: column; 
            } 
            .auth-left { 
                display: none; 
            } 
            .auth-right { 
                width: 100%; 
            }
            .auth-card {
                padding: 24px;
            }
        }
    </style>
</head>
<body class="auth-page">
    <div class="auth-wrap">
        <div class="auth-left">
            <div class="auth-hero">
                <div class="mb-4">
                    <img src="{{ asset('image/logo_login.png') }}" alt="Logo" class="auth-logo mb-3">
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

                    <a href="{{ route('backend.register') }}" class="btn btn-block btn-lg auth-register mt-3">
                        Daftar Akun Baru
                    </a>
                </form>

                <div class="mt-4 small text-muted text-center">
                    Belum punya akun? Klik tombol daftar di atas.
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
