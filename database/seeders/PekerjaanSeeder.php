<?php

namespace Database\Seeders;

use App\Models\Pekerjaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pekerjaan = [
            'Pegawai Negeri Sipil',
            'Pegawai Swasta',
            'Pelayan',
            'Karyawan',
            'Lainnya'
        ];

        foreach ($pekerjaan as $item) {
            Pekerjaan::create([
                'nama_pekerjaan' => $item
            ]);
        }
    }
}
