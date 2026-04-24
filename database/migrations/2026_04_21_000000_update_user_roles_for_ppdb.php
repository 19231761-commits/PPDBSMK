<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('users')->where('role', 'admin')->update(['role' => 'admin_ppdb']);
        DB::table('users')->where('role', 'pemilik')->update(['role' => 'pendaftar']);

        DB::statement("ALTER TABLE users MODIFY role ENUM('admin_ppdb','pendaftar') NOT NULL DEFAULT 'pendaftar'");
    }

    public function down(): void
    {
        DB::table('users')->where('role', 'admin_ppdb')->update(['role' => 'admin']);
        DB::table('users')->where('role', 'pendaftar')->update(['role' => 'pemilik']);

        DB::statement("ALTER TABLE users MODIFY role ENUM('admin','pemilik') NOT NULL DEFAULT 'pemilik'");
    }
};