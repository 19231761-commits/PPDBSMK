@extends('backend.v_layout.app')

@section('content')
@php
    $jurusans = [
        'Farmasi Klinis & Komunitas',
        'Asisten Keperawatan & Caregiver',
        'Teknik Kendaraan Ringan',
        'Teknik Komputer & Jaringan',
        'Teknik Sepeda Motor',
    ];
@endphp

<div class="order-page is-primary">
    <div class="row">
        <div class="col-12">
            <div class="card page-hero-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                    <div>
                        <div class="hero-note mb-2">Pilih buku jurusan Anda</div>
                        <h4 class="card-title mb-2">Pemesanan Buku Jurusan SMK Sehati</h4>
                        <p class="mb-0 text-white-50">Klik salah satu buku di bawah untuk melanjutkan ke formulir pemesanan.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4 mb-lg-0">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Daftar Buku per Jurusan</h5>
                        </div>
                        <div class="card-body">
                            <div class="buku-grid">
                                @foreach ($jurusans as $jurusan)
                                    @php
                                        $deskripsi = match ($jurusan) {
                                            'Farmasi Klinis & Komunitas' => 'Paket buku farmasi untuk kebutuhan kelas dan praktik.',
                                            'Asisten Keperawatan & Caregiver' => 'Buku pendukung untuk pembelajaran keperawatan dan layanan.',
                                            'Teknik Kendaraan Ringan' => 'Buku teknik otomotif untuk materi inti dan latihan.',
                                            'Teknik Komputer & Jaringan' => 'Buku jaringan, komputer, dan praktik laboratorium.',
                                            default => 'Buku dasar dan pendukung untuk jurusan pilihan Anda.',
                                        };

                                        $hargaBuku = [
                                            'Farmasi Klinis & Komunitas' => 550000,
                                            'Asisten Keperawatan & Caregiver' => 550000,
                                            'Teknik Kendaraan Ringan' => 550000,
                                            'Teknik Komputer & Jaringan' => 550000,
                                            'Teknik Sepeda Motor' => 550000,
                                        ];
                                    @endphp
                                    <div class="buku-item">
                                        <div class="buku-image">
                                            <img src="{{ asset('image/contoh-buku-tka.svg') }}" alt="Buku {{ $jurusan }}">
                                        </div>
                                        <div class="buku-info">
                                            <h6 class="buku-title">{{ $jurusan }}</h6>
                                            <p class="buku-price">Rp {{ number_format($hargaBuku[$jurusan] ?? 25000, 0, ',', '.') }}</p>
                                            <p class="buku-desc">{{ $deskripsi }}</p>
                                        </div>
                                        <a href="{{ route('backend.pemesanan.buku', ['jurusan' => $jurusan]) }}" class="btn btn-primary btn-order-buku w-100">Pilih</a>
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

<style>
.order-page {
    padding: 18px 16px 40px;
}

.page-hero-card {
    border-radius: 12px;
}

.page-hero-card .card-body,
.page-hero-card .card-body * {
    color: #fff !important;
}

.page-hero-card .hero-note {
    color: rgba(255, 255, 255, 0.9) !important;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
}

.page-hero-card .card-title,
.page-hero-card p {
    color: #fff !important;
}

.page-hero-card .text-white-50 {
    color: rgba(255, 255, 255, 0.84) !important;
}

.page-hero-card .book-badge {
    display: none !important;
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

.buku-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 24px;
}

.buku-item {
    background: linear-gradient(135deg, #f5f3ff 0%, #faf5ff 100%);
    border: 2px solid #e2d5f7;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    min-height: 300px;
}

.buku-item:hover {
    border-color: #a855f7;
    box-shadow: 0 8px 24px rgba(168, 85, 247, 0.15);
    transform: translateY(-4px);
}

.buku-image {
    width: 100%;
    height: 150px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #c084fc 0%, #a855f7 100%);
    padding: 18px;
}

.buku-image img {
    max-width: 100%;
    max-height: 112px;
    object-fit: contain;
}

.buku-info {
    padding: 18px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.buku-title {
    font-size: 15px;
    font-weight: 700;
    color: #2d1b4e;
    margin-bottom: 8px;
}

.buku-price {
    font-size: 18px;
    font-weight: 700;
    color: #a855f7;
    margin-bottom: 8px;
}

.buku-desc {
    font-size: 13px;
    color: #666;
    margin-bottom: 16px;
    flex: 1;
}

.btn-order-buku {
    margin-top: auto;
    border-radius: 10px;
    padding: 10px 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 767px) {
    .buku-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 16px;
    }

    .buku-image {
        height: 150px;
    }

    .buku-info {
        padding: 16px;
    }

    .buku-title {
        font-size: 14px;
    }

    .buku-price {
        font-size: 17px;
    }

    .buku-desc {
        font-size: 12px;
    }
}

@media (max-width: 479px) {
    .buku-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .buku-image {
        height: 170px;
    }
}

@media (min-width: 992px) {
    .buku-grid {
        grid-template-columns: repeat(6, minmax(0, 1fr));
        gap: 24px;
    }

    .buku-item {
        grid-column: span 2;
    }

    .buku-item:nth-child(4) {
        grid-column: 2 / span 2;
    }

    .buku-item:nth-child(5) {
        grid-column: 4 / span 2;
    }
}
</style>

<script>
    (function() {
        // Landing page for buku now mirrors the baju card grid.
    })();
</script>
@endsection
