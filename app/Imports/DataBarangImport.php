<?php

namespace App\Imports;

use App\Models\DataBarang;
use Maatwebsite\Excel\Concerns\ToModel;

class DataBarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row[3] == null) {
            $foto_barang = 'barang.png';
        } else {
            $foto_barang = $row[3];
        }

        return new DataBarang([
            'kode_barang' => $row[0],
            'nama_barang' => $row[1],
            'merk_barang' => $row[2],
            'foto_barang' => $row[3], // 'foto_barang' => 'barang.png
            'jumlah_barang' => $row[4],
            'tanggal_pembelian' => $row[5],
            'kondisi_barang' => $row[6],
            'keterangan' => $row[7],
        ]);
    }
}
