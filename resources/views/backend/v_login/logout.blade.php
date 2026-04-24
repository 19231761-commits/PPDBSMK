<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <title>Keluar dari Sistem - PPDB SMK Sehati Karawang</title>
    <style>
        :root {
            --bg-1: #0f172a;
            --bg-2: #7c3aed;
            --bg-3: #0ea5e9;
            --panel: rgba(255, 255, 255, 0.96);
            --text: #111827;
            --muted: #6b7280;
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --good: #16a34a;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(14, 165, 233, 0.25), transparent 30%),
                radial-gradient(circle at top right, rgba(124, 58, 237, 0.28), transparent 26%),
                linear-gradient(135deg, var(--bg-1), var(--bg-2) 55%, #14532d 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .card {
            width: 100%;
            max-width: 560px;
            background: var(--panel);
            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 28px;
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.28);
            padding: 34px;
            text-align: center;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        .brand img {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 14px;
        }

        .brand strong {
            font-size: 18px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(22, 163, 74, 0.12);
            color: var(--good);
            border: 1px solid rgba(22, 163, 74, 0.28);
            border-radius: 999px;
            padding: 8px 14px;
            font-size: 13px;
            margin-bottom: 14px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 32px;
            line-height: 1.2;
        }

        p {
            margin: 0 auto 22px;
            max-width: 470px;
            color: var(--muted);
            line-height: 1.7;
            font-size: 15px;
        }

        .cta {
            display: inline-block;
            border: 0;
            border-radius: 14px;
            padding: 12px 20px;
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 16px 30px rgba(79, 70, 229, 0.28);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 34px rgba(79, 70, 229, 0.34);
        }

        .sub {
            margin-top: 14px;
            font-size: 13px;
            color: #9ca3af;
        }

        @media (max-width: 560px) {
            body {
                padding: 16px;
            }

            .card {
                border-radius: 22px;
                padding: 28px;
            }

            h1 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>
    <section class="card">
        <div class="brand">
            <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo PPDB SMK Sehati Karawang">
            <strong>PPDB SMK Sehati Karawang</strong>
        </div>

        <div class="badge">Sampai jumpa lagi</div>
        <h1>Anda berhasil keluar dari sistem.</h1>
        <p>
            Terima kasih sudah menggunakan layanan PPDB SMK Sehati Karawang. Klik tombol di bawah ini
            untuk kembali ke halaman login.
        </p>

        <a href="{{ route('backend.login') }}" class="cta">Kembali ke Login</a>
        <div class="sub">Akun Anda sudah aman keluar dari sesi sebelumnya.</div>
    </section>
</body>

</html>