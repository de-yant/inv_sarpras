<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataRuangan;
use App\Models\DataBarang;
use App\Models\SumberDana;

class DashboardController extends Controller
{
    public function index()
    {
        $total_ruangan = DataRuangan::count();
        $total_barang = DataBarang::count();
        $total_sumber_dana = SumberDana::count();

        return view('dashboard/index',[
            'title' => 'Dashboard',
            'total_ruangan' => $total_ruangan,
            'total_barang' => $total_barang,
            'total_sumber_dana' => $total_sumber_dana

        ]);
    }
}
