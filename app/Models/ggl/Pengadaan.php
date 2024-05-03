<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;
    protected $table = 'pengadaans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tgl_pengambilan',
        'nama_pengambil',
        'data_barang_id',
        'ruangan_id',
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
