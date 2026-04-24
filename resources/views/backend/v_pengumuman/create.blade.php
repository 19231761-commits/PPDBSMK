@Extends('Backend.v_layout.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('backend.pengumuman.store') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman input informasi</div>
                            <h4 class="card-title">{{$judul}}</h4>
                            <p class="mb-0 text-muted">Buat pengumuman PPDB dengan judul dan isi yang jelas.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-8">
                                    <div class="form-group">
                                            <label for="id_pengumuman">Id Pengumuman</label>
                                            <input type="text" id="idpengumuman" name="id_pengumuman" value="{{ old('id_pengumuman') }}"
                                                class="form-control @error('id_pengumuman') is-invalid @enderror"
                                                placeholder="Masukkan id pengumuman">
                                            @error('id_pengumuman')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Id_User</label>
                                            <input type="text" name="id_user" value="{{ old('id_user',) }}" 
                                            class="form-control @error('id_user') is-invalid @enderror"
                                            placeholder="Masukkan Id User">
                                            @error('id_user')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pengumuman">Tanggal Pengumuman</label>
                                            <input type="date" id="tanggalpengumuman" name="tanggal_pengumuman" value="{{ old('tanggal_pengumuman') }}"
                                                class="form-control @error('tanggal_pengumuman') is-invalid @enderror"
                                                placeholder="Masukkan Tanggal Pengumuman">
                                            @error('tanggal_pengumuman')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="judulpengumuman">Judul Pengumuman</label>
                                            <input type="text" id="judulpengumuman" name="judul_pengumuman"
                                                value="{{ old('judul_pengumuman') }}"
                                                class="form-control @error('judul_pengumuman') is-invalid @enderror"
                                                placeholder="Masukkan Judul Pengumuman">
                                            @error('judul_pengumuman')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="isipengumuman">Isi Pengumuman</label>
                                            <input type="text" id="isipengumuman" name="isi_pengumuman" value="{{ old('isi_pengumuman') }}"
                                                class="form-control @error('isi_pengumuman') is-invalid @enderror"
                                                placeholder="Masukkan Isi Pengumuman" onkeypress="return hanyaAngka(event)">
                                            @error('isi_pengumuman')
                                            <span class="invalid-feedback alert-danger" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('backend.pengumuman.index') }}">
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