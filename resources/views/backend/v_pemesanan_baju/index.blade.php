@extends('backend.v_layout.app')

@section('content')
@php
    $jurusans = $jurusans ?? [
        'Farmasi Klinis & Komunitas',
        'Asisten Keperawatan & Caregiver',
        'Teknik Komputer & Jaringan',
        'Teknik Sepeda Motor',
        'Teknik Kendaraan Ringan',
    ];

    $hargaJurusan = [
        'Farmasi Klinis & Komunitas' => 180000,
        'Asisten Keperawatan & Caregiver' => 182000,
        'Teknik Komputer & Jaringan' => 190000,
        'Teknik Sepeda Motor' => 188000,
        'Teknik Kendaraan Ringan' => 192000,
    ];

    $tambahanUkuran = [
        'S' => 0,
        'M' => 5000,
        'L' => 10000,
        'XL' => 15000,
        'XXL' => 20000,
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
        <div class="card page-hero-card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="hero-note mb-2">Selamat datang di halaman input pemesanan baju</div>
                    <h4 class="card-title mb-2">Form Pemesanan Baju Jurusan TKA</h4>
                    <p class="mb-0 text-white-50">Tampilan baru dibuat lebih rapi agar pemesanan seragam terasa lebih jelas dan nyaman saat diisi.</p>
                </div>
                <span class="badge bg-secondary mt-3 mt-md-0">Pendaftar</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card content-card h-100">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Pemesanan Baju</h5>
                        <span class="section-tag">5 Jurusan Aktif</span>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>Data belum bisa disimpan:</strong>
                                <ul class="mb-0 pl-3 mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('backend.pemesanan.baju.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa" class="form-control" placeholder="Nama siswa" value="{{ old('nama_siswa') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jurusan</label>
                                    <select class="custom-select form-control" id="jurusan-select-baju" name="jurusan" required>
                                        <option value="" disabled {{ old('jurusan') ? '' : 'selected' }}>Pilih jurusan</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan }}" {{ old('jurusan') === $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Ukuran Baju</label>
                                    <select class="custom-select form-control" id="ukuran-baju-select" name="ukuran_baju" required>
                                        <option value="" disabled {{ old('ukuran_baju') ? '' : 'selected' }}>Pilih ukuran</option>
                                        <option value="S" {{ old('ukuran_baju') === 'S' ? 'selected' : '' }}>S</option>
                                        <option value="M" {{ old('ukuran_baju') === 'M' ? 'selected' : '' }}>M</option>
                                        <option value="L" {{ old('ukuran_baju') === 'L' ? 'selected' : '' }}>L</option>
                                        <option value="XL" {{ old('ukuran_baju') === 'XL' ? 'selected' : '' }}>XL</option>
                                        <option value="XXL" {{ old('ukuran_baju') === 'XXL' ? 'selected' : '' }}>XXL</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jumlah Pesanan</label>
                                    <input type="number" id="jumlah-pesanan-input" name="jumlah_pesanan" class="form-control" placeholder="Contoh: 1" value="{{ old('jumlah_pesanan') }}" min="1" max="10" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Warna / Keterangan</label>
                                    <input type="text" name="warna_keterangan" class="form-control" placeholder="Contoh: Putih, lengan panjang" value="{{ old('warna_keterangan') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Metode Pembayaran</label>
                                    <select class="custom-select form-control" id="metode-pembayaran-select" name="metode_pembayaran" required>
                                        <option value="" disabled {{ old('metode_pembayaran') ? '' : 'selected' }}>Pilih metode pembayaran</option>
                                        @foreach ($paymentMethods as $code => $method)
                                            <option value="{{ $code }}" {{ old('metode_pembayaran') === $code ? 'selected' : '' }}>{{ $method['label'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="price-box mb-3">
                                <h6 class="mb-2">Harga Contoh PDH</h6>
                                @foreach ($hargaJurusan as $namaJurusan => $harga)
                                    <div class="price-line">
                                        <span>{{ $namaJurusan }}</span>
                                        <span>Rp {{ number_format($harga, 0, ',', '.') }}</span>
                                    </div>
                                @endforeach
                                <div class="price-line mt-2 mb-0">
                                    <span>Tambahan ukuran S/M/L/XL/XXL</span>
                                    <span>+0 / +5rb / +10rb / +15rb / +20rb</span>
                                </div>
                                <div class="price-total" id="estimasi-total-pdh">Estimasi Total PDH: Rp 0</div>
                            </div>

                            <div class="payment-box mb-3">
                                <h6 class="mb-2">Tujuan Pembayaran</h6>
                                <div class="payment-detail" id="payment-label">Metode: -</div>
                                <div class="payment-detail" id="payment-account">Nomor Rekening / Nomor Wallet: -</div>
                                <div class="payment-detail mb-0" id="payment-holder">Atas Nama: -</div>
                            </div>

                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" rows="3" placeholder="Tulis catatan tambahan jika ada">{{ old('catatan') }}</textarea>
                                <div class="form-hint">Tips: isi model dan detail ukuran agar proses pemesanan lebih cepat.</div>
                                <div class="form-hint">Harga contoh otomatis dihitung berdasarkan jurusan dan ukuran baju.</div>
                            </div>

                            <div class="mb-2">
                                @foreach ($jurusans as $jurusan)
                                    <button type="button" class="major-pill js-major-pill-baju" data-major="{{ $jurusan }}">{{ $jurusan }}</button>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card content-card h-100 sticky-preview">
                    <div class="card-header py-3">
                        <h5 class="card-title mb-0">Contoh Baju per Jurusan</h5>
                    </div>
                    <div class="card-body">
                        <div class="preview-grid">
                            @foreach ($jurusans as $jurusan)
                                <div class="product-preview js-major-card-baju" data-major="{{ $jurusan }}" role="button" tabindex="0">
                                    <img src="{{ asset('image/contoh-baju-tka.svg') }}" alt="Contoh baju {{ $jurusan }}">
                                    <div class="preview-body">
                                        <h6 class="mb-1">{{ $jurusan }}</h6>
                                        <p class="mb-2 text-muted">Contoh visual seragam untuk referensi pemesanan jurusan ini.</p>
                                        <span class="badge bg-info">Contoh Baju</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<script>
    (function() {
        var jurusanSelect = document.getElementById('jurusan-select-baju');
        if (!jurusanSelect) return;

        var pills = document.querySelectorAll('.js-major-pill-baju');
        var cards = document.querySelectorAll('.js-major-card-baju');
        var ukuranSelect = document.getElementById('ukuran-baju-select');
        var jumlahInput = document.getElementById('jumlah-pesanan-input');
        var totalEl = document.getElementById('estimasi-total-pdh');
        var metodeSelect = document.getElementById('metode-pembayaran-select');
        var paymentLabel = document.getElementById('payment-label');
        var paymentAccount = document.getElementById('payment-account');
        var paymentHolder = document.getElementById('payment-holder');

        var hargaJurusan = @json($hargaJurusan);
        var tambahanUkuran = @json($tambahanUkuran);
        var paymentMethods = @json($paymentMethods);

        function setJurusan(majorName) {
            jurusanSelect.value = majorName;
            pills.forEach(function(pill) {
                pill.classList.toggle('is-active', pill.getAttribute('data-major') === majorName);
            });
            cards.forEach(function(card) {
                card.classList.toggle('is-active', card.getAttribute('data-major') === majorName);
            });
            updateEstimasiTotal();
        }

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID').format(value);
        }

        function updateEstimasiTotal() {
            if (!totalEl) return;

            var selectedJurusan = jurusanSelect.value;
            var selectedUkuran = ukuranSelect ? ukuranSelect.value : '';
            var jumlah = Number(jumlahInput && jumlahInput.value ? jumlahInput.value : 0);

            var base = Number(hargaJurusan[selectedJurusan] || 0);
            var add = Number(tambahanUkuran[selectedUkuran] || 0);
            var unit = base + add;
            var total = unit * Math.max(jumlah, 0);

            totalEl.textContent = 'Estimasi Total PDH: Rp ' + formatRupiah(total);
        }

        function updatePaymentDetail() {
            if (!metodeSelect) return;

            var selected = metodeSelect.value;
            var method = paymentMethods[selected] || null;

            if (!method) {
                paymentLabel.textContent = 'Metode: -';
                paymentAccount.textContent = 'Nomor Rekening / Nomor Wallet: -';
                paymentHolder.textContent = 'Atas Nama: -';
                return;
            }

            paymentLabel.textContent = 'Metode: ' + method.label;
            paymentAccount.textContent = 'Nomor Rekening / Nomor Wallet: ' + method.account;
            paymentHolder.textContent = 'Atas Nama: ' + method.holder;
        }

        if (jurusanSelect.value) {
            setJurusan(jurusanSelect.value);
        }

        jurusanSelect.addEventListener('change', updateEstimasiTotal);
        if (ukuranSelect) ukuranSelect.addEventListener('change', updateEstimasiTotal);
        if (jumlahInput) jumlahInput.addEventListener('input', updateEstimasiTotal);
        if (metodeSelect) metodeSelect.addEventListener('change', updatePaymentDetail);

        pills.forEach(function(pill) {
            pill.addEventListener('click', function() {
                setJurusan(this.getAttribute('data-major'));
            });
        });

        cards.forEach(function(card) {
            card.addEventListener('click', function() {
                setJurusan(this.getAttribute('data-major'));
            });
            card.addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    setJurusan(this.getAttribute('data-major'));
                }
            });
        });

        updateEstimasiTotal();
        updatePaymentDetail();
    })();
</script>
@endsection