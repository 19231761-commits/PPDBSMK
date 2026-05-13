<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Pembayaransantri', function (Blueprint $table) {
            $table->string('jenis_kelamin', 20)->nullable()->after('nama_santri');
            $table->string('jurusan', 120)->nullable()->after('jenis_kelamin');
            $table->string('bukti_pembayaran')->nullable()->after('nama_bank');
        });
    }

    public function down(): void
    {
        Schema::table('Pembayaransantri', function (Blueprint $table) {
            $table->dropColumn(['jenis_kelamin', 'jurusan', 'bukti_pembayaran']);
        });
    }
};