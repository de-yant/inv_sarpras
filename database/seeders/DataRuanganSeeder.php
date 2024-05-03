<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataRuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_ruangans')->insert(
            [
                'id' => 1,
                'kode_ruangan' => 'RNG-2021-0001',
                'nama_ruangan' => 'Kepala Sekolah',
                'sumber_dana_id' => 1,
                'kondisi_ruangan' => 'Baik',
                'keterangan' => '-',
            ]
        );
        DB::table('data_ruangans')->insert(
            [
                'id' => 2,
                'kode_ruangan' => 'RNG-2021-0002',
                'nama_ruangan' => 'Tata Usaha',
                'sumber_dana_id' => 1,
                'kondisi_ruangan' => 'Baik',
                'keterangan' => '-',
            ]
        );
        DB::table('data_ruangans')->insert(
            [
                'id' => 3,
                'kode_ruangan' => 'RNG-2021-0003',
                'nama_ruangan' => 'Sarana Prasarana',
                'sumber_dana_id' => 1,
                'kondisi_ruangan' => 'Baik',
                'keterangan' => '-',
            ]
        );
        DB::table('data_ruangans')->insert(
            [
                'id' => 4,
                'kode_ruangan' => 'RNG-2021-0004',
                'nama_ruangan' => 'Perpustakaan',
                'sumber_dana_id' => 1,
                'kondisi_ruangan' => 'Baik',
                'keterangan' => '-',
            ]
        );
    }
}
