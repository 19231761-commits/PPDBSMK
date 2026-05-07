<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Login • PPDB SMK Sehati Karawang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif; }
    </style>
</head>

<body class="auth-page">
    <div class="container py-5">
        <div class="row g-4 align-items-stretch justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="auth-hero position-relative overflow-hidden rounded-4 h-100 p-4 p-md-5">
                    <div class="position-relative" style="z-index: 1;">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <img class="auth-logo shadow" src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo PPDB SMK Sehati Karawang">
                            <div>
                                <div class="text-white-50 fw-semibold" style="letter-spacing: .08em; font-size: 11px;">SELAMAT DATANG</div>
                                <div class="h5 mb-0 fw-bold text-white">PPDB SMK Sehati Karawang</div>
                            </div>
                        </div>

                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill border border-white border-opacity-25 bg-white bg-opacity-10 text-white fw-semibold mb-3">
                            Pendaftaran online yang rapi, cepat, dan terarah
                        </div>

                        <h2 class="display-6 fw-bold text-white mb-3">Masuk ke sistem dari satu pintu yang lebih nyaman.</h2>
                        <p class="text-white-75 mb-4" style="line-height: 1.8;">
                            Login untuk admin PPDB maupun pendaftar. Setelah masuk, pendaftar bisa langsung melanjutkan
                            pengisian data dengan alur yang lebih jelas.
                        </p>

                        <div class="row g-3 mt-auto">
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-4 border border-white border-opacity-10 bg-white bg-opacity-10">
                                    <div class="fw-bold text-white mb-1">Untuk Pendaftar</div>
                                    <div class="text-white-75 small" style="line-height: 1.6;">Buat akun lalu lanjut isi formulir pendaftaran dengan alur yang jelas.</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="p-3 rounded-4 border border-white border-opacity-10 bg-white bg-opacity-10">
                                    <div class="fw-bold text-white mb-1">Untuk Admin PPDB</div>
                                    <div class="text-white-75 small" style="line-height: 1.6;">Pantau pendaftaran, pembayaran, dan pengumuman dari dashboard terpusat.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body p-4 p-md-5">
                        <h1 class="h4 fw-bold mb-1">Login PPDB</h1>
                        <p class="text-secondary mb-4">Masuk menggunakan email dan password akun PPDB Anda.</p>

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('backend.login.authenticate') }}" method="POST" class="vstack gap-3">
                            @csrf
                            <div>
                                <label for="email" class="form-label fw-semibold">E-Mail</label>
                                <input id="email" type="email" name="email" class="form-control form-control-lg" placeholder="contoh@email.com" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div>
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">Masuk ke Dashboard</button>
                        </form>

                        <div class="text-center mt-4">
                            <span class="text-secondary">Belum punya akun?</span>
                            <a href="{{ route('backend.register') }}" class="fw-semibold text-decoration-none">Daftar sebagai pendaftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center text-white-50 small mt-4">
            © {{ date('Y') }} PPDB SMK Sehati Karawang
        </div>
    </div>
</body>

</html>