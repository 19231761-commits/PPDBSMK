<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemesanan_buku', function (Blueprint $table) {
            $table->string('jenis_kelamin', 20)->after('nama_siswa');
        });
    }

    public function down(): void
    {
        Schema::table('pemesanan_buku', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }
};