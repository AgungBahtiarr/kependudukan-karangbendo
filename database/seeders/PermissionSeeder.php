<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            # Dashboard permissions
            "dashboard_access",
            # User permission
            "create_users",
            "read_users",
            "update_users",
            "update_user_status",
            # Warga permission
            "create_wargas",
            "read_wargas",
            "edit_wargas",
            "update_wargas",
            "update_warga_status",
            #KeikutsertaanDawis
            "create_dawis",
            "read_dawis",
            "edit_dawis",
            "update_dawis",
            "update_dawis_status",
            #catatan_rumah_tangga
            "create_cargas",
            "read_cargas",
            "edit_cargas",
            "update_cargas",
            "update_cargas_status",
            # Logout
            "logout",
        ];

        $this->insertPermission($permissions);
    }

    private function insertPermission(array $permissions): void
    {
        $permissions = collect($permissions)->map(
            fn($permission) => [
                "name" => $permission,
                "guard_name" => "web",
                "created_at" => Carbon::now(),
            ]
        );

        Permission::insert($permissions->toArray());
    }
}
