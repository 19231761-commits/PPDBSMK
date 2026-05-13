@extends('backend.v_layout.app')

@section('content')
@php
    $selectedJurusan = $selectedJurusan ?? old('jurusan');

    $tambahanUkuran = [
        'S' => 0,
        'M' => 0,
        'L' => 0,
        'XL' => 0,
        'XXL' => 0,
        'Lainnya' => 0,
    ];
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body">
                    <div class="hero-note mb-2">Form Pemesanan Baju</div>
                    <h4 class="card-title mb-2">Checkout Baju Jurusan</h4>
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
                            <form action="{{ route('backend.pemesanan.baju.store') }}" method="POST" class="row g-3">
                                @csrf

                                <div class="col-12 col-md-6">
                                    <label for="nama-siswa" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama-siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jenis-kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis-kelamin" name="jenis_kelamin" required>
                                        <option value="">- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-Laki" @selected(old('jenis_kelamin') === 'Laki-Laki')>Laki-Laki</option>
                                        <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="jurusan-input" class="form-label">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan-input" name="jurusan" value="{{ old('jurusan', $selectedJurusan) }}" readonly required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="ukuran-baju" class="form-label">Ukuran</label>
                                    <select class="custom-select form-control @error('ukuran_baju') is-invalid @enderror" id="ukuran-select" name="ukuran_baju" required>
                                        <option value="">- Pilih Ukuran -</option>
                                        <option value="S" @selected(old('ukuran_baju') === 'S')>S</option>
                                        <option value="M" @selected(old('ukuran_baju') === 'M')>M</option>
                                        <option value="L" @selected(old('ukuran_baju') === 'L')>L</option>
                                        <option value="XL" @selected(old('ukuran_baju') === 'XL')>XL</option>
                                        <option value="XXL" @selected(old('ukuran_baju') === 'XXL')>XXL</option>
                                        <option value="Lainnya" @selected(old('ukuran_baju') && !in_array(old('ukuran_baju'), ['S','M','L','XL','XXL']))>Lainnya</option>
                                    </select>
                                    <input type="text" class="form-control @error('ukuran_baju') is-invalid @enderror mt-3 custom-input @if(!old('ukuran_baju') || in_array(old('ukuran_baju'), ['S','M','L','XL','XXL'])) d-none @endif" id="ukuran-baju" name="ukuran_custom" value="{{ old('ukuran_baju') && !in_array(old('ukuran_baju'), ['S','M','L','XL','XXL']) ? old('ukuran_baju') : '' }}" placeholder="Ketik ukuran custom" autocomplete="off">
                                    @error('ukuran_baju') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="catatan" name="catatan" rows="4" placeholder="Contoh: warna khusus, tambahan nama, atau info lain">{{ old('catatan') }}</textarea>
                                </div>

                                <input type="hidden" name="jumlah_pesanan" value="1">
                                <input type="hidden" name="metode_pembayaran" value="BCA">
                                <input type="hidden" name="warna_keterangan" value="">

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
    padding: 24px 16px 44px;
    background:
        radial-gradient(circle at top left, rgba(167, 139, 250, 0.12), transparent 34%),
        radial-gradient(circle at top right, rgba(109, 40, 217, 0.12), transparent 28%),
        linear-gradient(180deg, #f8fafc 0%, #ffffff 100%);
}

.page-hero-card,
.content-card {
    border-radius: 18px;
}

.page-hero-card {
    background: #6d28d9;
    color: #fff;
    border: 0;
    box-shadow: 0 18px 45px rgba(91, 33, 182, 0.2);
    position: relative;
    overflow: hidden;
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
    padding: 28px 30px;
}

.hero-note {
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.9);
}

.page-hero-card .card-title,
.page-hero-card p {
    color: #fff;
}

.page-hero-card .text-white-50 {
    color: rgba(255, 255, 255, 0.86) !important;
}

.page-hero-card .btn-outline-light {
    background: rgba(255, 255, 255, 0.16);
    border-color: rgba(255, 255, 255, 0.26);
    color: #fff;
    font-weight: 700;
    border-radius: 999px;
    padding-left: 18px;
    padding-right: 18px;
}

.page-hero-card .btn-outline-light:hover {
    background: rgba(255, 255, 255, 0.24);
    color: #fff;
}

.content-card .card-body {
    padding: 26px;
}

.content-card .card-header {
    padding: 14px 20px;
    background: linear-gradient(120deg, #f5f3ff, #ede9fe);
    border-bottom: 1px solid #e9d5ff;
}

.form-control,
.form-select,
.custom-select {
    border-radius: 12px;
    border-color: #d8dfea;
    min-height: 46px;
    box-shadow: none;
}

.form-control:focus,
.form-select:focus,
.custom-select:focus {
    border-color: rgba(124, 58, 237, 0.7);
    box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.12);
}

.btn-save-order {
    min-width: 180px;
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

label {
    color: #312e81;
    font-weight: 700;
    margin-bottom: 8px;
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ukuranSelect = document.getElementById('ukuran-select');
    const customInput = document.getElementById('ukuran-baju');

    function toggleCustomInput() {
        const selectedValue = ukuranSelect.value;
        if (selectedValue === 'Lainnya') {
            customInput.classList.remove('d-none');
            customInput.required = true;
            customInput.focus();
        } else {
            customInput.classList.add('d-none');
            customInput.required = false;
            customInput.value = '';
        }
    }

    ukuranSelect.addEventListener('change', toggleCustomInput);
    toggleCustomInput();

    // On form submit, set the value
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        if (ukuranSelect.value === 'Lainnya') {
            ukuranSelect.value = customInput.value;
        }
    });
});
</script>
@endsection
