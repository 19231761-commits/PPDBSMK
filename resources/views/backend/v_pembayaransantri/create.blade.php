@extends('backend.v_layout.app')

@section('content')
@php
    $selectedJenisPembayaran = $selectedJenisPembayaran ?? old('jenis_pembayaran');
    $defaultJumlahPembayaran = $defaultJumlahPembayaran ?? old('jumlah_pembayaran');
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body">
                    <div class="hero-note mb-2">Form Pembayaran Siswa</div>
                    <h4 class="card-title mb-2">Total Semua Item</h4>
                    <p class="mb-0 text-white-50">Semua biaya sudah dijumlahkan: pendaftaran + baju + buku. Pilih metode pembayarannya dan lanjutkan.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12 col-xl-7">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Detail Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.pembayaransantri.store') }}" method="POST" class="row g-3" id="payment-form" enctype="multipart/form-data">
                                @csrf

                                <div class="col-12 col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="nama_santri" class="form-label">Nama Siswa</label>
                                            <input type="text" class="form-control @error('nama_santri') is-invalid @enderror" id="nama_santri" name="nama_santri" value="{{ old('nama_santri') }}" placeholder="Masukkan nama siswa">
                                            @error('nama_santri')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                                <option value="">- Pilih Jenis Kelamin -</option>
                                                <option value="Laki-Laki" @selected(old('jenis_kelamin') === 'Laki-Laki')>Laki-Laki</option>
                                                <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="jurusan" class="form-label">Jurusan</label>
                                            <select id="jurusan" name="jurusan" class="custom-select form-control @error('jurusan') is-invalid @enderror" required>
                                                <option value="">- Pilih Jurusan -</option>
                                                @foreach ($jurusanOptions as $jurusanOption)
                                                    <option value="{{ $jurusanOption }}" @selected(old('jurusan') === $jurusanOption)>{{ $jurusanOption }}</option>
                                                @endforeach
                                            </select>
                                            @error('jurusan')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row g-1">
                                        <div class="col-12">
                                            <label for="nama_bank" class="form-label">Nama Bank / Metode</label>
                                            <select id="nama_bank" name="nama_bank" class="custom-select form-control @error('nama_bank') is-invalid @enderror" required>
                                                <option value="">- Pilih Metode Pembayaran -</option>
                                                @foreach ($paymentMethods as $key => $method)
                                                    <option value="{{ $key }}" @selected(old('nama_bank') === $key)>{{ $method['label'] }}</option>
                                                @endforeach
                                            </select>
                                            @error('nama_bank')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12" id="bank-info-section" style="display: none;">
                                            <label class="form-label">Detail Rekening</label>
                                            <div style="display: flex; gap: 8px; align-items: center;">
                                                <div class="form-control" style="background-color: #f8f9fa; border: 1px solid #dee2e6; padding: 0.375rem 0.75rem; flex: 1; margin-bottom: 0;">
                                                    <p class="mb-0" style="font-weight: 500; font-size: 0.95rem;"><span id="bank-no-rekening">-</span> - <span id="bank-atas-nama">-</span></p>
                                                </div>
                                                <button type="button" id="copy-rekening-btn" class="btn btn-outline-primary" style="padding: 0.375rem 0.75rem; height: 38px; display: flex; align-items: center; gap: 6px;" title="Salin nomor rekening">
                                                    <i class="mdi mdi-content-copy" style="font-size: 18px;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="bukti_pembayaran" class="form-label">Upload Bukti Pembayaran</label>
                                            <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,.pdf" required>
                                            <small class="text-muted">Format yang diterima: JPG, JPEG, PNG, atau PDF. Maksimal 5 MB.</small>
                                            @error('bukti_pembayaran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="{{ old('id_pembayaran', $idPembayaranDefault ?? '') }}">
                                <input type="hidden" id="id_santri" name="id_santri" value="{{ old('id_santri', 'SAN-' . now()->format('YmdHis')) }}">
                                <input type="hidden" id="atas_nama" name="atas_nama" value="{{ old('atas_nama', old('nama_santri')) }}">
                                <input type="hidden" id="jenis_pembayaran" name="jenis_pembayaran" value="{{ old('jenis_pembayaran', $selectedJenisPembayaran ?: 'Semua Pembayaran') }}">

                                <div class="col-12 mt-4 pt-2">
                                    <div class="payment-action-bar total-action-row">
                                        <div class="total-payment-badge total-action-item">
                                            <div class="total-payment-label">Total</div>
                                            <div class="total-payment-value">Rp {{ number_format(old('jumlah_pembayaran', $defaultJumlahPembayaran ?? 2000000), 0, ',', '.') }}</div>
                                            <input type="hidden" id="jumlah_pembayaran" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran', $defaultJumlahPembayaran ?? 2000000) }}">
                                        </div>

                                        <div class="d-flex flex-nowrap gap-2 align-items-center ms-auto total-action-buttons">
                                            <button type="submit" class="btn btn-primary btn-save-order total-action-button">Simpan</button>
                                        </div>
                                    </div>
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
}

