@extends('layouts.app')

@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="page-title mb-0">{{ isset($title) ? $title : 'Title tidak diatur' }}</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <ul class="breadcrumb float-right p-0 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('databarang') }}">Data Barang</a></li>
                        <li class="breadcrumb-item"> <span>{{ isset($title) ? $title : 'Title tidak diatur' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <ul class="nav float-left ml-3">
                        <li><a href="{{ url('/databarang') }}" class="btn btn-info btn mb-2 ml-1"><i
                                    class="fas fa-arrow-left"></i> Kembali</a>
                    </ul>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group row">
                                    <img src="{{ asset('storage/img/brg/' . $data_barang->foto_barang) }}"
                                        class="rounded mx-auto d-block mb-3" alt="foto_barang" wwidth="220" height="180">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Kode Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_barang->kode_barang }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Merek Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_barang->merk_barang }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Jenis Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_barang->jenis_barang }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Tanggal Pembelian</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->tanggal_pembelian }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Sumber Dana</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->sumber_dana->sumber_dana }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Satuan Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->satuan_barang }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Ruangan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->ruangan->nama_ruangan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_barang->nama_barang }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Jumlah Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->jumlah_barang }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Kondisi Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->kondisi_barang }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Status Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_barang->status_barang }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Keterangan</label>
                                    <div class="col-md-8">
                                        <textarea rows="1" class="form-control" readonly>{{ $data_barang->keterangan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
