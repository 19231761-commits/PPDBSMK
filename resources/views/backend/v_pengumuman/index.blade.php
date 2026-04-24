@extends('backend.v_layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman informasi PPDB</div>
                        <h4 class="card-title mb-2">{{ $judul }}</h4>
                        <p class="mb-0 text-muted">Atur informasi dan pengumuman PPDB dengan tampilan yang lebih rapi.</p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('backend.pengumuman.create') }}" class="btn btn-purple mr-2 mb-2 mb-md-0">
                            <i class="fas fa-plus"></i> Tambah Pengumuman
                        </a>
                        <a href="{{ route('backend.pengumuman.export-teks') }}" class="btn btn-danger mb-2 mb-md-0">
                            <i class="fas fa-file-pdf"></i> Unduh PDF
                        </a>
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