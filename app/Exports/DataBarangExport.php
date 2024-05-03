<?php

namespace App\Exports;

use App\Models\DataBarang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataBarangExport implements FromQuery, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DataBarang::query();
    }

    public function map($data_barang): array
    {
        return [
            $data_barang->kode_barang,
            $data_barang->ruangan->nama_ruangan,
            $data_barang->nama_barang,
            $data_barang->merk_barang,
            $data_barang->jumlah_barang,
            $data_barang->tanggal_pembelian,
            $data_barang->sumber_dana->sumber_dana,
            $data_barang->kondisi_barang,
            $data_barang->status_barang,
            $data_barang->keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Ruangan',
            'Nama Barang',
            'Merk Barang',
            'Jumlah Barang',
            'Tanggal Pembelian',
            'Sumber Dana',
            'Kondisi Barang',
            'Status Barang',
            'Keterangan',
        ];
    }
}
