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
                    </ul>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success" id="alert-success" role="alert">
                {{ Session::get('success') }}
                <span>Selamat Datang Kembali {{ Auth::user()->name }}</span>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget dash-widget5">
                    <span class="float-left"><img src="assets/img/dash/dash-1.png" alt="" width="80"></span>
                    <div class="dash-widget-info text-right">
                        <span>Ruangan</span>
                        <h3>{{ $total_ruangan }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget dash-widget5">
                    <div class="dash-widget-info text-left d-inline-block">
                        <span>Barang</span>
                        <h3>{{ $total_barang }}</h3>
                    </div>
                    <span class="float-right"><img src="assets/img/dash/dash-2.png" width="80" alt=""></span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                <div class="dash-widget dash-widget5">
                    <span class="float-left"><img src="assets/img/dash/dash-3.png" alt="" width="80"></span>
                    <div class="dash-widget-info text-right">
                        <span>Sumber Dana</span>
                        <h3>{{ $total_sumber_dana }}</h3>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                <div class="dash-widget dash-widget5">
                    <div class="dash-widget-info d-inline-block text-left">
                        <span>Penghapusan</span>
                        <h3>0</h3>
                    </div>
                    <span class="float-right"><img src="assets/img/dash/dash-4.png" alt="" width="80"></span>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="page-title">
                                    Identitas Sekolah
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>Nama Sekolah</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah"
                                            value="MTs Al-Hidayah Ibun" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>NSM/NPSN</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="121232040058 / 20278105" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>Akreditasi</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="Terakreditasi  A" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>Alamat</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="Jl. Sangkan Rt. 02 Rw. 02 Desa Laksana
                                            Kecamatan Ibun Kabupaten Bandung Provinsi
                                            Jawa Barat 40384"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">

                                    <label class="col-md-4 col-form-label"><strong>Kepala Madrasah</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="Faridla Nurlaela, S.Pt, S.Pd.I, M.Pd" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>Website</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="mtsalhidayahibun89.mysch.id" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>Email</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="mtsalhidayahibun89@gmail.com" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"><strong>Telepon</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="npsn" id="npsn"
                                            value="081321994110" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endsection
