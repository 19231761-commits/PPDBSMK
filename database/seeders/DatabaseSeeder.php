<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create only admin and demo pendaftar users
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin_ppdb',
            'phone' => '081234567890',
        ]);

        User::create([
            'name' => 'Pendaftar Demo',
            'email' => 'pendaftar@gmail.com',
            'password' => bcrypt('12345'),
            'role' => 'pendaftar',
            'phone' => '081234567891',
        ]);
    }
}