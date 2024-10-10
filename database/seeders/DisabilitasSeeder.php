<?php

namespace Database\Seeders;

use App\Models\Disabilitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisabilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisDisabilitas = ["Tunanetra", "Tunarungu", "Tunawicara", "Tunadaksa", "Tunagrahita", "Autisme"];

        foreach ($jenisDisabilitas as $item) {
            Disabilitas::create([
                'jenis_disabilitas' => $item
            ]);
        }
    }
}
