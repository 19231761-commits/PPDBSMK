@extends('backend.v_layout.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card page-hero-card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.78); font-weight: 800;">Selamat datang di halaman input pemesanan buku</div>
                    <h4 class="card-title mb-2">Form Pemesanan Buku</h4>
                    <p class="mb-0 text-white-50">Catat kebutuhan buku siswa dengan alur yang lebih sederhana dan rapi.</p>
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
                            <label>Jumlah Buku</label>
                            <input type="number" class="form-control" placeholder="Contoh: 3">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jenis Buku</label>
                            <input type="text" class="form-control" placeholder="Misal: buku paket, modul, dll">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Semester / Kelas</label>
                            <input type="text" class="form-control" placeholder="Contoh: X RPL 1">
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