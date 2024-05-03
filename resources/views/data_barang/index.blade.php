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
                            <li><a href="{{ url('/databarang/create') }}" class="btn btn-info btn mb-2 ml-1"><i
                                        class="fas fa-plus"></i> Tambah Data</a>
                            </li>
                            <li><a href="{{ url('/databarang/exportexcel') }}" class="btn btn-success btn mb-2 ml-1"><i
                                        class="fas fa-file-excel"></i> Export
                                    Excel</a></li>
                            {{-- <li><a href="#" class="btn btn-secondary btn ml-1" data-toggle="modal"
                                    data-target="#importExcel"><i class="fas fa-file-import"></i> Import
                                    Excel</a></li> --}}
                            <li><a href="{{ url('/databarang/exportpdf') }}" class="btn btn-danger btn mb-2 ml-1"><i
                                        class="fas fa-file-pdf"></i> Export
                                    PDF</a></li>
                            <li>
                                <form action="{{ url('databarang')}}" method="GET">
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
                                <form action="{{ url('databarang') }}" method="GET">
                                    <div class="input-group mb-2 ml-2">
                                        <input type="search" name="cari" class="form-control" placeholder="Cari Data"
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
                                            <th>Kode Barang</th>
                                            <th>Ruangan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
                                            <th>Kondisi Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($data_barang->count() > 0)
                                            @foreach ($data_barang as $index => $row)
                                                <tr>
                                                    <th scope="row">{{ $index + $data_barang->firstItem() }}</th>
                                                    <td>{{ $row->kode_barang }}</td>
                                                    <td>{{ $row->ruangan->nama_ruangan }}</td>
                                                    <td>{{ $row->nama_barang }}</td>
                                                    <td>{{ $row->jumlah_barang }}</td>
                                                    <td>{{ $row->kondisi_barang }}</td>
                                                    <td>
                                                        <a href="{{ url('/databarang/show/' . $row->id) }}"
                                                            class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                                        <a href="{{ url('/databarang/edit/' . $row->id) }}"
                                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ url('/databarang/delete/' . $row->id) }}"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="6">
                                                    Data Barang Kosong</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    <div class="text-right">
                                        <small>Ditampilkan {{ $data_barang->firstItem() }} -
                                            {{ $data_barang->lastItem() }} dari {{ $data_barang->total() }} Data</small>
                                        {{ $data_barang->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/databarang/importexcel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="file" name="file" class="form-control" required="required">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Import</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
