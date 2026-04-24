@extends('Backend.v_layout.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('backend.user.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman input user</div>
                            <h4 class="card-title">Kelola Data User</h4>
                            <p class="mb-0 text-muted">Tambahkan akun admin atau pendaftar dengan data yang lengkap.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hak Akses</label>
                                    <select name="role" class="form-control">
                                        <option value="admin_ppdb">Admin PPDB</option>
                                        <option value="pendaftar">Pendaftar</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Id User</label>
                                    <input type="text" name="id_user" value="{{ old('id_user') }}" class="form-control @error('id_user') is-invalid @enderror" placeholder="Masukkan ID User">
                                    @error('id_user')
                                    <span class="invalid-feedback alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                                    @error('nama')
                                    <span class="invalid-feedback alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                                    @error('email')
                                    <span class="invalid-feedback alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>HP</label>
                                    <input type="text" name="hp" value="{{ old('hp') }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan No HP">
                                    @error('hp')
                                    <span class="invalid-feedback alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">NonAktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('backend.user.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection