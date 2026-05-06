<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create only admin and demo pendaftar users
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Sistem',
                'password' => bcrypt('admin123'),
                'role' => 'admin_ppdb',
                'phone' => '081234567890',
            ]
        );

        User::updateOrCreate(
            ['email' => 'pendaftar@gmail.com'],
            [
                'name' => 'Pendaftar Demo',
                'password' => bcrypt('12345'),
                'role' => 'pendaftar',
                'phone' => '081234567891',
            ]
        );
    }
}