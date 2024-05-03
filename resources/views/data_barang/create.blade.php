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
                            <form action="{{ route('databarang-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kode Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="kode_barang"
                                                    id="kode_barang" value="{{ $kode_barang }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Merek Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('merk_barang') is-invalid @enderror name="merk_barang"
                                                    id="merk_barang" value="{{ old('merk_barang') }}"
                                                    placeholder="Merek Barang">
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
                                                    <option selected disabled value="">-- Jenis Barang --</option>
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
                                                    @error('tanggal_pembelian') is-invalid @enderror name="tanggal_pembelian"
                                                    id="tanggal_pembelian" value="{{ old('tanggal_pembelian') }}"
                                                    placeholder="Tanggal Pembelian">
                                                @error('tanggal_pembelian')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Sumber Dana</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('kondisi_barang') is-invalid @enderror
                                                    name="sumber_dana_id" id="sumber_dana_id">
                                                    <option selected disabled value="">-- Sumber Dana --</option>
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kondisi Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('kondisi_barang') is-invalid @enderror
                                                    name="kondisi_barang" id="kondisi_barang">
                                                    <option selected disabled value="">-- Kondisi Barang --</option>
                                                    <option value="Baik">Baik</option>
                                                    <option value="Sedang">Sedang</option>
                                                    <option value="Rusak">Rusak</option>
                                                    <option value="Hilang">Hilang</option>
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
                                                    id="satuan_barang" value="{{ old('satuan_barang') }}"
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
                                                    <option selected disabled value="">-- Ruangan --</option>
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
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Barang</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('nama_barang') is-invalid @enderror name="nama_barang"
                                                    id="nama_barang" value="{{ old('nama_barang') }}"
                                                    placeholder="Nama Barang">
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
                                                    @error('jumlah_barang') is-invalid @enderror name="jumlah_barang"
                                                    id="jumlah_barang" value="{{ old('jumlah_barang') }}"
                                                    placeholder="0">
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
                                                <input class="form-control" type="file" name="foto_barang" multiple>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Status Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('status_barang') is-invalid @enderror
                                                    name="status_barang" id="status_barang">
                                                    <option selected disabled value="">-- Status Barang --</option>
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
                                                <textarea rows="3" class="form-control" name="keterangan" id="keterangan"></textarea>
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
