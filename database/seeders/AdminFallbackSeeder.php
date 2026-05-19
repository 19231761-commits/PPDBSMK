<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminFallbackSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Sistem',
                'password' => bcrypt('admin123'),
                'role' => 'admin_ppdb',
                'phone' => '081234567890',
            ]
        );

        $this->command->info('Admin fallback user ensured: admin@gmail.com / admin123');
    }
}
