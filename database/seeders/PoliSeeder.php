<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $poli = [
            ['nama_poli' => 'Poli Umum'],
            ['nama_poli' => 'Poli Gigi'],
            ['nama_poli' => 'Poli Anak'],
            ['nama_poli' => 'Poli Kandungan'],
            ['nama_poli' => 'Poli THT'],
            ['nama_poli' => 'Poli Mata'],
            ['nama_poli' => 'Poli Bedah'],
        ];

        foreach ($poli as $poli) {
            Poli::firstOrCreate(['nama_poli' => $poli['nama_poli']], $poli);
        }
    }
}
