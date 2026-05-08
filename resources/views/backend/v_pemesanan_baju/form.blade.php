@extends('backend.v_layout.app')

@section('content')
@php
    $selectedJurusan = $selectedJurusan ?? old('jurusan');

    $tambahanUkuran = [
        'S' => 0,
        'M' => 5000,
        'L' => 10000,
        'XL' => 15000,
        'XXL' => 20000,
    ];
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <div class="hero-note mb-2">Form Pemesanan Baju</div>
                        <h4 class="card-title mb-2">Checkout Baju Jurusan</h4>
                        <p class="mb-0 text-white-50">Lengkapi data pesanan sebelum menyimpan.</p>
                    </div>
                    <a href="{{ route('backend.pemesanan.baju') }}" class="btn btn-outline-light">Kembali ke Daftar Baju</a>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Detail Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.pemesanan.baju.store') }}" method="POST" class="row g-3">
                                @csrf

                                <div class="col-12">
                                    <div class="order-breadcrumb">
                                        <span>1. Pilih Baju</span>
                                        <span>2. Isi Data</span>
                                        <span>3. Simpan</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="nama-siswa" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama-siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis-kelamin" name="jenis_kelamin" required>
                                        <option value="">Pilih jenis kelamin</option>
                                        <option value="Laki-laki" @selected(old('jenis_kelamin') === 'Laki-laki')>Laki-laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jurusan-input" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan-input" name="jurusan" value="{{ old('jurusan', $selectedJurusan) }}" readonly required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="ukuran-baju" class="form-label">Ukuran</label>
                                    <select class="form-select" id="ukuran-baju" name="ukuran_baju" required>
                                        <option value="">Pilih ukuran</option>
                                        @foreach ($tambahanUkuran as $ukuran => $biaya)
                                            <option value="{{ $ukuran }}" @selected(old('ukuran_baju') === $ukuran)>{{ $ukuran }} (+Rp {{ number_format($biaya, 0, ',', '.') }})</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="4" placeholder="Contoh: warna khusus, tambahan nama, atau info lain">{{ old('catatan') }}</textarea>
                                </div>

                                <input type="hidden" name="jumlah_pesanan" value="1">
                                <input type="hidden" name="metode_pembayaran" value="BCA">
                                <input type="hidden" name="warna_keterangan" value="">

                                <div class="col-12 d-flex flex-wrap gap-2 align-items-center pt-2">
                                    <button type="submit" class="btn btn-primary btn-save-order">Simpan Pemesanan</button>
                                    <div class="text-muted small">Data akan masuk ke pemesanan dan pembayaran.</div>
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
    padding: 18px 16px 40px;
    background: linear-gradient(180deg, rgba(245, 243, 255, 0.65) 0%, rgba(255, 255, 255, 1) 100%);
}

.page-hero-card,
.content-card {
    border-radius: 12px;
}

.page-hero-card {
    background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);
    color: #fff;
    border: 0;
    box-shadow: 0 18px 45px rgba(91, 33, 182, 0.18);
}

.hero-note {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.8);
}

.content-card .card-body {
    padding: 20px;
}

.content-card .card-header {
    padding: 12px 16px;
    background: #fff;
}

.form-control,
.form-select {
    border-radius: 10px;
}

.order-breadcrumb {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    font-size: 12px;
    font-weight: 700;
    color: #6b7280;
}

.order-breadcrumb span {
    padding: 7px 12px;
    border-radius: 999px;
    background: #f3f4f6;
}

.btn-save-order {
    min-width: 180px;
    border-radius: 10px;
    padding: 10px 18px;
}

@media (max-width: 767px) {
    .page-hero-card .card-body,
    .content-card .card-body {
        padding: 16px;
    }

    .btn-save-order {
        width: 100%;
    }
}
</style>
@endsection
