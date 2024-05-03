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
        @if (Session::has('info'))
            <div class="alert alert-info" id="alert-info" role="alert">
                {{ Session::get('info') }}
            </div>
        @elseif (Session::has('warning'))
            <div class="alert alert-warning" id="alert-warning" role="alert">
                {{ Session::get('warning') }}
            </div>
        @elseif (Session::has('danger'))
            <div class="alert alert-danger" id="alert-danger" role="alert">
                {{ Session::get('danger') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body">
                            <form action="{{ route('pengadaan-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Tanggal Pengambilan</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="tgl_pengambilan"
                                                    id="tgl_pengambilan" value="{{ $tgl_pengambilan }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Pengambil</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control"
                                                    @error('nama_pengambil') is-invalid @enderror name="nama_pengambil"
                                                    id="nama_pengambil" value="{{ old('nama_pengambil') }}"
                                                    placeholder="Nama Pengambil">
                                                @error('nama_pengambil')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Jumlah</label>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control"
                                                    @error('jumlah') is-invalid @enderror name="jumlah" id="jumlah"
                                                    value="{{ old('jumlah') }}" placeholder="0">
                                                @error('jumlah')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Barang</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('data_barang_id') is-invalid @enderror
                                                    name="data_barang_id" id="data_barang_id">
                                                    <option selected disabled value="">-- Nama Barang --</option>
                                                    @foreach ($data_barang as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama_barang }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('data_barang_id')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                </select>
                                            </div>
                                        </div>
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
<script>
    $(document).ready(function() {
        $('.nama_barang').select2();
    });
</script>
