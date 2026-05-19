<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PendaftaranSantri;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $jurusans = [
            'Farmasi Klinis & Komunitas',
            'Asisten Keperawatan & Caregiver',
            'Teknik Komputer & Jaringan',
            'Teknik Sepeda Motor',
            'Teknik Kendaraan Ringan',
        ];

        $namaDepan = [
            'Ahmad', 'Budi', 'Citra', 'Dedi', 'Eka', 'Fajar', 'Gita', 'Hendra',
            'Ika', 'Joko', 'Kari', 'Lina', 'Meita', 'Nanda', 'Okta', 'Pardi',
            'Qori', 'Rina', 'Santi', 'Tommy', 'Umi', 'Vira', 'Widy', 'Xenia', 'Yanto'
        ];

        $namaBelakang = [
            'Rahman', 'Pratama', 'Wijaya', 'Kusuma', 'Mahendra', 'Santoso',
            'Suryanto', 'Hidayat', 'Gunawan', 'Hermawan', 'Hartono', 'Irawan'
        ];

        $sekolahAsal = [
            'SMP Negeri 1 Karawang', 'SMP Negeri 2 Karawang', 'SMP Negeri 3 Karawang',
            'SMP Swasta Al-Hikmah', 'SMP Swasta Muthia', 'SMP Muhamadiyah Karawang',
            'SMP Kristen Karawang', 'SMP Negeri 4 Karawang'
        ];

        $agamaList = ['Islam', 'Kristen Protestan', 'Kristen Katolik', 'Hinduisme', 'Budisme'];
        $pekerjaan = ['Petani', 'Buruh', 'Pedagang', 'Karyawan Swasta', 'PNS', 'Tidak Bekerja', 'Pengusaha'];
        $penghasilan = ['< 1 Juta', '1-2 Juta', '2-3 Juta', '3-5 Juta', '> 5 Juta'];

        $counter = 1;

        // Create 25 students per jurusan = 125 total
        foreach ($jurusans as $indexJurusan => $jurusan) {
            for ($i = 1; $i <= 25; $i++) {
                $namaSiswa = $namaDepan[array_rand($namaDepan)] . ' ' . $namaBelakang[array_rand($namaBelakang)];
                $nisn = sprintf('%010d', 1000000000 + $counter);
                $nik = sprintf('%016d', 1000000000000000 + $counter);
                $email = 'siswa' . $counter . '@ppdbsmk.test';
                $noHp = '0812' . sprintf('%08d', 10000000 + $counter);

                // Create user
                $user = User::updateOrCreate(
                    ['email' => $email],
                    [
                        'name' => $namaSiswa,
                        'password' => bcrypt('siswa123'),
                        'role' => 'pendaftar',
                        'phone' => $noHp,
                    ]
                );

                // Create pendaftaran
                $tglLahir = Carbon::createFromTimestamp(mt_rand(900000000, 1000000000));
                
                PendaftaranSantri::updateOrCreate(
                    ['id_santri' => 'PS-' . $counter . '-' . Str::upper(Str::random(4))],
                    [
                        'id_user' => $user->id,
                        'tgl_pendaftaran' => now()->format('Y-m-d'),
                        'nama_santri' => $namaSiswa,
                        'tempat_tanggal_lahir' => 'Karawang, ' . $tglLahir->format('Y-m-d'),
                        'tempat_lahir' => 'Karawang',
                        'tanggal_lahir' => $tglLahir->format('Y-m-d'),
                        'jenis_kelamin' => rand(0, 1) ? 'Laki-Laki' : 'Perempuan',
                        'agama' => $agamaList[array_rand($agamaList)],
                        'alamat_lengkap' => 'Jl. Merdeka No. ' . rand(1, 500) . ', Karawang',
                        'rt_rw' => rand(1, 10) . '/' . rand(1, 5),
                        'desa_kelurahan' => 'Kelurahan Karawang',
                        'kecamatan' => 'Kecamatan Karawang Timur',
                        'kota_kabupaten' => 'Karawang',
                        'provinsi' => 'Jawa Barat',
                        'kode_pos' => '41311',
                        'no_hp_siswa' => $noHp,
                        'email' => $email,
                        'no_nisn' => $nisn,
                        'no_nik' => $nik,
                        'no_telpon' => $noHp,

                        'nama_ayah' => 'Ayah dari ' . $namaSiswa,
                        'nik_ayah' => sprintf('%016d', 2000000000000000 + $counter),
                        'pekerjaan_ayah' => $pekerjaan[array_rand($pekerjaan)],
                        'penghasilan_ayah' => $penghasilan[array_rand($penghasilan)],

                        'nama_ibu' => 'Ibu dari ' . $namaSiswa,
                        'nik_ibu' => sprintf('%016d', 3000000000000000 + $counter),
                        'pekerjaan_ibu' => $pekerjaan[array_rand($pekerjaan)],
                        'penghasilan_ibu' => $penghasilan[array_rand($penghasilan)],

                        'nama_wali' => 'Wali dari ' . $namaSiswa,
                        'pekerjaan_wali' => $pekerjaan[array_rand($pekerjaan)],
                        'no_hp_wali' => '0813' . sprintf('%08d', 20000000 + $counter),

                        'nama_sekolah_asal' => $sekolahAsal[array_rand($sekolahAsal)],
                        'npsn' => sprintf('%08d', 20000000 + $counter),
                        'alamat_sekolah' => 'Jl. Pendidikan No. ' . rand(1, 100) . ', Karawang',
                        'tahun_lulus' => (int)date('Y') - rand(1, 3),

                        'pilihan_jurusan_1' => $jurusan,
                        'pilihan_jurusan_2' => $jurusans[(($indexJurusan + 1) % count($jurusans))],
                        'pilihan_jurusan_3' => $jurusans[(($indexJurusan + 2) % count($jurusans))],
                        'pilihan_jurusan_4' => $jurusans[(($indexJurusan + 3) % count($jurusans))],
                        'pilihan_jurusan_5' => $jurusans[(($indexJurusan + 4) % count($jurusans))],

                        'pas_foto' => 'dummy.jpg',
                        'scan_kk' => 'dummy.jpg',
                        'akta_kelahiran' => 'dummy.jpg',
                        'ijazah_skl' => 'dummy.jpg',
                        'raport' => 'dummy.jpg',
                    ]
                );

                $counter++;
            }
        }

        $this->command->info('✓ 125 siswa berhasil dibuat (25 per jurusan)');
    }
}