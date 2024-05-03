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
                    <div class="col-sm-12">
                        <ul class="nav float-left ml-2">
                            <li><a href="{{ url('/pengadaan/create') }}" class="btn btn-info btn mb-2 ml-1"><i
                                        class="fas fa-plus"></i> Tambah Data</a>
                            </li>
                            <li><a href="{{ url('/pengadaan/exportexcel') }}" class="btn btn-success btn mb-2 ml-1"><i
                                        class="fas fa-file-excel"></i> Export
                                    Excel</a></li>
                            <li><a href="{{ url('/pengadaan/exportpdf') }}" class="btn btn-danger btn mb-2 ml-1"><i
                                        class="fas fa-file-pdf"></i> Export
                                    PDF</a></li>
                            <li>
                                <form action="{{ url('pengadaan') }}" method="GET">
                                    <div class="input-group mb-2 ml-1">
                                        <select name="show" class="form-control" onchange="this.form.submit()">
                                            <option value="">Tampilkan</option>
                                            <option value="10" {{ request()->get('show') == 10 ? 'selected' : '' }}>10
                                            </option>
                                            <option value="25" {{ request()->get('show') == 25 ? 'selected' : '' }}>25
                                            </option>
                                            <option value="50" {{ request()->get('show') == 50 ? 'selected' : '' }}>50
                                            </option>
                                            <option value="100" {{ request()->get('show') == 100 ? 'selected' : '' }}>
                                                100</option>
                                        </select>
                                    </div>
                                </form>
                            </li>
                            <li>
                                <form action="{{ url('pengadaan') }}" method="GET">
                                    <div class="input-group mb-2 ml-2">
                                        <input type="search" name="cari" class="form-control" placeholder="Cari.."
                                            value="{{ request()->get('cari') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </li>

                        </ul>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table custom-table datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pengambilan</th>
                                            <th>Nama Pengambil</th>
                                            <th>Nama Barang</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data_pengadaan->count() > 0)
                                            @foreach ($data_pengadaan as $index => $row)
                                                <tr>
                                                    <th scope="row">{{ $index + $data_pengadaan->firstItem() }}</th>
                                                    <td>{{ $row->tgl_pengambilan }}</td>
                                                    <td>{{ $row->nama_pengambil }}</td>
                                                    <td>{{ $row->data_barang->nama_barang }}</td>
                                                    <td>
                                                        @if ($row->status == 'Sudah Diambil')
                                                            <span class="badge badge-info"><b>{{ $row->status }}</b></span>
                                                        @else
                                                            <span class="badge rounded-pill bg-light text-dark"><b>{{ $row->status }}</b></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/pengadaan/show/' . $row->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                        @if ($row->status != 'Sudah Diambil')
                                                            <a href="{{ url('/pengadaan/edit/' . $row->id) }}"
                                                                class="btn btn-warning btn-sm"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @else
                                                            <a href="{{ url('/pengadaan/edit/' . $row->id) }}"
                                                                class="btn btn-warning btn-sm disabled"><i
                                                                    class="fas fa-edit"></i></a>
                                                        @endif
                                                        <a href="{{ url('/pengadaan/delete/' . $row->id) }}"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="9">
                                                    Data Pengadaan Kosong</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    <div class="text-right">
                                        <small>Ditampilkan {{ $data_pengadaan->firstItem() }} -
                                            {{ $data_pengadaan->lastItem() }} dari {{ $data_pengadaan->total() }}
                                            Data</small>
                                        {{ $data_pengadaan->links() }}
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
