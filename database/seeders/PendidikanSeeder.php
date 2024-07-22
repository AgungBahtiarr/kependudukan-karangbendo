<?php

namespace Database\Seeders;

use App\Models\Pendidikan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendidikan = [
            'SD',
            'SMP',
            'SMA',
            'D3',
            'D4/S1',
            'S2',
            'S3'
        ];

        foreach ($pendidikan as $item) {
            Pendidikan::create([
                'nama_pendidikan' => $item
            ]);
        }
    }
}
