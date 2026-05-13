@extends('backend.v_layout.app')

@section('content')
<style>
    .announcement-page .page-hero-card {
        border: 0;
        border-radius: 20px;
        overflow: hidden;
        background: #6d28d9;
        box-shadow: 0 16px 34px rgba(15, 23, 42, 0.18);
    }

    .announcement-page .page-hero-card .hero-body,
    .announcement-page .page-hero-card .hero-body * {
        color: #fff !important;
    }

    .announcement-page .page-hero-card .hero-note {
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.9) !important;
    }

    .announcement-page .page-hero-card .card-title {
        color: #fff !important;
    }

    .announcement-page .page-hero-card .hero-desc {
        color: rgba(255, 255, 255, 0.84) !important;
    }

    .announcement-page .page-hero-card .btn-outline-light {
        background: rgba(255, 255, 255, 0.16);
        border-color: rgba(255, 255, 255, 0.24);
        color: #fff !important;
        font-weight: 700;
    }

    .announcement-page .page-hero-card .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.24);
        color: #fff !important;
    }
</style>

<div class="container-fluid announcement-page">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4 page-hero-card">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center hero-body">
                    <div>
                        <div class="hero-note mb-2">Selamat datang di halaman informasi PPDB</div>
                        <h4 class="card-title mb-2">{{ $judul }}</h4>
                        <p class="mb-0 hero-desc">Atur informasi dan pengumuman PPDB dengan tampilan yang lebih rapi.</p>
                    </div>
                </div>
            </div>

            <div class="card soft-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-hover table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Pengumuman</th>
                                    <th>ID User</th>
                                    <th>Tanggal Pengumuman</th>
                                    <th>Judul Pengumuman</th>
                                    <th>Isi Pengumuman</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($index as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge bg-purple">{{ $row->id_pengumuman }}</span></td>
                                        <td>{{ $row->id_user }}</td>
                                        <td>{{ $row->tanggal_pengumuman }}</td>
                                        <td class="font-weight-bold">{{ $row->judul_pengumuman }}</td>
                                        <td>{{ $row->isi_pengumuman }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('backend.pengumuman.edit', $row->id) }}" class="btn btn-sm btn-purple mb-1" title="Ubah Data">
                                                <i class="far fa-edit"></i> Ubah
                                            </a>

                                            <form method="POST" action="{{ route('backend.pengumuman.destroy', $row->id) }}" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger show_confirm mb-1" data-konf-delete="{{ $row->judul_pengumuman }}" title="Hapus Data">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">Belum ada pengumuman</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection