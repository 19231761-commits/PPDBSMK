@extends('backend.v_layout.app')
@section('content')

<!-- contentAwal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('backend.user.update', $user->id_user) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="text-uppercase text-primary font-weight-bold mb-2" style="letter-spacing: 0.06em; font-size: 12px;">Selamat datang di halaman edit user</div>
                            <h4 class="card-title">{{ $judul }}</h4>
                            <p class="mb-0 text-muted">Perbarui hak akses, status, dan data akun user dengan mudah.</p>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <!-- Hak Akses -->
                                <div class="form-group">
                                    <label>Hak Akses</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option value="" {{ old('role', $user->role) == '' ? 'selected' : '' }}>- Pilih Hak Akses -</option>
                                        <option value="admin_ppdb" {{ old('role', $user->role) == 'admin_ppdb' ? 'selected' : '' }}>Admin PPDB</option>
                                        <option value="pendaftar" {{ old('role', $user->role) == 'pendaftar' ? 'selected' : '' }}>Pendaftar</option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="" {{ old('status', $user->status) == '' ? 'selected' : '' }}>- Pilih Status -</option>
                                        <option value="1" {{ old('status', $user->status) == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('status', $user->status) == '0' ? 'selected' : '' }}>NonAktif</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- ID User -->
                                <div class="form-group">
                                    <label>ID User</label>
                                    <input type="text" name="id_user" value="{{ old('id_user', $user->id_user) }}" class="form-control @error('id_user') is-invalid @enderror" placeholder="Masukkan ID User">
                                    @error('id_user')
                                        <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Nama -->
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama">
                                    @error('nama')
                                        <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email">
                                    @error('email')
                                        <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- No HP -->
                                <div class="form-group">
                                    <label>HP</label>
                                    <input type="text" onkeypress="return hanyaAngka(event)" name="hp" value="{{ old('hp', $user->hp) }}" class="form-control @error('hp') is-invalid @enderror" placeholder="Masukkan Nomor HP">
                                    @error('hp')
                                        <span class="invalid-feedback alert-danger" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                                <a href="{{ route('backend.user.index') }}">
                                    <button type="button" class="btn btn-secondary">Kembali</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- contentAkhir -->

@endsection