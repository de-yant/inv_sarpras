<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\DataBarang;
use App\Models\DataRuangan;
use App\Exports\PengadaanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\App;

class PengadaanController extends Controller
{
    public function index(Request $request)
    {
        $data_pengadaan = Pengadaan::with('ruangan', 'data_barang')->get();
        if ($request->has('cari')) {
            $data_pengadaan = Pengadaan::where('nama_pengambil', 'LIKE', '%' . $request->cari . '%')->orWhereHas('data_barang', function ($query) use ($request) {
                $query->where('nama_barang', 'LIKE', '%' . $request->cari . '%');
            })->paginate(10);
        } else {
            $data_pengadaan = Pengadaan::orderBy('tgl_pengambilan', 'desc')->paginate(10);
        }

        $entries = [10, 25, 50, 100];
        if ($request->has('show')) {
            if (in_array($request->show, $entries)) {
                $data_pengadaan = Pengadaan::paginate($request->show);
            }
        }

        return view('pengadaan.index', [
            'title' => 'Pengadaan',
            'data_pengadaan' => $data_pengadaan,
        ]);
    }

    public function show($id)
    {
        $data_pengadaan = Pengadaan::findOrFail($id);
        return view('pengadaan.show', [
            'title' => 'Detail Pengadaan',
            'data_pengadaan' => $data_pengadaan,
        ]);
    }

    public function create()
    {
        $data_brg = DataBarang::all();
        $data_barang = $data_brg->where('status_barang', 'Pengadaan');
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $data_pengadaan = Pengadaan::with('data_barang', 'ruangan')->get();
        $date = date('D, d M Y');
        $waktu = date('H:i:s');
        $tgl_pengambilan = $date . ' ' . $waktu;
        return view('pengadaan.create', [
            'title' => 'Tambah Pengadaan',
            'tgl_pengambilan' => $tgl_pengambilan,
            'data_pengadaan' => $data_pengadaan,
            'data_barang' => $data_barang,
            'ruangan' => $ruangan,
        ]);
    }

    public function store(Request $request)
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
            'data_barang_id.required' => 'Barang tidak boleh kosong',
        ]);

        $dt_jumlah = DataBarang::where('id', $request->data_barang_id)->first();
        if ($request->jumlah > $dt_jumlah->jumlah_barang) {
            return redirect()->back()->with('warning', 'Maaf, Jumlah jumlah barang yang diminta melebihi batas');
        }
        $jumlah = $dt_jumlah->jumlah_barang;
        $jumlah_pengambilan = $request->jumlah;
        $sisa = $jumlah - $jumlah_pengambilan;

        DataBarang::where('id', $request->data_barang_id)
            ->update([
                'jumlah_barang' => $sisa,
            ]);

        Pengadaan::create([
            'tgl_pengambilan' => $request->tgl_pengambilan,
            'nama_pengambil' => $request->nama_pengambil,
            'data_barang_id' => $request->data_barang_id,
            'ruangan_id' => $request->ruangan_id,
            'jumlah' => $request->jumlah,
            'status' => 'Sudah Diambil',
        ]);

        return redirect('/pengadaan')->with('info', 'Data Pengadaan Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $data_pengadaan = Pengadaan::findOrFail($id);
        $data_brg = DataBarang::all();
        $data_barang = $data_brg->where('status_barang', 'Pengadaan');
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        return view('pengadaan.edit', [
            'title' => 'Edit Data Pengadaan',
            'data_pengadaan' => $data_pengadaan,
            'data_barang' => $data_barang,
            'ruangan' => $ruangan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl_pengambilan' => 'required',
            'nama_pengambil' => 'required',
            'data_barang_id' => 'required',
            'ruangan_id' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
        ], messages: [
            'nama_pengambil.required' => 'Nama Pengambil tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
            'data_barang_id.required' => 'Barang tidak boleh kosong',
            'status.required'=> 'Status tidak boleh kosong',
        ]);

        if ($request->status == 'Sudah Diambil') {
            $dt_jumlah = DataBarang::where('id', $request->data_barang_id)->first();
            $jumlah = $dt_jumlah->jumlah_barang;
            $jumlah_pengambilan = $request->jumlah;
            $sisa = $jumlah - $jumlah_pengambilan;

            DataBarang::where('id', $request->data_barang_id)
                ->update([
                    'jumlah_barang' => $sisa,
                ]);
        }

        Pengadaan::where('id', $id)
            ->update([
                'tgl_pengambilan' => $request->tgl_pengambilan,
                'nama_pengambil' => $request->nama_pengambil,
                'data_barang_id' => $request->data_barang_id,
                'ruangan_id' => $request->ruangan_id,
                'jumlah' => $request->jumlah,
                'status' => $request->status,
            ]);

        return redirect('/pengadaan')->with('warning', 'Data Pengadaan Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $data_pengadaan = Pengadaan::findOrFail($id);
        $data_pengadaan->delete();
        return redirect('/pengadaan')->with('danger', 'Data Pengadaan Berhasil Dihapus!');
    }

    public function exportexcel(){
        return Excel::download(new PengadaanExport, 'Data_Pengadaan.xlsx');
    }

    public function exportpdf()
    {
        $data_pengadaan = Pengadaan::limit(50)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('pengadaan.pengadaan-pdf', compact('data_pengadaan'));
        return $pdf->stream('laporan_pengadaan.pdf');
    }
}
