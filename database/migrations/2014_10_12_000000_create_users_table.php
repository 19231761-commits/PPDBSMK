<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user')->primary();
            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('role',['admin_ppdb','pendaftar'])->default('pendaftar');
            $table->boolean('status')->default(true); // default aktif
            $table->string('password');
            $table->string('hp', 13);
            $table->rememberToken(); // opsional, untuk login remember-me
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};