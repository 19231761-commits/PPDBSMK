@extends('backend.v_layout.app')

@section('content')
@php
    $jurusanList = [
        'Farmasi Klinis & Komunitas',
        'Asisten Keperawatan & Caregiver',
        'Teknik Komputer & Jaringan',
        'Teknik Sepeda Motor',
        'Teknik Kendaraan Ringan',
    ];
    $totalPembayaranFormatted = 'Rp ' . number_format($totalPembayaran ?? 0, 0, ',', '.');
@endphp
<div class="container-fluid ppdb-dashboard-shell">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card hero-card mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman pengelolaan pendaftaran</div>
                            <h4 class="card-title mb-2">{{ $judul }}</h4>
                            <p class="mb-0 text-muted">Lihat daftar siswa yang telah mengisi formulir pendaftaran terorganisir per jurusan pilihan.</p>
                        </div>
                    </div>
                </div>
            </div>

            

            @if($dataPerJurusan->isEmpty())
                <div class="card soft-card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-inbox" style="font-size: 48px; color: #d1d5db; margin-bottom: 16px; display: block;"></i>
                        <h5 class="text-muted">Belum ada data pendaftaran</h5>
                        <p class="text-muted small">Data pendaftaran siswa akan ditampilkan di sini setelah siswa mengisi formulir pendaftaran.</p>
                    </div>
                </div>
            @else
                @php
                    $orderedDataPerJurusan = collect();
                    foreach ($jurusanList as $jurusanName) {
                        if (isset($dataPerJurusan[$jurusanName])) {
                            $orderedDataPerJurusan->put($jurusanName, $dataPerJurusan[$jurusanName]);
                        }
                    }

                    foreach ($dataPerJurusan as $jurusanName => $siswa) {
                        if (! $orderedDataPerJurusan->has($jurusanName)) {
                            $orderedDataPerJurusan->put($jurusanName, $siswa);
                        }
                    }

                    $activeJurusanIndex = 1;
                    $activeJurusanName = $orderedDataPerJurusan->keys()->first();
                    $activeJurusanCount = $activeJurusanName ? $orderedDataPerJurusan[$activeJurusanName]->count() : 0;
                @endphp

                <div class="card soft-card jurusan-dashboard-card">
                    <div class="card-body">
                        <div class="jurusan-filter-pills mb-4" id="jurusanFilterTabs" role="tablist" aria-label="Filter jurusan">
                            @foreach($orderedDataPerJurusan as $jurusan => $siswa)
                                @php $jurusanKey = 'jurusan-' . $loop->iteration; @endphp
                                <button type="button" class="jurusan-filter-pill {{ $loop->first ? 'active' : '' }}" data-filter="{{ $jurusanKey }}" data-jurusan-name="{{ $jurusan }}" data-jurusan-count="{{ $siswa->count() }}">
                                    <span class="jurusan-filter-name">{{ $jurusan }}</span>
                                    <span class="jurusan-count">{{ $siswa->count() }}</span>
                                </button>
                            @endforeach
                        </div>

                        <div class="table-responsive jurusan-table-wrap">
                            <table class="table table-hover align-middle mb-0 jurusan-table">
                                <colgroup>
                                    <col style="width:60px;" />
                                    <col />
                                    <col style="width:160px;" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">No</th>
                                        <th>Nama Siswa</th>
                                        <th class="aksi-col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="jurusanTableBody">
                                    @foreach($orderedDataPerJurusan as $jurusan => $siswa)
                                        @php $jurusanKey = 'jurusan-' . $loop->iteration; @endphp
                                        @foreach($siswa as $row)
                                            <tr data-jurusan="{{ $jurusanKey }}" data-search="{{ strtolower(trim($row->nama_santri ?? '')) }}">
                                                <td class="row-number"></td>
                                                <td>
                                                    @php $name = trim($row->nama_santri ?? ''); @endphp
                                                    <div class="student-text">
                                                        <div class="student-name">{{ $name }}</div>
                                                        @if(!empty($row->nisn ?? '') )
                                                            <div class="student-sub text-muted">NISN: {{ $row->nisn }}</div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-center aksi-col">
                                                    <div class="aksi-group">
                                                        <a href="{{ route('backend.pendaftaransantri.edit', $row->id_santri) }}" class="btn btn-sm btn-icon btn-soft-purple" title="Edit Data">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('backend.pendaftaransantri.destroy', $row->id_santri) }}" class="d-inline-block" onsubmit="return confirm('Hapus data {{ addslashes($row->nama_santri) }}?');">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus Data">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endforeach

                                        <tr id="jurusanEmptyState" class="d-none">
                                            <td colspan="3" class="text-center text-muted py-5">
                                                <i class="fas fa-inbox mb-3" style="font-size: 28px; display: block; color: #d1d5db;"></i>
                                                Tidak ada data pada jurusan yang dipilih.
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .ppdb-dashboard-shell {
        padding-top: 8px;
        padding-bottom: 24px;
    }

    /* Responsive: convert table into stacked cards on small screens */
    @media (max-width: 768px) {
        .jurusan-table,
        .jurusan-table tbody {
            display: block;
            width: 100%;
        }
        .jurusan-table { border: 0; table-layout: auto; }
        .jurusan-table thead { display: none; }
        .jurusan-table tbody tr {
            display: grid;
            grid-template-columns: 42px minmax(0, 1fr) auto;
            align-items: center;
            background: transparent;
            margin-bottom: 10px;
            padding: 10px 8px;
            border-radius: 8px;
            box-shadow: none;
            gap: 10px;
            border: 1px solid rgba(226,232,240,0.6);
        }
        .jurusan-table tbody td {
            display: block;
            padding: 0 !important;
            border: 0 !important;
            background: transparent;
            box-shadow: none !important;
            min-width: 0;
        }
        .jurusan-table tbody td.row-number { width: 42px; height: 42px; text-align: center; padding-left: 0 !important; display:flex; align-items:center; justify-content:center !important; background: #fff !important; box-shadow: none !important; border-radius: 10px; border: 1px solid rgba(226,232,240,0.7); color: #6b7280; font-weight:600; }
        .jurusan-table tbody td:nth-child(2) {
            width: 100%;
            padding-right: 8px !important;
        }
        .jurusan-table tbody td .student-text { padding: 0; }
        .jurusan-table tbody td .student-name { font-size: 15px; margin-bottom: 2px; line-height:1.15; padding-left: 0; }
        .jurusan-table tbody td .student-sub { font-size: 12px; color: #9ca3af; }
        .jurusan-table tbody td.text-center {
            display: flex;
            gap: 8px;
            align-items: center;
            padding-right: 6px;
            justify-content: flex-end;
        }
        .jurusan-table tbody td.aksi-col {
            display: flex;
            width: auto;
            min-width: auto;
            flex-wrap: nowrap;
            padding-left: 0;
            padding-right: 4px;
        }
        .jurusan-table tbody td.aksi-col .aksi-group {
            display: inline-flex;
            align-items: center;
            justify-content: flex-end;
            gap: 6px;
            flex-wrap: nowrap;
        }
        .btn-icon, .btn-action { width: 34px; height: 34px; border-radius: 8px; padding:0; margin:0; }
        .btn-action .fa, .btn-icon .fa { font-size: 14px; }
        .jurusan-table tbody tr + tr { margin-top: 6px; }
    }

    .soft-card {
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 14px 35px rgba(124, 58, 237, 0.08);
        overflow: hidden;
    }

    .hero-card {
        background: linear-gradient(135deg, #ffffff 0%, #f9f5ff 100%);
        border-color: #ede9fe;
    }
    .jurusan-filter-header {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .jurusan-filter-header h5 {
        margin-bottom: 4px;
        font-weight: 800;
        color: #111827;
    }

    .jurusan-filter-summary {
        display: inline-flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px 14px;
        border-radius: 14px;
        background: linear-gradient(135deg, #f8f5ff 0%, #ffffff 100%);
        border: 1px solid #ede9fe;
        color: #6b7280;
        width: fit-content;
    }

    .summary-label {
        color: #7c3aed;
        font-weight: 700;
    }

    .summary-dot {
        color: #c4b5fd;
        font-weight: 700;
    }

    .jurusan-filter-pills {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: nowrap;
        overflow-x: auto;
        padding: 4px 2px 10px;
        margin: 0;
        scrollbar-width: thin;
    }

    .jurusan-filter-pills::-webkit-scrollbar {
        height: 8px;
    }

    .jurusan-filter-pills::-webkit-scrollbar-thumb {
        background: #ddd6fe;
        border-radius: 999px;
    }

    .eyebrow-label {
        gap: 10px;
        align-items: stretch;
        flex-wrap: nowrap;
        overflow-x: auto;
        padding: 4px 2px 10px;
        margin: 0;
        scrollbar-width: thin;
    }

    .jurusan-filter-pill {
        appearance: none;
        border: 1px solid #e9d5ff;
        background: #ffffff;
        color: #4b5563;
        border-radius: 999px;
        padding: 12px 16px;
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        font-weight: 700;
        box-shadow: 0 10px 24px rgba(124, 58, 237, 0.06);
        white-space: nowrap;
        transition: all 0.18s ease;
        min-width: max-content;
    }

    

    .even-row { background: rgba(124,58,237,0.03); }
    .odd-row { background: transparent; }

    .jurusan-filter-pill:hover {
        transform: translateY(-1px);
        border-color: #d8b4fe;
        color: #111827;
        background: #faf5ff;
    }

    .jurusan-filter-pill.active {
        color: #ffffff;
        border-color: transparent;
        background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%);
        box-shadow: 0 14px 28px rgba(124, 58, 237, 0.26);
    }

    .jurusan-filter-name {
        font-size: 14px;
    }

    .jurusan-filter-pill .jurusan-count {
        min-width: 30px;
        height: 30px;
        padding: 0 10px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(124, 58, 237, 0.08);
        color: #7c3aed;
        font-size: 12px;
        font-weight: 800;
        flex: 0 0 auto;
    }

    .jurusan-filter-pill.active .jurusan-count {
        background: rgba(255, 255, 255, 0.18);
        color: #ffffff;
    }

    .jurusan-table-wrap {
        border-radius: 16px;
        border: 1px solid #f1f5f9;
        overflow: hidden;
    }

    .jurusan-table {
        background: #fff;
        table-layout: fixed;
        border-collapse: separate;
        border-spacing: 0;
    }

    .jurusan-table thead th {
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        background: #fbfbfd;
        border-top: 0;
        border-bottom: 1px solid #eef2ff;
        padding: 8px 12px;
    }

    .jurusan-table tbody td {
        vertical-align: middle;
        padding: 8px 12px;
        border-top: 0;
        background: transparent;
    }

    .jurusan-table thead th:first-child,
    .jurusan-table tbody td.row-number {
        width: 60px;
        text-align: center;
        padding-left: 12px;
        vertical-align: middle;
    }

    .jurusan-table thead th:last-child,
    .jurusan-table tbody td.text-center {
        width: 160px;
        text-align: center;
        padding-right: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        vertical-align: middle;
    }

    .jurusan-table thead th.aksi-col,
    .jurusan-table tbody td.aksi-col {
        width: 160px;
        text-align: center;
        padding-left: 8px;
        padding-right: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .jurusan-table tbody tr {
        transition: background-color 0.18s ease;
    }

    .jurusan-table tbody tr:hover {
        background: #faf5ff;
    }

    .student-name {
        font-weight: 400;
        color: #111827;
        margin-bottom: 2px;
        font-size: 1.05rem;
    }

    /* removed avatar initials - show text-only */
    .student-text { display: flex; flex-direction: column; }

    .student-text { display: flex; flex-direction: column; }
    .student-sub { font-size: 0.85rem; color: #6b7280; margin-top: 4px; }

    .student-name { max-width: 640px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    @media (max-width: 768px) {
        .avatar-initials { width: 44px; height: 44px; font-size: 16px; border-radius: 10px; }
        .jurusan-table tbody td { padding: 0 !important; }
    }

    .btn-light-info {
        background: #ecfeff;
        color: #0891b2;
        border: 1px solid #cffafe;
    }

    .btn-light-info:hover {
        background: #cffafe;
        color: #0f766e;
    }

    .btn-soft-purple {
        background: #f5f3ff;
        color: #7c3aed;
        border: 1px solid #ede9fe;
    }

    .btn-soft-purple:hover {
        background: #ede9fe;
        color: #6d28d9;
    }

    .btn-icon, .btn-action {
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(15,7,40,0.04);
        padding: 0;
    }

    /* action buttons alignment and spacing */
    .jurusan-table tbody td.aksi-col .btn,
    .jurusan-table tbody td.aksi-col form {
        margin: 0;
    }

    .jurusan-table tbody td.aksi-col .aksi-group {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        flex-wrap: nowrap;
    }

    /* row number center vertically and right-aligned within its column */
    .jurusan-table tbody td.row-number { display:flex; align-items:center; justify-content:flex-start; padding-left: 24px; }

    /* subtle striping controlled by classes */
    .jurusan-table tbody tr.even-row { background: rgba(124,58,237,0.02); }
    .jurusan-table tbody tr.odd-row { background: transparent; }

    .btn-purple,
    .btn-danger {
        border-radius: 14px;
        padding-left: 18px;
        padding-right: 18px;
        box-shadow: 0 12px 24px rgba(124, 58, 237, 0.12);
    }

    .jurusan-table .btn-sm { padding: 6px; }
    .jurusan-table .btn-sm.btn-danger {
        width: 36px;
        height: 36px;
        min-width: 36px;
        padding: 0;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .jurusan-table-wrap { box-shadow: 0 6px 30px rgba(15, 7, 40, 0.04); }

    .jurusan-empty-inline {
        background: #fcfcff;
        border-top: 1px solid #f1f5f9;
    }

    .jurusan-tabs {
        align-items: center;
        gap: 8px;
        color: #7c3aed;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .eyebrow-label::before {
        content: '';
        width: 10px;
        height: 10px;
        border-radius: 999px;
        background: linear-gradient(135deg, #7c3aed 0%, #c084fc 100%);
        box-shadow: 0 0 0 6px rgba(124, 58, 237, 0.08);
    }

    .hero-subtitle {
        color: #6b7280;
        max-width: 720px;
    }

    .stat-card {
        border: 1px solid #ede9fe;
        background: linear-gradient(180deg, #ffffff 0%, #fcfbff 100%);
    }

    .stat-card-primary {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.75);
    }

    .stat-card-success {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.75);
    }

    .stat-card-warning {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.75);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
        flex: 0 0 auto;
    }

    .stat-icon-primary { background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%); }
    .stat-icon-success { background: linear-gradient(135deg, #10b981 0%, #22c55e 100%); }
    .stat-icon-warning { background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%); }

    .stat-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        color: #6b7280;
        font-weight: 700;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 800;
        color: #111827;
        line-height: 1.1;
    }

    .jurusan-dashboard-card {
        overflow: hidden;
    }

    .jurusan-tabs {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0 16px;
        border-bottom: 1px solid #e5e7eb;
        background: linear-gradient(180deg, #ffffff 0%, #fbfbff 100%);
        gap: 8px;
        flex-wrap: nowrap;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
    }

    .jurusan-tabs .nav-item {
        margin-bottom: -1px;
        flex: 0 0 auto;
        list-style: none;
    }

    .jurusan-tabs .nav-link {
        display: inline-flex;
        align-items: center;
        border: 1px solid transparent;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        color: #4b5563;
        font-weight: 600;
        padding: 14px 18px;
        transition: all 0.18s ease;
        text-decoration: none;
        white-space: nowrap;
    }

    .jurusan-tabs .nav-link:hover {
        color: #111827;
        background-color: #f7f5ff;
        border-color: #ece7ff;
        transform: translateY(-1px);
    }

    .jurusan-tabs .nav-link.active {
        color: #7c3aed;
        background-color: #fff;
        border-color: #e5e7eb #e5e7eb #fff;
        box-shadow: 0 -1px 0 #fff;
    }

    /* Theme alignment with other admin pages */
    .ppdb-dashboard-shell .soft-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.06);
        background: #ffffff;
    }

    .ppdb-dashboard-shell .hero-card {
        background: #ffffff;
        border-color: #e5e7eb;
    }

    .ppdb-dashboard-shell .eyebrow-label {
        display: inline-block;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #4f46e5;
        padding: 0;
        margin: 0;
        overflow: visible;
    }

    .ppdb-dashboard-shell .eyebrow-label::before {
        display: none;
    }

    .ppdb-dashboard-shell .hero-subtitle {
        color: #6b7280;
        max-width: 680px;
    }

    .ppdb-dashboard-shell .jurusan-filter-summary {
        background: #f8fafc;
        border: 1px solid #e5e7eb;
    }

    .ppdb-dashboard-shell .summary-label {
        color: #4f46e5;
    }

    .ppdb-dashboard-shell .summary-dot {
        color: #c7d2fe;
    }

    .ppdb-dashboard-shell .jurusan-filter-pill {
        border-color: #e5e7eb;
        box-shadow: none;
    }

    .ppdb-dashboard-shell .jurusan-filter-pill:hover {
        border-color: #c7d2fe;
        background: #f8fafc;
        transform: none;
    }

    .ppdb-dashboard-shell .jurusan-filter-pill.active {
        background: #6d28d9;
        box-shadow: none;
    }

    .ppdb-dashboard-shell .jurusan-table-wrap {
        border-color: #e5e7eb;
        box-shadow: none;
    }

    .ppdb-dashboard-shell .jurusan-table thead th {
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
    }

    .ppdb-dashboard-shell .jurusan-table tbody tr:hover {
        background: #f9fafb;
    }

    .ppdb-dashboard-shell .jurusan-table tbody tr.even-row {
        background: #fcfcfd;
    }

    .ppdb-dashboard-shell .btn-soft-purple {
        background: #eef2ff;
        border-color: #c7d2fe;
        color: #4338ca;
    }

    .ppdb-dashboard-shell .btn-soft-purple:hover {
        background: #e0e7ff;
        color: #3730a3;
    }

    /* Final 1:1 feel with other admin list pages */
    .ppdb-dashboard-shell .jurusan-table-wrap {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 12px 40px rgba(108, 63, 255, 0.06);
        padding: 8px;
        border: 0;
    }

    .ppdb-dashboard-shell .jurusan-table thead th {
        background: linear-gradient(135deg, #7c3aed 0%, #a855f7 100%) !important;
        border-bottom: 0;
        color: #ffffff !important;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.06em;
        padding: 18px 20px;
        white-space: nowrap;
    }

    .ppdb-dashboard-shell .jurusan-table thead th:first-child {
        width: 72px !important;
        min-width: 72px;
        text-align: center;
        padding-left: 10px;
        padding-right: 10px;
    }

    .ppdb-dashboard-shell .jurusan-table thead th.aksi-col {
        width: 160px !important;
        min-width: 160px;
    }

    .ppdb-dashboard-shell .jurusan-table thead th {
        border-color: rgba(255, 255, 255, 0.18) !important;
    }

    .ppdb-dashboard-shell .jurusan-table tbody td {
        padding: 18px 16px;
        vertical-align: middle;
        border-top: 0;
        background: transparent;
    }

    .ppdb-dashboard-shell .jurusan-table tbody tr + tr td {
        border-top: 1px solid rgba(230, 230, 240, 0.8);
    }

    .ppdb-dashboard-shell .jurusan-table tbody td.row-number {
        justify-content: center;
        width: 72px;
        min-width: 72px;
        padding-left: 0 !important;
    }

    .ppdb-dashboard-shell .jurusan-table .btn-sm.btn-icon,
    .ppdb-dashboard-shell .jurusan-table .btn-sm.btn-danger {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border: 0;
        box-shadow: 0 8px 22px rgba(15, 7, 40, 0.04);
    }

    .ppdb-dashboard-shell .jurusan-table .btn-sm.btn-icon {
        background: linear-gradient(135deg, #efe6ff 0%, #d6c1ff 100%);
        color: #4b2a86;
    }

    .ppdb-dashboard-shell .jurusan-table .btn-sm.btn-danger {
        background: linear-gradient(135deg, #7c3aed 0%, #6b21c8 100%);
        color: #fff;
        box-shadow: 0 10px 26px rgba(116, 96, 238, 0.14);
    }

    @media (max-width: 768px) {
        .ppdb-dashboard-shell .jurusan-table-wrap {
            padding: 0;
            box-shadow: none;
            background: transparent;
        }
    }
</style>

<script>
    let tabs = [];
    let rows = [];
    let emptyState = null;
    let selectedName = null;
    let selectedCount = null;

    document.addEventListener('DOMContentLoaded', function() {
        tabs = Array.from(document.querySelectorAll('.jurusan-filter-pill'));
        rows = Array.from(document.querySelectorAll('#jurusanTableBody tr[data-jurusan]'));
        emptyState = document.getElementById('jurusanEmptyState');
        selectedName = document.getElementById('jurusanSelectedName');
        selectedCount = document.getElementById('jurusanSelectedCount');

        window.applyFilter = (filterKey, tabEl) => {
            let visibleIndex = 0;
            let visibleCount = 0;

            rows.forEach((row) => {
                const isMatch = row.dataset.jurusan === filterKey;
                row.classList.toggle('d-none', !isMatch);

                if (isMatch) {
                    visibleIndex += 1;
                    visibleCount += 1;
                    const numberCell = row.querySelector('.row-number');
                    if (numberCell) numberCell.textContent = visibleIndex;
                }
            });

            if (emptyState) {
                emptyState.classList.toggle('d-none', visibleCount > 0);
            }

            if (selectedName && tabEl) {
                selectedName.textContent = tabEl.dataset.jurusanName || '-';
            }

            if (selectedCount && tabEl) {
                selectedCount.textContent = tabEl.dataset.jurusanCount || '0';
            }

            if (window.stripeRows) {
                try { window.stripeRows(); } catch (e) { console.error(e); }
            }
        };

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', function() {
                tabs.forEach(item => item.classList.remove('active'));
                tab.classList.add('active');
                applyFilter(tab.dataset.filter, tab);
            });

            if (index === 0) {
                applyFilter(tab.dataset.filter, tab);
            }
        });

        const params = new URLSearchParams(window.location.search);
        const jurusanFromUrl = (params.get('jurusan') || '').toLowerCase();
        if (jurusanFromUrl) {
            const matchingTab = tabs.find(tab => (tab.dataset.jurusanName || '').toLowerCase().includes(jurusanFromUrl));
            if (matchingTab) {
                matchingTab.click();
            }
        }

        // row striping helper (used after filters)
        window.stripeRows = function() {
            const visibleRows = Array.from(document.querySelectorAll('#jurusanTableBody tr[data-jurusan]:not(.d-none)'));
            visibleRows.forEach((r, i) => {
                r.classList.remove('even-row', 'odd-row');
                r.classList.add(i % 2 === 0 ? 'even-row' : 'odd-row');
            });
        };
    });

    // initial striping will be handled after applyFilter via window.stripeRows
</script>
<!-- Modal: Detail Pendaftar -->
<div class="modal fade" id="pendaftarDetailModal" tabindex="-1" role="dialog" aria-labelledby="pendaftarDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendaftarDetailModalLabel">Detail Pendaftaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body ppdb-form-wrap">
                <div class="card hero-card mb-4">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.78); font-weight: 800;">Detail data pendaftaran siswa</div>
                            <h4 class="card-title mb-2" id="md_nama_santri_header">Detail Pendaftaran</h4>
                            <p class="mb-0 help-text">Informasi di bawah ditampilkan sama seperti form pendaftaran, hanya untuk dilihat.</p>
                        </div>
                        <div id="md_id_santri_header" class="text-white font-weight-bold">ID: -</div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">1. Data Diri</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>Nama lengkap</label>
                                <input type="text" id="md_nama_santri" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>NISN</label>
                                <input type="text" id="md_no_nisn" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>NIK</label>
                                <input type="text" id="md_no_nik" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Tempat lahir</label>
                                <input type="text" id="md_tempat_lahir" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Tanggal lahir</label>
                                <input type="date" id="md_tanggal_lahir" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Jenis kelamin</label>
                                <select id="md_jenis_kelamin" class="custom-select form-control" disabled>
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12 form-group">
                                <label>Agama</label>
                                <select id="md_agama" class="custom-select form-control" disabled>
                                    <option value="">- Pilih Agama -</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-12 form-group form-span-2">
                                <label>Alamat lengkap</label>
                                <textarea id="md_alamat_lengkap" rows="2" class="form-control" disabled></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label>RT / RW</label>
                                <input type="text" id="md_rt_rw" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Desa/Kelurahan</label>
                                <input type="text" id="md_desa_kelurahan" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Kecamatan</label>
                                <input type="text" id="md_kecamatan" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Kota/Kabupaten</label>
                                <input type="text" id="md_kota_kabupaten" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Provinsi</label>
                                <input type="text" id="md_provinsi" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Kode pos</label>
                                <input type="text" id="md_kode_pos" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>No HP siswa</label>
                                <input type="text" id="md_no_hp_siswa" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Email</label>
                                <input type="text" id="md_email" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">2. Data Orang Tua / Wali</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 mb-2 form-span-2"><h6 class="mb-0">Data Ayah</h6></div>
                            <div class="col-12 form-group"><label>Nama ayah</label><input type="text" id="md_nama_ayah" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>NIK ayah</label><input type="text" id="md_nik_ayah" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>Pekerjaan ayah</label><input type="text" id="md_pekerjaan_ayah" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>Penghasilan ayah</label><input type="text" id="md_penghasilan_ayah" class="form-control" disabled></div>

                            <div class="col-12 mt-3 mb-2 form-span-2"><h6 class="mb-0">Data Ibu</h6></div>
                            <div class="col-12 form-group"><label>Nama ibu</label><input type="text" id="md_nama_ibu" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>NIK ibu</label><input type="text" id="md_nik_ibu" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>Pekerjaan ibu</label><input type="text" id="md_pekerjaan_ibu" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>Penghasilan ibu</label><input type="text" id="md_penghasilan_ibu" class="form-control" disabled></div>

                            <div class="col-12 mt-3 mb-2 form-span-2"><h6 class="mb-0">Data Wali</h6></div>
                            <div class="col-12 form-group"><label>Nama wali</label><input type="text" id="md_nama_wali" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>Pekerjaan wali</label><input type="text" id="md_pekerjaan_wali" class="form-control" disabled></div>
                            <div class="col-12 form-group"><label>No HP wali</label><input type="text" id="md_no_hp_wali" class="form-control" disabled></div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">3. Data Sekolah Asal</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>Nama sekolah (SMP/MTs)</label>
                                <input type="text" id="md_nama_sekolah_asal" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>NPSN</label>
                                <input type="text" id="md_npsn" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group">
                                <label>Tahun lulus</label>
                                <input type="text" id="md_tahun_lulus" class="form-control" disabled>
                            </div>
                            <div class="col-12 form-group form-span-2">
                                <label>Alamat sekolah</label>
                                <textarea id="md_alamat_sekolah" rows="2" class="form-control" disabled></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">4. Pilihan Jurusan</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>Pilihan Jurusan</label>
                                <select id="md_pilihan_jurusan" class="custom-select form-control" disabled>
                                    <option value="">- Pilih Jurusan -</option>
                                    @foreach($jurusanList as $j)
                                        <option value="{{ $j }}">{{ $j }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">5. Upload Berkas</div>
                    <div class="section-body">
                        <p class="text-muted mb-3">Berkas yang diunggah dapat dilihat/diunduh di bawah ini.</p>
                        <div class="row">
                            <div class="col-12 form-group">
                                <label>Pas foto</label>
                                <div id="md_pas_foto_preview" class="mt-2"></div>
                            </div>
                            <div class="col-12 form-group"><label>Scan KK</label> <div><a id="md_scan_kk_link" href="#" target="_blank">Lihat / Unduh</a></div></div>
                            <div class="col-12 form-group"><label>Akta kelahiran</label> <div><a id="md_akta_kelahiran_link" href="#" target="_blank">Lihat / Unduh</a></div></div>
                            <div class="col-12 form-group"><label>Ijazah / SKL</label> <div><a id="md_ijazah_skl_link" href="#" target="_blank">Lihat / Unduh</a></div></div>
                            <div class="col-12 form-group"><label>Raport</label> <div><a id="md_raport_link" href="#" target="_blank">Lihat / Unduh</a></div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection