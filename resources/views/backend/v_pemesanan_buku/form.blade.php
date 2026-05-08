@extends('backend.v_layout.app')

@section('content')
@php
    $selectedJurusan = $selectedJurusan ?? old('jurusan');

    $hargaSatuanBuku = $hargaSatuanBuku ?? 25000;

    $jenisBukuOptions = $jenisBukuOptions ?? [
        'Buku Paket',
        'Modul Praktik',
        'Workbook',
        'Lembar Kerja',
        'Buku Referensi',
    ];
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                    <div>
                        <div class="hero-note mb-2">Form Pemesanan Buku</div>
                        <h4 class="card-title mb-2">Checkout Buku Jurusan</h4>
                        <p class="mb-0 text-white-50">Lengkapi data pesanan sebelum menyimpan.</p>
                    </div>
                    <a href="{{ route('backend.pemesanan.buku') }}" class="btn btn-outline-light">Kembali ke Daftar Buku</a>
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
                                    <div class="order-breadcrumb">
                                        <span>1. Pilih Buku</span>
                                        <span>2. Isi Data</span>
                                        <span>3. Simpan</span>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="nama-siswa" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama-siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jurusan-input" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan-input" name="jurusan" value="{{ old('jurusan', $selectedJurusan) }}" readonly required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jenis-buku" class="form-label">Jenis Buku</label>
                                    <select class="form-select" id="jenis-buku" name="jenis_buku" required>
                                        <option value="">Pilih jenis buku</option>
                                        @foreach ($jenisBukuOptions as $jenisBuku)
                                            <option value="{{ $jenisBuku }}" @selected(old('jenis_buku') === $jenisBuku)>{{ $jenisBuku }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jumlah-buku" class="form-label">Jumlah Buku</label>
                                    <input type="number" class="form-control" id="jumlah-buku" name="jumlah_buku" value="{{ old('jumlah_buku', 1) }}" min="1" max="25" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="semester-kelas" class="form-label">Semester / Kelas</label>
                                    <input type="text" class="form-control" id="semester-kelas" name="semester_kelas" value="{{ old('semester_kelas') }}" placeholder="Contoh: X TKA 1">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="metode-pembayaran" class="form-label">Metode Pembayaran</label>
                                    <select class="form-select" id="metode-pembayaran" name="metode_pembayaran" required>
                                        <option value="">Pilih metode pembayaran</option>
                                        @foreach ($paymentMethods as $code => $method)
                                            <option value="{{ $code }}" @selected(old('metode_pembayaran') === $code)>{{ $method['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="4" placeholder="Tulis catatan tambahan jika ada">{{ old('catatan') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <div class="price-box mb-3">
                                        <h6 class="mb-2">Estimasi Biaya</h6>
                                        <div class="price-line">
                                            <span>Harga satuan buku</span>
                                            <span>Rp {{ number_format($hargaSatuanBuku, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="price-line mb-0">
                                            <span>Total estimasi</span>
                                            <span id="estimasi-total-buku">Rp 0</span>
                                        </div>
                                    </div>
                                </div>

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

.price-box {
    background: #f8f5ff;
    border: 1px solid #e9d5ff;
    border-radius: 12px;
    padding: 16px;
}

.price-box h6 {
    color: #2d1b4e;
    font-weight: 700;
}

.price-line {
    display: flex;
    justify-content: space-between;
    gap: 16px;
    color: #4b5563;
    font-size: 14px;
}

.price-line + .price-line {
    margin-top: 10px;
}

.btn-save-order {
    min-width: 180px;
    border-radius: 10px;
    padding: 10px 18px;
    border: 0;
    background: linear-gradient(135deg, #5b21b6 0%, #7c3aed 100%);
    box-shadow: 0 10px 24px rgba(124, 58, 237, 0.18);
}

.btn-save-order:hover,
.btn-save-order:focus {
    background: linear-gradient(135deg, #4c1d95 0%, #6d28d9 100%);
}

@media (max-width: 767px) {
    .page-hero-card .card-body,
    .content-card .card-body {
        padding: 16px;
    }

    .btn-save-order {
        width: 100%;
    }

    .price-line {
        flex-direction: column;
        gap: 4px;
    }
}
</style>

<script>
    (function() {
        var jumlahBukuInput = document.getElementById('jumlah-buku');
        var totalEl = document.getElementById('estimasi-total-buku');
        var hargaSatuanBuku = Number(@json($hargaSatuanBuku));

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID').format(value);
        }

        function updateSummary() {
            if (!totalEl) return;

            var jumlah = Number(jumlahBukuInput && jumlahBukuInput.value ? jumlahBukuInput.value : 0);
            var total = Math.max(jumlah, 0) * hargaSatuanBuku;

            totalEl.textContent = 'Rp ' + formatRupiah(total);
        }

        if (jumlahBukuInput) {
            jumlahBukuInput.addEventListener('input', updateSummary);
        }

        updateSummary();
    })();
</script>
@endsection