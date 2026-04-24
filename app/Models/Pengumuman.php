<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    public $timestamps = true;
    protected $table = "Pengumuman";
    protected $fillable = [
        'id_pengumuman',
        'id_user',
        'tanggal_pengumuman',
        'judul_pengumuman',
        'isi_pengumuman' ,
    ];
}