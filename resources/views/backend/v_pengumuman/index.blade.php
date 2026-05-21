@extends('backend.layouts.admin')

@section('title', 'Kelola Pengumuman')

@section('content')
<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0" style="color: #6D28D9;">Kelola Pengumuman</h4>
            <p class="text-muted small mb-0">Manajemen informasi dan pengumuman sistem</p>
        </div>
        <a href="{{ route('pengumuman.create') }}" class="btn text-white px-4 shadow-sm" style="background-color: #6D28D9; border-radius: 10px;">
            <i class="fas fa-plus me-2"></i> Tambah Pengumuman
        </a>
    </div>

    <!-- Stats Card -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0 p-3 rounded-3" style="background-color: rgba(109, 40, 217, 0.1);">
                            <i class="fas fa-bullhorn fa-2x" style="color: #6D28D9;"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted mb-1">Total Pengumuman</h6>
                            <h3 class="fw-bold mb-0">{{ $pengumuman->count() }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="border-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="border-top-left-radius: 10px;">No</th>
                            <th class="border-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                            <th class="border-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                            <th class="border-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                            <th class="border-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Isi Pengumuman</th>
                            <th class="border-0 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center" style="border-top-right-radius: 10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengumuman as $index => $item)
                        <tr>
                            <td class="ps-3">{{ $index + 1 }}</td>
                            <td><span class="badge bg-light text-dark">#{{ $item->id }}</span></td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                            <td><span class="fw-bold">{{ $item->judul }}</span></td>
                            <td>
                                <div class="text-truncate" style="max-width: 300px;">
                                    {{ Str::limit(strip_tags($item->isi), 50) }}
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-outline-primary border-0" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="empty-state">
                                    <img src="https://illustrations.popsy.co/purple/searching.svg" alt="No data" style="height: 150px;" class="mb-3">
                                    <h5 class="text-muted">Belum ada pengumuman</h5>
                                    <p class="text-secondary small">Klik tombol 'Tambah Pengumuman' untuk membuat data baru.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($pengumuman->hasPages())
            <div class="mt-4 shadow-none">
                {{ $pengumuman->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    .table thead th {
        padding: 1rem;
        background-color: #f8f9fa;
        color: #6D28D9 !important;
        font-weight: 600;
        font-size: 0.85rem;
    }
    .table tbody td {
        padding: 1.25rem 1rem;
        color: #4B5563;
        font-size: 0.9rem;
    }
    .btn-outline-primary {
        color: #6D28D9;
        border-color: #6D28D9;
    }
    .btn-outline-primary:hover {
        background-color: #6D28D9;
        color: #fff;
    }
</style>
@endsection
