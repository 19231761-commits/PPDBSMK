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
@endphp
<style>
    .order-page {
        background: radial-gradient(circle at top right, #dcfce7 0%, #f8fafc 42%, #ffffff 100%);
        border-radius: 18px;
        padding: 18px;
    }

    .order-page .hero-note {
        letter-spacing: 0.06em;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.78);
        font-weight: 800;
        text-transform: uppercase;
    }

    .order-page .section-tag {
        background: linear-gradient(120deg, #16a34a, #15803d);
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

    .order-page .major-pill {
        border: 1px solid #bbf7d0;
        color: #14532d;
        background: #f0fdf4;
        border-radius: 999px;
        padding: 6px 12px;
        font-size: 12px;
        font-weight: 700;
        margin: 0 8px 8px 0;
        display: inline-flex;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .order-page .major-pill:hover,
    .order-page .major-pill.is-active {
        background: linear-gradient(120deg, #16a34a, #15803d);
        color: #fff;
        border-color: transparent;
    }

    .order-page .product-preview {
        border: 1px solid #dbe6f2;
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: pointer;
    }

    .order-page .product-preview:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 32px rgba(15, 23, 42, 0.12);
    }

    .order-page .product-preview img {
        width: 100%;
        height: 190px;
        object-fit: cover;
        background: linear-gradient(145deg, #dcfce7, #eff6ff);
    }

    .order-page .preview-body {
        padding: 16px;
    }

    .order-page .form-hint {
        font-size: 12px;
        color: #64748b;
        margin-top: 6px;
    }

    .order-page .card,
    .order-page .card-body,
    .order-page form,
    .order-page .form-group,
    .order-page .product-preview {
        position: relative;
        z-index: 2;
    }

    .order-page .preview-grid {
        display: grid;
        grid-template-columns: repeat(1, minmax(0, 1fr));
        gap: 14px;
    }

    @media (min-width: 768px) {
        .order-page .preview-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
</style>

<div class="row order-page">
    <div class="col-12">
        <div class="card page-hero-card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="hero-note mb-2">Selamat datang di halaman input pemesanan buku</div>
                    <h4 class="card-title mb-2">Form Pemesanan Buku Jurusan TKA</h4>
                    <p class="mb-0 text-white-50">Tampilan baru dibuat agar pemesanan buku menjadi lebih jelas, cepat, dan nyaman di desktop maupun mobile.</p>
                </div>
                <span class="badge mt-3 mt-md-0">Pendaftar</span>
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
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Siswa</label>
                                    <input type="text" class="form-control" placeholder="Nama siswa">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jurusan</label>
                                    <select class="custom-select form-control" id="jurusan-select-buku">
                                        <option selected disabled>Pilih jurusan</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option>{{ $jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Jumlah Buku</label>
                                    <input type="number" class="form-control" placeholder="Contoh: 3">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Jenis Buku</label>
                                    <input type="text" class="form-control" placeholder="Misal: buku paket, modul, workbook">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Semester / Kelas</label>
                                    <input type="text" class="form-control" placeholder="Contoh: X TKA 1">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" rows="4" placeholder="Tulis catatan tambahan jika ada"></textarea>
                                <div class="form-hint">Tips: tulis detail mapel atau edisi buku agar tidak tertukar.</div>
                            </div>

                            <div class="mb-2">
                                @foreach ($jurusans as $jurusan)
                                    <button type="button" class="major-pill js-major-pill-buku" data-major="{{ $jurusan }}">{{ $jurusan }}</button>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary px-4">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card content-card h-100">
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
                                        <span class="badge badge-pill badge-success">Contoh Buku</span>
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

<script>
    (function() {
        var jurusanSelect = document.getElementById('jurusan-select-buku');
        if (!jurusanSelect) return;

        var pills = document.querySelectorAll('.js-major-pill-buku');
        var cards = document.querySelectorAll('.js-major-card-buku');

        function setJurusan(majorName) {
            jurusanSelect.value = majorName;
            pills.forEach(function(pill) {
                pill.classList.toggle('is-active', pill.getAttribute('data-major') === majorName);
            });
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
    })();
</script>
@endsection