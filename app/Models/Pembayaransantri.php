<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaransantri extends Model
{
    public $timestamps = false;
    protected $table = "Pembayaransantri";
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_pembayaran',
        'id_santri',
        'jenis_pembayaran',
        'tanggal_pembayaran',
        'nama_santri',
        'atas_nama',
        'nama_bank',
        'jumlah_pembayaran',
        'status_pembayaran',
    ];  
}
