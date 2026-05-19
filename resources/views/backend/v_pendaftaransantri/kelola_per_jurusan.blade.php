@extends('backend.v_layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4">
                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start">
                        <div class="mb-3 mb-md-0">
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Manajemen Pendaftaran</div>
                            <h4 class="card-title mb-2">{{ $judul }}</h4>
                            <p class="mb-0 text-muted">Lihat daftar siswa yang telah mengisi formulir pendaftaran terorganisir per jurusan pilihan.</p>
                        </div>
                        <div class="mt-0">
                            <a href="{{ route('backend.pendaftaransantri.index') }}" class="btn btn-outline-purple mb-2 mb-md-0">
                                <i class="fas fa-list"></i> Lihat Semua Data
                            </a>
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
                <div class="card soft-card jurusan-dashboard-card">
                    <div class="card-body p-0">
                        <ul class="nav nav-tabs jurusan-tabs" id="jurusanTab" role="tablist">
                            @foreach($dataPerJurusan as $jurusan => $siswa)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="jurusan-{{ $loop->iteration }}-tab" data-toggle="tab" href="#jurusan-{{ $loop->iteration }}" role="tab" aria-controls="jurusan-{{ $loop->iteration }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        <span class="d-flex align-items-center">
                                            <span class="mr-2">{{ $jurusan }}</span>
                                            <span class="badge badge-purple badge-pill">{{ $siswa->count() }}</span>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content jurusan-tab-content" id="jurusanTabContent">
                            @foreach($dataPerJurusan as $jurusan => $siswa)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="jurusan-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="jurusan-{{ $loop->iteration }}-tab">
                                    <div class="jurusan-panel-header">
                                        <div>
                                            <h5 class="mb-1">{{ $jurusan }}</h5>
                                            <p class="mb-0 text-muted">{{ $siswa->count() }} siswa terdaftar</p>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr style="background-color: #f9fafb;">
                                                    <th style="width: 5%;">No</th>
                                                    <th style="width: 15%;">ID Siswa</th>
                                                    <th style="width: 20%;">Nama Siswa</th>
                                                    <th style="width: 15%;">NISN</th>
                                                    <th style="width: 15%;">No HP</th>
                                                    <th style="width: 15%;">Email</th>
                                                    <th style="width: 10%;">Status</th>
                                                    <th style="width: 10%; text-align: center;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($siswa as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><span class="badge badge-light-purple">{{ $row->id_santri }}</span></td>
                                                        <td>
                                                            <div style="font-weight: 600; color: #1f2937;">{{ $row->nama_santri }}</div>
                                                            <small class="text-muted">{{ $row->nama_sekolah_asal }}</small>
                                                        </td>
                                                        <td>{{ $row->no_nisn ?? '-' }}</td>
                                                        <td>{{ $row->no_hp_siswa ?? '-' }}</td>
                                                        <td>
                                                            <a href="mailto:{{ $row->email }}" title="Kirim email">{{ $row->email ?? '-' }}</a>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $isComplete = $row->pas_foto && $row->scan_kk && $row->akta_kelahiran && $row->ijazah_skl;
                                                            @endphp
                                                            @if($isComplete)
                                                                <span class="badge badge-success px-2 py-1">
                                                                    <i class="fas fa-check-circle"></i> Lengkap
                                                                </span>
                                                            @else
                                                                <span class="badge badge-warning text-dark px-2 py-1">
                                                                    <i class="fas fa-exclamation-circle"></i> Belum Lengkap
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ route('backend.pendaftaransantri.edit', $row->id_santri) }}" class="btn btn-sm btn-icon btn-purple" title="Edit Data">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center text-muted py-4">Tidak ada data siswa untuk jurusan ini</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .badge-light-purple {
        background-color: #ede9fe;
        color: #7c3aed;
        font-weight: 600;
    }

    .badge-purple {
        background-color: #7c3aed;
        color: white;
    }

    .soft-card {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
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
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
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
    }

    .jurusan-tabs .nav-link.active {
        color: #7c3aed;
        background-color: #fff;
        border-color: #e5e7eb #e5e7eb #fff;
        box-shadow: 0 -1px 0 #fff;
    }

    .jurusan-tabs .badge {
        box-shadow: 0 6px 16px rgba(124, 58, 237, 0.16);
    }

    .jurusan-tab-content {
        padding: 20px 20px 8px;
        background: #fff;
    }

    .jurusan-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 14px;
        margin-bottom: 12px;
        border-bottom: 1px solid #eceef3;
    }

    .jurusan-panel-header h5 {
        margin-bottom: 4px;
        font-size: 1.05rem;
        font-weight: 700;
    }

    .jurusan-panel-header p {
        font-size: 13px;
    }

    .jurusan-tab-content .table-responsive {
        border-radius: 10px;
        overflow: hidden;
    }

    .jurusan-tab-content .table {
        margin-bottom: 0;
    }

    .jurusan-tab-content .table thead th {
        font-size: 12px;
        font-weight: 700;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        border-top: 0;
    }

    .jurusan-tab-content .table tbody td {
        vertical-align: middle;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        const jurusanFromUrl = params.get('jurusan');

        if (jurusanFromUrl && window.jQuery) {
            const matchingTab = Array.from(document.querySelectorAll('#jurusanTab .nav-link')).find(link => {
                const text = link.textContent.replace(/\s+/g, ' ').trim().toLowerCase();
                return text.includes(jurusanFromUrl.toLowerCase());
            });

            if (matchingTab) {
                window.jQuery(matchingTab).tab('show');
            }
        }
    });
</script>
@endsection