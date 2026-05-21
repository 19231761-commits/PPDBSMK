<!DOCTYPE html>
<html dir="ltr" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Admin Dashboard PPDB">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/logoo.jpg') }}">
    <title>{{ $judul ?? 'Admin PPDB' }}</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Inter & Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Material Design Icons -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Chart.js for graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- Modern Admin Dashboard CSS -->
    <link href="{{ asset('backend/dist/css/admin-modern.css') }}" rel="stylesheet">

    @yield('additional-css')

    <style>
        :root {
            --primary: #6D28D9;
            --secondary: #8B5CF6;
            --background: #F5F3FF;
            --card: #FFFFFF;
            --text: #1F2937;
            --text-light: #6B7280;
            --border: #E5E7EB;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--background);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        .app-sidebar {
            width: 280px;
            background: linear-gradient(180deg, #6D28D9 0%, #8B5CF6 100%);
            color: white;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 4px 0 15px rgba(109, 40, 217, 0.2);
        }

        .app-sidebar .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .app-sidebar .sidebar-brand img {
            width: 45px;
            height: 45px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            padding: 4px;
        }

        .app-sidebar .sidebar-brand-text {
            flex: 1;
        }

        .app-sidebar .sidebar-brand-title {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.2;
        }

        .app-sidebar .sidebar-brand-subtitle {
            font-size: 12px;
            opacity: 0.8;
            font-weight: 400;
        }

        .app-sidebar .nav-main {
            padding: 24px 0;
        }

        .app-sidebar .nav-item {
            margin: 0;
            border-left: 3px solid transparent;
        }

        .app-sidebar .nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .app-sidebar .nav-item a i {
            font-size: 20px;
            width: 20px;
            text-align: center;
        }

        .app-sidebar .nav-item.active {
            border-left-color: white;
            background: rgba(255, 255, 255, 0.1);
        }

        .app-sidebar .nav-item.active a {
            color: white;
            font-weight: 600;
        }

        .app-sidebar .nav-item a:hover {
            color: white;
            padding-left: 24px;
        }

        .app-content {
            flex: 1;
            margin-left: 280px;
            background-color: var(--background);
            min-height: 100vh;
        }

        .app-topbar {
            background: white;
            border-bottom: 1px solid var(--border);
            padding: 16px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-sm);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
            flex: 1;
        }

        .topbar-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn-icon {
            background: none;
            border: none;
            color: var(--text);
            cursor: pointer;
            font-size: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-icon:hover {
            background-color: var(--background);
        }

        .page-shell {
            padding: 30px 30px;
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .app-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .body.sidebar-open .app-sidebar {
                transform: translateX(0);
            }

            .app-content {
                margin-left: 0;
            }

            .sidebar-overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .body.sidebar-open .sidebar-overlay {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .page-shell {
                padding: 20px 15px;
            }

            .app-topbar {
                padding: 12px 15px;
            }
        }
    </style>
</head>

<body>
    @include('components.sidebar-modern')

    <div class="app-content">
        @include('components.navbar-modern', ['pageTitle' => $judul ?? 'Dashboard'])

        <main class="page-shell">
            @yield('content')
        </main>
    </div>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    document.body.classList.toggle('sidebar-open');
                });
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', function() {
                    document.body.classList.remove('sidebar-open');
                });
            }

            // Close sidebar on link click on mobile
            const navLinks = document.querySelectorAll('.nav-item a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        document.body.classList.remove('sidebar-open');
                    }
                });
            });
        });
    </script>

    @yield('additional-js')
</body>

</html>
