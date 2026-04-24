<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Pembayaransantri', function (Blueprint $table) {
            $table->string('status_pembayaran', 20)
                ->default('Belum Lunas')
                ->after('jumlah_pembayaran');
        });
    }

    public function down(): void
    {
        Schema::table('Pembayaransantri', function (Blueprint $table) {
            $table->dropColumn('status_pembayaran');
        });
    }
};
