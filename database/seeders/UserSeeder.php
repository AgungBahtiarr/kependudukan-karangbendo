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

        $admin->assignRole('Admin');
    }
}
