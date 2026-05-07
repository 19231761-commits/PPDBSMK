@extends('backend.v_layout.app')

@section('content')
<div class="page-shell">
    <div class="card page-hero-card mb-4">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
            <div>
                <div class="hero-note mb-2">Riwayat pesanan untuk akun {{ Auth::user()->name }}</div>
                <h4 class="card-title mb-2">Riwayat Pesanan Baju dan Buku</h4>
                <p class="mb-0 text-white-50">Semua pesanan murid ditampilkan di satu halaman supaya status dan detailnya mudah dipantau.</p>
            </div>
            <span class="badge bg-secondary mt-3 mt-md-0">{{ now()->format('d M Y') }}</span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card content-card h-100">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Riwayat Pemesanan Baju</h5>
                    <span class="section-tag">{{ $pesananBaju->count() }} Pesanan</span>
                </div>
                <div class="card-body">
                    @if($pesananBaju->isEmpty())
                        <div class="alert alert-info mb-0">Belum ada pesanan baju.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jurusan</th>
                                        <th>Ukuran</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesananBaju as $pesanan)
                                        <tr>
                                            <td>{{ optional($pesanan->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $pesanan->jurusan }}</td>
                                            <td>{{ $pesanan->ukuran_baju }}</td>
                                            <td>{{ $pesanan->jumlah_pesanan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card content-card h-100">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Riwayat Pemesanan Buku</h5>
                    <span class="section-tag">{{ $pesananBuku->count() }} Pesanan</span>
                </div>
                <div class="card-body">
                    @if($pesananBuku->isEmpty())
                        <div class="alert alert-info mb-0">Belum ada pesanan buku.</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jurusan</th>
                                        <th>Jenis Buku</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pesananBuku as $pesanan)
                                        <tr>
                                            <td>{{ optional($pesanan->created_at)->format('d/m/Y H:i') }}</td>
                                            <td>{{ $pesanan->jurusan }}</td>
                                            <td>{{ $pesanan->jenis_buku }}</td>
                                            <td>
                                                <span class="badge bg-warning text-dark">{{ ucfirst($pesanan->status_pesanan ?? 'menunggu') }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection