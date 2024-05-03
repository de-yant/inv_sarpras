<?php

namespace App\Http\Controllers;

use App\Models\SumberDana;
use Illuminate\Http\Request;
use App\Exports\SumberDanaExport;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class SumberDanaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $sumber_dana = SumberDana::where('sumber_dana', 'LIKE', '%'.$request->cari.'%')->paginate(10);
        } else {
            $sumber_dana = SumberDana::paginate(10);
        }

        $entries = [10, 25, 50, 100];
        if ($request->has('show')) {
            if (in_array($request->show, $entries)) {
                $sumber_dana = SumberDana::paginate($request->show);
            }
        }

        return view('sumber_dana.index', [
            'title' => 'Sumber Dana',
            'sumber_dana' => $sumber_dana,
        ]);
    }

    public function create()
    {
        return view('sumber_dana.create', [
            'title' => 'Tambah Sumber Dana',
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'sumber_dana' => 'required'
        ], messages:[
            'sumber_dana.required' => 'Sumber Dana harus diisi',
        ]);

        SumberDana::create([
            'sumber_dana' => $request->sumber_dana,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('sumberdana')->with('info', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sumber_dana = SumberDana::findOrFail($id);
        return view('sumber_dana.edit', [
            'title' => 'Edit Sumber Dana',
            'sumber_dana' => $sumber_dana,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sumber_dana' => 'required'
        ], messages:[
            'sumber_dana.required' => 'Sumber Dana harus diisi',
        ]);

        $sumber_dana = SumberDana::findOrFail($id);
        $sumber_dana->update([
            'sumber_dana' => $request->sumber_dana,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('sumberdana')->with('warning', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $sumber_dana = SumberDana::findOrFail($id);
        $sumber_dana->delete();

        return redirect()->route('sumberdana')->with('danger', 'Data berhasil dihapus');
    }

    public function exportexcel()
    {
        return Excel::download(new SumberDanaExport, 'Sumber Dana.xlsx');
    }

    public function exportpdf()
    {
        $sumber_dana = SumberDana::limit(50)->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('sumber_dana.sumberdana-pdf',compact('sumber_dana'));
        return $pdf->stream('laporan_Sumber_Dana.pdf');
    }
}
