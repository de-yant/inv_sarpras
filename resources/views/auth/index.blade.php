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
        <div class="content-page">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="aboutprofile">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="aboutprofile-pic">
                                            <img class="card-img-top" src="{{ asset('storage/img/profile/'. $profile->foto_profile) }}" alt="Foto Profil">
                                        </div>
                                        <div class="aboutprofile-name">
                                            <h5 class="text-center mt-2"><b>{{ $profile->user_id }}</b></h5>
                                            <h5 class="text-center mt-2">{{ $profile->name }}</h5>
                                            <p class="text-center">{{ $profile->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="{{ url('profile/update/' . $profile->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="page-title">Ubah Profil</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="biography" class="biography"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label"><strong>ID</strong></label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="user_id"
                                                                id="user_id" value="{{ $profile->user_id }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label"><strong>Nama</strong></label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                @error('name') is-invalid @enderror name="name"
                                                                id="name" value="{{ $profile->name }}"
                                                                placeholder="Nama Lengkap">
                                                            @error('name')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label"><strong>Kata
                                                                Sandi</strong></label>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control"
                                                                @error('password') is-invalid @enderror name="password"
                                                                id="password" value="" placeholder="***">
                                                            @error('password')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-md-4 col-form-label"><strong>Foto Profil</strong></label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control" @error('foto_profile') is-invalid @enderror
                                                                name="foto_profile" id="foto_profile" value="">
                                                            @error('foto_profile')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-md-4 col-form-label"><strong>Email</strong></label>
                                                        <div class="col-md-8">
                                                            <input type="email" class="form-control" @error('email') is-invalid @enderror
                                                                name="email" id="email" value="{{ $profile->email }}"
                                                                placeholder="Email">
                                                            @error('email')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-md-4 col-form-label"><strong>Ulangi</strong></label>
                                                        <div class="col-md-8">
                                                            <input type="password" class="form-control" @error('password_confirmation') is-invalid @enderror
                                                                name="password_confirmation" id="password_confirmation"
                                                                value="" placeholder="***">
                                                            @error('password_confirmation')
                                                                <div class="alert alert-danger mt-2">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <button class="btn btn-primary " type="submit">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
