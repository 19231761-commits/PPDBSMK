@extends('backend.v_layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('backend.pembayaransantri.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman edit pembayaran</div>
                            <h4 class="card-title">{{ $judul }}</h4>
                            <p class="mb-0 text-muted">Perbarui transaksi pembayaran siswa jika ada perubahan data.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="id_pembayaran">Id Pembayaran</label>
                                    <input type="text" id="idpembayaran" name="id_pembayaran"
                                        value="{{ old('id_pembayaran', $edit->id_pembayaran) }}"
                                        class="form-control @error('id_pembayaran') is-invalid @enderror"
                                        placeholder="Masukkan id pembayaran">
                                    @error('id_pembayaran')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="idpendaftaran">Id Pendaftaran</label>
                                    <input type="text" id="idpendaftaran" name="id_pendaftaran"
                                        value="{{ old('id_pendaftaran', $edit->id_pendaftaran) }}"
                                        class="form-control @error('id_pendaftaran') is-invalid @enderror"
                                        placeholder="Masukkan Id Pendaftaran">
                                    @error('id_pendaftaran')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <input type="text" id="jenispembayaran" name="jenis_pembayaran"
                                        value="{{ old('jenis_pembayaran', $edit->jenis_pembayaran) }}"
                                        class="form-control @error('jenis_pembayaran') is-invalid @enderror"
                                        placeholder="Masukkan Jenis Pembayaran">
                                    @error('jenis_pembayaran')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggalpembayaran">Tanggal Pembayaran</label>
                                    <input type="date" id="tanggalpembayaran" name="tanggal_pembayaran"
                                        value="{{ old('tanggal_pembayaran', $edit->tanggal_pembayaran) }}"
                                        class="form-control @error('tanggal_pembayaran') is-invalid @enderror">
                                    @error('tanggal_pembayaran')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="namasantri">Nama Siswa</label>
                                    <input type="text" id="namasantri" name="nama_santri"
                                        value="{{ old('nama_santri', $edit->nama_santri) }}"
                                        class="form-control @error('nama_santri') is-invalid @enderror"
                                        placeholder="Masukkan Nama Siswa">
                                    @error('nama_santri')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="atasnama">Atas Nama</label>
                                    <input type="text" id="atasnama" name="atas_nama"
                                        value="{{ old('atas_nama', $edit->atas_nama) }}"
                                        class="form-control @error('atas_nama') is-invalid @enderror"
                                        placeholder="Masukkan Atas Nama">
                                    @error('atas_nama')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="namabank">Nama Bank</label>
                                    <input type="text" id="namabank" name="nama_bank"
                                        value="{{ old('nama_bank', $edit->nama_bank) }}"
                                        class="form-control @error('nama_bank') is-invalid @enderror"
                                        placeholder="Masukkan Nama Bank">
                                    @error('nama_bank')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlahpembayaran">Jumlah Pembayaran</label>
                                    <input type="text" id="jumlahpembayaran" name="jumlah_pembayaran"
                                        value="{{ old('jumlah_pembayaran', $edit->jumlah_pembayaran) }}"
                                        class="form-control @error('jumlah_pembayaran') is-invalid @enderror"
                                        placeholder="Masukkan Jumlah Pembayaran">
                                    @error('jumlah_pembayaran')
                                    <span class="invalid-feedback alert-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                            <a href="{{ route('backend.pembayaransantri.index') }}">
                                <button type="button" class="btn btn-secondary">Kembali</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contentAkhir -->
@endsection
