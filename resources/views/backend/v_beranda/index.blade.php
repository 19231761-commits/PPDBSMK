@extends('backend.v_layout.app')

@section('content')
<style>
    .dashboard-wrap .page-hero {
        border: 0;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 18px 34px rgba(15, 23, 42, 0.12);
        color: #fff;
        background: #6d28d9;
    }

    .dashboard-wrap .page-hero .card-title,
    .dashboard-wrap .page-hero p {
        color: #fff;
    }

    .dashboard-wrap .soft-card {
        border: 1px solid #dbe7f5;
        border-radius: 20px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        overflow: hidden;
        background: rgba(255, 255, 255, 0.96);
    }

    .dashboard-wrap .soft-card .card-header {
        background: #6d28d9;
        border-bottom: 1px solid #5b21b6;
        padding: 14px 18px;
    }

    .dashboard-wrap .soft-card .card-title {
        margin-bottom: 0;
        font-weight: 800;
        color: #fff;
    }

    .dashboard-wrap .metric-card {
        border: 1px solid #dbe7f5;
        border-radius: 18px;
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.06);
        overflow: hidden;
        background: rgba(255, 255, 255, 0.96);
        height: 100%;
    }

    .dashboard-wrap .metric-card .metric-label {
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 6px;
    }

    .dashboard-wrap .metric-card .metric-value {
        font-size: 28px;
        font-weight: 800;
        line-height: 1.1;
    }

    .dashboard-wrap .metric-card .metric-icon {
        font-size: 42px;
        opacity: 0.2;
    }

    .dashboard-wrap .metric-card.primary { border-left: 6px solid #7c3aed; }
    .dashboard-wrap .metric-card.info { border-left: 6px solid #8b5cf6; }
    .dashboard-wrap .metric-card.success { border-left: 6px solid #7c3aed; }
    .dashboard-wrap .metric-card.warning { border-left: 6px solid #a855f7; }

    .dashboard-wrap .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 12px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 13px;
        color: #fff;
        margin: 4px 6px 0 0;
    }

    .dashboard-wrap .status-ok { background: linear-gradient(135deg, #7c3aed, #a855f7); }
    .dashboard-wrap .status-no { background: linear-gradient(135deg, #5b21b6, #7c3aed); }

    .dashboard-wrap .action-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border: 0;
        border-radius: 14px;
        color: #fff;
        font-weight: 700;
        padding: 12px 18px;
        text-decoration: none;
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.14);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .dashboard-wrap .action-link:hover {
        transform: translateY(-1px);
        box-shadow: 0 16px 26px rgba(15, 23, 42, 0.18);
        color: #fff;
    }

    .dashboard-wrap .action-primary { background: linear-gradient(135deg, #7c3aed, #a855f7); }
    .dashboard-wrap .action-info { background: linear-gradient(135deg, #6d28d9, #8b5cf6); }

    .dashboard-wrap .quick-link {
        border-radius: 16px;
        padding: 14px 16px;
        color: #fff !important;
        font-weight: 700;
        text-align: left;
        min-height: 100%;
        height: 100%;
        display: block;
        border: 0;
        box-shadow: 0 12px 22px rgba(15, 23, 42, 0.12);
    }

    .dashboard-wrap .quick-link small {
        display: block;
        font-weight: 500;
        opacity: 0.9;
        margin-top: 6px;
    }

    .dashboard-wrap .table thead th {
        background: #ede9fe;
        color: #5b21b6;
        font-weight: 800;
        border-top: 0;
    }

    .dashboard-wrap .table td,
    .dashboard-wrap .table th {
        vertical-align: middle;
    }

    .brochure-card {
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(219, 231, 245, 0.8);
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
        background: #fff;
    }

    .brochure-hero {
        background: linear-gradient(90deg, rgba(124, 58, 237, 0.95), rgba(168, 85, 247, 0.95)), url('/backend/images/school-banner.jpg');
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 22px 20px;
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .brochure-hero .title {
        font-size: 20px;
        font-weight: 900;
        letter-spacing: 0.04em;
    }

    .brochure-hero .subtitle {
        font-size: 13px;
        opacity: 0.95;
    }

    .brochure-section h6 {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 0;
    }

    .brochure-section ul,
    .brochure-section ol {
        margin: 0;
        padding-left: 22px;
        line-height: 1.45;
        color: #1f2937;
    }

    .brochure-section p {
        margin: 0;
        line-height: 1.5;
        color: #1f2937;
    }

    .brochure-body {
        padding: 16px;
        background: #f8fafc;
    }

    .brochure-item {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 14px;
        height: 100%;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
    }

    .brochure-item.compact {
        padding: 8px 10px;
    }

    .brochure-item.compact .brochure-key { margin-bottom: 6px; }
    .brochure-item.compact ul, .brochure-item.compact ol { margin-bottom: 0; padding-left: 16px; }
    .brochure-item.compact p { margin-bottom: 0; }

    .brochure-key {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-bottom: 10px;
    }

    .brochure-key .icon {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
    }

    .brochure-cta {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-brochure-primary {
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        color: #fff;
        border-radius: 10px;
        padding: 10px 16px;
        font-weight: 800;
        border: 0;
    }

    .btn-brochure-outline {
        background: transparent;
        border: 1px solid #dbe7f5;
        color: #333;
        border-radius: 10px;
        padding: 10px 16px;
    }

    .btn-brochure-print {
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        color: #fff;
        border-radius: 12px;
        padding: 11px 18px;
        font-weight: 800;
        border: 0;
        box-shadow: 0 10px 20px rgba(124, 58, 237, 0.22);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-brochure-print:hover {
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 14px 24px rgba(124, 58, 237, 0.26);
    }

    .brochure-actions {
        margin-top: 12px;
        display: flex;
        justify-content: flex-end;
    }

    .brochure-print-header {
        display: none;
    }

    .brochure-print-footer {
        display: none;
    }

    @page {
        size: A4 portrait;
        margin: 12mm;
    }

    @media print {
        html, body {
            background: #fff !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        body * {
            visibility: hidden !important;
        }

        .brochure-print-area,
        .brochure-print-area * {
            visibility: visible !important;
        }

        .brochure-print-area {
            position: absolute;
            inset: 0;
            width: 100%;
            max-width: 100%;
        }

        .brochure-print-area .brochure-card {
            box-shadow: none !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 12px !important;
            overflow: hidden !important;
            background: #fff !important;
            border-top: 8px solid #7c3aed !important;
            padding-bottom: 4px !important;
        }

        .brochure-print-area .brochure-print-header {
            display: flex !important;
            align-items: center;
            gap: 14px;
            padding: 16px 20px 12px;
            margin-bottom: 12px;
            border-bottom: 1px solid #e2e8f0;
            background: linear-gradient(90deg, rgba(245, 243, 255, 0.98), rgba(255,255,255,0.98));
        }

        .brochure-print-area .brochure-print-header img {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .brochure-print-area .brochure-print-header .print-title {
            font-size: 20px;
            font-weight: 900;
            color: #0f172a;
            line-height: 1.2;
            letter-spacing: 0.02em;
            text-transform: uppercase;
        }

        .brochure-print-area .brochure-print-header .print-subtitle {
            font-size: 12px;
            color: #475569;
        }

        .brochure-print-area .brochure-body {
            padding: 10px 12px 8px !important;
            background: #fff !important;
        }

        .brochure-print-area .brochure-body > .row {
            display: grid !important;
            grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            gap: 12px !important;
            margin: 0 !important;
            align-items: stretch !important;
        }

        .brochure-print-area .brochure-body > .row > [class*="col-"] {
            width: auto !important;
            max-width: none !important;
            flex: none !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .brochure-print-area .brochure-hero {
            padding: 18px 20px !important;
            background: linear-gradient(90deg, rgba(88, 28, 135, 0.98), rgba(109, 40, 217, 0.96)), url('/backend/images/school-banner.jpg') !important;
            background-size: cover !important;
            background-position: center !important;
            box-shadow: inset 0 -1px 0 rgba(255,255,255,0.15);
        }

        .brochure-print-area .brochure-item {
            box-shadow: none !important;
            border-color: #cbd5e1 !important;
            break-inside: avoid;
            page-break-inside: avoid;
            border-top-width: 4px !important;
            min-height: 100% !important;
            position: relative;
            background: #fff !important;
        }

        .brochure-print-area .brochure-item.compact {
            padding: 7px 9px !important;
        }

        .brochure-print-area .brochure-section:nth-child(1) .brochure-item { border-top-color: #f59e0b !important; }
        .brochure-print-area .brochure-section:nth-child(2) .brochure-item { border-top-color: #7c3aed !important; }
        .brochure-print-area .brochure-section:nth-child(3) .brochure-item { border-top-color: #0f766e !important; }
        .brochure-print-area .brochure-section:nth-child(4) .brochure-item { border-top-color: #2563eb !important; }
        .brochure-print-area .brochure-section:nth-child(5) .brochure-item { border-top-color: #c2410c !important; }
        .brochure-print-area .brochure-section:nth-child(6) .brochure-item { border-top-color: #16a34a !important; }

        .brochure-print-area .brochure-section:nth-child(1) .brochure-key .icon { background: linear-gradient(135deg, #c2410c, #f59e0b) !important; }
        .brochure-print-area .brochure-section:nth-child(2) .brochure-key .icon { background: linear-gradient(135deg, #6d28d9, #8b5cf6) !important; }
        .brochure-print-area .brochure-section:nth-child(3) .brochure-key .icon { background: linear-gradient(135deg, #0f766e, #14b8a6) !important; }
        .brochure-print-area .brochure-section:nth-child(4) .brochure-key .icon { background: linear-gradient(135deg, #1d4ed8, #3b82f6) !important; }
        .brochure-print-area .brochure-section:nth-child(5) .brochure-key .icon { background: linear-gradient(135deg, #b45309, #f97316) !important; }
        .brochure-print-area .brochure-section:nth-child(6) .brochure-key .icon { background: linear-gradient(135deg, #15803d, #22c55e) !important; }

        .brochure-print-area .brochure-section:nth-child(1) .brochure-item::before,
        .brochure-print-area .brochure-section:nth-child(2) .brochure-item::before,
        .brochure-print-area .brochure-section:nth-child(3) .brochure-item::before,
        .brochure-print-area .brochure-section:nth-child(4) .brochure-item::before,
        .brochure-print-area .brochure-section:nth-child(5) .brochure-item::before,
        .brochure-print-area .brochure-section:nth-child(6) .brochure-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 4px;
            border-radius: 14px 14px 0 0;
            opacity: 0.9;
        }

        .brochure-print-area .brochure-section:nth-child(1) .brochure-item::before { background: linear-gradient(90deg, #f59e0b, #f97316) !important; }
        .brochure-print-area .brochure-section:nth-child(2) .brochure-item::before { background: linear-gradient(90deg, #7c3aed, #a855f7) !important; }
        .brochure-print-area .brochure-section:nth-child(3) .brochure-item::before { background: linear-gradient(90deg, #06b6d4, #0ea5e9) !important; }
        .brochure-print-area .brochure-section:nth-child(4) .brochure-item::before { background: linear-gradient(90deg, #16a34a, #22c55e) !important; }
        .brochure-print-area .brochure-section:nth-child(5) .brochure-item::before { background: linear-gradient(90deg, #ef4444, #f97316) !important; }
        .brochure-print-area .brochure-section:nth-child(6) .brochure-item::before { background: linear-gradient(90deg, #2563eb, #3b82f6) !important; }

        .brochure-print-area .brochure-key {
            margin-bottom: 8px !important;
            padding-top: 2px;
        }

        .brochure-print-area .brochure-key .icon {
            width: 32px !important;
            height: 32px !important;
            border-radius: 9px !important;
            box-shadow: 0 6px 12px rgba(15, 23, 42, 0.08);
        }

        .brochure-print-area .brochure-section:nth-child(1) .brochure-item,
        .brochure-print-area .brochure-section:nth-child(2) .brochure-item,
        .brochure-print-area .brochure-section:nth-child(3) .brochure-item,
        .brochure-print-area .brochure-section:nth-child(4) .brochure-item,
        .brochure-print-area .brochure-section:nth-child(5) .brochure-item,
        .brochure-print-area .brochure-section:nth-child(6) .brochure-item {
            border-radius: 14px !important;
        }

        .brochure-print-area .brochure-print-footer {
            display: block !important;
            margin-top: 12px;
            padding: 10px 18px 14px;
            border-top: 1px solid #e2e8f0;
            font-size: 11px;
            color: #475569;
            text-align: center;
            background: #fafafa;
        }

        .brochure-print-area .brochure-print-footer strong {
            color: #0f172a;
        }

        .brochure-print-area .brochure-item,
        .brochure-print-area .brochure-section,
        .brochure-print-area .brochure-key,
        .brochure-print-area .brochure-body,
        .brochure-print-area .brochure-card {
            break-inside: avoid;
            page-break-inside: avoid;
        }

        .brochure-print-area .brochure-actions {
            display: none !important;
        }

        .brochure-print-area .brochure-hero {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .brochure-print-area .brochure-hero .title {
            font-size: 18px;
        }

        .brochure-print-area .brochure-hero .subtitle {
            font-size: 12px;
        }

        .brochure-print-area .brochure-section h6 {
            font-size: 18px;
        }

        .brochure-print-area .brochure-section ul,
        .brochure-print-area .brochure-section ol,
        .brochure-print-area .brochure-section p {
            font-size: 13px;
            line-height: 1.35;
        }

        .brochure-print-area .brochure-section ul li,
        .brochure-print-area .brochure-section ol li {
            margin-bottom: 2px;
        }

        .brochure-print-area .brochure-section {
            margin-bottom: 0 !important;
        }
    }

    @media (max-width: 767.98px) {
        .brochure-hero {
            flex-direction: column;
            align-items: flex-start;
        }

        .brochure-hero .title {
            font-size: 18px;
        }

        .brochure-section h6 {
            font-size: 18px;
        }

        .brochure-body {
            padding: 12px;
        }

        .brochure-item {
            padding: 14px;
        }

        .brochure-cta {
            flex-direction: column;
            width: 100%;
        }

        .btn-brochure-primary,
        .btn-brochure-outline {
            width: 100%;
        }
    }
</style>

<div class="container-fluid dashboard-wrap">
    @if($role === 'admin')
        <div class="card page-hero mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.88); font-weight: 800;">Selamat datang di halaman beranda admin</div>
                    <h4 class="card-title mb-2">Selamat Datang {{ Auth::user()->nama }}</h4>
                    <p class="mb-0">Anda login sebagai Admin PPDB SMK Sehati Karawang. Semua data pendaftaran, pembayaran, dan pengumuman bisa dikelola dari sini.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card metric-card primary">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="metric-label text-primary">Total Pendaftar</div>
                            <div class="metric-value text-dark">{{ $totalPendaftar }}</div>
                        </div>
                        <i class="mdi mdi-account-multiple metric-icon text-primary"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card metric-card info">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="metric-label text-info">Pendaftar Hari Ini</div>
                            <div class="metric-value text-dark">{{ $pendaftarHariIni }}</div>
                        </div>
                        <i class="mdi mdi-calendar-check metric-icon text-info"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card metric-card success">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="metric-label text-success">Total Pembayaran</div>
                            <div class="metric-value text-dark">Rp {{ number_format($totalPembayaran, 0, ',', '.') }}</div>
                        </div>
                        <i class="mdi mdi-credit-card metric-icon text-success"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card metric-card warning">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <div class="metric-label text-warning">Transaksi Hari Ini</div>
                            <div class="metric-value text-dark">{{ $transaksiHariIni }}</div>
                        </div>
                        <i class="mdi mdi-history metric-icon text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card soft-card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title"><i class="mdi mdi-history mr-1"></i> Pendaftaran Terbaru</h5>
                        <span class="text-muted small">10 data terakhir</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID Siswa</th>
                                        <th>Nama Siswa</th>
                                        <th>Email</th>
                                        <th>Tanggal Daftar</th>
                                        <th>No HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentPendaftar as $index => $pendaftar)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td><span class="badge badge-primary px-2 py-1">{{ $pendaftar->id_santri }}</span></td>
                                            <td><strong>{{ $pendaftar->nama_santri }}</strong></td>
                                            <td>{{ $pendaftar->email ?? '-' }}</td>
                                            <td>{{ $pendaftar->tgl_pendaftaran ? \Carbon\Carbon::parse($pendaftar->tgl_pendaftaran)->format('d M Y') : '-' }}</td>
                                            <td>{{ $pendaftar->no_hp_siswa ?? $pendaftar->no_telpon ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('backend.pendaftaransantri.show', $pendaftar->id_santri) }}" class="btn btn-sm btn-primary">
                                                    <i class="mdi mdi-eye"></i> Lihat
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">Belum ada pendaftaran</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card soft-card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="mdi mdi-link mr-1"></i> Navigasi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.pendaftaransantri.index') }}" class="quick-link" style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);">
                                    <i class="mdi mdi-account-box"></i> Data Pendaftaran
                                    <small>Lihat dan kelola seluruh pendaftar.</small>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.pembayaransantri.index') }}" class="quick-link" style="background: linear-gradient(135deg, #7c3aed, #a855f7);">
                                    <i class="mdi mdi-credit-card"></i> Kelola Pembayaran
                                    <small>Monitor transaksi pembayaran siswa.</small>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.pengumuman.index') }}" class="quick-link" style="background: linear-gradient(135deg, #7c3aed, #a855f7);">
                                    <i class="mdi mdi-bullhorn"></i> Kelola Informasi
                                    <small>Publikasikan pengumuman PPDB.</small>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.user.index') }}" class="quick-link" style="background: linear-gradient(135deg, #5b21b6, #7c3aed);">
                                    <i class="mdi mdi-account-multiple"></i> Kelola User
                                    <small>Atur akun admin dan pendaftar.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($role === 'pendaftar')
        <div class="card page-hero mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.88); font-weight: 800;">Selamat datang di halaman beranda pendaftar</div>
                    <h4 class="card-title mb-2">Selamat Datang {{ $user->nama }}</h4>
                    <p class="mb-0">Silakan lengkapi data pendaftaran dan cek informasi terbaru dari satu tempat.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4 brochure-print-area">
                <div class="brochure-card">
                        <div class="brochure-print-header">
                            <img src="{{ asset('backend/images/logoo.jpg') }}" alt="Logo SMK Sehati Karawang">
                            <div>
                                <div class="print-title">Brosur PPDB SMK Sehati Karawang</div>
                                <div class="print-subtitle">Tahun Pelajaran 2025/2026</div>
                            </div>
                        </div>
                        <div class="brochure-hero">
                            <div style="flex:1">
                                <div class="title">Penerimaan Peserta Didik Baru</div>
                                <div class="subtitle">Tahun Pelajaran 2025/2026 — SMK Sehati Karawang</div>
                            </div>
                        </div>
                        <div class="brochure-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3 brochure-section">
                                    <div class="brochure-item">
                                        <div class="brochure-key"><div class="icon">1</div><h6>Cara Pendaftaran</h6></div>
                                        <p class="font-weight-bold mb-1">PENDAFTARAN OFFLINE:</p>
                                            <p>Datang langsung ke sekretariat PPDB SMK Sehati Karawang.</p>
                                            <ol class="mb-2">
                                                <li>Membayar biaya pendaftaran Rp 250.000.</li>
                                                <li>Membayar Pembayaran Baju Rp 1.200.000</li>
                                                <li>Membayar Pembayaran Buku Rp 550.000</li>
                                            </ol>
                                            <p class="font-weight-bold mb-1">PENDAFTARAN ONLINE:</p>
                                            <p class="mb-0">Link pendaftaran online:<br><a href="https://ppdb.smksehatikarawang" target="_blank" rel="noopener noreferrer">https://ppdb.smksehatikarawang</a></p>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3 brochure-section">
                                    <div class="brochure-item compact">
                                        <div class="brochure-key"><div class="icon">2</div><h6>Waktu Pendaftaran</h6></div>
                                        <p>Gelombang 1: <strong>01 Agustus - 31 Desember 2024</strong><br>Gelombang 2: <strong>01 Januari - 31 Juli 2025</strong></p>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3 brochure-section">
                                    <div class="brochure-item compact">
                                        <div class="brochure-key"><div class="icon">3</div><h6>Jurusan Tersedia</h6></div>
                                        <ul>
                                            <li>Farmasi Klinis & Komunitas</li>
                                            <li>Asisten Keperawatan & Caregiver</li>
                                            <li>Teknik Komputer & Jaringan</li>
                                            <li>Teknik Sepeda Motor</li>
                                            <li>Teknik Kendaraan Ringan</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 mb-3 brochure-section">
                                    <div class="brochure-item">
                                        <div class="brochure-key"><div class="icon">4</div><h6>Hubungi Contact Person</h6></div>
                                        <p class="mb-2">Hubungi contact person SMK Sehati Karawang:</p>
                                        <ul>
                                            <li>WhatsApp: 082211445533</li>
                                            <li>Telp: 082211445533</li>
                                            <li>Email: ppdb@smksehatikarawang</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 brochure-section">
                                    <div class="brochure-item">
                                        <div class="brochure-key"><div class="icon">5</div><h6>Pendaftaran (Offline)</h6></div>
                                        <ul>
                                            <li>Fotokopi Akta Kelahiran (2 lembar)</li>
                                            <li>Fotokopi KTP Orang Tua (2 lembar)</li>
                                            <li>Fotokopi Kartu Keluarga (2 lembar)</li>
                                            <li>Pas foto 3x4 (2 lembar)</li>
                                            <li>Fotokopi rapor semester 1-2 dan halaman cover</li>
                                            <li>Fotokopi surat keterangan lulus (menyusul)</li>
                                            <li>Fotokopi ijazah SMP/MTs (menyusul)</li>
                                            <li>Materai 10.000 (2 lembar)</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6 brochure-section">
                                    <div class="brochure-item">
                                        <div class="brochure-key"><div class="icon">6</div><h6>Pendaftaran (Online)</h6></div>
                                        <ol>
                                            <li>Mengisi formulir pendaftaran</li>
                                            <li>Mengisi pemesanan baju</li>
                                            <li>Mengisi pemesanan buku</li>
                                            <li>Melakukan pembayaran</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="brochure-actions">
                                <button type="button" class="btn btn-brochure-print" onclick="window.print()">
                                    <i class="mdi mdi-printer mr-1"></i> Cetak Brosur
                                </button>
                            </div>

                            <div class="brochure-print-footer">
                                <strong>SMK Sehati Karawang</strong> - Brosur PPDB resmi untuk dicetak menjadi PDF.
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row mt-1 mt-md-2">
            <div class="col-12 mb-4">
                <div class="card soft-card">
                    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <h5 class="card-title mb-2 mb-md-0"><i class="mdi mdi-apps mr-1"></i> Menu Pendaftar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
                                <a href="{{ route('backend.pendaftaran.form') }}" class="quick-link w-100" style="background: linear-gradient(135deg, #7c3aed, #a855f7);">
                                    <i class="mdi mdi-account-plus mr-1"></i> Form Pendaftaran
                                    <small>Lengkapi data utama pendaftaran.</small>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
                                <a href="{{ route('backend.pemesanan.baju') }}" class="quick-link w-100" style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);">
                                    <i class="mdi mdi-tshirt-crew mr-1"></i> Pemesanan Baju
                                    <small>Isi form ukuran dan kebutuhan baju.</small>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
                                <a href="{{ route('backend.pemesanan.buku') }}" class="quick-link w-100" style="background: linear-gradient(135deg, #5b21b6, #7c3aed);">
                                    <i class="mdi mdi-book-open-page-variant mr-1"></i> Pemesanan Buku
                                    <small>Lihat dan isi form buku yang dibutuhkan.</small>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
                                <a href="{{ route('backend.pengumuman.index') }}" class="quick-link w-100" style="background: linear-gradient(135deg, #5b21b6, #7c3aed);">
                                    <i class="mdi mdi-bell mr-1"></i> Informasi
                                    <small>Baca pengumuman terbaru dari sekolah.</small>
                                </a>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 mb-3 d-flex">
                                <a href="{{ route('backend.pembayaransantri.index') }}" class="quick-link w-100" style="background: linear-gradient(135deg, #7c3aed, #a855f7);">
                                    <i class="mdi mdi-credit-card mr-1"></i> Pembayaran
                                    <small>Pantau riwayat transaksi pembayaran.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
