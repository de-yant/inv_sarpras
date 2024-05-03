<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRuangan extends Model
{
    use HasFactory;
    protected $table = 'data_ruangans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_ruangan',
        'nama_ruangan',
        'sumber_dana_id',
        'kondisi_ruangan',
        'keterangan',
    ];
    public $timestamps = false;

    public function data_barang()
    {
        return $this->hasMany(DataBarang::class, 'ruangan_id', 'id');
    }

    public function sumber_dana()
    {
        return $this->belongsTo(SumberDana::class, 'sumber_dana_id', 'id');
    }

}
