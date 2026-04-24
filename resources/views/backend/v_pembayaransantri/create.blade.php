@Extends('Backend.v_layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('backend.pembayaransantri.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman input pembayaran</div>
                            <h4 class="card-title">{{$judul}}</h4>
                            <p class="mb-0 text-muted">Isi data pembayaran siswa dengan benar sebelum disimpan.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="id_pembayaran">Id Pembayaran</label>
                                            <input type="text" id="idpembayaran" name="id_pembayaran" value="{{ old('id_pembayaran') }}"
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
                                    <input type="text" id="idpendaftaran" name="id_pendaftaran" value="{{ old('id_pendaftaran') }}"
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
                                            <input type="text" id="jenispembayaran" name="jenis_pembayaran" value="{{ old('jenis_pembayaran') }}"
                                                class="form-control @error('jenis_pembayaran') is-invalid @enderror"
                                                placeholder="Masukkan Jenis Pembayaran">
                                            @error('Jenis_pembayaran')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal pembayaran">Tanggal Pembayaran</label>
                                            <input type="date" id="tanggalpembayaran" name="tanggal_pembayaran"
                                                value="{{ old('tanggal_pembayaran') }}"
                                                class="form-control @error('tanggal_pembayaran') is-invalid @enderror"
                                                placeholder="Masukkan tanggal pembayaran">
                                            @error('tanggal_pembayaran')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="namasantri">Nama Siswa</label>
                                            <input type="text" id="namasantri" name="nama_santri" value="{{ old('nama_santri') }}"
                                                class="form-control @error('nama_santri') is-invalid @enderror"
                                                placeholder="Masukkan Nama Siswa" onkeypress="return hanyaAngka(event)">
                                            @error('nama_santri')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="atasnama">Atas Nama</label>
                                            <input type="text" id="atasnama" name="atas_nama" value="{{ old('atas_nama') }}"
                                                class="form-control @error('atas_nama') is-invalid @enderror"
                                                placeholder="Masukkan Atas Nama" onkeypress="return hanyaAngka(event)">
                                            @error('atas_nama')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="namabank">Nama Bank</label>
                                            <input type="text" id="namabank" name="nama_bank" value="{{ old('nama_bank') }}"
                                                class="form-control @error('nama_bank') is-invalid @enderror"
                                                placeholder="Masukkan Nama Bank" onkeypress="return hanyaAngka(event)">
                                            @error('nama_bank')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlahpembayaran">Jumlah Pembayaran</label>
                                            <input type="text" id="jumlahpembayaran" name="jumlah_pembayaran" value="{{ old('jumlah_pembayaran') }}"
                                                class="form-control @error('jumlah_pembayaran') is-invalid @enderror"
                                                placeholder="Masukkan Jumlah Pembayaran" onkeypress="return hanyaAngka(event)">
                                            @error('jumlah_pembayaran')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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