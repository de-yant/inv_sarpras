<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    protected $table = 'data_barangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_barang',
        'tanggal_pembelian',
        'sumber_dana_id',
        'ruangan_id',
        'nama_barang',
        'merk_barang',
        'jenis_barang',
        'satuan_barang',
        'foto_barang',
        'jumlah_barang',
        'kondisi_barang',
        'status_barang',
        'keterangan',
    ];
    public $timestamps = false;

    public function ruangan()
    {
        return $this->belongsTo(DataRuangan::class, 'ruangan_id', 'id');
    }

    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana_id', 'id');
    }
}
