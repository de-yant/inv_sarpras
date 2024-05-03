<?php

namespace App\Http\Controllers;

use App\Models\DataBarang;
use App\Models\DataRuangan;
use App\Models\DataPinjaman;
use Illuminate\Http\Request;
use App\Exports\DataPinjamanExport;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Format;

class DataPinjamanController extends Controller
{
    public function index(Request $request)
    {
        $data_pinjaman = DataPinjaman::with('ruangan', 'data_barang')->get();
        if ($request->has('cari')) {
            $data_pinjaman = DataPinjaman::where('nama_peminjam', 'LIKE', '%' . $request->cari . '%')->orWhereHas('data_barang', function ($query) use ($request) {
                $query->where('nama_barang', 'LIKE', '%' . $request->cari . '%');
            })->paginate(10);
        } else {
            $data_pinjaman = DataPinjaman::orderBy('tgl_peminjaman', 'desc')->paginate(10);
        }

        $entries = [10, 25, 50, 100];
        if ($request->has('show')) {
            if (in_array($request->show, $entries)) {
                $data_pinjaman = DataPinjaman::paginate($request->show);
            }
        }


        return view('data_pinjaman.index', [
            'title' => 'Data Pinjaman',
            'data_pinjaman' => $data_pinjaman,
        ]);
    }

    public function show($id)
    {
        $data_pinjaman = DataPinjaman::findOrFail($id);
        return view('data_pinjaman.show', [
            'title' => 'Detail Data Pinjaman',
            'data_pinjaman' => $data_pinjaman,
        ]);
    }

