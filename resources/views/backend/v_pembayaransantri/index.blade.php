@extends('backend.v_layout.app')

@section('content')
@php
    $paymentPackages = [
        [
            'title' => 'Total Semua Pembayaran',
            'price' => 'Rp 2.000.000',
            'description' => '',
            'badge' => 'Bayar Sekarang',
            'query' => 'Semua Pembayaran',
        ],
    ];
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body">
                    <div class="hero-note mb-2">Pembayaran Siswa</div>
                    <h4 class="card-title mb-2">Pendaftaran, Baju, dan Buku</h4>
                    <p class="mb-0 text-white-50">Pilih jenis pembayaran yang dibutuhkan. Pendaftaran memiliki harga tetap Rp 250.000.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12 col-lg-6">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Tata Cara Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <ol class="ps-3" style="line-height: 2;">
                                <li style="margin-bottom: 12px;">Klik tombol <strong>"Pilih"</strong> untuk memulai proses pembayaran</li>
                                <li style="margin-bottom: 12px;">Isi form pembayaran dengan data diri Anda dengan lengkap dan benar</li>
                                <li style="margin-bottom: 12px;">Pilih metode pembayaran (Bank atau E-Wallet) sesuai preferensi Anda</li>
                                <li style="margin-bottom: 12px;">Salin nomor rekening yang ditampilkan dan lakukan transfer sesuai jumlah pembayaran</li>
                                <li style="margin-bottom: 12px;">Upload bukti pembayaran (transfer) dalam format JPG, PNG, atau PDF</li>
                                <li style="margin-bottom: 12px;">Klik tombol <strong>"Simpan"</strong> untuk mengirimkan data pembayaran</li>
                                <li>Tunggu konfirmasi admin sampai status berubah menjadi <strong>"Lunas"</strong></li>
                            </ol>
                        </div>
                    </div>
                </div>

                @foreach ($paymentPackages as $package)
                    <div class="col-12 col-lg-6">
                        <div class="card content-card payment-card">
                            <div class="card-header py-3">
                                <h5 class="card-title mb-0">{{ $package['badge'] }}</h5>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <div class="payment-list mb-4">
                                    <div class="payment-list-item">
                                        <span>Pembayaran Pendaftaran</span>
                                        <strong>Rp 250.000</strong>
                                    </div>
                                    <div class="payment-list-item">
                                        <span>Pembayaran Baju</span>
                                        <strong>Rp 1.200.000</strong>
                                    </div>
                                    <div class="payment-list-item">
                                        <span>Pembayaran Buku</span>
                                        <strong>Rp 550.000</strong>
                                    </div>
                                </div>

                                <div class="d-flex align-items-end justify-content-between mb-0 gap-3 flex-wrap">
                                    <div>
                                        <h5 class="payment-title mb-1">{{ $package['title'] }}</h5>
                                    </div>
                                    <div class="payment-price">{{ $package['price'] }}</div>
                                </div>

                                <a href="{{ route('backend.pembayaransantri.create', ['jenis_pembayaran' => $package['query']]) }}" class="btn btn-primary btn-save-order mt-3">
                                    Bayar
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
</div>

<style>
.order-page {
    position: relative;
    padding: 32px 16px 48px;
    background:
        radial-gradient(circle at top left, rgba(167, 139, 250, 0.12), transparent 34%),
        radial-gradient(circle at top right, rgba(109, 40, 217, 0.12), transparent 28%),
        linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
    min-height: 100vh;
}

.page-hero-card,
.content-card {
    border-radius: 18px;
}

.page-hero-card {
    background: linear-gradient(135deg, #6d28d9 0%, #5b21b6 100%);
    color: #fff;
    border: 0;
    box-shadow: 0 18px 45px rgba(91, 33, 182, 0.25);
    position: relative;
    overflow: hidden;
    margin-bottom: 28px;
}

.page-hero-card::after {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(circle at right top, rgba(255, 255, 255, 0.16), transparent 28%),
        radial-gradient(circle at left bottom, rgba(255, 255, 255, 0.08), transparent 24%);
    pointer-events: none;
}

.page-hero-card .card-body,
.page-hero-card .card-body * {
    color: #fff !important;
}

.page-hero-card .card-body {
    position: relative;
    z-index: 1;
    padding: 36px 40px;
}

.hero-note {
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.95) !important;
    margin-bottom: 8px;
}

