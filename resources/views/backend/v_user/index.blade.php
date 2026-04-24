@extends('backend.v_layout.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card soft-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman pengelolaan user</div>
                        <h4 class="card-title mb-2">Daftar User</h4>
                        <p class="mb-0 text-muted">Kelola akun admin dan pendaftar dari halaman ini.</p>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="{{ route('backend.user.create') }}" class="btn btn-purple">
                            <i class="fas fa-plus"></i> Tambah User
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
                                    <th>ID User</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><span class="badge bg-purple">{{ $row->id_user }}</span></td>
                                        <td class="font-weight-bold">{{ $row->nama }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>
                                            @if ($row->role == 'admin_ppdb')
                                                <span class="badge bg-purple">Admin PPDB</span>
                                            @elseif($row->role == 'pendaftar')
                                                <span class="badge bg-success">Pendaftar</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-secondary">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('backend.user.edit', $row->id_user) }}" class="btn btn-sm btn-purple mb-1" title="Ubah Data">
                                                <i class="far fa-edit"></i> Ubah
                                            </a>
                                            <form method="POST" action="{{ route('backend.user.destroy', $row->id_user) }}" class="d-inline-block">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger show_confirm mb-1" data-konf-delete="{{ $row->nama }}" title="Hapus Data">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">Belum ada user</td>
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