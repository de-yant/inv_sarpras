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
                        {{-- <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item"> <span>Blank Page</span></li> --}}
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
                            <li><a href="{{ url('/sumberdana/create') }}" class="btn btn-info btn mb-2 ml-1"><i
                                        class="fas fa-plus"></i> Tambah Data</a>
                            </li>
                            <li><a href="{{ url('/sumberdana/exportexcel') }}" class="btn btn-success btn mb-2 ml-1"><i
                                        class="fas fa-file-excel"></i> Export
                                    Excel</a></li>
                            <li><a href="{{ url('/sumberdana/exportpdf') }}" class="btn btn-danger btn mb-2 ml-1"><i
                                        class="fas fa-file-pdf"></i> Export
                                    PDF</a></li>
                            <li>
                                <form action="{{ url('sumberdana')}}" method="GET">
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
                                <form action="{{ url('sumberdana') }}" method="GET">
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
                                            <th>Sumber Dana</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($sumber_dana->count() > 0)
                                            @foreach ($sumber_dana as $index => $row)
                                                <tr>
                                                    <th scope="row">{{ $index + $sumber_dana->firstItem() }}</th>
                                                    <td>{{ $row->sumber_dana }}</td>
                                                    <td>{{ $row->keterangan }}</td>
                                                    <td>
                                                        <a href="{{ url('/sumberdana/edit/' . $row->id) }}"
                                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                        <a href="{{ url('/sumberdana/delete/' . $row->id) }}"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="5">
                                                    Data Sumber Dana Kosong</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="float-right">
                                    <div class="text-right">
                                        <small>Ditampilkan {{ $sumber_dana->firstItem() }} -
                                            {{ $sumber_dana->lastItem() }} dari {{ $sumber_dana->total() }} Data</small>
                                        {{ $sumber_dana->links() }}
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
