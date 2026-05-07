<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananBuku extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_buku';

    protected $fillable = [
        'kode_pemesanan',
        'user_id',
        'nama_siswa',
        'jurusan',
        'jenis_buku',
        'semester_kelas',
        'jumlah_buku',
        'total_estimasi',
        'status_pesanan',
        'catatan',
    ];

    protected $casts = [
        'jumlah_buku' => 'integer',
        'total_estimasi' => 'integer',
    ];
}