<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use App\Models\DataRuangan;
use Illuminate\Http\Request;
use App\Exports\DataRuanganExport;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class DataRuanganController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_ruangan = DataRuangan::where('nama_ruangan', 'LIKE', '%'.$request->cari.'%')->paginate(10);
        } else {
            $data_ruangan = DataRuangan::paginate(10);
        }

        $entries = [10, 25, 50, 100];
        if ($request->has('show')) {
            if (in_array($request->show, $entries)) {
                $data_ruangan = DataRuangan::paginate($request->show);
            }
        }

        return view('data_ruangan.index', [
            'title' => 'Data Ruangan',
            'data_ruangan' => $data_ruangan,
        ]);
    }

    public function create()
    {
        $sumber_dana = SumberDana::orderBy('sumber_dana', 'asc')->get();
        $dataruangan = DataRuangan::orderBy('kode_ruangan', 'desc')->first();
        $kode_ruangan = 'RNG';
        $kode_tahun = date('Y');
        if ($dataruangan == null) {
            $kode_urut = '0001';
        } else {
            $explode = explode("-", $dataruangan->kode_ruangan);
            $kode_urut = intval($explode[2])+1;
            $kode_urut = str_pad($kode_urut, 4, '0', STR_PAD_LEFT);
        }
        $kode_ruangan = "$kode_ruangan-$kode_tahun-$kode_urut";
        return view('data_ruangan.create', [
            'title' => 'Tambah Data Ruangan',
            'kode_ruangan' => $kode_ruangan,
            'sumber_dana' => $sumber_dana,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required',
            'sumber_dana_id' => 'required',
            'kondisi_ruangan' => 'required',
        ], messages:[
            'nama_ruangan.required' => 'Nama Ruangan harus diisi',
            'sumber_dana_id.required' => 'Sumber Dana harus diisi',
            'kondisi_ruangan.required' => 'Kondisi Ruangan harus diisi',
        ]);

        DataRuangan::create([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'sumber_dana_id' => $request->sumber_dana_id,
            'kondisi_ruangan' => $request->kondisi_ruangan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('dataruangan')->with('info', 'Data Ruangan Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $dataruangan = DataRuangan::find($id);
        $sumber_dana = SumberDana::orderBy('sumber_dana', 'asc')->get();
        return view('data_ruangan.edit', [
            'title' => 'Edit Data Ruangan',
            'dataruangan' => $dataruangan,
            'sumber_dana' => $sumber_dana
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_ruangan' => 'required',
            'nama_ruangan' => 'required',
            'sumber_dana_id' => 'required',
            'kondisi_ruangan' => 'required',
        ], messages:[
            'nama_ruangan.required' => 'Nama Ruangan harus diisi',
        ]);

        $dataruangan = DataRuangan::find($id);
        $dataruangan->update([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan,
            'sumber_dana_id' => $request->sumber_dana_id,
            'kondisi_ruangan' => $request->kondisi_ruangan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('dataruangan')->with('warning', 'Data Ruangan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $dataruangan = DataRuangan::find($id);
        $dataruangan->delete();

        return redirect()->route('dataruangan')->with('danger', 'Data Ruangan Berhasil Dihapus');
    }

    public function exportexcel()
    {
        return Excel::download(new DataRuanganExport, 'Data Ruangan.xlsx');
    }

    public function exportpdf()
    {
        $data_ruangan = DataRuangan::orderBy('id', 'desc')->get();
        $data_ruangan = DataRuangan::limit(50)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('data_ruangan.dataruangan-pdf',compact('data_ruangan'));
        return $pdf->stream('laporan_Data_Ruangan.pdf');
    }
}
