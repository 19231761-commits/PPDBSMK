@extends('backend.v_layout.app')

@section('content')
@php
    $jurusans = $jurusans ?? [
        'Farmasi Klinis & Komunitas',
        'Asisten Keperawatan & Caregiver',
        'Teknik Kendaraan Ringan',
        'Teknik Komputer & Jaringan',
        'Teknik Sepeda Motor',
    ];

    $hargaJurusan = [
        'Farmasi Klinis & Komunitas' => 1200000,
        'Asisten Keperawatan & Caregiver' => 1200000,
        'Teknik Komputer & Jaringan' => 1200000,
        'Teknik Sepeda Motor' => 1200000,
        'Teknik Kendaraan Ringan' => 1200000,
    ];

    $tambahanUkuran = [
        'S' => 0,
        'M' => 0,
        'L' => 0,
        'XL' => 0,
        'XXL' => 0,
        'Lainnya' => 0,
    ];

    $paymentMethods = $paymentMethods ?? [
        'BCA' => ['label' => 'Transfer Bank BCA', 'account' => 'BCA 1234567890', 'holder' => 'Yayasan SMK Sehati'],
        'BRI' => ['label' => 'Transfer Bank BRI', 'account' => 'BRI 9876543210', 'holder' => 'Yayasan SMK Sehati'],
        'BNI' => ['label' => 'Transfer Bank BNI', 'account' => 'BNI 1122334455', 'holder' => 'Yayasan SMK Sehati'],
        'MANDIRI' => ['label' => 'Transfer Bank Mandiri', 'account' => 'Mandiri 5566778899', 'holder' => 'Yayasan SMK Sehati'],
        'DANA' => ['label' => 'E-Wallet DANA', 'account' => 'DANA 081234567890', 'holder' => 'PPDB SMK Sehati'],
        'GOPAY' => ['label' => 'E-Wallet GoPay', 'account' => 'GoPay 081234567891', 'holder' => 'PPDB SMK Sehati'],
        'OVO' => ['label' => 'E-Wallet OVO', 'account' => 'OVO 081234567892', 'holder' => 'PPDB SMK Sehati'],
        'SHOPEEPAY' => ['label' => 'E-Wallet ShopeePay', 'account' => 'ShopeePay 081234567893', 'holder' => 'PPDB SMK Sehati'],
    ];
@endphp

<div class="order-page is-primary">
    <div class="row">
        <div class="col-12">
            <!-- HERO CARD -->
                    <div class="card page-hero-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div id="hero-note" class="hero-note mb-2">Pilih baju jurusan Anda</div>
                        <h4 class="card-title mb-2" id="hero-title">Pemesanan Baju Seragam SMK Sehati</h4>
                        <p id="hero-desc" class="mb-0 text-white-50">Klik salah satu baju di bawah untuk melanjutkan ke formulir pemesanan.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- LEFT COLUMN (expanded full width) -->
                    <div class="col-12 mb-4 mb-lg-0">
                    <!-- DISPLAY SECTION: Grid Baju -->
                    <div id="display-section" class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Daftar Baju per Jurusan</h5>
                        </div>
                        <div class="card-body">
                            <div class="baju-grid">
                                @foreach ($jurusans as $jurusan)
                                    <div class="baju-item">
                                        <div class="baju-image">
                                            <img src="{{ asset('image/contoh-baju-tka.svg') }}" alt="Baju {{ $jurusan }}">
                                        </div>
                                        <div class="baju-info">
                                            <h6 class="baju-title">{{ $jurusan }}</h6>
                                            <p class="baju-price">Rp {{ number_format($hargaJurusan[$jurusan], 0, ',', '.') }}</p>
                                            <p class="baju-desc">Seragam resmi {{ $jurusan }}</p>
                                        </div>
                                        <a href="{{ route('backend.pemesanan.baju', ['jurusan' => $jurusan]) }}" class="btn btn-primary btn-order-baju w-100">Pilih</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Preview removed as requested -->
            </div>
        </div>
    </div>
</div>

<!-- Form removed as requested -->
<style>
.order-page {
    padding: 18px 16px 40px;
}

.page-hero-card {
    border-radius: 12px;
    background: #6d28d9;
    color: #fff;
    overflow: hidden;
    border: 0;
    box-shadow: 0 18px 34px rgba(15, 23, 42, 0.12);
}

.page-hero-card .card-title,
.page-hero-card p,
.page-hero-card .hero-note {
    color: #fff;
}

.page-hero-card .hero-note {
    letter-spacing: 0.06em;
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    opacity: 0.86;
}

.page-hero-card .badge {
    background: rgba(255, 255, 255, 0.18) !important;
    border: 1px solid rgba(255, 255, 255, 0.24);
    color: #fff !important;
    font-weight: 700;
}

.content-card {
    border-radius: 12px;
    overflow: visible;
}

.content-card .card-body {
    padding: 20px;
}

.content-card .card-header {
    padding: 12px 16px;
}

.baju-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
}

.baju-item {
    background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 100%);
    border: 2px solid #e2d5f7;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    min-height: 320px;
}

.baju-item:hover {
    border-color: #a855f7;
    box-shadow: 0 8px 24px rgba(168, 85, 247, 0.15);
    transform: translateY(-4px);
}

.baju-image {
    width: 100%;
    height: 160px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #c084fc 0%, #a855f7 100%);
    padding: 20px;
}

.baju-image img {
    max-width: 100%;
    max-height: 120px;
    object-fit: contain;
}

.baju-info {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.baju-title {
    font-size: 16px;
    font-weight: 700;
    color: #2d1b4e;
    margin-bottom: 8px;
}

.baju-price {
    font-size: 20px;
    font-weight: 700;
    color: #a855f7;
    margin-bottom: 8px;
}

.baju-desc {
    font-size: 13px;
    color: #666;
    margin-bottom: 16px;
    flex: 1;
}

.btn-order-baju {
    margin-top: auto;
    border-radius: 10px;
    padding: 10px 16px;
}

.btn-order-baju {
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.gap-2 {
    gap: 12px !important;
}

@media (max-width: 767px) {
    .baju-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
    }

    .baju-image {
        height: 160px;
    }

    .baju-info {
        padding: 16px;
    }

    .baju-title {
        font-size: 14px;
    }

    .baju-price {
        font-size: 18px;
    }

    .baju-desc {
        font-size: 12px;
    }
}

@media (max-width: 479px) {
    .baju-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .baju-image {
        height: 180px;
    }
}

@media (min-width: 992px) {
    .baju-grid {
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 24px;
    }

    .baju-item {
        grid-column: span 2;
    }

    .baju-item:nth-child(4) {
        grid-column: 2 / span 2;
    }

    .baju-item:nth-child(5) {
        grid-column: 4 / span 2;
    }
}
</style>
@endsection
