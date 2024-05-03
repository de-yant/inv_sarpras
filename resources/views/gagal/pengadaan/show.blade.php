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
                        <li class="breadcrumb-item"><a href="{{ route('pengadaan') }}">Data Barang</a></li>
                        <li class="breadcrumb-item"> <span>{{ isset($title) ? $title : 'Title tidak diatur' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <ul class="nav float-left ml-3">
                        <li><a href="{{ url('/pengadaan') }}" class="btn btn-info btn mb-2 ml-1"><i
                                    class="fas fa-arrow-left"></i> Kembali</a>
                        </li>
                    </ul>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Tanggal Pengambilan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pengadaan->tgl_pengambilan }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Pengambil</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pengadaan->nama_pengambil }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Nama Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pengadaan->data_barang->nama_barang }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Ruangan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control"
                                            value="{{ $data_pengadaan->ruangan->nama_ruangan }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Jumlah Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pengadaan->jumlah }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Satuan Barang</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pengadaan->data_barang->satuan_barang }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">Status</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="{{ $data_pengadaan->status }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
