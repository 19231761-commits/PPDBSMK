<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Daftar Akun PPDB</title>
    <style>
        :root {
            --bg-1: #08111f;
            --bg-2: #123d6b;
            --bg-3: #0f766e;
            --panel: rgba(255, 255, 255, 0.96);
            --text: #0f172a;
            --muted: #64748b;
            --primary: #0ea5e9;
            --primary-dark: #0369a1;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0; min-height: 100vh; font-family: 'Inter', sans-serif; color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.24), transparent 28%),
                radial-gradient(circle at bottom right, rgba(16, 185, 129, 0.18), transparent 28%),
                linear-gradient(135deg, var(--bg-1), var(--bg-2) 55%, var(--bg-3) 100%);
            display: flex; align-items: center; justify-content: center; padding: 24px;
        }

        .shell { width: 100%; max-width: 1120px; display: grid; grid-template-columns: 0.98fr 1.02fr; gap: 24px; }

        .panel, .hero { border-radius: 28px; overflow: hidden; box-shadow: 0 28px 70px rgba(2, 6, 23, 0.28); }

        .panel {
            padding: 34px; background: var(--panel); border: 1px solid rgba(255, 255, 255, 0.42);
        }

        .hero {
            position: relative; color: #fff;
            background: linear-gradient(160deg, rgba(4, 13, 30, 0.98), rgba(15, 118, 110, 0.88));
            border: 1px solid rgba(255, 255, 255, 0.12); padding: 36px;
        }

        .hero::before, .hero::after { content: ''; position: absolute; border-radius: 999px; pointer-events: none; }
        .hero::before { width: 260px; height: 260px; background: rgba(14, 165, 233, 0.2); top: -90px; right: -60px; }
        .hero::after { width: 190px; height: 190px; background: rgba(34, 197, 94, 0.18); bottom: -70px; left: -60px; }

        .hero-inner { position: relative; z-index: 1; display: flex; flex-direction: column; height: 100%; }

        .brand { display: inline-flex; align-items: center; gap: 12px; margin-bottom: 26px; }
        .brand img { width: 56px; height: 56px; object-fit: cover; border-radius: 16px; box-shadow: 0 12px 30px rgba(0, 0, 0, 0.26); }
        .brand h1, .panel h2, .feature strong { margin: 0; }
        .brand h1 { font-size: 18px; line-height: 1.2; }

        .eyebrow {
            display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.14); background: rgba(255, 255, 255, 0.08);
            font-size: 13px; font-weight: 600; margin-bottom: 18px;
        }

        .hero h2 { font-size: clamp(34px, 4vw, 52px); line-height: 1.03; max-width: 520px; margin-bottom: 14px; }
        .hero p { max-width: 520px; color: rgba(255, 255, 255, 0.84); line-height: 1.75; margin: 0 0 28px; font-size: 16px; }

        .feature-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-top: auto; }
        .feature { background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 18px; padding: 16px; }
        .feature strong { display: block; margin-bottom: 6px; font-size: 14px; }
        .feature span { color: rgba(255, 255, 255, 0.74); font-size: 13px; line-height: 1.55; }

        .panel h2 { font-size: 28px; margin-bottom: 8px; }
        .subtitle { margin: 0 0 24px; color: var(--muted); line-height: 1.65; }

        .error {
            background: linear-gradient(135deg, #f97316, #ef4444); color: #fff; padding: 12px 14px; border-radius: 14px; margin-bottom: 14px;
        }
        .error ul { margin: 0; padding-left: 18px; }

        .field { margin-bottom: 14px; }
        .field label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 700; color: #334155; }
        .field input {
            width: 100%; border: 1px solid #d6e0ec; border-radius: 14px; padding: 13px 14px; font-size: 14px; outline: none; background: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }
        .field input:focus { border-color: rgba(14, 165, 233, 0.75); box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.12); transform: translateY(-1px); }

        .actions { margin-top: 20px; }
        .actions button {
            width: 100%; border: 0; border-radius: 14px; padding: 13px 16px; font-size: 15px; font-weight: 800; color: #fff; cursor: pointer;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)); box-shadow: 0 16px 30px rgba(14, 165, 233, 0.28); transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .actions button:hover { transform: translateY(-1px); box-shadow: 0 18px 34px rgba(14, 165, 233, 0.34); }

        .helper { margin-top: 18px; text-align: center; color: var(--muted); line-height: 1.6; }
        .helper a { color: var(--primary); text-decoration: none; font-weight: 700; }

        @media (max-width: 920px) {
            .shell { grid-template-columns: 1fr; }
            .hero { order: -1; padding: 28px; }
            .panel { padding: 28px; }
            .feature-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 560px) {
            body { padding: 16px; }
            .panel, .hero { border-radius: 22px; }
        }
    </style>
</head>

<body>
    <div class="shell">
        <section class="panel">
            <div class="brand">
                <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo PPDB SMK Sehati Karawang">
                <h1>PPDB SMK Sehati Karawang</h1>
            </div>

            <h2>Buat Akun Pendaftar</h2>
            <p class="subtitle">Lengkapi data akun terlebih dahulu, lalu login untuk mulai proses pendaftaran.</p>

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('backend.register.store') }}" method="POST">
                @csrf
                <div class="field">
                    <label for="nama">Nama Lengkap</label>
                    <input id="nama" type="text" name="nama" placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" required>
                </div>

                <div class="field">
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required>
                </div>

                <div class="field">
                    <label for="hp">Nomor HP</label>
                    <input id="hp" type="text" name="hp" placeholder="08xxxxxxxxxx" value="{{ old('hp') }}" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="field">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <div class="actions">
                    <button type="submit">Daftar Sekarang</button>
                </div>
            </form>

            <p class="helper">
                Sudah punya akun? <a href="{{ route('backend.login') }}">Login di sini</a>
            </p>
        </section>

        <section class="hero">
            <div class="hero-inner">
                <div class="eyebrow">Selamat datang di halaman Registrasi</div>
                <h2>Langkah awal menuju masa depanmu dimulai dari sini.</h2>
                <p>
                    Sistem PPDB ini dirancang supaya pendaftar bisa membuat akun sendiri, login, lalu mengisi
                    formulir dengan alur yang jelas dan mudah diikuti.
                </p>

                <div class="feature-grid">
                    <div class="feature">
                        <strong>1. Daftar akun</strong>
                        <span>Gunakan email aktif dan nomor HP yang bisa dihubungi.</span>
                    </div>
                    <div class="feature">
                        <strong>2. Login ke sistem</strong>
                        <span>Masuk dengan akun yang baru dibuat untuk lanjut ke form pendaftaran.</span>
                    </div>
                    <div class="feature">
                        <strong>3. Lengkapi data PPDB</strong>
                        <span>Isi data secara benar agar proses verifikasi berjalan cepat.</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>