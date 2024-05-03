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
                        <li class="breadcrumb-item"><a href="{{ route('pengadaan') }}">Data Pegadaan</a></li>
                        <li class="breadcrumb-item"> <span>{{ isset($title) ? $title : 'Title tidak diatur' }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="{{ url('pengadaan/update/' . $data_pengadaan->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tanggal Pengambilan</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="tgl_pengambilan"
                                                    id="tgl_pengambilan" value="{{ $data_pengadaan->tgl_pengambilan }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Pengambil</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('nama_pengambil') is-invalid @enderror name="nama_pengambil"
                                                    id="nama_pengambil" value="{{ $data_pengadaan->nama_pengambil }}"
                                                    placeholder="Nama Pengambil">
                                                @error('nama_pengambil')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Ruangan</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('ruangan_id') is-invalid @enderror
                                                    name="ruangan_id" id="ruangan_id">
                                                    <option value="{{ $data_pengadaan->ruangan_id }}">
                                                        {{ $data_pengadaan->ruangan->nama_ruangan }}</option>
                                                    @foreach ($ruangan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_ruangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('ruangan_id')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="data_barang_id" id="data_barang_id">
                                                    <option value="{{ $data_pengadaan->data_barang_id }}">
                                                        {{ $data_pengadaan->data_barang->nama_barang }}</option>
                                                    @foreach ($data_barang as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jumlah</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" name="jumlah" id="jumlah"
                                                    value="{{ $data_pengadaan->jumlah }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Status</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="status" id="status">
                                                    <option>{{ $data_pengadaan->status }}</option>
                                                    <option value="Belum Diambil">Belum Diambil</option>
                                                    <option value="Sudah Diambil">Sudah Diambil</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-2" type="submit">Simpan</button>
                                    <a href="{{ url('pengadaan') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
