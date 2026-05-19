@extends('backend.v_layout.app')

@section('content')
@php
    $selectedJurusan = $selectedJurusan ?? old('jurusan');
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body">
                    <div class="hero-note mb-2">Form Pemesanan Buku</div>
                    <h4 class="card-title mb-2">Checkout Buku Jurusan</h4>
                    <p class="mb-0 text-white-50">Lengkapi data pesanan sebelum menyimpan.</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Detail Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.pemesanan.buku.store') }}" method="POST" class="row g-3">
                                @csrf

                                <div class="col-12">
                                    <label for="nama-siswa" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama-siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="col-12">
                                    <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis-kelamin" name="jenis_kelamin" required>
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" @selected(old('jenis_kelamin') === 'Laki-Laki')>Laki-Laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="jurusan-input" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan-input" name="jurusan" value="{{ old('jurusan', $selectedJurusan) }}" readonly required>
                                </div>

                                <div class="col-12">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="4" placeholder="Contoh: kebutuhan khusus, keterangan tambahan, atau info lain">{{ old('catatan') }}</textarea>
                                </div>

                                <div class="col-12 d-flex flex-wrap gap-2 align-items-center justify-content-end pt-2">
                                    <button type="submit" class="btn btn-primary btn-save-order">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    transition: all 0.3s ease;
}

.content-card:hover {
    box-shadow: 0 16px 40px rgba(15, 23, 42, 0.12);
}

.content-card .card-body {
    padding: 32px 32px;
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

.form-label {
    font-weight: 600;
    color: #2d3748;
    font-size: 14px;
    margin-bottom: 10px;
    display: block;
}

.form-label::after {
    content: '';
}

.form-control,
.form-select,
.custom-select {
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
    background-color: #fff;
    box-shadow: none;
}

.form-control::placeholder {
    color: #a0aec0;
    font-weight: 500;
}

.form-control:hover,
.form-select:hover,
.custom-select:hover {
    border-color: #d1d5db;
    background-color: #fff;
}

.form-control:focus,
.form-select:focus,
.custom-select:focus {
    border-color: #6d28d9;
    box-shadow: 0 0 0 3px rgba(109, 40, 217, 0.1);
    background-color: #fff;
}

.form-control.is-invalid,
.form-select.is-invalid,
.custom-select.is-invalid {
    border-color: #dc2626;
}

.form-control.is-invalid:focus,
.form-select.is-invalid:focus,
.custom-select.is-invalid:focus {
    border-color: #dc2626;
    box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
}

.invalid-feedback {
    display: block;
    color: #dc2626;
    font-size: 13px;
    margin-top: 6px;
    font-weight: 600;
}

textarea.form-control {
    resize: vertical;
    min-height: 100px;
    font-family: inherit;
}

.btn-save-order {
    background: linear-gradient(135deg, #6d28d9 0%, #5b21b6 100%);
    border: 0;
    color: #fff;
    font-weight: 700;
    padding: 12px 36px;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(109, 40, 217, 0.2);
}

.btn-save-order:hover {
    background: linear-gradient(135deg, #5b21b6 0%, #4c1d95 100%);
    transform: translateY(-2px);
    box-shadow: 0 12px 30px rgba(109, 40, 217, 0.3);
    color: #fff;
}

.btn-save-order:active {
    transform: translateY(0);
    box-shadow: 0 4px 10px rgba(109, 40, 217, 0.2);
}

.col-12.d-flex {
    padding-top: 8px;
}

@media (max-width: 768px) {
    .order-page {
        padding: 24px 12px 36px;
    }

    .page-hero-card .card-body {
        padding: 28px 24px;
    }

    .content-card .card-body {
        padding: 24px 20px;
    }

    .content-card .card-header {
        padding: 20px 24px !important;
    }

    .page-hero-card .card-title {
        font-size: 24px;
    }

    .form-control,
    .form-select,
    .custom-select {
        font-size: 16px;
    }

    .btn-save-order {
        width: 100%;
        padding: 14px 24px;
    }
}
</style>
@endsection
