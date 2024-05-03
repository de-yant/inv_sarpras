<?php

namespace App\Exports;

use App\Models\SumberDana;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SumberDanaExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return SumberDana::query();
    }

    public function map($sumber_dana): array
    {
        return [
            $sumber_dana->sumber_dana,
            $sumber_dana->keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            'Sumber Dana',
            'Keterangan',
        ];
    }
}

