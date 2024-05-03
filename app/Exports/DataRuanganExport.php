<?php

namespace App\Exports;

use App\Models\DataRuangan;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;


class DataRuanganExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DataRuangan::query();
    }

    public function map($data_ruangan): array
    {
        return [
            $data_ruangan->kode_ruangan,
            $data_ruangan->nama_ruangan,
            $data_ruangan->sumber_dana->sumber_dana,
            $data_ruangan->kondisi_ruangan,
            $data_ruangan->keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Ruangan',
            'Nama Ruangan',
            'Sumber Dana',
            'Kondisi Ruangan',
            'Keterangan',
        ];
    }
}