.content-card .card-body {
    padding: 32px;
}

    .payment-summary-card {
        border: 1px solid #e9d5ff;
        background: linear-gradient(180deg, #faf5ff 0%, #ffffff 100%);
    }

    .payment-summary-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .payment-summary-list li {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #ede9fe;
        color: #475569;
    }

    .payment-summary-list li:last-child {
        border-bottom: none;
    }

    .summary-item-label {
        font-weight: 600;
    }

    .summary-item-value {
        font-weight: 700;
        color: #5b21b6;
    }
    

.form-label {
    font-weight: 600;
    color: #2d3748;
    font-size: 14px;
    margin-bottom: 10px;
    display: block;
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

.invalid-feedback {
    display: block;
    font-size: 12px;
    margin-top: 6px;
}

.info-tile {
    border-radius: 16px;
    background: linear-gradient(180deg, #faf5ff 0%, #ffffff 100%);
    border: 1px solid #ede9fe;
    padding: 20px;
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

.payment-action-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 16px 18px;
    border-radius: 20px;
    background: linear-gradient(180deg, rgba(248, 243, 255, 0.88) 0%, rgba(255, 255, 255, 0.96) 100%);
    border: 1px solid #e9d5ff;
    box-shadow: 0 14px 30px rgba(91, 33, 182, 0.09);
    backdrop-filter: blur(8px);
}

.total-payment-badge {
    display: inline-flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    gap: 2px;
    min-width: 190px;
    padding: 14px 18px;
    border-radius: 16px;
    background: linear-gradient(180deg, #ffffff 0%, #faf5ff 100%);
    border: 1px solid #ddd6fe;
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.85);
}

.total-payment-label {
    font-size: 11px;
    font-weight: 800;
    color: #7c3aed;
    text-transform: uppercase;
    letter-spacing: 0.1em;
}

.total-payment-value {
    font-size: 18px;
    font-weight: 800;
    color: #111827;
    line-height: 1.1;
    white-space: nowrap;
    letter-spacing: -0.01em;
}

.total-action-row {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.total-action-item,
.total-action-buttons,
.total-action-button {
    flex: 0 0 auto;
}

.total-action-buttons .btn {
    min-height: 46px;
    display: inline-flex;
    align-items: center;
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

    .payment-action-bar {
        padding: 12px;
        gap: 12px;
    }

    .total-payment-badge {
        padding: 10px 12px;
        max-width: 100%;
    }

    .total-payment-label {
        font-size: 10px;
    }

    .total-payment-value {
        font-size: 16px;
    }

    .total-action-buttons .btn {
        padding-left: 12px;
        padding-right: 12px;
        font-size: 13px;
        min-height: 42px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const paymentMethods = @json($paymentMethods);
    const namaBankSelect = document.getElementById('nama_bank');
    const bankInfoSection = document.getElementById('bank-info-section');
    const bankNoRekeningElement = document.getElementById('bank-no-rekening');
    const bankAtasNamaElement = document.getElementById('bank-atas-nama');
    const copyRekeningBtn = document.getElementById('copy-rekening-btn');

    function updateBankInfo() {
        const selectedBank = namaBankSelect.value;
        
        if (selectedBank && paymentMethods[selectedBank]) {
            const bankData = paymentMethods[selectedBank];
            bankNoRekeningElement.textContent = bankData.noRekening;
            bankAtasNamaElement.textContent = bankData.atasNama;
            bankInfoSection.style.display = 'block';
        } else {
            bankInfoSection.style.display = 'none';
        }
    }

    // Copy rekening to clipboard
    copyRekeningBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const noRekening = bankNoRekeningElement.textContent;
        
        navigator.clipboard.writeText(noRekening).then(function() {
            // Show feedback
            const originalContent = copyRekeningBtn.innerHTML;
            copyRekeningBtn.innerHTML = '<i class="mdi mdi-check" style="font-size: 18px;"></i>';
            copyRekeningBtn.classList.add('btn-success');
            copyRekeningBtn.classList.remove('btn-outline-primary');
            
            setTimeout(function() {
                copyRekeningBtn.innerHTML = originalContent;
                copyRekeningBtn.classList.remove('btn-success');
                copyRekeningBtn.classList.add('btn-outline-primary');
            }, 2000);
        }).catch(function(err) {
            console.error('Gagal menyalin: ', err);
        });
    });

    // Update on initial load if bank is selected
    updateBankInfo();

    // Update on change
    namaBankSelect.addEventListener('change', updateBankInfo);
});
</script>

@endsection
