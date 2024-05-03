<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPinjaman extends Model
{
    use HasFactory;
    protected $table = 'data_pinjamans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_peminjaman',
        'bts_pengembalian',
        'tgl_pengembalian',
        'nama_peminjam',
        'nama_pengambil',
        'nama_pengembali',
        'data_barang_id',
        'ruangan_id',
        'no_tlp',
        'jumlah',
        'status',
    ];


    public $timestamps = true;

    public function data_barang()
    {
        return $this->belongsTo(DataBarang::class, 'data_barang_id', 'id');
    }

    public function ruangan()
    {
        return $this->belongsTo(DataRuangan::class, 'ruangan_id', 'id');
    }
}
