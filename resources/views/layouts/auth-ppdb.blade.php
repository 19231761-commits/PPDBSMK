<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title', 'PPDB SMK Sehati Karawang')</title>
    <link href="{{ asset('backend/dist/css/style.min.css') }}?v={{ filemtime(public_path('backend/dist/css/style.min.css')) }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --ppdb-blue-900: #4c1d95;
            --ppdb-blue-800: #6d28d9;
            --ppdb-blue-700: #7c3aed;
            --ppdb-text: #111827;
            --ppdb-border: #dbe4f0;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f3edff 0%, #faf5ff 100%);
            color: var(--ppdb-text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .auth-shell {
            width: 100%;
            max-width: 1160px;
            border-radius: 24px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 52% 48%;
            background: #fff;
            box-shadow: 0 25px 60px rgba(109, 40, 217, 0.14);
            align-items: stretch;
            min-height: 680px;
        }

        .auth-side {
            position: relative;
            background: linear-gradient(135deg, var(--ppdb-blue-900) 0%, var(--ppdb-blue-800) 100%);
            padding: 24px 40px 32px;
            min-height: 680px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
        }

        .auth-side::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -60px;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-side::after {
            content: '';
            position: absolute;
            bottom: -120px;
            left: -100px;
            width: 280px;
            height: 280px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            pointer-events: none;
        }

        .brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
            margin-bottom: 28px;
            position: relative;
            z-index: 2;
        }

        .brand.brand--centered {
            margin-top: 20px;
        }

        .brand img { 
            width: 140px; 
            height: 140px; 
            object-fit: contain;
        }

        .brand-title {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
            color: #ffffff;
            font-weight: 800;
        }

        .brand-sub { 
            margin: 0; 
            color: rgba(255, 255, 255, 0.85); 
            font-size: 14px;
            font-weight: 500;
        }

        .hero-title {
            margin: 0 0 8px 0;
            font-size: 48px;
            line-height: 1.15;
            font-weight: 900;
            color: #ffffff;
            max-width: 500px;
            position: relative;
            z-index: 2;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            letter-spacing: -0.5px;
        }

        .hero-title span { 
            color: #fbbf24;
            display: inline-block;
        }

        .hero-desc {
            margin-top: 18px;
            margin-left: auto;
            margin-right: auto;
            max-width: 460px;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.8;
            font-size: 16px;
            position: relative;
            z-index: 2;
            font-weight: 500;
            text-align: left;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.16);
            border-radius: 18px;
            padding: 18px 22px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.06);
            backdrop-filter: blur(12px);
        }

        .hero-desc strong {
            display: block;
            font-size: 20px;
            color: #fef3c7;
            margin-bottom: 14px;
            letter-spacing: 0.25px;
        }

        .hero-desc ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .hero-desc ul li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 15px;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.96);
        }

        .hero-desc .hero-icon {
            width: 26px;
            min-width: 26px;
            font-size: 18px;
            line-height: 1;
            color: #fde68a;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 2px;
        }

        .hero-desc a {
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
        }

        .hero-desc a:hover {
            text-decoration: underline;
        }

        .hero-badges {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 22px;
            max-width: 460px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.42);
            border: 1px solid rgba(109, 40, 217, 0.12);
            color: #4c1d95;
            font-size: 13px;
            font-weight: 700;
            backdrop-filter: blur(8px);
            box-shadow: 0 10px 22px rgba(109, 40, 217, 0.06);
        }

        .hero-info-card {
            position: relative;
            margin-top: 28px;
            margin-left: auto;
            margin-right: auto;
            max-width: 440px;
            padding: 18px 18px 16px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.42);
            border: 1px solid rgba(109, 40, 217, 0.12);
            box-shadow: 0 18px 40px rgba(109, 40, 217, 0.08);
            backdrop-filter: blur(10px);
            z-index: 2;
        }

        .hero-info-card strong {
            display: block;
            font-size: 16px;
            color: #4c1d95;
            margin-bottom: 4px;
        }

        .hero-info-card span {
            display: block;
            color: #5b6477;
            font-size: 13px;
            line-height: 1.55;
        }

        .auth-form-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 44px 40px;
            /* make background match purple hero so area behind form is purple */
            background: linear-gradient(135deg, var(--ppdb-blue-900) 0%, var(--ppdb-blue-800) 100%);
            gap: 0;
            min-height: 680px;
            position: relative;
            overflow: hidden;
        }

        .auth-form-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.06), transparent);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-form-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 250px;
            height: 250px;
            background: radial-gradient(circle, rgba(167, 139, 250, 0.05), transparent);
            border-radius: 50%;
            pointer-events: none;
        }

        .auth-card {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            border-radius: 24px;
            padding: 34px 30px;
            border: 1px solid rgba(124, 58, 237, 0.12);
            box-shadow: 
                0 26px 60px rgba(109, 40, 217, 0.14),
                0 0 2px rgba(0, 0, 0, 0.03);
            position: relative;
            z-index: 2;
            backdrop-filter: blur(10px);
        }

        .auth-card h2 {
            font-size: 24px;
            letter-spacing: -0.3px;
        }

        .auth-card p {
            font-size: 15px;
            color: #6b7280;
            margin-bottom: 22px;
        }

        .auth-input {
            width: 100%;
            height: 52px;
            border-radius: 14px;
            border: 1.5px solid #ebe8f5;
            background: #fbfbff;
            padding: 0 40px 0 44px;
            font-size: 15px;
            color: #111827;
            transition: all 0.3s ease;
            font-family: inherit;
            font-weight: 500;
        }

        .btn-main {
            width: 100%;
            height: 54px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
            color: #fff;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 
                0 14px 38px rgba(124, 58, 237, 0.24),
                0 4px 14px rgba(124, 58, 237, 0.16);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
            margin-top: 12px;
            position: relative;
            z-index: 10;
            overflow: hidden;
            letter-spacing: 0.25px;
        }

        .foot-link {
            margin-top: 22px;
            text-align: center;
            font-size: 14px;
            color: #6b7280;
            position: relative;
            z-index: 10;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -50px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1), rgba(124, 58, 237, 0.02));
            pointer-events: none;
        }

        .auth-card::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -40px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.08), rgba(236, 72, 153, 0.02));
            pointer-events: none;
        }

        .form-group { 
            margin-bottom: 18px;
            position: relative;
            z-index: 10;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 700;
            color: #1f2937;
            letter-spacing: 0.2px;
        }

        .input-wrap { 
            position: relative;
        }

        .input-wrap i.icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b5cf6;
            font-size: 18px;
            transition: color 0.2s ease;
        }

        .input-wrap:focus-within i.icon {
            color: #7c3aed;
        }

        .auth-input {
            width: 100%;
            height: 50px;
            border-radius: 12px;
            border: 1.5px solid #e5e1f0;
            background: #fafbff;
            padding: 0 40px 0 42px;
            font-size: 15px;
            color: #111827;
            transition: all 0.3s ease;
            font-family: inherit;
            font-weight: 500;
        }

        .auth-input::placeholder {
            color: #b0b3c1;
        }

        .auth-input:hover {
            border-color: #d4c5f9;
            background: #fcfaff;
        }

        .auth-input:focus {
            outline: none;
            border-color: var(--ppdb-blue-700);
            background: #ffffff;
            box-shadow: 
                0 0 0 4px rgba(124, 58, 237, 0.12),
                inset 0 0 0 0.5px rgba(124, 58, 237, 0.2);
        }

        .show-pass {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: auto;
            height: auto;
            border: none;
            border-radius: 0;
            background: transparent;
            color: #8b5cf6;
            padding: 6px 8px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
            z-index: 20;
        }

        .show-pass:hover {
            background: transparent;
            color: #7c3aed;
            transform: translateY(-50%) scale(1.1);
        }

        .show-pass:active {
            transform: translateY(-50%) scale(0.95);
        }

        .show-pass i {
            font-size: 18px;
            line-height: 1;
        }

        .password-eye {
            width: 20px;
            height: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: inherit;
        }

        .password-eye svg {
            width: 20px;
            height: 20px;
            display: block;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .btn-main {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 50%, #6d28d9 100%);
            color: #fff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 
                0 12px 32px rgba(124, 58, 237, 0.28),
                0 2px 8px rgba(124, 58, 237, 0.16);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
            margin-top: 8px;
            position: relative;
            z-index: 10;
            overflow: hidden;
            letter-spacing: 0.3px;
        }

        .btn-main::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.3s ease;
        }

        .btn-main:hover { 
            transform: translateY(-3px);
            box-shadow: 
                0 16px 40px rgba(124, 58, 237, 0.36),
                0 4px 12px rgba(124, 58, 237, 0.24);
        }

        .btn-main:hover::before {
            left: 100%;
        }

        .btn-main:active {
            transform: translateY(-1px);
            box-shadow: 
                0 8px 24px rgba(124, 58, 237, 0.24),
                0 2px 8px rgba(124, 58, 237, 0.12);
        }

        .foot-link { 
            margin-top: 20px; 
            text-align: center; 
            font-size: 14px; 
            color: #6b7280;
            position: relative;
            z-index: 10;
        }

        .foot-link a { 
            color: var(--ppdb-blue-700); 
            text-decoration: none; 
            font-weight: 700;
            transition: all 0.2s ease;
            position: relative;
            padding-bottom: 2px;
        }

        .foot-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #8b5cf6, #7c3aed);
            transition: width 0.3s ease;
        }

        .foot-link a:hover {
            color: var(--ppdb-blue-800);
        }

        .foot-link a:hover::after {
            width: 100%;
        }

        /* Page Flip Animation - Form Only */
        @keyframes pageFlipOut {
            0% {
                opacity: 1;
                transform: rotateY(0deg) perspective(1200px);
            }
            100% {
                opacity: 0;
                transform: rotateY(-90deg) perspective(1200px);
            }
        }

        .auth-card {
            transform-style: preserve-3d;
        }

        .auth-card.page-flip-out {
            animation: pageFlipOut 0.12s ease-in forwards;
        }

        .alert { 
            border-radius: 12px; 
            font-size: 14px;
            margin-bottom: 18px;
            padding: 14px 16px;
            border: none;
            position: relative;
            z-index: 10;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.08), rgba(229, 62, 62, 0.04));
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #991b1b;
        }

        .alert-success {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.08), rgba(22, 163, 74, 0.04));
            border: 1px solid rgba(34, 197, 94, 0.2);
            color: #166534;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert li {
            margin-bottom: 6px;
        }

        /* Responsive Design */
        @media (max-width: 1100px) { 
            .hero-title { font-size: 36px; } 
        }

        @media (max-width: 992px) {
            body { padding: 14px; }
            
            .auth-shell { 
                grid-template-columns: 1fr;
                min-height: auto;
            }
            
            .auth-side { 
                min-height: 320px; 
                padding: 32px 24px;
            }
            
            .hero-title { font-size: 32px; }
            .hero-desc { max-width: 100%; font-size: 15px; }
            
            .auth-form-wrap { 
                padding: 32px 24px;
                min-height: auto;
                /* keep purple background on small screens as well */
                background: linear-gradient(135deg, var(--ppdb-blue-900) 0%, var(--ppdb-blue-800) 100%);
            }
            
            .auth-card { padding: 24px 20px; border-radius: 16px; }
        }

        @media (max-width: 640px) {
            body {
                padding: 12px;
                align-items: flex-start;
                padding-top: 24px;
            }

            .auth-shell {
                border-radius: 18px;
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .auth-side {
                min-height: auto;
                padding: 28px 24px;
                border-radius: 18px 18px 0 0;
            }

            .auth-form-wrap {
                padding: 24px 20px;
                min-height: auto;
                border-radius: 0 0 18px 18px;
            }

            .auth-form-wrap::before,
            .auth-form-wrap::after {
                display: none;
            }

            .auth-card {
                padding: 22px 20px;
                border-radius: 16px;
            }

            .auth-card::before,
            .auth-card::after {
                display: none;
            }

            .brand img { width: 120px !important; height: 120px !important; }
            .brand.brand--centered { margin-top: 20px !important; }
            
            .brand-title { font-size: 22px; }
            .brand-sub { font-size: 13px; }
            
            .hero-title { 
                font-size: 28px; 
                max-width: 100%;
            }
            
            .hero-desc { 
                margin-top: 14px; 
                font-size: 15px; 
                line-height: 1.6; 
            }

            .form-group { margin-bottom: 16px; }

            .form-label {
                font-size: 13px;
                margin-bottom: 8px;
            }

            .auth-input {
                height: 48px;
                font-size: 14px;
                padding-left: 40px;
            }

            .input-wrap i.icon {
                left: 12px;
                font-size: 16px;
            }

            .btn-main {
                height: 48px;
                font-size: 15px;
                margin-top: 6px;
            }

            .foot-link {
                margin-top: 16px;
                font-size: 13px;
            }

            .alert {
                padding: 12px 14px;
                margin-bottom: 16px;
                font-size: 13px;
            }

            .alert ul {
                padding-left: 18px;
            }

            .alert li {
                margin-bottom: 4px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="auth-shell">
        <!-- Left Side: Hero Section -->
        <section class="auth-side">
            @hasSection('hero_title')
                <h2 class="hero-title">@yield('hero_title')</h2>
            @endif

            <div class="brand brand--centered">
                <img src="{{ asset('image/logo_login.png') }}" alt="Logo PPDB" loading="lazy">
                <div>
                    <h1 class="brand-title">SMK SEHATI KARAWANG</h1>
                </div>
            </div>

            @hasSection('hero_desc')
                <div class="hero-desc">@yield('hero_desc')</div>
            @endif
            
            @hasSection('hero_badges')
                @yield('hero_badges')
            @endif
            
            @yield('hero_info')
        </section>

        <!-- Right Side: Form Section -->
        <section class="auth-form-wrap">
            <div class="auth-card">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('card_content')
            </div>
            
            @yield('login_contact')
        </section>
    </div>

    @stack('scripts')
    <script>
        // Toggle Password Visibility
        document.addEventListener('click', function (event) {
            var button = event.target.closest('[data-toggle-password]');

            if (!button) {
                return;
            }

            var targetId = button.getAttribute('data-target');
            var iconId = button.getAttribute('data-icon');
            var input = document.getElementById(targetId);
            var icon = document.getElementById(iconId);

            if (!input || !icon) {
                return;
            }

            var isShowing = input.type === 'password';
            input.type = isShowing ? 'text' : 'password';
            
            if (input.type === 'text') {
                icon.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle><path d="M3 3l18 18"></path></svg>';
                button.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                icon.innerHTML = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
                button.setAttribute('aria-label', 'Tampilkan password');
            }
            
            button.setAttribute('aria-pressed', String(input.type === 'text'));
        });

        // Page Flip + PJAX handler: fetch target and replace .auth-card for instant swap
        (function () {
            async function fetchAndReplace(href, pushState = true) {
                var authCard = document.querySelector('.auth-card');
                if (!authCard) { window.location.href = href; return; }

                // play flip out
                authCard.classList.add('page-flip-out');

                try {
                    var res = await fetch(href, { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                    if (!res.ok) throw new Error('Network');
                    var text = await res.text();
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(text, 'text/html');
                    var newCard = doc.querySelector('.auth-card');
                    if (!newCard) throw new Error('NoCard');

                    // Replace content
                    authCard.innerHTML = newCard.innerHTML;

                    // reset animation class
                    authCard.classList.remove('page-flip-out');
                    void authCard.offsetWidth; // reflow

                    // focus first input for better UX
                    var firstInput = authCard.querySelector('input, button, textarea, select');
                    if (firstInput) firstInput.focus();

                    if (pushState) history.pushState({ pjax: true }, '', href);
                } catch (err) {
                    // fallback to normal navigation on error
                    window.location.href = href;
                }
            }

            document.addEventListener('click', function (event) {
                var link = event.target.closest('a[href*="register"], a[href*="login"]');
                if (!link) return;
                var href = link.getAttribute('href');
                if (!href || (!href.includes('/register') && !href.includes('/login'))) return;
                event.preventDefault();
                fetchAndReplace(href, true);
            });

            // handle back/forward
            window.addEventListener('popstate', function (e) {
                if (location.href) {
                    fetchAndReplace(location.href, false);
                }
            });
        })();

        // Ensure form is visible when navigating back/forward (bfcache/pageshow)
        window.addEventListener('pageshow', function (event) {
            var authCard = document.querySelector('.auth-card');
            if (!authCard) return;

            // If page restored from cache, remove any lingering flip-out class
            if (authCard.classList.contains('page-flip-out')) {
                authCard.classList.remove('page-flip-out');
                // Force reflow to ensure styles reset
                void authCard.offsetWidth;
                authCard.style.opacity = '';
                authCard.style.transform = '';
            }
        });
    </script>
</body>
</html>