    public function create()
    {
        $data_brg = DataBarang::all();
        $data_barang = $data_brg->where('status_barang', 'Pinjaman');
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $data_pinjaman = DataPinjaman::with('data_barang', 'ruangan')->get();
        $tgl_pinjaman = date('D, d M Y');
        $waktu = date('H:i:s');
        $tgl_peminjaman = $tgl_pinjaman . ' ' . $waktu;
        $bts_peminjaman_date = date('D, d M Y', strtotime('+1 days', strtotime($tgl_peminjaman)));
        $bts_peminjaman = $bts_peminjaman_date . ' ' . $waktu;
        return view('data_pinjaman.create', [
            'title' => 'Tambah Data Pinjaman',
            'tgl_peminjaman' => $tgl_peminjaman,
            'data_pinjaman' => $data_pinjaman,
            'data_barang' => $data_barang,
            'ruangan' => $ruangan,
            'bts_peminjaman' => $bts_peminjaman,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_peminjaman' => 'required',
            'bts_pengembalian' => 'required',
            'nama_peminjam' => 'required',
            'nama_pengambil' => 'required',
            'no_tlp'    => 'required|numeric|digits_between:10,13|starts_with:+62,62,08,8',
            'data_barang_id' => 'required',
            'ruangan_id' => 'required',
            'jumlah' => 'required|numeric',
        ], messages:[
            'nama_pengambil.required' => 'Nama Pengambil tidak boleh kosong',
            'nama_peminjam.required' => 'Nama Peminjam tidak boleh kosong',
            'no_tlp.required' => 'No Telepon tidak boleh kosong',
            'no_tlp.numeric' => 'No Telepon harus berupa angka',
            'no_tlp.digits_between' => 'No Telepon harus berupa angka dan minimal 10 digit',
            'no_tlp.starts_with' => 'No Telepon harus diawali dengan +62 atau 62 atau 08 atau 8',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
            'data_barang_id.required' => 'Barang tidak boleh kosong',
            'jumlah.numeric' => 'Jumlah harus berupa angka',
        ]);

        $dt_jumlah = DataBarang::where('id', $request->data_barang_id)->first();
        if ($request->jumlah > $dt_jumlah->jumlah_barang) {
            return redirect()->back()->with('warning', 'Maaf, Jumlah jumlah barang yang diminta melebihi batas');
        } else {
            $jumlah = $dt_jumlah->jumlah_barang - $request->jumlah;
        }

        DataBarang::where('id', $request->data_barang_id)
            ->update([
                'jumlah_barang' => $jumlah,
            ]);

        DataPinjaman::create([
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'bts_pengembalian' => $request->bts_pengembalian,
            'nama_peminjam' => $request->nama_peminjam,
            'nama_pengambil' => $request->nama_pengambil,
            'no_tlp'    => $request->no_tlp,
            'data_barang_id' => $request->data_barang_id,
            'ruangan_id' => $request->ruangan_id,
            'jumlah' => $request->jumlah,
            'status' => 'Belum Dikembalikan',
        ]);

        return redirect()->route('datapinjaman')->with('info', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ruangan = DataRuangan::orderBy('nama_ruangan', 'asc')->get();
        $data_barang = DataBarang::orderBy('nama_barang', 'asc')->get();
        $data_pinjaman = DataPinjaman::findOrFail($id);
        return view('data_pinjaman.edit', [
            'title' => 'Edit Data Pinjaman',
            'data_pinjaman' => $data_pinjaman,
            'ruangan' => $ruangan,
            'data_barang' => $data_barang,
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $tgl_kembali = date('D, d M Y');
        $waktu = date('H:i:s');
        $tgl_pengembalian = $tgl_kembali . ' ' . $waktu;

        $this->validate($request, [
            'nama_peminjam' => 'required',
            'no_tlp'    => 'required|numeric|digits_between:10,13|starts_with:+62,62,08,8',
            'jumlah' => 'required',
            'ruangan_id' => 'required',
        ], messages:[
            'nama_peminjam.required' => 'Nama Peminjam tidak boleh kosong',
            'no_tlp.required' => 'No Telepon tidak boleh kosong',
            'no_tlp.numeric' => 'No Telepon harus berupa angka',
            'no_tlp.digits_between' => 'No Telepon harus berupa angka dan minimal 10 digit',
            'no_tlp.starts_with' => 'No Telepon harus diawali dengan +62 atau 62 atau 08 atau 8',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'ruangan_id.required' => 'Ruangan tidak boleh kosong',
        ]);

        if ($request->status == 'Belum Dikembalikan') {
            $tgl_pengembalian = '-';
            $jumlah = $request->jumlah;
            $dikembalikan = 0;

            $dt_jumlah = DataBarang::where('id', $request->data_barang_id)->first();
            $jumlah = $dt_jumlah->jumlah_barang - $request->jumlah;

            DataBarang::where('id', $request->data_barang_id)
                ->update([
                    'jumlah_barang' => $jumlah,
                ]);

        } else {
            $tgl_pengembalian = $tgl_pengembalian;
            $dikembalikan = $request->jumlah;
        }

        $dt_jumlah = DataBarang::where('id', $request->data_barang_id)->first();
        $jumlah = $dt_jumlah->jumlah_barang + $dikembalikan;

        DataBarang::where('id', $request->data_barang_id)
            ->update([
                'jumlah_barang' => $jumlah,
            ]);


        DataPinjaman::where('id', $id)
            ->update([
                'tgl_peminjaman' => $request->tgl_peminjaman,
                'bts_pengembalian' => $request->bts_pengembalian,
                'tgl_pengembalian' => $tgl_pengembalian,
                'nama_peminjam' => $request->nama_peminjam,
                'nama_pengambil' => $request->nama_pengambil, // 'nama_pengambil' => $request->nama_pengambil,
                'nama_pengembali' => $request->nama_pengembali,
                'no_tlp'    => $request->no_tlp,
                'data_barang_id' => $request->data_barang_id,
                'ruangan_id' => $request->ruangan_id,
                'jumlah' => $request->jumlah,
                'dikembalikan' => $dikembalikan,
                'status' => $request->status,
            ]);

        return redirect()->route('datapinjaman')->with('warning', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data_pinjaman = DataPinjaman::findOrFail($id);
        $data_pinjaman->delete();
        return redirect()->route('datapinjaman')->with('danger', 'Data berhasil dihapus');
    }

    public function exportexcel()
    {
        return Excel::download(new DataPinjamanExport, 'Data_Pinjaman.xlsx');
    }

    public function exportpdf()
    {
        // $data_pinjaman = DataPinjaman::limit(50)->get();
        // return view('data_pinjaman.datapinjaman-pdf', [
        //     'data_pinjaman' => $data_pinjaman,
        //     'title' => 'Data Pinjaman',
        // ]);


        $data_pinjaman = DataPinjaman::limit(50)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('data_pinjaman.datapinjaman-pdf', compact('data_pinjaman'));
        return $pdf->stream('laporan_Data_Pinjaman.pdf');
    }
}
