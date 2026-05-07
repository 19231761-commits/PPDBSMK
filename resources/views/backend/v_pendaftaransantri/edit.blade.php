@extends('backend.v_layout.app')
@section('content')
<div class="container-fluid">
    <style>
        .ppdb-form-wrap .hero-card {
            background: linear-gradient(135deg, #0f172a 0%, #1d4ed8 55%, #0ea5e9 100%);
            color: #fff;
            border: 1px solid #dbe7ff;
            border-radius: 14px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.05);
            overflow: hidden;
        }

        .ppdb-form-wrap .hero-card .card-body {
            background: transparent;
        }

        .ppdb-form-wrap .hero-card .card-title,
        .ppdb-form-wrap .hero-card p,
        .ppdb-form-wrap .hero-card .badge {
            color: #fff !important;
        }

        .ppdb-form-wrap .help-text {
            color: rgba(255, 255, 255, 0.84);
        }

        .ppdb-form-wrap .section-card {
            border: 1px solid #dbe7ff;
            border-radius: 14px;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.05);
            margin-bottom: 18px;
        }

        .ppdb-form-wrap .section-head {
            background: linear-gradient(120deg, #e0f2fe, #ecfdf5);
            padding: 12px 16px;
            font-weight: 700;
            border-bottom: 1px solid #dbe7ff;
            border-radius: 14px 14px 0 0;
        }

        .ppdb-form-wrap .section-body {
            padding: 16px;
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

        $fileLinks = [
            'pas_foto' => 'Pas Foto',
            'scan_kk' => 'Scan KK',
            'akta_kelahiran' => 'Akta Kelahiran',
            'ijazah_skl' => 'Ijazah/SKL',
            'raport' => 'Raport',
        ];
    @endphp

    <div class="row">
        <div class="col-12 ppdb-form-wrap form-two-col">
            <form action="{{ route('backend.pendaftaransantri.update', $edit->id_santri) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="card hero-card mb-4">
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <div class="text-uppercase mb-2" style="letter-spacing: 0.06em; font-size: 12px; color: rgba(255,255,255,0.78); font-weight: 800;">Selamat datang di halaman edit pendaftaran</div>
                            <h4 class="card-title mb-2">{{ $judul }}</h4>
                            <p class="mb-0 help-text">Perbarui data pendaftaran siswa dengan informasi terbaru dan lengkap.</p>
                        </div>
                        <span class="badge bg-info text-white p-2">ID: {{ $edit->id_santri }}</span>
                    </div>
                </div>

                <div class="section-card">
                    <div class="section-head">1. Data Diri</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-6 form-group"><label>ID Siswa</label><input type="text" name="id_santri" value="{{ old('id_santri', $edit->id_santri) }}" class="form-control @error('id_santri') is-invalid @enderror">@error('id_santri') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Tanggal pendaftaran</label><input type="date" name="tgl_pendaftaran" value="{{ old('tgl_pendaftaran', $edit->tgl_pendaftaran) }}" class="form-control @error('tgl_pendaftaran') is-invalid @enderror">@error('tgl_pendaftaran') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Nama lengkap</label><input type="text" name="nama_santri" value="{{ old('nama_santri', $edit->nama_santri) }}" class="form-control @error('nama_santri') is-invalid @enderror">@error('nama_santri') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-md-6 form-group"><label>NISN</label><input type="text" name="no_nisn" value="{{ old('no_nisn', $edit->no_nisn) }}" class="form-control @error('no_nisn') is-invalid @enderror">@error('no_nisn') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>NIK (Opsional)</label><input type="text" name="no_nik" value="{{ old('no_nik', $edit->no_nik) }}" class="form-control @error('no_nik') is-invalid @enderror">@error('no_nik') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Tempat lahir</label><input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $edit->tempat_lahir) }}" class="form-control @error('tempat_lahir') is-invalid @enderror">@error('tempat_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Tanggal lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $edit->tanggal_lahir) }}" class="form-control @error('tanggal_lahir') is-invalid @enderror">@error('tanggal_lahir') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-md-6 form-group"><label>Jenis kelamin</label>
                                <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value="Laki-Laki" {{ old('jenis_kelamin', $edit->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $edit->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6 form-group"><label>Agama</label><input type="text" name="agama" value="{{ old('agama', $edit->agama) }}" class="form-control @error('agama') is-invalid @enderror">@error('agama') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>No HP siswa</label><input type="text" name="no_hp_siswa" value="{{ old('no_hp_siswa', $edit->no_hp_siswa) }}" class="form-control @error('no_hp_siswa') is-invalid @enderror">@error('no_hp_siswa') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Email</label><input type="email" name="email" value="{{ old('email', $edit->email) }}" class="form-control @error('email') is-invalid @enderror">@error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-md-12 form-group form-span-2"><label>Alamat lengkap</label><textarea name="alamat_lengkap" rows="2" class="form-control @error('alamat_lengkap') is-invalid @enderror">{{ old('alamat_lengkap', $edit->alamat_lengkap) }}</textarea>@error('alamat_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>RT/RW</label><input type="text" name="rt_rw" value="{{ old('rt_rw', $edit->rt_rw) }}" class="form-control @error('rt_rw') is-invalid @enderror">@error('rt_rw') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Desa/Kelurahan</label><input type="text" name="desa_kelurahan" value="{{ old('desa_kelurahan', $edit->desa_kelurahan) }}" class="form-control @error('desa_kelurahan') is-invalid @enderror">@error('desa_kelurahan') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Kecamatan</label><input type="text" name="kecamatan" value="{{ old('kecamatan', $edit->kecamatan) }}" class="form-control @error('kecamatan') is-invalid @enderror">@error('kecamatan') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Kota/Kabupaten</label><input type="text" name="kota_kabupaten" value="{{ old('kota_kabupaten', $edit->kota_kabupaten) }}" class="form-control @error('kota_kabupaten') is-invalid @enderror">@error('kota_kabupaten') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Provinsi</label><input type="text" name="provinsi" value="{{ old('provinsi', $edit->provinsi) }}" class="form-control @error('provinsi') is-invalid @enderror">@error('provinsi') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Kode pos</label><input type="text" name="kode_pos" value="{{ old('kode_pos', $edit->kode_pos) }}" class="form-control @error('kode_pos') is-invalid @enderror">@error('kode_pos') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <div class="section-head">2. Data Orang Tua / Wali</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-6 form-group"><label>Nama ayah</label><input type="text" name="nama_ayah" value="{{ old('nama_ayah', $edit->nama_ayah) }}" class="form-control @error('nama_ayah') is-invalid @enderror">@error('nama_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>NIK ayah</label><input type="text" name="nik_ayah" value="{{ old('nik_ayah', $edit->nik_ayah) }}" class="form-control @error('nik_ayah') is-invalid @enderror">@error('nik_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Pekerjaan ayah</label><input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $edit->pekerjaan_ayah) }}" class="form-control @error('pekerjaan_ayah') is-invalid @enderror">@error('pekerjaan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Penghasilan ayah</label><input type="text" name="penghasilan_ayah" value="{{ old('penghasilan_ayah', $edit->penghasilan_ayah) }}" class="form-control @error('penghasilan_ayah') is-invalid @enderror">@error('penghasilan_ayah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-md-6 form-group"><label>Nama ibu</label><input type="text" name="nama_ibu" value="{{ old('nama_ibu', $edit->nama_ibu) }}" class="form-control @error('nama_ibu') is-invalid @enderror">@error('nama_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>NIK ibu</label><input type="text" name="nik_ibu" value="{{ old('nik_ibu', $edit->nik_ibu) }}" class="form-control @error('nik_ibu') is-invalid @enderror">@error('nik_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Pekerjaan ibu</label><input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $edit->pekerjaan_ibu) }}" class="form-control @error('pekerjaan_ibu') is-invalid @enderror">@error('pekerjaan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Penghasilan ibu</label><input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu', $edit->penghasilan_ibu) }}" class="form-control @error('penghasilan_ibu') is-invalid @enderror">@error('penghasilan_ibu') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>

                            <div class="col-md-6 form-group"><label>Nama wali</label><input type="text" name="nama_wali" value="{{ old('nama_wali', $edit->nama_wali) }}" class="form-control @error('nama_wali') is-invalid @enderror">@error('nama_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Pekerjaan wali</label><input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali', $edit->pekerjaan_wali) }}" class="form-control @error('pekerjaan_wali') is-invalid @enderror">@error('pekerjaan_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>No HP wali</label><input type="text" name="no_hp_wali" value="{{ old('no_hp_wali', $edit->no_hp_wali) }}" class="form-control @error('no_hp_wali') is-invalid @enderror">@error('no_hp_wali') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <div class="section-head">3. Data Sekolah Asal</div>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-md-6 form-group"><label>Nama sekolah asal</label><input type="text" name="nama_sekolah_asal" value="{{ old('nama_sekolah_asal', $edit->nama_sekolah_asal) }}" class="form-control @error('nama_sekolah_asal') is-invalid @enderror">@error('nama_sekolah_asal') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>NPSN</label><input type="text" name="npsn" value="{{ old('npsn', $edit->npsn) }}" class="form-control @error('npsn') is-invalid @enderror">@error('npsn') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-6 form-group"><label>Tahun lulus</label><input type="text" name="tahun_lulus" value="{{ old('tahun_lulus', $edit->tahun_lulus) }}" class="form-control @error('tahun_lulus') is-invalid @enderror">@error('tahun_lulus') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                            <div class="col-md-12 form-group form-span-2"><label>Alamat sekolah</label><textarea name="alamat_sekolah" rows="2" class="form-control @error('alamat_sekolah') is-invalid @enderror">{{ old('alamat_sekolah', $edit->alamat_sekolah) }}</textarea>@error('alamat_sekolah') <div class="invalid-feedback">{{ $message }}</div> @enderror</div>
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <div class="section-head">5. Pilihan Jurusan</div>
                    <div class="section-body">
                        <div class="row">
                            @for($i = 1; $i <= 5; $i++)
                                <div class="col-md-6 form-group">
                                    <label>Pilihan Jurusan {{ $i }}</label>
                                    <select name="pilihan_jurusan_{{ $i }}" class="form-control @error('pilihan_jurusan_' . $i) is-invalid @enderror">
                                        <option value="">- Pilih Jurusan -</option>
                                        @foreach($jurusanList as $jurusan)
                                            <option value="{{ $jurusan }}" {{ old('pilihan_jurusan_' . $i, data_get($edit, 'pilihan_jurusan_' . $i)) == $jurusan ? 'selected' : '' }}>{{ $jurusan }}</option>
                                        @endforeach
                                    </select>
                                    @error('pilihan_jurusan_' . $i) <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="section-card">
                    <div class="section-head">6. Upload Berkas</div>
                    <div class="section-body">
                        <p class="text-muted">Upload file baru jika ingin mengganti berkas lama. Format: JPG/PNG/PDF, maksimal 5MB.</p>
                        <div class="row">
                            @foreach($fileLinks as $field => $label)
                                <div class="col-md-6 form-group">
                                    <label>{{ $label }}</label>
                                    <input type="file" name="{{ $field }}" class="form-control-file @error($field) is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">
                                    @if(!empty($edit->$field))
                                        <div class="mt-1"><a href="{{ asset($edit->$field) }}" target="_blank">Lihat file saat ini</a></div>
                                    @endif
                                    @error($field) <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Perbarui Data</button>
                        <a href="{{ route('backend.pendaftaransantri.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
