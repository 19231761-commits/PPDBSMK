<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananBaju extends Model
{
    use HasFactory;

    protected $table = 'pemesanan_baju';

    protected $fillable = [
        'user_id',
        'nama_siswa',
        'jurusan',
        'ukuran_baju',
        'jumlah_pesanan',
        'warna_keterangan',
        'catatan',
    ];
}
