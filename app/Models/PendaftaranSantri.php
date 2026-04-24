<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSantri extends Model
{
    use HasFactory;

    protected $table = "pendaftaransantri";
    protected $primaryKey = 'id_santri';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_santri',
        'id_user',
        'tgl_pendaftaran',
        'nama_santri',
        'tempat_tanggal_lahir',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat_lengkap',
        'rt_rw',
        'desa_kelurahan',
        'kecamatan',
        'kota_kabupaten',
        'provinsi',
        'kode_pos',
        'no_hp_siswa',
        'email',
        'no_nisn',
        'no_nik',
        'no_telpon',
        'nama_ayah',
        'nik_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nama_wali',
        'pekerjaan_wali',
        'no_hp_wali',
        'nama_sekolah_asal',
        'npsn',
        'alamat_sekolah',
        'tahun_lulus',
        'pilihan_jurusan_1',
        'pilihan_jurusan_2',
        'pilihan_jurusan_3',
        'pilihan_jurusan_4',
        'pilihan_jurusan_5',
        'pas_foto',
        'scan_kk',
        'akta_kelahiran',
        'ijazah_skl',
        'raport',
    ];
}