@extends('backend.v_layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card page-hero-card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.78); font-weight: 800;">Selamat datang di halaman input pemesanan baju</div>
                    <h4 class="card-title mb-2">Form Pemesanan Baju</h4>
                    <p class="mb-0 text-white-50">Gunakan form ini untuk mencatat kebutuhan baju seragam siswa dengan tampilan yang lebih rapi.</p>
                </div>
                <span class="badge mt-3 mt-md-0">Pendaftar</span>
            </div>
        </div>

        <div class="card content-card">
            <div class="card-header py-3">
                <h5 class="card-title">Data Pemesanan</h5>
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
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection