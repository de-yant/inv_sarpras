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
                    <li class="nav-item has-arrow">
                        <button class="btn btn-primary btn-sm ml-3 mt-3"><i class="fas fa-sign-in-alt"></i>
                            <a href="{{ route('login') }}" class="text-white">Login</a>
                        </button>
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
                            <a href="{{ url('/pengadaanbarang') }}"><img src="{{ asset('assets/img/sidebar/icon-7.png') }}"
                                    alt="icon"><span>Pengadaan Barang</span></a>
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
                <div class="container">
                    <div class="row height d-flex justify-content-center align-items-center">
                        <div class="col-md-6">
                            <div class="form">
                                <form action="{{ url('/pengadaanbarang') }}" method="GET">
                                    <i class="fa fa-search"></i>
                                    <input type="search" name="cari" id="cari" autocomplete="on"
                                        class="form-control form-input" placeholder="Cari Barang..."
                                        value="{{ request()->get('cari') }}"><span class="left-pan"><i
                                            class="fa fa-microphone"></i></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Session::has('info'))
                    <div class="alert alert-info mt-3" id="alert-info" role="alert">
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table custom-table datatable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Masih Ada</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($data_barang->count() > 0)
                                    @foreach ($data_barang as $index => $row)
                                        <tr>
                                            <td>{{ $row->nama_barang }}</td>
                                            <td>{{ $row->jumlah_barang }}</td>
                                            <td>
                                                @if ($row->jumlah_barang > 0)
                                                    <a href="{{ url('/pengadaanbarang/create/' . $row->id) }}"
                                                        class="btn btn-info btn mb-2 ml-1"><i class="fas fa-plus"></i>
                                                        Ajukan</a>
                                                @else
                                                    <a href="{{ url('/pengadaanbarang/create/' . $row->id) }}"
                                                        class="btn btn-info btn mb-2 ml-1 disabled"><i
                                                            class="fas fa-plus"></i>
                                                            Ajukan</a>
                                                @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="3">
                                            Barang Tidak Ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{-- <div class="float-right">
                            <div class="text-right">
                                <small>Ditampilkan {{ $data_barang->firstItem() }} -
                                    {{ $data_barang->lastItem() }} dari {{ $data_barang->total() }} Data</small>
                                {{ $data_barang->links() }}
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>@include('layouts.footer')
