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
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="{{ url('databarang/update/' . $data_barang->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group row">
                                            <img src="{{ asset('storage/img/brg/' . $data_barang->foto_barang) }}"
                                                class="rounded mx-auto d-block mb-3" alt="foto_barang" width="220"
                                                height="180">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kode Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    value="{{ $data_barang->kode_barang }}" readonly name="kode_barang"
                                                    id="kode_barang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Merek Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('merk_barang') is-invalid
                                                    @enderror
                                                    name="merk_barang" id="merk_barang"
                                                    value="{{ $data_barang->merk_barang }}" placeholder="Merek Barang">
                                                @error('merk_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jenis Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('jenis_barang') is-invalid @enderror
                                                    name="jenis_barang" id="jenis_barang">
                                                    <option>{{ $data_barang->jenis_barang }}</option>
                                                    <option value="1">Habis Pakai</option>
                                                    <option value="2">Non Habis Pakai</option>
                                                </select>
                                                @error('jenis_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tanggal Pembelian</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control"
                                                    value="{{ $data_barang->tanggal_pembelian }}" name="tanggal_pembelian"
                                                    id="tanggal_pembelian" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Sumber Dana</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('sumber_dana_id') is-invalid @enderror
                                                    name="sumber_dana_id" id="sumber_dana_id">
                                                    <option value="{{ $data_barang->sumber_dana_id }}">
                                                        {{ $data_barang->sumber_dana->sumber_dana }}</option>
                                                    @foreach ($sumber_dana as $item)
                                                        <option value="{{ $item->id }}">{{ $item->sumber_dana }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('sumber_dana_id')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kondisi Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('kondisi_barang') is-invalid @enderror
                                                    name="kondisi_barang" id="kondisi_barang">
                                                    <option>{{ $data_barang->kondisi_barang }}</option>
                                                    <option value="Sangat Bagus">Sangat Bagus</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Rusak">Rusak</option>
                                                    <option value="Sangat Rusak">Sangat Rusak</option>
                                                </select>
                                                @error('kondisi_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Satuan Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('satuan_barang') is-invalid @enderror name="satuan_barang"
                                                    id="satuan_barang" value="{{ $data_barang->satuan_barang }}"
                                                    placeholder="Satuan Barang">
                                                @error('satuan_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Ruangan</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('ruangan_id') is-invalid @enderror
                                                    name="ruangan_id" id="ruangan_id">
                                                    <option value="{{ $data_barang->ruangan_id }}">
                                                        {{ $data_barang->ruangan->nama_ruangan }}</option>
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
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('nama_barang') is-invalid
                                                    @enderror
                                                    name="nama_barang" id="nama_barang"
                                                    value="{{ $data_barang->nama_barang }}" placeholder="Nama Barang">
                                                @error('nama_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jumlah Barang</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control"
                                                    @error('jumlah_barang') is-invalid
                                                    @enderror
                                                    name="jumlah_barang" id="jumlah_barang"
                                                    value="{{ $data_barang->jumlah_barang }}"
                                                    placeholder="Jumlah Barang">
                                                @error('jumlah_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-4">Gambar</label>
                                            <div class="col-md-8">
                                                <input class="form-control" @error('foto_barang') is-invalid @enderror
                                                    type="file" name="foto_barang" id="foto_barang">
                                                @error('foto_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Status Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('status_barang') is-invalid @enderror
                                                    name="status_barang" id="status_barang">
                                                    <option>{{ $data_barang->status_barang }}</option>
                                                    <option value="Tetap">Tetap</option>
                                                    <option value="Pinjaman">Pinjaman</option>
                                                    <option value="Pengadaan">Pengadaan</option>
                                                </select>
                                                @error('status_barang')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Keterangan</label>
                                            <div class="col-md-8">
                                                <textarea rows="2" class="form-control" name="keterangan" id="keterangan">{{ $data_barang->keterangan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-2" type="submit">Simpan</button>
                                    <a href="{{ url('databarang') }}" class="btn btn-secondary">Batal</a>
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
