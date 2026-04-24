<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
     //Run the migrations.
     
    public function up(): void
    {
        Schema::create('pendaftaransantri', function (Blueprint $table) {
            //$table->bigIncrements('id'); // primary key auto increment
            $table->string('id_santri')->primary(); // bukan primary key, hanya unique
            $table->string('id_user');
            $table->string('tgl_pendaftaran');
            $table->string('nama_santri');
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('no_nisn')->nullable();
            $table->string('no_nik')->nullable();
            $table->string('no_telpon')->nullable();
            $table->timestamps();
        });
    }

    
    //Reverse the migrations.
     
    public function down(): void
    {
        Schema::dropIfExists('pendaftaransantri');
    }
};
