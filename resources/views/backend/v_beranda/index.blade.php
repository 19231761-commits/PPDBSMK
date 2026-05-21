@extends('backend.layouts.admin')

@section('content')
<div class="container-fluid">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0" style="background: linear-gradient(90deg, #4e73df 0%, #224abe 100%);">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="text-white font-weight-bold mb-1">Selamat Datang Kembali, {{ Auth::user()->name }}!</h3>
                            <p class="text-white-50 mb-0">Sistem Informasi Penerimaan Peserta Didik Baru (PPDB)</p>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <i class="fas fa-school fa-3x text-white-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->role == 'admin_ppdb')
    <!-- Admin Stat Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPendaftar ?? \App\Models\PendaftaranSantri::count() ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendaftar Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendaftarHariIni ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-day fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kapasitas Sisa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">75%</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Hari Ini</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $transaksiHariIni ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-receipt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Pendaftaran Mingguan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: 320px;">
                        <canvas id="regChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Registrations Table -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Baru Mendaftar</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Asal Sekolah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // gunakan data yang dikirim controller jika tersedia
                                    $recentList = $pendaftaranTerbaru ?? \App\Models\PendaftaranSantri::latest()->take(5)->get();
                                @endphp
                                @forelse($recentList as $recent)
                                    <tr>
                                        <td>{{ $recent->nama_siswa ?? ($recent->user->name ?? '-') }}</td>
                                        <td>{{ $recent->asal_sekolah ?? '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Belum ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <a href="#" class="btn btn-sm btn-primary btn-block">Lihat Semua</a>
                </div>
            </div>
        </div>
    </div>

    @elseif(Auth::user()->role == 'pendaftar')
    <div class="row">
        <!-- Registration Status -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Status Pendaftaran</h6>
                </div>
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="display-4 text-info mb-3">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h5>Status: <span class="badge badge-warning">Sedang Diproses</span></h5>
                        <p class="text-muted mt-2">Data anda sedang dalam tahap verifikasi oleh panitia PPDB.</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Lengkapi Biodata</span>
                        <span class="text-success"><i class="fas fa-check-circle"></i> Selesai</span>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <span>Upload Berkas</span>
                        <span class="text-success"><i class="fas fa-check-circle"></i> Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Info -->
        <div class="col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-light border-left-info shadow-sm">
                        <h6 class="font-weight-bold">Biaya Pendaftaran</h6>
                        <div class="h4 font-weight-bold text-dark">Rp. 150.000</div>
                    </div>
                    <p class="small text-muted mb-4">Silakan transfer ke rekening berikut:</p>
                    <div class="bg-light p-3 rounded mb-3">
                        <div class="font-weight-bold text-dark mb-1">Bank BNI (Kode: 009)</div>
                        <div class="h5 text-primary mb-1">123-456-7890</div>
                        <div class="small">A/N SMK PPDB OFFICIAL</div>
                    </div>
                    <button class="btn btn-success btn-block shadow-sm">Konfirmasi Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@if(Auth::user()->role == 'admin_ppdb')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("regChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    pointRadius: 3,
                    pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointBorderColor: 'rgba(78, 115, 223, 1)',
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                    pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: { left: 10, right: 25, top: 25, bottom: 0 }
                },
                scales: {
                    x: { grid: { display: false, drawBorder: false } },
                    y: { ticks: { maxTicksLimit: 5, padding: 10 } }
                },
                plugins: { legend: { display: false } }
            }
        });
    });
</script>
@endif
@endsection
