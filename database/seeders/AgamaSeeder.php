<?php

namespace Database\Seeders;

use App\Models\Agama;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = [
            'Islam',
            'Kristen',
            'Katholik',
            'Hindu',
            'Budha',
            'Kong Hu Cu',
        ];

        foreach ($agama as $item) {
            Agama::create([
                'nama_agama' => $item
            ]);
        }
    }
}
