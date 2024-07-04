<?php

namespace Database\Seeders;

use App\Models\MakananPokok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakananPokokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makananPokok = [
            'Beras',
            'Non beras'
        ];

        foreach ($makananPokok as $item) {
            MakananPokok::create([
                'nama_makanan_pokok' => $item
            ]);
        }
    }
}
