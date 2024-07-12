<?php

namespace Database\Seeders;

use App\Models\KelompokBelajar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelompokBelajarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelompokBelajars = [
            'Paket A', 'Paket B', 'Paket C'
        ];

        foreach ($kelompokBelajars as $item) {
            KelompokBelajar::create(['nama_kelompok_belajar' => $item]);
        }
    }
}
