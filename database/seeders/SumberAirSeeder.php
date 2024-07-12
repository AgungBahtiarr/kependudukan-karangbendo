<?php

namespace Database\Seeders;

use App\Models\SumberAir;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SumberAirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ["PDAM", "Sumur", "Sungai", "Lainnya"];

        foreach ($datas as $data) {
            SumberAir::create(['nama_sumber_air' => $data]);
        }
    }
}
