<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ isset($title) ? $title : 'Title tidak diatur' }} | SARPRAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link href="{{ asset('../../../../css?family=Roboto:300,400,500,700,900') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/fontawesome/css/fontawesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <div class="main-wrapper">
        <div class="header-outer">
            <div class="header">
                <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars"
                        aria-hidden="true"></i></a>
                <a id="toggle_btn" class="float-left" href="javascript:void(0);">
                    <img src="{{ asset('assets/img/sidebar/icon-21.png') }}" alt="">
                </a>
                <ul class="nav float-left">
                    <li>
                        <div class="top-nav-search">
                            <h4 class="page-title mt-3"><b>MTS AL-HIDAYAH IBUN</b></h4>
                        </div>
                    </li>
                </ul>
                <ul class="nav float-left">
                    <li>
                        <a href="{{ url('/') }}" class="mobile-logo d-md-block d-lg-none d-block">
                            <h4 class="page-title mt-3"><b>MTS AL-HIDAYAH IBUN</b></h4>
                        </a>
                    </li>
                </ul>

                <script type="text/javascript">
                    window.onload = function() {
                        jam();
                        date();
                    }

                    function date() {
                        var e = document.getElementById('date'),
                            d = new Date(),
                            day, date, month, year, time;
                        day = d.getDay();
                        date = d.getDate();
                        month = d.getMonth();
                        year = d.getFullYear();

                        switch (day) {
                            case 0:
                                day = 'Minggu';
                                break;
                            case 1:
                                day = 'Senin';
                                break;
                            case 2:
                                day = 'Selasa';
                                break;
                            case 3:
                                day = 'Rabu';
                                break;
                            case 4:
                                day = 'Kamis';
                                break;
                            case 5:
                                day = 'Jumat';
                                break;
                            case 6:
                                day = 'Sabtu';
                                break;
                        }

                        switch (month) {
                            case 0:
                                month = 'Januari';
                                break;
                            case 1:
                                month = 'Februari';
                                break;
                            case 2:
                                month = 'Maret';
                                break;
                            case 3:
                                month = 'April';
                                break;
                            case 4:
                                month = 'Mei';
                                break;
                            case 5:
                                month = 'Juni';
                                break;
                            case 6:
                                month = 'Juli';
                                break;
                            case 7:
                                month = 'Agustus';
                                break;
                            case 8:
                                month = 'September';
                                break;
                            case 9:
                                month = 'Oktober';
                                break;
                            case 10:
                                month = 'November';
                                break;
                            case 11:
                                month = 'Desember';
                                break;
                        }

                        e.innerHTML = day + ', ' + date + ' ' + month + ' ' + year;

                        setTimeout('date()', 1000);
                    }

                    function jam() {
                        var e = document.getElementById('jam'),
                            d = new Date(),
                            h, m, s;
                        h = d.getHours();
                        m = set(d.getMinutes());
                        s = set(d.getSeconds());

                        e.innerHTML = h + ':' + m + ':' + s;

                        setTimeout('jam()', 1000);
                    }

                    function set(e) {
                        e = e < 10 ? '0' + e : e;
                        return e;
                    }
                </script>

                <ul class="nav user-menu float-right mr-3">
                    <li class="nav-item">
                        <div id="date"
                            style="color: rgb(6, 5, 5); font-size: 20px; margin-top: 15px; margin-left: 10px;">
                        </div>
                    </li>
                    <li class="nav-item has-arrow">
                        <div id="jam"
                            style="color: rgb(6, 5, 5); font-size: 20px; margin-top: 15px; margin-left: 10px;">
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <div class="header-left">
                        <a href="{{ route('dashboard') }}" class="logo">
                            <img src="{{ asset('assets/img/logo.png') }}" width="50" height="50" alt="">
                            <span class="text-uppercase"> | SARPRAS</span>
                        </a>
                    </div>
                    <ul class="sidebar-ul">
                        <li>
                            <a href="{{ url('/') }}"><img src="{{ asset('assets/img/sidebar/icon-6.png') }}"
                                    alt="icon"><span>Pinjam Barang</span></a>
                        </li>
                        <li>
                            <a href="{{ url('/pengadaanbarang') }}"><img
                                    src="{{ asset('assets/img/sidebar/icon-7.png') }}" alt="icon"><span>Pengadaan
                                    Barang</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- css --}}
        <style>
            .form {

                position: relative;
            }

            .form .fa-search {

                position: absolute;
                top: 20px;
                left: 20px;
                color: #8ca7d6;

            }

            .form span {

                position: absolute;
                right: 17px;
                top: 13px;
                padding: 2px;
                border-left: 1px solid #aef59a;

            }

            .left-pan {
                padding-left: 7px;
            }

            .left-pan i {

                padding-left: 10px;
            }

            .form-input {

                height: 55px;
                text-indent: 33px;
                border-radius: 10px;
            }

            .form-input:focus {

                box-shadow: none;
                border: none;
            }
        </style>

        //Content
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="page-title mb-0">{{ isset($title) ? $title : 'Title tidak diatur' }}</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            <ul class="breadcrumb float-right p-0 mb-0">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-home"></i>
                                        Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span>{{ isset($title) ? $title : 'Title tidak diatur' }}</span></li>
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
                                    <form action="{{ route('pengadaanbarang-store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label">Tanggal Pengambilan</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            name="tgl_pengambilan" id="tgl_pengambilan"
                                                            value="{{ $tgl_pengambilan }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label">Nama Pengambil</label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control"
                                                            @error('nama_pengambil') is-invalid @enderror
                                                            name="nama_pengambil" id="nama_pengambil"
                                                            value="{{ old('nama_pengambil') }}"
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
                                                            @error('jumlah') is-invalid @enderror name="jumlah"
                                                            id="jumlah" value="{{ old('jumlah') }}"
                                                            placeholder="0">
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
                                                        <select class="form-control" name="data_barang_id"
                                                            id="data_barang_id">
                                                            <option selected value="{{ $data_barang->id }}">
                                                                {{ $data_barang->nama_barang }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label">Ruangan</label>
                                                    <div class="col-md-8">
                                                        <select class="form-control"
                                                            @error('ruangan_id') is-invalid @enderror name="ruangan_id"
                                                            id="ruangan_id">
                                                            <option selected disabled value="">-- Ruangan --
                                                            </option>
                                                            @foreach ($ruangan as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->nama_ruangan }}
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
                                            <a href="{{ url('pengadaanbarang') }}"
                                                class="btn btn-secondary">Batal</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @include('layouts.footer')
