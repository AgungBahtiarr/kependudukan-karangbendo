<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            AgamaSeeder::class,
            StatusPerkawinanSeeder::class,
            PendidikanSeeder::class,
            PekerjaanSeeder::class,
            MakananPokokSeeder::class,
            KelompokBelajarSeeder::class,
            SumberAirSeeder::class,
            DisabilitasSeeder::class,
            JenjangSekolahSeeder::class
        ]);
    }
}
