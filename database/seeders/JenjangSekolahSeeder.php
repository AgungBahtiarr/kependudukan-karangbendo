<?php

namespace Database\Seeders;

use App\Models\JenjangSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenjangSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenjangSekolah = ["DO SD", "DO SMP", "DO SMA"];

        foreach ($jenjangSekolah as $item) {
            JenjangSekolah::create([
                'jenjang_sekolah' => $item
            ]);
        }
    }
}
