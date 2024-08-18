<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::create([
            'nik' => '1602205303040002',
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make(1234),
        ]);

        $kader = User::create([
            'nik' => '3510112909030002',
            'name' => 'Kader',
            'username' => 'kader',
            'password' => Hash::make(1234),
        ]);

        $pimpinan = User::create([
            'nik' => '3510112909030001',
            'name' => 'Pimpinan',
            'username' => 'pimpinan',
            'password' => Hash::make(1234),
        ]);

        $pimpinan->assignRole('Pimpinan');
        $kader->assignRole('Kader');
        $admin->assignRole('Admin');
    }
}
