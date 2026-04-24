<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <title>PPDB SMK Sehati Karawang</title>
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
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.24), transparent 28%),
                radial-gradient(circle at bottom right, rgba(16, 185, 129, 0.18), transparent 28%),
                linear-gradient(135deg, var(--bg-1), var(--bg-2) 55%, var(--bg-3) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .shell {
            width: 100%;
            max-width: 1120px;
            display: grid;
            grid-template-columns: 1.02fr 0.98fr;
            gap: 24px;
        }

        .panel, .hero {
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 28px 70px rgba(2, 6, 23, 0.28);
        }

        .hero {
            position: relative;
            color: #fff;
            background: linear-gradient(160deg, rgba(4, 13, 30, 0.98), rgba(15, 118, 110, 0.88));
            border: 1px solid rgba(255, 255, 255, 0.12);
            padding: 36px;
        }

        .hero::before, .hero::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .hero::before {
            width: 260px; height: 260px;
            background: rgba(14, 165, 233, 0.2);
            top: -90px; right: -60px;
        }

        .hero::after {
            width: 190px; height: 190px;
            background: rgba(34, 197, 94, 0.18);
            bottom: -70px; left: -60px;
        }

        .hero-inner { position: relative; z-index: 1; display: flex; flex-direction: column; height: 100%; }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 40px;
        }

        .brand img {
            width: 62px; height: 62px;
            border-radius: 18px;
            object-fit: cover;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.26);
        }

        .brand small {
            display: block;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.74);
            margin-bottom: 6px;
        }

        .brand h1, .panel h3, .hero h2, .feature strong { margin: 0; }

        .brand h1 { font-size: 24px; line-height: 1.15; }

        .eyebrow {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 14px; border-radius: 999px;
            border: 1px solid rgba(255, 255, 255, 0.14);
            background: rgba(255, 255, 255, 0.08);
            font-size: 13px; font-weight: 600; margin-bottom: 18px;
        }

        .hero h2 { font-size: clamp(34px, 4vw, 52px); line-height: 1.03; max-width: 520px; margin-bottom: 14px; }

        .hero p {
            max-width: 520px; color: rgba(255, 255, 255, 0.84);
            line-height: 1.75; margin: 0 0 28px; font-size: 16px;
        }

        .feature-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-top: auto; }

        .feature {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 18px; padding: 16px;
        }

        .feature strong { display: block; margin-bottom: 6px; font-size: 14px; }
        .feature span { color: rgba(255, 255, 255, 0.74); font-size: 13px; line-height: 1.55; }

        .panel {
            padding: 34px;
            background: var(--panel);
            border: 1px solid rgba(255, 255, 255, 0.42);
        }

        .panel h3 { font-size: 28px; margin-bottom: 8px; }

        .subtitle { margin: 0 0 24px; color: var(--muted); line-height: 1.65; }

        .message { margin-bottom: 14px; padding: 12px 14px; border-radius: 14px; color: #fff; font-size: 14px; line-height: 1.5; }
        .message.success { background: linear-gradient(135deg, #16a34a, #22c55e); }
        .message.error { background: linear-gradient(135deg, #f97316, #ef4444); }

        .field { margin-bottom: 14px; }
        .field label { display: block; margin-bottom: 8px; font-size: 13px; font-weight: 700; color: #334155; }
        .field input {
            width: 100%; border: 1px solid #d6e0ec; border-radius: 14px; padding: 13px 14px;
            font-size: 14px; outline: none; background: #fff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
        }
        .field input:focus { border-color: rgba(14, 165, 233, 0.75); box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.12); transform: translateY(-1px); }

        .actions { display: flex; flex-direction: column; gap: 14px; margin-top: 20px; }
        .actions button {
            width: 100%; border: 0; border-radius: 14px; padding: 13px 16px;
            font-size: 15px; font-weight: 800; color: #fff; cursor: pointer;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 16px 30px rgba(14, 165, 233, 0.28); transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .actions button:hover { transform: translateY(-1px); box-shadow: 0 18px 34px rgba(14, 165, 233, 0.34); }

        .helper { text-align: center; color: var(--muted); font-size: 14px; line-height: 1.6; margin-top: 18px; }
        .helper a { color: var(--primary); font-weight: 700; text-decoration: none; }

        @media (max-width: 920px) {
            .shell { grid-template-columns: 1fr; }
            .hero { order: -1; padding: 28px; }
            .panel { padding: 28px; }
        }

        @media (max-width: 560px) {
            body { padding: 16px; }
            .panel, .hero { border-radius: 22px; }
            .feature-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
    <div class="shell">
        <section class="hero">
            <div class="hero-inner">
                <div class="brand">
                    <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo PPDB SMK Sehati Karawang">
                    <div>
                        <small>Selamat datang di halaman Login</small>
                        <h1>PPDB SMK Sehati Karawang</h1>
                    </div>
                </div>

                <div>
                    <div class="eyebrow">Pendaftaran online yang rapi, cepat, dan terarah</div>
                    <h2>Masuk ke sistem dari satu pintu yang lebih nyaman.</h2>
                    <p>
                        Login untuk admin PPDB maupun pendaftar. Setelah masuk, pendaftar bisa langsung melanjutkan
                        pengisian data tanpa harus membuka halaman terpisah yang membingungkan.
                    </p>
                </div>

                <div class="feature-grid">
                    <div class="feature">
                        <strong>Untuk Pendaftar</strong>
                        <span>Buat akun lalu lanjut isi formulir pendaftaran dengan alur yang lebih jelas.</span>
                    </div>
                    <div class="feature">
                        <strong>Untuk Admin PPDB</strong>
                        <span>Pantau pendaftaran, pembayaran, dan pengumuman dari dashboard terpusat.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel">
            <h3>Login PPDB</h3>
            <p class="subtitle">Masuk menggunakan email dan password akun PPDB Anda.</p>

            @if(session('success'))
                <div class="message success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="message error">{{ session('error') }}</div>
            @endif

            <form action="{{ route('backend.login.authenticate') }}" method="POST">
                @csrf
                <div class="field">
                    <label for="email">E-Mail</label>
                    <input id="email" type="email" name="email" placeholder="contoh@email.com" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="actions">
                    <button type="submit">Masuk ke Dashboard</button>
                </div>
            </form>

            <p class="helper">
                Belum punya akun? <a href="{{ route('backend.register') }}">Daftar sebagai pendaftar</a>
            </p>
        </section>
    </div>
</body>

</html>