<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Registrasi • PPDB SMK Sehati Karawang</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', sans-serif; }
    </style>
</head>

<body class="auth-page">
    <div class="container py-5">
        <div class="row g-4 align-items-stretch justify-content-center">
            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-lg h-100">
                    <div class="card-body p-4 p-md-5">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <img class="auth-logo shadow" src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo PPDB SMK Sehati Karawang">
                            <div>
                                <div class="text-secondary fw-semibold" style="letter-spacing: .08em; font-size: 11px;">PPDB</div>
                                <div class="fw-bold">SMK Sehati Karawang</div>
                            </div>
                        </div>

                        <h1 class="h4 fw-bold mb-1">Buat Akun Pendaftar</h1>
                        <p class="text-secondary mb-4">Lengkapi data akun, lalu login untuk mulai proses pendaftaran.</p>

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <div class="fw-semibold mb-2">Periksa kembali input Anda:</div>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('backend.register.store') }}" method="POST" class="vstack gap-3">
                            @csrf

                            <div>
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                                <input id="nama" type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                            </div>

                            <div>
                                <label for="email" class="form-label fw-semibold">E-Mail</label>
                                <input id="email" type="email" name="email" class="form-control form-control-lg" placeholder="contoh@email.com" value="{{ old('email') }}" required>
                            </div>

                            <div>
                                <label for="hp" class="form-label fw-semibold">Nomor HP</label>
                                <input id="hp" type="text" name="hp" class="form-control form-control-lg" placeholder="08xxxxxxxxxx" value="{{ old('hp') }}" required>
                            </div>

                            <div>
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password" required>
                            </div>

                            <div>
                                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Ulangi password" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">Daftar Sekarang</button>
                        </form>

                        <div class="text-center mt-4">
                            <span class="text-secondary">Sudah punya akun?</span>
                            <a href="{{ route('backend.login') }}" class="fw-semibold text-decoration-none">Login di sini</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-7">
                <div class="auth-hero position-relative overflow-hidden rounded-4 h-100 p-4 p-md-5">
                    <div class="position-relative" style="z-index: 1;">
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill border border-white border-opacity-25 bg-white bg-opacity-10 text-white fw-semibold mb-3">
                            Selamat datang di halaman registrasi
                        </div>

                        <h2 class="display-6 fw-bold text-white mb-3">Langkah awal menuju masa depanmu dimulai dari sini.</h2>
                        <p class="text-white-75 mb-4" style="line-height: 1.8;">
                            Sistem PPDB ini dirancang supaya pendaftar bisa membuat akun sendiri, login, lalu mengisi
                            formulir dengan alur yang jelas dan mudah diikuti.
                        </p>

                        <div class="row g-3">
                            <div class="col-12 col-md-4">
                                <div class="p-3 rounded-4 border border-white border-opacity-10 bg-white bg-opacity-10">
                                    <div class="fw-bold text-white mb-1">1. Daftar akun</div>
                                    <div class="text-white-75 small" style="line-height: 1.6;">Gunakan email aktif dan nomor HP yang bisa dihubungi.</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="p-3 rounded-4 border border-white border-opacity-10 bg-white bg-opacity-10">
                                    <div class="fw-bold text-white mb-1">2. Login ke sistem</div>
                                    <div class="text-white-75 small" style="line-height: 1.6;">Masuk dengan akun yang baru dibuat untuk lanjut ke form pendaftaran.</div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="p-3 rounded-4 border border-white border-opacity-10 bg-white bg-opacity-10">
                                    <div class="fw-bold text-white mb-1">3. Lengkapi data</div>
                                    <div class="text-white-75 small" style="line-height: 1.6;">Isi data secara benar agar proses verifikasi berjalan cepat.</div>
                                </div>
                            </div>
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