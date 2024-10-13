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

        $pimpinanRole = Role::create([
            "name" => "Pimpinan",
            "guard_name" => "web"
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
            "delete_wargas",

            #kematian
            "create_kematians",
            "read_kematians",
            "edit_kematians",
            "update_kematians",
            "update_kematians_status",
            "delete_kematians",

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
            "delete_cargas",

            #pekarangans
            "create_pekarangans",
            "read_pekarangans",
            "edit_pekarangans",
            "update_pekarangans",
            "update_pekarangans_status",

            #industri
            "create_industries",
            "read_industries",
            "edit_industries",
            "update_industries",
            "update_industries_status",

            #bansos
            "create_bansos",
            "read_bansos",
            "edit_bansos",
            "update_bansos",
            "update_bansos_status",
            "delete_bansos",

            #laporan
            "create_laporan",
            "read_laporan",
            "edit_laporan",
            "update_laporan",
            "delete_laporan",


            "logout"
        );

        $kaderRole->givePermissionTo(
            'dashboard_access',
            #warga
            "create_wargas",
            "read_wargas",
            "edit_wargas",
            "update_wargas",
            "update_warga_status",
            "delete_wargas",

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
            "delete_cargas",

            #pekarangans
            "create_pekarangans",
            "read_pekarangans",
            "edit_pekarangans",
            "update_pekarangans",
            "update_pekarangans_status",

            #industri
            "create_industries",
            "read_industries",
            "edit_industries",
            "update_industries",
            "update_industries_status",

            // #bansos
            // "create_bansos",
            // "read_bansos",
            // "edit_bansos",
            // "update_bansos",
            // "update_bansos_status",

            "logout"
        );


        $pimpinanRole->givePermissionTo(
            "dashboard_access",
            #user
            "read_users",

            #warga
            "read_wargas",

            #kematian
            "read_kematians",

            #dawis
            "read_dawis",

            #cargas
            "read_cargas",

            #pekarangans
            "read_pekarangans",

            #industri
            "read_industries",

            #bansos
            "read_bansos",

            #laporan
            "read_laporan",

            #kematian
            "read_kematians",

            "logout"
        );
    }
}
