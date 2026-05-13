@extends('backend.v_layout.app')

@section('content')
@php
    $selectedJenisPembayaran = old('jenis_pembayaran', $edit->jenis_pembayaran);
    $defaultJumlahPembayaran = old('jumlah_pembayaran', $edit->jumlah_pembayaran);
    $selectedJenisKelamin = old('jenis_kelamin', $edit->jenis_kelamin);
    $selectedJurusan = old('jurusan', $edit->jurusan);
    $paymentMethods = [
        'Transfer Bank BCA' => [
            'label' => 'Bank BCA',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'Transfer Bank BRI' => [
            'label' => 'Bank BRI',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'Transfer Bank BNI' => [
            'label' => 'Bank BNI',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'Transfer Bank Mandiri' => [
            'label' => 'Bank Mandiri',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'E-Wallet DANA' => [
            'label' => 'E-Wallet DANA',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'E-Wallet GoPay' => [
            'label' => 'E-Wallet GoPay',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'E-Wallet OVO' => [
            'label' => 'E-Wallet OVO',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
        'E-Wallet ShopeePay' => [
            'label' => 'E-Wallet ShopeePay',
            'noRekening' => '0123456789',
            'atasNama' => 'SMK SEHATI KARAWANG',
        ],
    ];
    $paymentTypes = [
        'Pendaftaran Santri' => [
            'label' => 'Pendaftaran Santri',
            'price' => 250000,
            'description' => 'Biaya pendaftaran awal siswa baru.',
        ],
        'Pemesanan Baju' => [
            'label' => 'Pemesanan Baju',
            'price' => null,
            'description' => 'Pembayaran untuk pesanan baju seragam.',
        ],
        'Pemesanan Buku' => [
            'label' => 'Pemesanan Buku',
            'price' => null,
            'description' => 'Pembayaran untuk pesanan buku siswa.',
        ],
    ];
    $jurusanOptions = [
        'Teknik Komputer dan Jaringan',
        'Rekayasa Perangkat Lunak',
        'Akuntansi dan Keuangan Lembaga',
        'Bisnis Daring dan Pemasaran',
        'Multimedia',
    ];
@endphp

<div class="order-page is-primary">
    <div class="row justify-content-center gx-4 gy-4">
        <div class="col-12 col-xl-10">
            <div class="card page-hero-card mb-4">
                <div class="card-body">
                    <div class="hero-note mb-2">Form Edit Pembayaran</div>
                    <h4 class="card-title mb-2">Pendaftaran, Baju, dan Buku</h4>
                    <p class="mb-0 text-white-50">Perbarui data pembayaran dengan pilihan jenis yang sama seperti saat input.</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Detail Pembayaran</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('backend.pembayaransantri.update', $edit->id_pembayaran) }}" method="POST" class="row g-3" id="payment-form" enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="col-12 col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="nama_santri" class="form-label">Nama Siswa</label>
                                            <input type="text" class="form-control @error('nama_santri') is-invalid @enderror" id="nama_santri" name="nama_santri" value="{{ old('nama_santri', $edit->nama_santri) }}" placeholder="Masukkan nama siswa">
                                            @error('nama_santri')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <select id="jenis_kelamin" name="jenis_kelamin" class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror" required>
                                                <option value="">- Pilih Jenis Kelamin -</option>
                                                <option value="Laki-Laki" @selected($selectedJenisKelamin === 'Laki-Laki')>Laki-Laki</option>
                                                <option value="Perempuan" @selected($selectedJenisKelamin === 'Perempuan')>Perempuan</option>
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
                                                    <option value="{{ $jurusanOption }}" @selected($selectedJurusan === $jurusanOption)>{{ $jurusanOption }}</option>
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
                                                    <option value="{{ $key }}" @selected(old('nama_bank', $edit->nama_bank) === $key)>{{ $method['label'] }}</option>
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
                                            <input type="file" class="form-control @error('bukti_pembayaran') is-invalid @enderror" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,.pdf">
                                            <small class="text-muted">Format yang diterima: JPG, JPEG, PNG, atau PDF. Maksimal 5 MB. Biarkan kosong jika tidak ingin mengganti file.</small>
                                            @if (!empty($edit->bukti_pembayaran))
                                                <div class="mt-2 small text-muted">Bukti saat ini: <a href="{{ asset($edit->bukti_pembayaran) }}" target="_blank" rel="noopener">lihat file</a></div>
                                            @endif
                                            @error('bukti_pembayaran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="jenis_pembayaran" class="form-label">Jenis Pembayaran</label>
                                            <select id="jenis_pembayaran" name="jenis_pembayaran" class="custom-select form-control @error('jenis_pembayaran') is-invalid @enderror" required>
                                                <option value="">- Pilih Jenis Pembayaran -</option>
                                                @foreach ($paymentTypes as $key => $paymentType)
                                                    <option value="{{ $key }}" data-price="{{ $paymentType['price'] ?? '' }}" @selected($selectedJenisPembayaran === $key)>
                                                        {{ $paymentType['label'] }}
                                                        @if (!is_null($paymentType['price']))
                                                            (Rp {{ number_format($paymentType['price'], 0, ',', '.') }})
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jenis_pembayaran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                                            <input type="text" class="form-control @error('jumlah_pembayaran') is-invalid @enderror" id="jumlah_pembayaran" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran', $defaultJumlahPembayaran) }}" placeholder="Masukkan jumlah pembayaran">
                                            @error('jumlah_pembayaran')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="{{ old('id_pembayaran', $edit->id_pembayaran) }}">
                                <input type="hidden" id="id_santri" name="id_santri" value="{{ old('id_santri', $edit->id_santri) }}">

                                <div class="col-12 d-flex flex-wrap gap-2 align-items-center pt-2">
                                    <button type="submit" class="btn btn-primary btn-save-order">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="card content-card h-100">
                        <div class="card-header py-3">
                            <h5 class="card-title mb-0">Ringkasan</h5>
                        </div>
                        <div class="card-body">
                            <div class="info-tile mb-3">
                                <div class="info-title">Pendaftaran</div>
                                <div class="info-value">Rp 250.000</div>
                                <div class="info-desc">Harga tetap untuk pembayaran pendaftaran santri baru.</div>
                            </div>
                            <div class="info-tile mb-3">
                                <div class="info-title">Baju</div>
                                <div class="info-value">Sesuai pesanan</div>
                                <div class="info-desc">Gunakan jika pembayaran untuk seragam sekolah.</div>
                            </div>
                            <div class="info-tile">
                                <div class="info-title">Buku</div>
                                <div class="info-value">Sesuai pesanan</div>
                                <div class="info-desc">Gunakan jika pembayaran untuk buku siswa.</div>
                            </div>
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

<script>
    (function () {
        const jenisPembayaran = document.getElementById('jenis_pembayaran');
        const jumlahPembayaran = document.getElementById('jumlah_pembayaran');

        if (!jenisPembayaran || !jumlahPembayaran) {
            return;
        }

        const syncJumlahPembayaran = () => {
            const selectedOption = jenisPembayaran.selectedOptions[0];
            const fixedPrice = selectedOption ? selectedOption.dataset.price : '';

            if (fixedPrice) {
                jumlahPembayaran.value = fixedPrice;
                jumlahPembayaran.readOnly = true;
            } else {
                jumlahPembayaran.readOnly = false;
                if (jumlahPembayaran.value === '250000') {
                    jumlahPembayaran.value = '';
                }
            }
        };

        jenisPembayaran.addEventListener('change', syncJumlahPembayaran);
        syncJumlahPembayaran();
    })();
</script>
@endsection
