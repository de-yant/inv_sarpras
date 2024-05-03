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
                        <li class="breadcrumb-item"><a href="{{ route('datapinjaman') }}">Data Barang</a></li>
                        <li class="breadcrumb-item"> <span>{{ isset($title) ? $title : 'Title tidak diatur' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <ul class="nav float-left ml-3">
                        <li><a href="{{ url('/datapinjaman') }}" class="btn btn-info btn mb-2 ml-1"><i
                                    class="fas fa-arrow-left"></i> Kembali</a>
                        </li>
                    </ul>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Tanggal Peminjaman</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->tgl_peminjaman }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Peminjam</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pinjaman->nama_peminjam }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Pengambil</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pinjaman->nama_pengambil }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pinjaman->data_barang->nama_barang }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Tlp/WA</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pinjaman->no_tlp }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->status }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Batas Pengembalian</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->bts_pengembalian }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Tanggal Pengembalian</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->tgl_pengembalian }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Pengembali</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pinjaman->nama_pengembali }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Ruangan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->ruangan->nama_ruangan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Jumlah Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->jumlah }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Satuan Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pinjaman->data_barang->satuan_barang }}" readonly>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
