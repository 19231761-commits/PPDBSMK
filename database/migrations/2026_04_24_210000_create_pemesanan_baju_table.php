<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::dropIfExists('pemesanan_baju');

        Schema::create('pemesanan_baju', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 50);
            $table->string('nama_siswa', 120);
            $table->string('jurusan', 120);
            $table->string('ukuran_baju', 10);
            $table->unsignedTinyInteger('jumlah_pesanan');
            $table->string('warna_keterangan', 150)->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id_user')
                ->on('users')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanan_baju');
    }
};
