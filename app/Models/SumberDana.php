<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SumberDana extends Model
{
    use HasFactory;
    protected $table = 'sumber_danas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sumber_dana',
        'keterangan'
    ];
    public $timestamps = false;

    public function data_barang()
    {
        return $this->hasMany(DataBarang::class, 'sumber_dana_id', 'id');
    }

    public function data_ruangan()
    {
        return $this->hasMany(DataRuangan::class, 'sumber_dana_id', 'id');
    }
}
