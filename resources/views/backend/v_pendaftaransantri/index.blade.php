@extends('backend.v_layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman data pendaftaran</div>
                        <h4 class="card-title mb-2">{{ $judul }}</h4>
                        <p class="mb-0 text-muted">Kelola data pendaftaran siswa dengan tampilan yang lebih bersih dan mudah dibaca.</p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('backend.pendaftaransantri.create') }}" class="btn btn-purple mr-2 mb-2 mb-md-0">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                        <a href="{{ route('backend.pendaftaransantri.export.pdf') }}" class="btn btn-danger mb-2 mb-md-0">
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
                                    <th>ID Siswa</th>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Sekolah Asal</th>
                                    <th>Pilihan 1</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Status Berkas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($index as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge bg-purple">{{ $row->id_santri }}</span></td>
                                        <td class="font-weight-bold">{{ $row->nama_santri }}</td>
                                        <td>{{ $row->no_nisn }}</td>
                                        <td>{{ $row->nama_sekolah_asal }}</td>
                                        <td>{{ $row->pilihan_jurusan_1 }}</td>
                                        <td>{{ $row->no_hp_siswa }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            @if($row->pas_foto && $row->scan_kk && $row->akta_kelahiran && $row->ijazah_skl)
                                                <span class="badge bg-success px-3 py-2">Lengkap</span>
                                            @else
                                                <span class="badge bg-warning text-dark px-3 py-2">Belum Lengkap</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('backend.pendaftaransantri.edit', $row->id_santri) }}" class="btn btn-sm btn-purple mb-1" title="Ubah Data">
                                                <i class="far fa-edit"></i> Ubah
                                            </a>
                                            <form method="POST" action="{{ route('backend.pendaftaransantri.destroy', $row->id_santri) }}" class="d-inline-block">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger show_confirm mb-1" data-konf-delete="{{ $row->nama_santri }}" title="Hapus Data">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center text-muted py-4">Belum ada data pendaftaran</td>
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