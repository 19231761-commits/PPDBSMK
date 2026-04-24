@extends('backend.v_layout.app')

@section('content')
<style>
    .order-page .hero-note {
        letter-spacing: 0.06em;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.78);
        font-weight: 800;
        text-transform: uppercase;
    }

    .order-page .section-tag {
        background: linear-gradient(120deg, #0ea5e9, #0284c7);
        color: #fff;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        font-size: 11px;
        letter-spacing: 0.03em;
        padding: 6px 12px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .order-page .product-preview {
        border: 1px solid #dbe6f2;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
    }

    .order-page .product-preview img {
        width: 100%;
        height: 260px;
        object-fit: cover;
        background: linear-gradient(145deg, #e0f2fe, #f0fdf4);
    }

    .order-page .preview-body {
        padding: 16px;
    }

    .order-page .form-hint {
        font-size: 12px;
        color: #64748b;
        margin-top: 6px;
    }
</style>

<div class="row order-page">
    <div class="col-12">
        <div class="card page-hero-card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="hero-note mb-2">Selamat datang di halaman input pemesanan baju</div>
                    <h4 class="card-title mb-2">Form Pemesanan Baju Jurusan TKA</h4>
                    <p class="mb-0 text-white-50">Tampilan baru dibuat lebih rapi agar pemesanan seragam terasa lebih jelas dan nyaman saat diisi.</p>
                </div>
                <span class="badge mt-3 mt-md-0">Pendaftar</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card content-card h-100">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Pemesanan Baju</h5>
                        <span class="section-tag">Jurusan TKA</span>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Siswa</label>
                                    <input type="text" class="form-control" placeholder="Nama siswa">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ukuran Baju</label>
                                    <select class="custom-select form-control">
                                        <option>Pilih ukuran</option>
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                        <option>XXL</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jumlah Pesanan</label>
                                    <input type="number" class="form-control" placeholder="Contoh: 1">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Warna / Keterangan</label>
                                    <input type="text" class="form-control" placeholder="Contoh: Putih, lengan panjang">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" rows="4" placeholder="Tulis catatan tambahan jika ada"></textarea>
                                <div class="form-hint">Tips: isi model dan detail ukuran agar proses pemesanan lebih cepat.</div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary px-4">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product-preview h-100">
                    <img src="{{ asset('image/contoh-baju-tka.svg') }}" alt="Contoh baju jurusan TKA">
                    <div class="preview-body">
                        <h5 class="mb-2">Contoh Baju Jurusan TKA</h5>
                        <p class="mb-3 text-muted">Ini adalah gambaran model seragam untuk jurusan TKA yang bisa dijadikan acuan saat melakukan pemesanan.</p>
                        <div class="d-flex flex-wrap">
                            <span class="badge badge-pill badge-info mr-2 mb-2">Warna Dominan: Biru Navy</span>
                            <span class="badge badge-pill badge-success mb-2">Formal Sekolah</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection