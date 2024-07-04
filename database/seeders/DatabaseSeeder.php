<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'username' => 'admin',
            'password' => bcrypt(1),
            'nik' => '3510112909030002',
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        $user->assignRole('admin');
    }
}
