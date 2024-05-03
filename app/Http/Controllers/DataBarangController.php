<?php

namespace App\Http\Controllers;
use App\Models\DataBarang;
use App\Models\SumberDana;
use App\Models\DataRuangan;
use Illuminate\Http\Request;
use App\Exports\DataBarangExport;
use App\Imports\DataBarangImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class DataBarangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_barang = DataBarang::where('nama_barang', 'LIKE', '%'.$request->cari.'%')->paginate(10);
        } else {
            $data_barang = DataBarang::with('ruangan')->paginate(10);
        }

        // show entries
        $entries = [10, 25, 50, 100];
        if ($request->has('show')) {
            if (in_array($request->show, $entries)) {
                $data_barang = DataBarang::paginate($request->show);
            }
        }
        return view('data_barang.index', [
            'title' => 'Data Barang',
            'data_barang' => $data_barang,
        ]);
    }

    public function show($id)
    {
        $data_barang = DataBarang::find($id);
        return view('data_barang.show', [
            'title' => 'Detail Data Barang',
            'data_barang' => $data_barang,
        ]);
    }

    public function create()
    {
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $sumber_dana = SumberDana::orderBy('sumber_dana', 'asc')->get();
        $databarang = DataBarang::orderBy('id', 'desc')->first();
        $kode_brg = 'BRG';
        $kode_tahun = date('Y');
        if ($databarang == null) {
            $kode_urut = '0001';
        } else {
            $explode = explode("-", $databarang->kode_barang);
            $kode_urut = intval($explode[2])+1;
            $kode_urut = str_pad($kode_urut, 4, '0', STR_PAD_LEFT);
        }
        $kode_barang = "$kode_brg-$kode_tahun-$kode_urut";
        return view('data_barang.create', [
            'title' => 'Tambah Data Barang',
            'kode_barang' => $kode_barang,
            'ruangan' => $ruangan,
            'sumber_dana' => $sumber_dana,
        ]);
    }

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal_pembelian' => 'required|max:255',
            'ruangan_id' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'merk_barang' => 'required|max:255',
            'jenis_barang' => 'required|max:255',
            'satuan_barang' => 'required|max:255',
            'sumber_dana_id' => 'required|max:255',
            'foto_barang' => 'image|mimes:jpeg,png,jpg|max:2048',
            'jumlah_barang' => 'required|max:255',
            'kondisi_barang' => 'required|max:255',
            'status_barang' => 'required',
            'keterangan' => 'max:255',
        ], messages:[
            'tanggal_pembelian.required' => 'Tanggal Pembelian harus diisi',
            'merk_barang.required' => 'Merek Barang harus diisi',
            'kondisi_barang.required' => 'Kondisi Barang harus diisi',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'sumber_dana_id.required' => 'Sumber Dana harus diisi',
            'satuan_barang.required' => 'Satuan Barang harus diisi',
            'ruangan_id.required' => 'Ruangan harus diisi',
            'nama_barang.required' => 'Nama Barang harus diisi',
            'jumlah_barang.required' => 'Jumlah Barang harus diisi',
            'status_barang.required' => 'Status Barang harus diisi',
        ]);

        if ($request->hasFile('foto_barang')){
            $file_name = $this->generateRandomString();
            $extension = $request->file('foto_barang')->getClientOriginalExtension();
            $foto_name = $file_name . '.' . $extension;

            $foto_barang = Storage::putFileAs('public/img/brg', $request->file('foto_barang'), $foto_name);
        }else{
            $foto_name = null;
        }

        DB::table('data_barangs')->insert([
            'kode_barang' => $request->kode_barang,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'sumber_dana_id' => $request->sumber_dana_id,
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'jenis_barang' => $request->jenis_barang,
            'satuan_barang' => $request->satuan_barang,
            'foto_barang' => $foto_name,
            'jumlah_barang' => $request->jumlah_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'status_barang' => $request->status_barang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('databarang')->with('info', 'Data Barang Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $sumber_dana = SumberDana::orderBy('sumber_dana', 'asc')->get();
        $data_barang = DataBarang::find($id);
        return view('data_barang.edit', [
            'title' => 'Edit Data Barang',
            'data_barang' => $data_barang,
            'ruangan' => $ruangan,
            'sumber_dana' => $sumber_dana,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data_barang = DataBarang::find($id);
        $this->validate($request, [
            'tanggal_pembelian' => 'required|max:255',
            'ruangan_id' => 'required|max:255',
            'nama_barang' => 'required|max:255',
            'merk_barang' => 'required|max:255',
            'jenis_barang' => 'required|max:255',
            'satuan_barang' => 'required|max:255',
            'sumber_dana_id' => 'required|max:255',
            'foto_barang' => 'image|mimes:jpeg,png,jpg|max:2048',
            'jumlah_barang' => 'required|max:255',
            'kondisi_barang' => 'required|max:255',
            'status_barang' => 'required',
            'keterangan' => 'max:255',
        ], messages:[
            'tanggal_pembelian.required' => 'Tanggal Pembelian harus diisi',
            'merk_barang.required' => 'Merek Barang harus diisi',
            'kondisi_barang.required' => 'Kondisi Barang harus diisi',
            'jenis_barang.required' => 'Jenis Barang harus diisi',
            'sumber_dana_id.required' => 'Sumber Dana harus diisi',
            'satuan_barang.required' => 'Satuan Barang harus diisi',
            'ruangan_id.required' => 'Ruangan harus diisi',
            'nama_barang.required' => 'Nama Barang harus diisi',
            'jumlah_barang.required' => 'Jumlah Barang harus diisi',
            'status_barang.required' => 'Status Barang harus diisi',
        ]);

        if ($request->hasFile('foto_barang')){
            $file_name = $this->generateRandomString();
            $extension = $request->file('foto_barang')->getClientOriginalExtension();
            $foto_name = $file_name . '.' . $extension;

            $foto_barang = Storage::putFileAs('public/img/brg', $request->file('foto_barang'), $foto_name);
        }else{
            $foto_name = $data_barang->foto_barang;
        }


        $data_barang->update([
            'kode_barang' => $request->kode_barang,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'sumber_dana_id' => $request->sumber_dana_id,
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'jenis_barang' => $request->jenis_barang,// tambahkan baris ini
            'satuan_barang' => $request->satuan_barang,
            'foto_barang' => $foto_name,
            'jumlah_barang' => $request->jumlah_barang,
            'kondisi_barang' => $request->kondisi_barang,
            'status_barang' => $request->status_barang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('databarang')->with('info', 'Data Barang Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $data = DataBarang::find($id);
        $file = public_path('img/barang/').$data->foto_barang;
        if (file_exists($file)) {
            @unlink($file);
        }
        $data->delete();
        return redirect('databarang')->with('danger', 'Data Barang Berhasil Dihapus!');
    }

    public function exportexcel()
    {
        return Excel::download(new DataBarangExport, 'DataBarang.xlsx');
    }

    public function importexcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $file->move('file_barang', $nama_file);

        Excel::import(new DataBarangImport, public_path('/file_barang/'.$nama_file));
        // $file = $request->file('file')->store('public/import');
        // $import = new DataBarangImport();
        // $import->import($file);
        // Storage::delete($file);
        return redirect('databarang')->with('info', 'Data Barang Berhasil Diimport!');
    }

    public function exportpdf()
    {
        // $data_barang = DataBarang::limit (10)->get();
        // return view('data_barang/databarang-pdf', [
        //     'title' => 'Data Barang',
        //     'data_barang' => $data_barang,
        // ]);

        $data_barang = DataBarang::orderBy('created_at', 'DESC')->get();
        $data_barang = DataBarang::limit(50)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('data_barang/databarang-pdf', compact('data_barang'));
        return $pdf->stream('laporan_Data_Barang.pdf');
    }

}
