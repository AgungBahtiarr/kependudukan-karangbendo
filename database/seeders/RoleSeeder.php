<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $kaderRole = Role::create([
            'name' => 'Kader',
            'guard_name' => 'web'
        ]);

        $adminRole->givePermissionTo(
            'dashboard_access',
            'create_users',
            'read_users',
            'update_users',
            'update_user_status',
            'create_wargas',
            'read_wargas',
            'update_wargas',
            'update_warga_status',
            'logout',
        );

        $kaderRole->givePermissionTo(
            'dashboard_access',
            'create_wargas',
            'read_wargas',
            'update_wargas',
            'update_warga_status',
            'logout'
        );
    }
}
