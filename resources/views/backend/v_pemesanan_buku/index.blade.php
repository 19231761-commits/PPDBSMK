@extends('backend.v_layout.app')

@section('content')
@php
    $jurusans = [
        'Farmasi Klinis & Komunitas',
        'Asisten Keperawatan & Caregiver',
        'Teknik Komputer & Jaringan',
        'Teknik Sepeda Motor',
        'Teknik Kendaraan Ringan',
    ];

    $jenisBukuOptions = [
        'Buku Paket',
        'Modul Praktik',
        'Workbook',
        'Lembar Kerja',
        'Buku Referensi',
    ];

    $hargaSatuanBuku = $hargaSatuanBuku ?? 25000;
@endphp

<div class="order-page is-success">
    <div class="row">
        <div class="col-12">
        <div class="card page-hero-card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="hero-note mb-2">Selamat datang di halaman input pemesanan buku</div>
                    <h4 class="card-title mb-2">Form Pemesanan Buku Jurusan TKA</h4>
                    <p class="mb-0 text-white-50">Tampilan baru dibuat agar pemesanan buku menjadi lebih jelas, cepat, dan nyaman di desktop maupun mobile.</p>
                </div>
                <span class="badge bg-secondary mt-3 mt-md-0">Pendaftar</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card content-card h-100">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Data Pemesanan Buku</h5>
                        <span class="section-tag">5 Jurusan Aktif</span>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

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

                        <form method="POST" action="{{ route('backend.pemesanan.buku.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Siswa</label>
                                    <input type="text" name="nama_siswa" class="form-control" placeholder="Nama siswa" value="{{ old('nama_siswa') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jurusan</label>
                                    <select class="custom-select form-control" id="jurusan-select-buku" name="jurusan" required>
                                        <option value="" disabled {{ old('jurusan') ? '' : 'selected' }}>Pilih jurusan</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan }}" {{ old('jurusan') === $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jenis Buku</label>
                                    <select class="custom-select form-control" id="jenis-buku-select" name="jenis_buku" required>
                                        <option value="" disabled {{ old('jenis_buku') ? '' : 'selected' }}>Pilih jenis buku</option>
                                        @foreach ($jenisBukuOptions as $jenisBuku)
                                            <option value="{{ $jenisBuku }}" {{ old('jenis_buku') === $jenisBuku ? 'selected' : '' }}>{{ $jenisBuku }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jumlah Buku</label>
                                    <input type="number" id="jumlah-buku-input" name="jumlah_buku" class="form-control" placeholder="Contoh: 3" value="{{ old('jumlah_buku', 1) }}" min="1" max="25" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Semester / Kelas</label>
                                    <input type="text" name="semester_kelas" class="form-control" placeholder="Contoh: X TKA 1" value="{{ old('semester_kelas') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" rows="3" placeholder="Tulis catatan tambahan jika ada">{{ old('catatan') }}</textarea>
                                <div class="form-hint">Tips: tulis detail mapel atau edisi buku agar tidak tertukar.</div>
                            </div>

                            <div class="mb-2">
                                @foreach ($jurusans as $jurusan)
                                    <button type="button" class="major-pill js-major-pill-buku" data-major="{{ $jurusan }}">{{ $jurusan }}</button>
                                @endforeach
                            </div>

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
                        <h5 class="card-title mb-0">Contoh Buku per Jurusan</h5>
                    </div>
                    <div class="card-body">
                        <div class="preview-grid">
                            @foreach ($jurusans as $jurusan)
                                <div class="product-preview js-major-card-buku" data-major="{{ $jurusan }}" role="button" tabindex="0">
                                    <img src="{{ asset('image/contoh-buku-tka.svg') }}" alt="Contoh buku {{ $jurusan }}">
                                    <div class="preview-body">
                                        <h6 class="mb-1">{{ $jurusan }}</h6>
                                        <p class="mb-2 text-muted">Contoh paket buku untuk membantu siswa memilih kebutuhan jurusannya.</p>
                                        <span class="badge bg-success">Contoh Buku</span>
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
        var jurusanSelect = document.getElementById('jurusan-select-buku');
        if (!jurusanSelect) return;

        var pills = document.querySelectorAll('.js-major-pill-buku');
        var cards = document.querySelectorAll('.js-major-card-buku');
        var jenisBukuSelect = document.getElementById('jenis-buku-select');
        var jumlahBukuInput = document.getElementById('jumlah-buku-input');
        var totalEl = document.getElementById('estimasi-total-buku');
        var hargaSatuanBuku = Number(@json($hargaSatuanBuku));

        function setJurusan(majorName) {
            jurusanSelect.value = majorName;
            pills.forEach(function(pill) {
                pill.classList.toggle('is-active', pill.getAttribute('data-major') === majorName);
            });
            cards.forEach(function(card) {
                card.classList.toggle('is-active', card.getAttribute('data-major') === majorName);
            });
        }

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID').format(value);
        }

        function updateSummary() {
            if (!totalEl) return;

            var jumlah = Number(jumlahBukuInput && jumlahBukuInput.value ? jumlahBukuInput.value : 0);
            var total = Math.max(jumlah, 0) * hargaSatuanBuku;

            totalEl.textContent = 'Rp ' + formatRupiah(total);
        }

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

        if (jurusanSelect.value) {
            setJurusan(jurusanSelect.value);
        }

        if (jumlahBukuInput) {
            jumlahBukuInput.addEventListener('input', updateSummary);
        }

        if (jenisBukuSelect) {
            jenisBukuSelect.addEventListener('change', updateSummary);
        }

        updateSummary();
    })();
</script>
@endsection