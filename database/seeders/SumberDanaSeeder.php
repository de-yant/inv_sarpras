<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SumberDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sumber_danas')->insert([
            [
                'sumber_dana' => 'BOS Reguler',
                'keterangan' => 'Bantuan Operasional Sekolah',
            ],
            [
                'sumber_dana' => 'BOS Kinerja',
                'keterangan' => 'Bantuan Operasional Sekolah',
            ],
            [
                'sumber_dana' => 'SiLPA',
                'keterangan' => 'Sisa Lebih Perhitungan Anggaran',
            ],
            [
                'sumber_dana' => 'BOSDA',
                'keterangan' => 'Bantuan Operasional Sekolah Daerah',
            ],
        ]);
    }
}
