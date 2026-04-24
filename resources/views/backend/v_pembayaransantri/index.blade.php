@extends('backend.v_layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman data pembayaran</div>
                        <h4 class="card-title mb-2">{{ $judul }}</h4>
                        <p class="mb-0 text-muted">Kelola transaksi pembayaran siswa dengan tampilan yang lebih rapi.</p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('backend.pembayaransantri.create') }}" class="btn btn-purple mr-2 mb-2 mb-md-0">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                        <a href="{{ route('backend.pembayaransantri.export.pdf') }}" class="btn btn-danger mb-2 mb-md-0">
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
                                    <th>ID Pembayaran</th>
                                    <th>ID Siswa</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Nama Siswa</th>
                                    <th>Atas Nama</th>
                                    <th>Nama Bank</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($index as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge bg-purple">{{ $row->id_pembayaran }}</span></td>
                                        <td>{{ $row->id_santri }}</td>
                                        <td>{{ $row->jenis_pembayaran }}</td>
                                        <td>{{ $row->tanggal_pembayaran }}</td>
                                        <td class="font-weight-bold">{{ $row->nama_santri }}</td>
                                        <td>{{ $row->atas_nama }}</td>
                                        <td>{{ $row->nama_bank }}</td>
                                        <td>Rp {{ number_format($row->jumlah_pembayaran, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('backend.pembayaransantri.edit', $row->id_santri) }}" class="btn btn-sm btn-purple mb-1" title="Ubah Data">
                                                <i class="far fa-edit"></i> Ubah
                                            </a>
                                            <form method="POST" action="{{ route('backend.pembayaransantri.destroy', $row->id_santri) }}" class="d-inline-block">
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
                                        <td colspan="10" class="text-center text-muted py-4">Belum ada data pembayaran</td>
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