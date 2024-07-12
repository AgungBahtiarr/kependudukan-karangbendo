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
            "name" => "Admin",
            "guard_name" => "web",
        ]);

        $kaderRole = Role::create([
            "name" => "Kader",
            "guard_name" => "web",
        ]);

        $adminRole->givePermissionTo(
            "dashboard_access",
            #user
            "create_users",
            "read_users",
            "update_users",
            "update_user_status",

            #warga
            "create_wargas",
            "read_wargas",
            "edit_wargas",
            "update_wargas",
            "update_warga_status",

            #dawis
            "create_dawis",
            "read_dawis",
            "edit_dawis",
            "update_dawis",
            "update_dawis_status",

            #cargas
            "create_cargas",
            "read_cargas",
            "edit_cargas",
            "update_cargas",
            "update_cargas_status",

            "logout"
        );

        $kaderRole->givePermissionTo(
            "dashboard_access",
            "create_wargas",
            "read_wargas",
            "update_wargas",
            "update_warga_status",
            "logout"
        );
    }
}