.page-hero-card .card-title {
    color: #fff !important;
    font-weight: 700;
    font-size: 28px;
    margin-bottom: 12px !important;
    line-height: 1.2;
}

.page-hero-card p {
    color: #fff !important;
    font-size: 15px;
    font-weight: 500;
    margin-bottom: 0;
}

.page-hero-card .text-white-50 {
    color: rgba(255, 255, 255, 0.88) !important;
}

.content-card {
    border: 1px solid #e5e7eb;
    box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
    overflow: hidden;
}

.content-card .card-body {
    padding: 32px;
}

.content-card .card-header {
    padding: 24px 32px !important;
    background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);
    border-bottom: 2px solid #f0f1f3;
}

.content-card .card-header .card-title {
    font-size: 18px;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 0 !important;
}

.payment-card {
    border: 1px solid #e5e7eb;
    transition: all 0.25s ease;
}

    .payment-list {
        border-top: 1px solid #e5e7eb;
        padding-top: 16px;
        margin-bottom: 18px;
    }

    .payment-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        color: #4b5563;
        border-bottom: 1px solid #f3f4f6;
    }

    .payment-list-item:last-child {
        border-bottom: none;
    }

    .summary-tile {
        border-radius: 16px;
        background: #f8f3ff;
        padding: 18px 16px;
        min-height: 110px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .summary-label {
        font-size: 13px;
        font-weight: 700;
        color: #7c3aed;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .summary-value {
        font-size: 18px;
        font-weight: 800;
        color: #1f2937;
    }

    .summary-total-card {
        background: linear-gradient(180deg, #eef2ff, #f8f3ff);
        border: 1px solid #ddd6fe;
    }

    .summary-total-title {
        font-size: 14px;
        font-weight: 700;
        color: #4c1d95;
    }

    .summary-total-value {
        font-size: 24px;
        font-weight: 800;
        color: #5b21b6;
    }
    background: rgba(109, 40, 217, 0.1);
    color: #6d28d9;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 0.04em;
    text-transform: uppercase;
}

.payment-title {
    font-size: 20px;
    font-weight: 800;
    color: #1f2937;
}

.payment-desc {
    color: #6b7280;
    line-height: 1.65;
    min-height: 54px;
}

.payment-price {
    font-size: 24px;
    font-weight: 800;
    color: #5b21b6;
}

.info-tile {
    border-radius: 16px;
    background: linear-gradient(180deg, #faf5ff 0%, #ffffff 100%);
    border: 1px solid #ede9fe;
    padding: 20px;
    height: 100%;
}

.info-title {
    font-size: 13px;
    font-weight: 800;
    color: #7c3aed;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    margin-bottom: 8px;
}

.info-value {
    font-size: 20px;
    font-weight: 800;
    color: #111827;
    margin-bottom: 8px;
}

.info-desc {
    color: #6b7280;
    line-height: 1.6;
}

.btn-save-order {
    border-radius: 999px;
    padding: 11px 20px;
    border: 0;
    background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);
    box-shadow: 0 10px 24px rgba(124, 58, 237, 0.18);
}

.btn-save-order:hover,
.btn-save-order:focus {
    background: linear-gradient(135deg, #4c1d95 0%, #6d28d9 100%);
}

@media (max-width: 768px) {
    .order-page {
        padding: 24px 12px 36px;
    }

    .page-hero-card .card-body {
        padding: 28px 24px;
    }

    .content-card .card-body,
    .content-card .card-header {
        padding-left: 20px !important;
        padding-right: 20px !important;
    }
}
</style>
@endsection
