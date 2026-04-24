@extends('backend.v_layout.app')

@section('content')
<style>
    .ppdb-form-wrap .hero-card,
    .ppdb-form-wrap .section-card {
        border: 1px solid #dbe7f5;
        border-radius: 18px;
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        overflow: hidden;
        background: rgba(255, 255, 255, 0.96);
    }

    .ppdb-form-wrap .hero-card {
        background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 55%, #0ea5e9 100%);
        color: #fff;
    }

    .ppdb-form-wrap .hero-card .card-body {
        background: transparent;
    }

    .ppdb-form-wrap .hero-card .card-title,
    .ppdb-form-wrap .hero-card p,
    .ppdb-form-wrap .hero-card .badge {
        color: #fff !important;
    }

    .ppdb-form-wrap .section-head {
        background: linear-gradient(120deg, #eff6ff, #ecfdf5);
        padding: 14px 18px;
        font-weight: 800;
        border-bottom: 1px solid #dbe7f5;
    }

    .ppdb-form-wrap .section-body {
        padding: 18px;
    }

    .ppdb-form-wrap .form-control,
    .ppdb-form-wrap .custom-select,
    .ppdb-form-wrap textarea {
        border-radius: 12px;
        border-color: #cdd9ea;
        min-height: 44px;
        box-shadow: none;
    }

    .ppdb-form-wrap .form-control:focus,
    .ppdb-form-wrap .custom-select:focus,
    .ppdb-form-wrap textarea:focus {
        border-color: rgba(14, 165, 233, 0.7);
        box-shadow: 0 0 0 0.2rem rgba(14, 165, 233, 0.12);
    }

    .ppdb-form-wrap label {
        font-weight: 700;
        color: #0f172a;
        margin-bottom: 8px;
    }

    .ppdb-form-wrap .btn {
        border-radius: 12px;
        font-weight: 700;
        padding: 10px 18px;
    }

    .ppdb-form-wrap .badge-info {
        background: rgba(255, 255, 255, 0.16);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .ppdb-form-wrap .help-text {
        color: rgba(255, 255, 255, 0.82);
    }
</style>

@php
    $jurusanList = [
        'Rekayasa Perangkat Lunak (RPL)',
        'Teknik Komputer dan Jaringan (TKJ)',
        'Multimedia (MM)',
        'Akuntansi dan Keuangan Lembaga (AKL)',
        'Otomatisasi dan Tata Kelola Perkantoran (OTKP)',
    ];
@endphp

<div class="container-fluid ppdb-form-wrap">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('backend.pendaftaransantri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id_santri" value="{{ old('id_santri', $id_santri_default) }}">
                <input type="hidden" name="id_user" value="{{ old('id_user', $id_user_default) }}">
                <input type="hidden" name="tgl_pendaftaran" value="{{ old('tgl_pendaftaran', $tgl_pendaftaran_default) }}">

                <div class="card hero-card mb-4">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.78); font-weight: 800;">Selamat datang di halaman input pendaftaran</div>
                            <h4 class="card-title mb-2">{{ $judul }}</h4>
                            <p class="mb-0 help-text">Isi data dengan benar dan lengkap. Field bertanda * wajib diisi.</p>
                        </div>
                        <span class="badge badge-info mt-3 mt-md-0 px-3 py-2">ID: {{ old('id_santri', $id_santri_default) }}</span>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">1. Data Diri</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nama lengkap *</label>
                                <input type="text" name="nama_santri" value="{{ old('nama_santri') }}" class="form-control @error('nama_santri') is-invalid @enderror" placeholder="Masukkan nama lengkap">
                                @error('nama_santri') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label>NISN *</label>
                                <input type="text" name="no_nisn" value="{{ old('no_nisn') }}" class="form-control @error('no_nisn') is-invalid @enderror" placeholder="10 digit">
                                @error('no_nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label>NIK (Opsional)</label>
                                <input type="text" name="no_nik" value="{{ old('no_nik') }}" class="form-control @error('no_nik') is-invalid @enderror" placeholder="16 digit">
                                @error('no_nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Tempat lahir *</label>
                                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Kota lahir">
                                @error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Tanggal lahir *</label>
                                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="form-control @error('tanggal_lahir') is-invalid @enderror">
                                @error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Jenis kelamin *</label>
                                <select name="jenis_kelamin" class="custom-select form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="">- Pilih Jenis Kelamin -</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4 form-group">
                                <label>Agama *</label>
                                <input type="text" name="agama" value="{{ old('agama') }}" class="form-control @error('agama') is-invalid @enderror" placeholder="Masukkan agama">
                                @error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Alamat lengkap *</label>
                                <textarea name="alamat_lengkap" rows="2" class="form-control @error('alamat_lengkap') is-invalid @enderror" placeholder="Masukkan alamat lengkap">{{ old('alamat_lengkap') }}</textarea>
                                @error('alamat_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-2 form-group">
                                <label>RT / RW *</label>
                                <input type="text" name="rt_rw" value="{{ old('rt_rw') }}" class="form-control @error('rt_rw') is-invalid @enderror" placeholder="001/002">
                                @error('rt_rw') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Desa/Kelurahan *</label>
                                <input type="text" name="desa_kelurahan" value="{{ old('desa_kelurahan') }}" class="form-control @error('desa_kelurahan') is-invalid @enderror">
                                @error('desa_kelurahan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Kecamatan *</label>
                                <input type="text" name="kecamatan" value="{{ old('kecamatan') }}" class="form-control @error('kecamatan') is-invalid @enderror">
                                @error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Kota/Kabupaten *</label>
                                <input type="text" name="kota_kabupaten" value="{{ old('kota_kabupaten') }}" class="form-control @error('kota_kabupaten') is-invalid @enderror">
                                @error('kota_kabupaten') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Provinsi *</label>
                                <input type="text" name="provinsi" value="{{ old('provinsi') }}" class="form-control @error('provinsi') is-invalid @enderror">
                                @error('provinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-2 form-group">
                                <label>Kode pos *</label>
                                <input type="text" name="kode_pos" value="{{ old('kode_pos') }}" class="form-control @error('kode_pos') is-invalid @enderror" placeholder="40123">
                                @error('kode_pos') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-5 form-group">
                                <label>No HP siswa *</label>
                                <input type="text" name="no_hp_siswa" value="{{ old('no_hp_siswa') }}" class="form-control @error('no_hp_siswa') is-invalid @enderror" placeholder="08xxxxxxxxxx">
                                @error('no_hp_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-5 form-group">
                                <label>Email *</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">2. Data Orang Tua / Wali</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 mb-2"><h6 class="mb-0">Data Ayah</h6></div>
                            <div class="col-md-3 form-group"><input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="form-control @error('nama_ayah') is-invalid @enderror" placeholder="Nama ayah *">@error('nama_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-3 form-group"><input type="text" name="nik_ayah" value="{{ old('nik_ayah') }}" class="form-control @error('nik_ayah') is-invalid @enderror" placeholder="NIK ayah *">@error('nik_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-3 form-group"><input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" placeholder="Pekerjaan ayah *">@error('pekerjaan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-3 form-group"><input type="text" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" class="form-control @error('penghasilan_ayah') is-invalid @enderror" placeholder="Penghasilan ayah *">@error('penghasilan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-12 mt-3 mb-2"><h6 class="mb-0">Data Ibu</h6></div>
                            <div class="col-md-3 form-group"><input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="form-control @error('nama_ibu') is-invalid @enderror" placeholder="Nama ibu *">@error('nama_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-3 form-group"><input type="text" name="nik_ibu" value="{{ old('nik_ibu') }}" class="form-control @error('nik_ibu') is-invalid @enderror" placeholder="NIK ibu *">@error('nik_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-3 form-group"><input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" placeholder="Pekerjaan ibu *">@error('pekerjaan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-3 form-group"><input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" class="form-control @error('penghasilan_ibu') is-invalid @enderror" placeholder="Penghasilan ibu *">@error('penghasilan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-12 mt-3 mb-2"><h6 class="mb-0">Data Wali (Jika Ada)</h6></div>
                            <div class="col-md-4 form-group"><input type="text" name="nama_wali" value="{{ old('nama_wali') }}" class="form-control @error('nama_wali') is-invalid @enderror" placeholder="Nama wali">@error('nama_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-4 form-group"><input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}" class="form-control @error('pekerjaan_wali') is-invalid @enderror" placeholder="Pekerjaan wali">@error('pekerjaan_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-4 form-group"><input type="text" name="no_hp_wali" value="{{ old('no_hp_wali') }}" class="form-control @error('no_hp_wali') is-invalid @enderror" placeholder="No HP wali">@error('no_hp_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">3. Data Sekolah Asal</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Nama sekolah (SMP/MTs) *</label>
                                <input type="text" name="nama_sekolah_asal" value="{{ old('nama_sekolah_asal') }}" class="form-control @error('nama_sekolah_asal') is-invalid @enderror" placeholder="Nama sekolah asal">
                                @error('nama_sekolah_asal') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-2 form-group">
                                <label>NPSN *</label>
                                <input type="text" name="npsn" value="{{ old('npsn') }}" class="form-control @error('npsn') is-invalid @enderror" placeholder="NPSN">
                                @error('npsn') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Tahun lulus *</label>
                                <input type="text" name="tahun_lulus" value="{{ old('tahun_lulus') }}" class="form-control @error('tahun_lulus') is-invalid @enderror" placeholder="2026">
                                @error('tahun_lulus') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Alamat sekolah *</label>
                                <textarea name="alamat_sekolah" rows="2" class="form-control @error('alamat_sekolah') is-invalid @enderror" placeholder="Alamat sekolah asal">{{ old('alamat_sekolah') }}</textarea>
                                @error('alamat_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">4. Pilihan Jurusan</div>
                    <div class="section-body">
                        <div class="row">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="col-md-4 form-group">
                                    <label>Pilihan Jurusan {{ $i }} *</label>
                                    <select name="pilihan_jurusan_{{ $i }}" class="custom-select form-control @error('pilihan_jurusan_' . $i) is-invalid @enderror">
                                        <option value="">- Pilih Jurusan -</option>
                                        @foreach($jurusanList as $jurusan)
                                            <option value="{{ $jurusan }}" {{ old('pilihan_jurusan_' . $i) == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                                        @endforeach
                                    </select>
                                    @error('pilihan_jurusan_' . $i) <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="section-card mb-4">
                    <div class="section-head">5. Upload Berkas</div>
                    <div class="section-body">
                        <p class="text-muted mb-3">Format file: JPG / PNG / PDF, maksimal 5MB per berkas.</p>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Pas foto *</label>
                                <input type="file" name="pas_foto" class="form-control-file @error('pas_foto') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                                @error('pas_foto') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Scan Kartu Keluarga (KK) *</label>
                                <input type="file" name="scan_kk" class="form-control-file @error('scan_kk') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                                @error('scan_kk') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Akta kelahiran *</label>
                                <input type="file" name="akta_kelahiran" class="form-control-file @error('akta_kelahiran') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                                @error('akta_kelahiran') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Ijazah / SKL *</label>
                                <input type="file" name="ijazah_skl" class="form-control-file @error('ijazah_skl') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                                @error('ijazah_skl') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Raport (Opsional)</label>
                                <input type="file" name="raport" class="form-control-file @error('raport') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                                @error('raport') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-4" style="border: 1px solid #dbe7f5; border-radius: 18px; box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div class="text-muted mb-3 mb-md-0">Periksa kembali semua data sebelum disimpan.</div>
                        <div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan Pendaftaran</button>
                            <a href="{{ route(Auth::user()->role == 'admin_ppdb' ? 'backend.pendaftaransantri.index' : 'backend.pendaftaran.form') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection