<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('pemesanan_buku');

        Schema::create('pemesanan_buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan', 50)->unique();
            $table->string('user_id', 50)->index();
            $table->string('nama_siswa', 120);
            $table->string('jurusan', 120);
            $table->string('jenis_buku', 120);
            $table->string('semester_kelas', 120)->nullable();
            $table->unsignedSmallInteger('jumlah_buku');
            $table->unsignedInteger('total_estimasi')->default(0);
            $table->string('status_pesanan', 30)->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan_buku');
    }
};