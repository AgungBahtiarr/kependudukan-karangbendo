<?php

namespace Database\Seeders;

use App\Models\StatusPerkawinan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPerkawinanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            'Belum Kawin',
            'Kawin',
            'Cerai Hidup',
            'Cerai Mati'
        ];

        foreach ($status as $item) {
            StatusPerkawinan::create([
                'nama_status_kawin' => $item
            ]);
        }
    }
}
