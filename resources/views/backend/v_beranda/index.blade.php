@extends('backend.v_layout.app')

@section('content')
<style>
    .dashboard-wrap .page-hero {
        border: 0;
        border-radius: var(--theme-radius, 22px);
        overflow: hidden;
        box-shadow: 0 18px 44px rgba(15, 23, 42, 0.12);
        color: #fff;
        position: relative;
    }

    .dashboard-wrap .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(255, 255, 255, 0.08), transparent 42%),
            linear-gradient(135deg, rgba(15, 23, 42, 0.16), transparent 55%);
        pointer-events: none;
    }

    .dashboard-wrap .page-hero > .card-body {
        position: relative;
        z-index: 1;
    }

    .dashboard-wrap .page-hero.admin {
        background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 62%, #0ea5e9 100%);
    }

    .dashboard-wrap .page-hero.pendaftar {
        background: linear-gradient(135deg, #0f172a 0%, #0369a1 60%, #22c55e 100%);
    }

    .dashboard-wrap .page-hero .card-title,
    .dashboard-wrap .page-hero p {
        color: #fff;
    }

    .dashboard-wrap .page-hero .card-title {
        letter-spacing: 0.01em;
        font-weight: 900;
    }

    .dashboard-wrap .page-hero .badge {
        align-self: flex-start;
        width: auto;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .dashboard-wrap .soft-card {
        border: 1px solid var(--theme-border, rgba(15, 23, 42, 0.10));
        border-radius: var(--theme-radius, 20px);
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.08);
        overflow: hidden;
        background: #fff;
    }

    .dashboard-wrap .soft-card .card-header {
        background: #f8fafc;
        border-bottom: 1px solid var(--theme-border, rgba(15, 23, 42, 0.10));
        padding: 14px 18px;
    }

    .dashboard-wrap .soft-card .card-title {
        margin-bottom: 0;
        font-weight: 800;
        color: var(--theme-text, #0f172a);
    }

    .dashboard-wrap .metric-card {
        border: 1px solid var(--theme-border, rgba(15, 23, 42, 0.10));
        border-radius: 18px;
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.06);
        overflow: hidden;
        background: #fff;
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

    .dashboard-wrap .metric-card.primary {
        border-left: 6px solid var(--theme-primary-dark, #0369a1);
    }

    .dashboard-wrap .metric-card.info {
        border-left: 6px solid var(--theme-primary, #0ea5e9);
    }

    .dashboard-wrap .metric-card.success {
        border-left: 6px solid var(--theme-accent, #22c55e);
    }

    .dashboard-wrap .metric-card.warning {
        border-left: 6px solid #f59e0b;
    }

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

    .dashboard-wrap .status-ok {
        background: linear-gradient(135deg, #16a34a, #22c55e);
    }

    .dashboard-wrap .status-no {
        background: linear-gradient(135deg, #dc2626, #ef4444);
    }

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

    .dashboard-wrap .action-primary {
        background: linear-gradient(135deg, #0369a1, #0ea5e9);
    }

    .dashboard-wrap .action-info {
        background: linear-gradient(135deg, #0f172a, #334155);
    }

    .dashboard-wrap .quick-link {
        position: relative;
        border-radius: 16px;
        padding: 16px 18px 16px 18px;
        color: var(--theme-text, #0f172a) !important;
        font-weight: 700;
        text-align: left;
        min-height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        border: 1px solid var(--theme-border, rgba(15, 23, 42, 0.10));
        background: #fff;
        box-shadow: 0 10px 18px rgba(15, 23, 42, 0.06);
        overflow: hidden;
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
    }

    .dashboard-wrap .quick-link small {
        display: block;
        font-weight: 500;
        color: var(--theme-muted, #64748b);
        margin-top: 6px;
    }

    .dashboard-wrap .quick-link i {
        font-size: 20px;
        margin-bottom: 10px;
        display: inline-flex;
        width: 38px;
        height: 38px;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: #f8fafc;
    }

    .dashboard-wrap .quick-link::before {
        content: '';
        position: absolute;
        inset: 0 auto 0 0;
        width: 5px;
        background: var(--quick-accent, #0ea5e9);
    }

    .dashboard-wrap .quick-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 26px rgba(15, 23, 42, 0.10);
        border-color: rgba(15, 23, 42, 0.14);
    }

    .dashboard-wrap .quick-link.quick-link-green {
        --quick-accent: #22c55e;
    }

    .dashboard-wrap .quick-link.quick-link-blue {
        --quick-accent: #0ea5e9;
    }

    .dashboard-wrap .quick-link.quick-link-amber {
        --quick-accent: #f59e0b;
    }

    .dashboard-wrap .quick-link.quick-link-slate {
        --quick-accent: #334155;
    }

    .dashboard-wrap .quick-link.quick-link-teal {
        --quick-accent: #14b8a6;
    }

    .dashboard-wrap .table thead th {
        background: #f8fafc;
        color: #0f172a;
        font-weight: 800;
        border-top: 0;
    }

    .dashboard-wrap .table td,
    .dashboard-wrap .table th {
        vertical-align: middle;
    }
</style>

<div class="container-fluid dashboard-wrap">
    @if($role === 'admin')
        <div class="card page-hero admin mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.88); font-weight: 800;">Selamat datang di halaman beranda admin</div>
                    <h4 class="card-title mb-2">Selamat Datang, {{ Auth::user()->name }}!</h4>
                    <p class="mb-0">Anda login sebagai Admin PPDB SMK Sehati Karawang. Semua data pendaftaran, pembayaran, dan pengumuman bisa dikelola dari sini.</p>
                </div>
                <span class="badge badge-light mt-3 mt-md-0 px-3 py-2">Dashboard Admin</span>
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
                                <a href="{{ route('backend.pendaftaransantri.index') }}" class="quick-link" style="background: linear-gradient(135deg, #1d4ed8, #7c3aed);">
                                    <i class="mdi mdi-account-box"></i> Data Pendaftaran
                                    <small>Lihat dan kelola seluruh pendaftar.</small>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.pembayaransantri.index') }}" class="quick-link" style="background: linear-gradient(135deg, #16a34a, #22c55e);">
                                    <i class="mdi mdi-credit-card"></i> Kelola Pembayaran
                                    <small>Monitor transaksi pembayaran siswa.</small>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.pengumuman.index') }}" class="quick-link" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                                    <i class="mdi mdi-bullhorn"></i> Kelola Informasi
                                    <small>Publikasikan pengumuman PPDB.</small>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('backend.user.index') }}" class="quick-link" style="background: linear-gradient(135deg, #0ea5e9, #0369a1);">
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
        <div class="card page-hero pendaftar mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.88); font-weight: 800;">Selamat datang di halaman beranda pendaftar</div>
                    <h4 class="card-title mb-2">Selamat Datang, {{ $user->name }}!</h4>
                    <p class="mb-0">Silakan lengkapi data pendaftaran, cek informasi, dan pantau status pembayaran Anda dari satu tempat.</p>
                </div>
                <span class="badge badge-light mt-3 mt-md-0 px-3 py-2">Dashboard Pendaftar</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card soft-card h-100">
                    <div class="card-header">
                        <h5 class="card-title"><i class="mdi mdi-clipboard-check mr-1"></i> Status Pendaftaran Anda</h5>
                    </div>
                    <div class="card-body">
                        @php
                            $stepData = $pendaftaran && $pendaftaran->nama_santri;
                            $stepUpload = $pendaftaran && $pendaftaran->pas_foto && $pendaftaran->scan_kk && $pendaftaran->akta_kelahiran && $pendaftaran->ijazah_skl;
                            $stepPayment = (bool) $pembayaran;
                            $stepVerify = data_get($pendaftaran, 'status_verifikasi') === 'terverifikasi';
                            $steps = [
                                ['label' => '1 Data Diri', 'done' => $stepData],
                                ['label' => '2 Upload Berkas', 'done' => $stepUpload],
                                ['label' => '3 Pembayaran', 'done' => $stepPayment],
                                ['label' => '4 Verifikasi', 'done' => $stepVerify],
                            ];
                            $activeIndex = 0;
                            foreach ($steps as $index => $step) {
                                if (!$step['done']) {
                                    $activeIndex = $index;
                                    break;
                                }
                                $activeIndex = $index;
                            }
                        @endphp

                        <div class="progress-steps mb-4">
                            @foreach ($steps as $index => $step)
                                <div class="step {{ $step['done'] ? 'complete' : ($index === $activeIndex ? 'active' : '') }}">
                                    {{ $step['label'] }}
                                </div>
                            @endforeach
                        </div>

                        @if($pendaftaran)
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="text-muted small">ID Siswa</div>
                                    <span class="badge badge-success px-3 py-2">{{ $pendaftaran->id_santri }}</span>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="text-muted small">Nama</div>
                                    <div class="font-weight-bold">{{ $pendaftaran->nama_santri }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="text-muted small">Email</div>
                                    <div>{{ $pendaftaran->email ?? 'Belum diisi' }}</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="text-muted small">No HP</div>
                                    <div>{{ $pendaftaran->no_hp_siswa ?? $pendaftaran->no_telpon ?? 'Belum diisi' }}</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="text-muted small">Tanggal Pendaftaran</div>
                                    <div>{{ $pendaftaran->tgl_pendaftaran ? \Carbon\Carbon::parse($pendaftaran->tgl_pendaftaran)->format('d M Y H:i') : 'Belum diisi' }}</div>
                                </div>
                            </div>

                            <hr>

                            <div class="mb-2 font-weight-bold">Status Data</div>
                            <div>
                                <span class="status-badge {{ $pendaftaran->nama_santri ? 'status-ok' : 'status-no' }}">
                                    <i class="mdi {{ $pendaftaran->nama_santri ? 'mdi-check' : 'mdi-close' }}"></i> Data Pribadi
                                </span>
                                <span class="status-badge {{ ($pendaftaran->nama_ayah && $pendaftaran->nama_ibu) ? 'status-ok' : 'status-no' }}">
                                    <i class="mdi {{ ($pendaftaran->nama_ayah && $pendaftaran->nama_ibu) ? 'mdi-check' : 'mdi-close' }}"></i> Orang Tua
                                </span>
                                <span class="status-badge {{ $pendaftaran->nama_sekolah_asal ? 'status-ok' : 'status-no' }}">
                                    <i class="mdi {{ $pendaftaran->nama_sekolah_asal ? 'mdi-check' : 'mdi-close' }}"></i> Sekolah Asal
                                </span>
                                <span class="status-badge {{ $pendaftaran->pilihan_jurusan_1 ? 'status-ok' : 'status-no' }}">
                                    <i class="mdi {{ $pendaftaran->pilihan_jurusan_1 ? 'mdi-check' : 'mdi-close' }}"></i> Jurusan
                                </span>
                                <span class="status-badge {{ ($pendaftaran->pas_foto && $pendaftaran->scan_kk && $pendaftaran->akta_kelahiran && $pendaftaran->ijazah_skl) ? 'status-ok' : 'status-no' }}">
                                    <i class="mdi {{ ($pendaftaran->pas_foto && $pendaftaran->scan_kk && $pendaftaran->akta_kelahiran && $pendaftaran->ijazah_skl) ? 'mdi-check' : 'mdi-close' }}"></i> Dokumen
                                </span>
                            </div>
                        @else
                            <div class="alert alert-info mb-0" role="alert">
                                <i class="mdi mdi-information mr-1"></i> Anda belum melakukan pendaftaran. Gunakan tombol di bawah untuk memulai.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card soft-card h-100">
                    <div class="card-header">
                        <h5 class="card-title"><i class="mdi mdi-credit-card mr-1"></i> Status Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        @if($pembayaran)
                            <div class="text-muted small">ID Pembayaran</div>
                            <span class="badge badge-info px-3 py-2 mb-3">{{ $pembayaran->id_pembayaran }}</span>

                            <div class="text-muted small">Jenis Pembayaran</div>
                            <div class="font-weight-bold mb-3">{{ ucfirst($pembayaran->jenis_pembayaran) }}</div>

                            <div class="text-muted small">Jumlah</div>
                            <div class="font-weight-bold text-success mb-3" style="font-size: 22px;">Rp {{ number_format($pembayaran->jumlah_pembayaran, 0, ',', '.') }}</div>

                            <div class="text-muted small">Tanggal Pembayaran</div>
                            <div class="mb-3">{{ $pembayaran->tanggal_pembayaran ? \Carbon\Carbon::parse($pembayaran->tanggal_pembayaran)->format('d M Y') : 'Belum dibayar' }}</div>

                            <div class="text-muted small">Status</div>
                            <span class="badge badge-success px-3 py-2"><i class="mdi mdi-check-circle mr-1"></i> Sudah Dibayar</span>
                        @else
                            <div class="alert alert-warning mb-0" role="alert">
                                <i class="mdi mdi-alert mr-1"></i> Belum ada pembayaran terdaftar. Silakan hubungi admin jika ada informasi yang perlu dikonfirmasi.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card soft-card">
                    <div class="card-header">
                        <h5 class="card-title"><i class="mdi mdi-link mr-1"></i> Aksi Cepat</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('backend.pendaftaran.form') }}" class="action-link action-primary mr-2 mb-2">
                            <i class="mdi mdi-pencil"></i> {{ $pendaftaran ? 'Edit Data Pendaftaran' : 'Mulai Pendaftaran' }}
                        </a>
                        @if($pendaftaran)
                            <a href="{{ route('backend.pendaftaransantri.show', $pendaftaran->id_santri) }}" class="action-link action-info mb-2">
                                <i class="mdi mdi-eye"></i> Lihat Rincian
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <div class="card soft-card">
                    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <h5 class="card-title mb-2 mb-md-0"><i class="mdi mdi-apps mr-1"></i> Menu Pendaftar</h5>
                        <span class="badge badge-light px-3 py-2">Semua layanan untuk pendaftar</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mb-3">
                                <a href="{{ route('backend.pendaftaran.form') }}" class="quick-link quick-link-green">
                                    <i class="mdi mdi-account-plus mr-1"></i> Form Pendaftaran
                                    <small>Lengkapi data utama pendaftaran.</small>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <a href="{{ route('backend.pemesanan.baju') }}" class="quick-link quick-link-blue">
                                    <i class="mdi mdi-tshirt-crew mr-1"></i> Pemesanan Baju
                                    <small>Isi form ukuran dan kebutuhan baju.</small>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <a href="{{ route('backend.pemesanan.buku') }}" class="quick-link quick-link-amber">
                                    <i class="mdi mdi-book-open-page-variant mr-1"></i> Pemesanan Buku
                                    <small>Lihat dan isi form buku yang dibutuhkan.</small>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <a href="{{ route('backend.pengumuman.index') }}" class="quick-link quick-link-slate">
                                    <i class="mdi mdi-bell mr-1"></i> Informasi
                                    <small>Baca pengumuman terbaru dari sekolah.</small>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <a href="{{ route('backend.pembayaransantri.index') }}" class="quick-link quick-link-teal">
                                    <i class="mdi mdi-credit-card mr-1"></i> Pembayaran
                                    <small>Pantau riwayat dan status pembayaran.</small>
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
