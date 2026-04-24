<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $columns = [
            'tempat_lahir' => fn (Blueprint $table) => $table->string('tempat_lahir')->nullable()->after('tempat_tanggal_lahir'),
            'tanggal_lahir' => fn (Blueprint $table) => $table->date('tanggal_lahir')->nullable()->after('tempat_lahir'),
            'agama' => fn (Blueprint $table) => $table->string('agama')->nullable()->after('jenis_kelamin'),
            'alamat_lengkap' => fn (Blueprint $table) => $table->text('alamat_lengkap')->nullable()->after('agama'),
            'rt_rw' => fn (Blueprint $table) => $table->string('rt_rw')->nullable()->after('alamat_lengkap'),
            'desa_kelurahan' => fn (Blueprint $table) => $table->string('desa_kelurahan')->nullable()->after('rt_rw'),
            'kecamatan' => fn (Blueprint $table) => $table->string('kecamatan')->nullable()->after('desa_kelurahan'),
            'kota_kabupaten' => fn (Blueprint $table) => $table->string('kota_kabupaten')->nullable()->after('kecamatan'),
            'provinsi' => fn (Blueprint $table) => $table->string('provinsi')->nullable()->after('kota_kabupaten'),
            'kode_pos' => fn (Blueprint $table) => $table->string('kode_pos')->nullable()->after('provinsi'),
            'no_hp_siswa' => fn (Blueprint $table) => $table->string('no_hp_siswa')->nullable()->after('kode_pos'),
            'email' => fn (Blueprint $table) => $table->string('email')->nullable()->after('no_hp_siswa'),
            'nama_ayah' => fn (Blueprint $table) => $table->string('nama_ayah')->nullable()->after('email'),
            'nik_ayah' => fn (Blueprint $table) => $table->string('nik_ayah')->nullable()->after('nama_ayah'),
            'pekerjaan_ayah' => fn (Blueprint $table) => $table->string('pekerjaan_ayah')->nullable()->after('nik_ayah'),
            'penghasilan_ayah' => fn (Blueprint $table) => $table->string('penghasilan_ayah')->nullable()->after('pekerjaan_ayah'),
            'nama_ibu' => fn (Blueprint $table) => $table->string('nama_ibu')->nullable()->after('penghasilan_ayah'),
            'nik_ibu' => fn (Blueprint $table) => $table->string('nik_ibu')->nullable()->after('nama_ibu'),
            'pekerjaan_ibu' => fn (Blueprint $table) => $table->string('pekerjaan_ibu')->nullable()->after('nik_ibu'),
            'penghasilan_ibu' => fn (Blueprint $table) => $table->string('penghasilan_ibu')->nullable()->after('pekerjaan_ibu'),
            'nama_wali' => fn (Blueprint $table) => $table->string('nama_wali')->nullable()->after('penghasilan_ibu'),
            'pekerjaan_wali' => fn (Blueprint $table) => $table->string('pekerjaan_wali')->nullable()->after('nama_wali'),
            'no_hp_wali' => fn (Blueprint $table) => $table->string('no_hp_wali')->nullable()->after('pekerjaan_wali'),
            'nama_sekolah_asal' => fn (Blueprint $table) => $table->string('nama_sekolah_asal')->nullable()->after('no_hp_wali'),
            'npsn' => fn (Blueprint $table) => $table->string('npsn')->nullable()->after('nama_sekolah_asal'),
            'alamat_sekolah' => fn (Blueprint $table) => $table->text('alamat_sekolah')->nullable()->after('npsn'),
            'tahun_lulus' => fn (Blueprint $table) => $table->string('tahun_lulus')->nullable()->after('alamat_sekolah'),
            'pilihan_jurusan_1' => fn (Blueprint $table) => $table->string('pilihan_jurusan_1')->nullable()->after('tahun_lulus'),
            'pilihan_jurusan_2' => fn (Blueprint $table) => $table->string('pilihan_jurusan_2')->nullable()->after('pilihan_jurusan_1'),
            'pilihan_jurusan_3' => fn (Blueprint $table) => $table->string('pilihan_jurusan_3')->nullable()->after('pilihan_jurusan_2'),
            'pilihan_jurusan_4' => fn (Blueprint $table) => $table->string('pilihan_jurusan_4')->nullable()->after('pilihan_jurusan_3'),
            'pilihan_jurusan_5' => fn (Blueprint $table) => $table->string('pilihan_jurusan_5')->nullable()->after('pilihan_jurusan_4'),
            'pas_foto' => fn (Blueprint $table) => $table->string('pas_foto')->nullable()->after('pilihan_jurusan_5'),
            'scan_kk' => fn (Blueprint $table) => $table->string('scan_kk')->nullable()->after('pas_foto'),
            'akta_kelahiran' => fn (Blueprint $table) => $table->string('akta_kelahiran')->nullable()->after('scan_kk'),
            'ijazah_skl' => fn (Blueprint $table) => $table->string('ijazah_skl')->nullable()->after('akta_kelahiran'),
            'raport' => fn (Blueprint $table) => $table->string('raport')->nullable()->after('ijazah_skl'),
        ];

        foreach ($columns as $column => $definition) {
            if (!Schema::hasColumn('pendaftaransantri', $column)) {
                Schema::table('pendaftaransantri', function (Blueprint $table) use ($definition) {
                    $definition($table);
                });
            }
        }
    }

    public function down(): void
    {
        $columns = [
            'tempat_lahir',
            'tanggal_lahir',
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

        foreach ($columns as $column) {
            if (Schema::hasColumn('pendaftaransantri', $column)) {
                Schema::table('pendaftaransantri', function (Blueprint $table) use ($column) {
                    $table->dropColumn($column);
                });
            }
        }
    }
};
