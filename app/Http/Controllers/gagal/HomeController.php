<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataRuangan;
use App\Models\DataPinjaman;
use App\Models\Pengadaan;
use Dompdf\FrameDecorator\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_barang = DataBarang::where('nama_barang', 'LIKE', '%'.$request->cari.'%')->get();
        } else {
            $data_barang = DataBarang::orderBy('nama_barang', 'asc')->get();
        }

        return view('home.pinjam', [
            'title' => 'Pinjam Barang',
            'data_barang' => $data_barang->where('status_barang', 'Pinjaman'),
        ]);
    }

    public function create($id)
    {
        $data_barang = DataBarang::find($id);
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $data_pinjaman = DataPinjaman::with('data_barang','ruangan')->get();
        $tgl_pinjaman = date('D, d M Y');
        $waktu = date('H:i:s');
        $tgl_peminjaman = $tgl_pinjaman.' '.$waktu;
        $bts_pengembalian_date = date('D, d M Y', strtotime('+1 days', strtotime($tgl_peminjaman)));
        $bts_pengembalian = $bts_pengembalian_date.' '.$waktu;
        return view('home.create', [
            'title' => 'Pinjam Barang',
            'data_barang' => $data_barang,
            'tgl_peminjaman' => $tgl_peminjaman,
            'data_pinjaman' => $data_pinjaman,
            'ruangan' =>$ruangan,
            'bts_pengembalian' => $bts_pengembalian,
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'tgl_peminjaman' => 'required',
            'bts_pengembalian' => 'required',
            'nama_peminjam' => 'required',
            'no_tlp'    => 'required|numeric|digits_between:10,13|starts_with:+62,62,08,8',
            'data_barang_id' => 'required',
            'ruangan_id' => 'required',
            'jumlah' => 'required',
        ], messages: [
            'nama_peminjam.required' => 'Nama Peminjam tidak boleh kosong',
            'no_tlp.required' => 'No Telepon tidak boleh kosong',
            'no_tlp.numeric' => 'No Telepon harus berupa angka',
            'no_tlp.digits_between' => 'No Telepon harus berupa angka dan minimal 10 digit',
            'no_tlp.starts_with' => 'No Telepon harus diawali dengan +62 atau 62 atau 08 atau 8',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
        ]);

        $dt_jml = DataBarang::where('id', $request->data_barang_id)->first();
        if($request->jumlah > $dt_jml->jumlah_barang){
            return redirect()->back()->with('warning', 'Maaf, Jumlah barang yang diminta melebihi batas');
        }else{
            $jumlah = $request->jumlah;
        }


        DataPinjaman::create([
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'bts_pengembalian' => $request->bts_pengembalian,
            'nama_peminjam' => $request->nama_peminjam,
            'no_tlp' => $request->no_tlp,
            'data_barang_id' => $request->data_barang_id,
            'ruangan_id' => $request->ruangan_id,
            'jumlah' => $jumlah,
            'status' => 'Belum Diambil'
        ]);
        return redirect()->route('home')->with('info', 'Berhasil!!! Silahkan ambil barang di ruangan yang sudah ditentukan');
    }


    public function pengadaanbarang(Request $request)
    {
        if ($request->has('cari')) {
            $data_barang = DataBarang::where('nama_barang', 'LIKE', '%'.$request->cari.'%')->get();
        } else {
            $data_barang = DataBarang::orderBy('nama_barang', 'asc')->get();
        }

        return view('home.pengadaan', [
            'title' => 'Pengadaan Barang',
            'data_barang' => $data_barang->where('status_barang', 'Pengadaan'),
        ]);
    }

    public function pengadaanbarang_create($id){
        $data_barang = DataBarang::find($id);
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $data_pengadaan = DataPinjaman::with('data_barang','ruangan')->get();
        $tgl_pengambilan = date('D, d M Y');
        $waktu = date('H:i:s');
        $tgl_pengambilan = $tgl_pengambilan.' '.$waktu;
        return view('home.pengadaan-create', [
            'title' => 'Pengadaan Barang',
            'data_barang' => $data_barang,
            'tgl_pengambilan' => $tgl_pengambilan,
            'data_pengadaan' => $data_pengadaan,
            'ruangan' =>$ruangan,
        ]);
    }

    public function pengadaanbarang_store(Request $request)
    {
        $this->validate($request, [
            'tgl_pengambilan' => 'required',
            'nama_pengambil' => 'required',
            'data_barang_id' => 'required',
            'ruangan_id' => 'required',
            'jumlah' => 'required',
        ], messages: [
            'nama_pengambil.required' => 'Nama Pengambil tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
        ]);

        $dt_jml = DataBarang::where('id', $request->data_barang_id)->first();
        if($request->jumlah > $dt_jml->jumlah_barang){
            return redirect()->back()->with('warning', 'Maaf, Jumlah barang yang diminta melebihi batas');
        }else{
            $jumlah = $request->jumlah;
        }

        Pengadaan::create(
            [
                'tgl_pengambilan' => $request->tgl_pengambilan,
                'nama_pengambil' => $request->nama_pengambil,
                'data_barang_id' => $request->data_barang_id,
                'ruangan_id' => $request->ruangan_id,
                'jumlah' => $jumlah,
                'status' => 'Belum Diambil'
            ]
        );
        return redirect()->route('pengadaanbarang')->with('info', 'Berhasil!!! Silahkan ambil barang di ruangan yang sudah ditentukan');
    }
}
