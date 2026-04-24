<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/images/logoo.jpg') }}">
    <title>PPDB SMK Sehati Karawang</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/extra-libs/multicheck/multicheck.css') }}">
    <link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700;800&display=swap');

        :root {
            --theme-bg-1: #f2f6ff;
            --theme-bg-2: #eefbf2;
            --theme-sidebar: #0f172a;
            --theme-sidebar-2: #1e293b;
            --theme-primary: #0ea5e9;
            --theme-primary-dark: #0369a1;
            --theme-accent: #22c55e;
            --theme-text: #0f172a;
            --theme-muted: #64748b;
            --theme-card: #ffffff;
            --theme-border: #dbe6f2;
        }

        body {
            font-family: 'Lexend', 'Segoe UI', sans-serif;
            color: var(--theme-text);
            background:
                radial-gradient(circle at top right, rgba(14, 165, 233, 0.14), transparent 32%),
                radial-gradient(circle at left bottom, rgba(34, 197, 94, 0.16), transparent 30%),
                linear-gradient(160deg, var(--theme-bg-1), var(--theme-bg-2));
        }

        .topbar,
        .topbar .navbar,
        .topbar .navbar-header,
        .navbar-collapse[data-navbarbg='skin5'] {
            background: linear-gradient(120deg, #0f172a, #1e3a8a, #0369a1);
        }

        .left-sidebar,
        .left-sidebar[data-sidebarbg='skin5'] {
            background: linear-gradient(180deg, var(--theme-sidebar), var(--theme-sidebar-2));
            border-right: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-logo {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 18px 14px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            margin-bottom: 8px;
        }

        .sidebar-logo img {
            width: 72px;
            height: 72px;
            object-fit: contain;
            border-radius: 18px;
            padding: 8px;
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.18);
        }

        .sidebar-logo .sidebar-brand {
            width: 100%;
            max-width: 118px;
            text-align: center;
            color: #fff;
            font-size: 11px;
            line-height: 1.35;
            font-weight: 800;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        body.mini-sidebar .sidebar-logo {
            padding: 14px 10px 12px;
        }

        body.mini-sidebar .sidebar-logo .sidebar-brand {
            display: none;
        }

        body.mini-sidebar .sidebar-logo img {
            width: 54px;
            height: 54px;
            padding: 6px;
        }

        #sidebarnav .sidebar-item .sidebar-link {
            margin: 3px 10px;
            border-radius: 14px;
            color: rgba(255, 255, 255, 0.88);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 11px 14px;
            font-weight: 600;
            line-height: 1.2;
        }

        #sidebarnav .sidebar-item .sidebar-link i {
            font-size: 18px;
            width: 22px;
            text-align: center;
            flex: 0 0 22px;
        }

        #sidebarnav .sidebar-item .sidebar-link .hide-menu {
            font-size: 13px;
            letter-spacing: 0.01em;
        }

        #sidebarnav .sidebar-item .sidebar-link:hover,
        #sidebarnav .sidebar-item.selected > .sidebar-link,
        #sidebarnav .sidebar-item .sidebar-link.active {
            background: rgba(14, 165, 233, 0.22);
            color: #fff;
            transform: translateX(3px);
        }

        #sidebarnav {
            padding-top: 14px;
        }

        #sidebarnav .sidebar-item {
            margin-bottom: 2px;
        }

        .page-wrapper {
            background: transparent;
        }

        .container-fluid {
            padding-top: 24px;
        }

        .page-shell {
            padding: 0 4px 24px;
        }

        .page-hero-card,
        .soft-card {
            border: 1px solid var(--theme-border);
            border-radius: 20px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            background: rgba(255, 255, 255, 0.94);
        }

        .page-hero-card {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.96), rgba(30, 59, 138, 0.92));
            color: #fff;
            overflow: hidden;
        }

        .page-hero-card .card-title,
        .page-hero-card p {
            color: #fff;
        }

        .page-hero-card .badge {
            background: rgba(255, 255, 255, 0.14) !important;
            color: #fff !important;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .content-card {
            border-radius: 20px;
            overflow: hidden;
        }

        .content-card .card-header {
            background: linear-gradient(120deg, #eff6ff, #ecfdf5);
            border-bottom: 1px solid var(--theme-border);
        }

        .content-card .card-title {
            margin-bottom: 0;
        }

        .form-control,
        .custom-select {
            border-radius: 12px;
            border: 1px solid #cdd9ea;
            min-height: 44px;
            box-shadow: none;
        }

        .form-control:focus,
        .custom-select:focus {
            border-color: rgba(14, 165, 233, 0.7);
            box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.12);
        }

        .form-group label,
        .col-form-label {
            font-weight: 700;
            color: #0f172a;
        }

        .btn {
            border-radius: 12px;
            font-weight: 700;
            padding: 10px 18px;
        }

        .btn-primary,
        .btn-info,
        .btn-success,
        .btn-warning,
        .btn-purple {
            border: 0;
        }

        @media (min-width: 768px) {
            body.mini-sidebar .left-sidebar {
                width: 260px;
            }

            body.mini-sidebar .page-wrapper {
                margin-left: 260px;
            }

            body.mini-sidebar .sidebar-nav .hide-menu {
                display: inline-block !important;
                opacity: 1 !important;
            }
        }

        @media (max-width: 767px) {
            .page-shell {
                padding: 0 0 18px;
            }
        }

        .card {
            border: 1px solid var(--theme-border);
            border-radius: 18px;
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
            overflow: hidden;
        }

        .card .card-title {
            font-weight: 700;
            color: var(--theme-text);
        }

        .card-header,
        .card-footer,
        .card-body {
            background-color: var(--theme-card);
        }

        .table thead th {
            background: linear-gradient(120deg, #e0f2fe, #dcfce7);
            color: #0f172a;
            border-bottom: 0;
            font-weight: 700;
        }

        .table td,
        .table th {
            border-color: #e5edf6;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(248, 251, 255, 0.75);
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #cfdceb;
            min-height: 40px;
        }

        .form-control:focus {
            border-color: rgba(14, 165, 233, 0.6);
            box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.16);
        }

        .btn {
            border-radius: 10px;
            font-weight: 600;
            border: 0;
        }

        .btn-primary,
        .btn-purple {
            color: #fff;
            background: linear-gradient(120deg, var(--theme-primary), var(--theme-primary-dark));
        }

        .btn-primary:hover,
        .btn-purple:hover {
            color: #fff;
            filter: brightness(0.96);
        }

        .btn-secondary {
            background: #94a3b8;
            color: #fff;
        }

        .btn-secondary:hover {
            color: #fff;
            background: #7c8fa8;
        }

        .btn-danger {
            background: linear-gradient(120deg, #f43f5e, #e11d48);
        }

        .badge {
            border-radius: 999px;
            padding: 6px 10px;
            font-weight: 600;
        }

        .badge.bg-success {
            background-color: #16a34a !important;
        }

        .badge.bg-secondary {
            background-color: #64748b !important;
        }

        .badge.bg-purple {
            background-color: #0ea5e9 !important;
            color: #fff;
        }

        .dropdown-menu {
            border-radius: 12px;
            border: 1px solid #dbe6f2;
            box-shadow: 0 14px 26px rgba(15, 23, 42, 0.12);
        }

        .dropdown-item {
            font-weight: 500;
        }

        .footer {
            border-top: 1px solid #dbe6f2;
            background: rgba(255, 255, 255, 0.72);
            color: var(--theme-muted);
            font-weight: 500;
        }

        .footer a {
            color: #0f172a;
            font-weight: 700;
        }

        @media (max-width: 767px) {
            .container-fluid {
                padding-top: 16px;
            }

            .card {
                border-radius: 14px;
            }
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" style="border-color: #800080;">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle 
navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link 
sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ==============================================================
-->
                        <!-- create new -->
                        <!-- ==============================================================
-->
                        <!-- ==============================================================
-->
                        <!-- Search -->
                        <!-- ==============================================================
-->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ==============================================================
-->
                        <!-- Comment -->
                        <!-- ==============================================================
-->
                        <!-- ==============================================================
-->
                        <!-- End Comment -->
                        <!-- ==============================================================
-->
                        <!-- ==============================================================
-->
                        <!-- Messages -->
                        <!-- ==============================================================
-->
                        <!-- ==============================================================
-->
                        <!-- End Messages -->
                        <!-- ==============================================================
-->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Logo Sidebar -->
                <div class="sidebar-logo text-center py-4">
                        <img src="{{ asset('backend/images/logoo_remove.png') }}" alt="Logo">
                        <div class="sidebar-brand">PPDB SMK Sehati Karawang</div>
                </div>
                <!-- End Logo Sidebar -->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('backend.beranda') }}" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span>
                            </a>
                        </li>

                        @if(Auth::user()->role == 'admin_ppdb')
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pendaftaransantri.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-account-box"></i>
                                    <span class="hide-menu">Pendaftaran</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pengumuman.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-bell"></i>
                                    <span class="hide-menu">Informasi</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pembayaransantri.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-credit-card"></i>
                                    <span class="hide-menu">Pembayaran</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.user.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-account-multiple"></i>
                                    <span class="hide-menu">User</span>
                                </a>
                            </li>
                        @elseif(Auth::user()->role == 'pendaftar')
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pendaftaran.form') }}" aria-expanded="false">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu">Pendaftaran Saya</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pemesanan.baju') }}" aria-expanded="false">
                                    <i class="mdi mdi-tshirt-crew"></i>
                                    <span class="hide-menu">Pemesanan Baju</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pemesanan.buku') }}" aria-expanded="false">
                                    <i class="mdi mdi-book-open-page-variant"></i>
                                    <span class="hide-menu">Pemesanan Buku</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pengumuman.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-bell"></i>
                                    <span class="hide-menu">Informasi</span>
                                </a>
                            </li>

                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                    href="{{ route('backend.pembayaransantri.index') }}" aria-expanded="false">
                                    <i class="mdi mdi-credit-card"></i>
                                    <span class="hide-menu">Pembayaran</span>
                                </a>
                            </li>
                        @endif

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('backend.v_login.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                aria-expanded="false">
                                <i class="mdi mdi-logout"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('backend.v_login.logout') }}" method="GET" style="display: none;"></form>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid -->
            <!-- ============================================================== -->
            <div class="container-fluid page-shell">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- @yieldAwal -->
                @yield('content')
                <!-- @yieldAkhir-->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                PPDB <a href="https://www.facebook.com/share/18KeVCwhbX/"> SMK Sehati Karawang</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('backend/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         * Basic Table *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <!-- form keluar app -->
    <form id="keluar-app" action="{{ route('backend.login.logout') }}" method="GET" class="d-none">
        @csrf
    </form>
    <!-- form keluar app end -->
    <!-- sweetalert -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- sweetalert End -->
    <!-- konfirmasi success-->
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}"
        });
    </script>
    @endif
    <!-- konfirmasi success End-->
    <script type="text/javascript">
        //Konfirmasi delete
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var konfdelete = $(this).data("konf-delete");
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Hapus Data?',
                html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, dihapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
                        .then(() => {
                            form.submit();
                        });
                }
            });
        });
    </script>
    <script>
        // previewFoto
        function previewFoto() {
            const foto = document.querySelector('input[name="foto"]');
            const fotoPreview = document.querySelector('.foto-preview');
            fotoPreview.style.display = 'block';
            const fotoReader = new FileReader();
            fotoReader.readAsDataURL(foto.files[0]);
            fotoReader.onload = function(fotoEvent) {
                fotoPreview.src = fotoEvent.target.result;
                fotoPreview.style.width = '100%';
            }

        }
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>