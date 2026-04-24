<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    //Run the migrations.
     
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no')->nullable();
            $table->string('id_pengumuman');
            $table->string('id_user');
            $table->string('tanggal_pengumuman');
            $table->string('judul_pengumuman');
            $table->string('isi_pengumuman');
            });
    }

    
    //Reverse the migrations.
     
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
