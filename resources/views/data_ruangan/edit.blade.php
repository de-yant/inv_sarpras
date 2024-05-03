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
                        <li class="breadcrumb-item"><a href="{{ route('dataruangan') }}">Data Ruangan</a></li>
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
                            <form action="{{ url('dataruangan/update/'. $dataruangan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Kode Ruangan</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="kode_ruangan" id="kode_ruangan" value="{{ $dataruangan->kode_ruangan }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Nama Ruangan</label>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" @error ('nama_ruangan') is-invalid @enderror name="nama_ruangan" id="nama_ruangan" value="{{ $dataruangan->nama_ruangan }}">
                                                @error('nama_ruangan')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Sumber Dana</label>
                                            <div class="col-md-8">
                                                <select class="form-control" @error('sumber_dana_id') is-invalid @enderror
                                                    name="sumber_dana_id" id="sumber_dana_id">
                                                    <option value="{{ $dataruangan->sumber_dana_id }}">
                                                        {{ $dataruangan->sumber_dana->sumber_dana }}</option>
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
                                            <label class="col-md-4 col-form-label">Kondisi</label>
                                            <div class="col-md-8">
                                                <select class="form-control" name="kondisi_ruangan" id="kondisi_ruangan">
                                                    <option value="Baik" {{ $dataruangan->kondisi_ruangan == 'Baik' ? 'selected' : '' }}>Baik</option>
                                                    <option value="Rusak Ringan" {{ $dataruangan->kondisi_ruangan == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                                                    <option value="Rusak Berat" {{ $dataruangan->kondisi_ruangan == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Keterangan</label>
                                            <div class="col-md-10">
                                                <textarea rows="2" class="form-control" name="keterangan" id="keterangan">{{ $dataruangan->keterangan }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-2" type="submit">Simpan</button>
                                    <a href="{{ url('dataruangan') }}" class="btn btn-secondary">Batal</a>
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
