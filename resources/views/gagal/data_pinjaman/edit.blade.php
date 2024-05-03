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
                        <li class="breadcrumb-item"><a href="{{ route('datapinjaman') }}">Data Pinjaman</a></li>
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
                            <form action="{{ url('datapinjaman/update/'. $data_pinjaman->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tanggal Peminjaman</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="tgl_peminjaman" id="tgl_peminjaman" value="{{ $data_pinjaman->tgl_peminjaman }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Peminjam</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" value="{{ $data_pinjaman->nama_peminjam }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Pengambil</label>
                                            <div class="col-md-8">
                                                <input type="text" name="nama_pengambil" id="nama_pengambil" class="form-control" value="{{ $data_pinjaman->nama_pengambil }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Pengembali</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="nama_pengembali" id="nama_pengembali">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tlp/WA</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('no_tlp') is-invalid @enderror name="no_tlp"
                                                    id="no_tlp" value="{{ $data_pinjaman->no_tlp }}"
                                                    >
                                                @error('no_tlp')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Batas Pengembalian</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="bts_pengembalian" id="bts_pengembalian" value="{{ $data_pinjaman->bts_pengembalian }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="data_barang_id" id="data_barang_id">
                                                    <option value="{{ $data_pinjaman->data_barang_id }}">
                                                        {{ $data_pinjaman->data_barang->nama_barang }}</option>
                                                    @foreach ($data_barang as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Ruangan</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="ruangan_id" id="ruangan_id">
                                                    <option value="{{ $data_pinjaman->ruangan_id }}">
                                                        {{ $data_pinjaman->ruangan->nama_ruangan }}</option>
                                                    @foreach ($ruangan as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_ruangan }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jumlah</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ $data_pinjaman->jumlah }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Status</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="status" id="status">
                                                    <option>{{ $data_pinjaman->status }}</option>
                                                    <option value="Belum Dikembalikan">Belum Dikembalikan</option>
                                                    <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-2" type="submit">Simpan</button>
                                    <a href="{{ url('datapinjaman') }}" class="btn btn-secondary">Batal</a>
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
