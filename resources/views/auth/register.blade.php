<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DAFTAR | SARPAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link href="../../../../css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="#"><img src="assets/img/logo.png" alt="School-admin"></a>
                        </div>
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama </label>
                                <input type="text" class="form-control" @error('name') is-invalid @enderror
                                    name="name" placeholder="Ade Haryanto" value="{{ old('name') }}" required
                                    autocomplete="name" autofocus>
                                @error('name')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Surel </label>
                                <input type="email" class="form-control" @error('email') is-invalid @enderror
                                    name="email" placeholder="adeharyanto@mail.com" value="{{ old('email') }}"
                                    required autocomplete="email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" class="form-control" @error('password') is-invalid @enderror
                                    name="password" placeholder="*****" required autocomplete="new-password">
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Ulangi Kata Sandi</label>
                                <input type="password" class="form-control" @error('password_confirmation') is-invalid
                                    @enderror name="password_confirmation" placeholder="*****" required
                                    autocomplete="new-password">
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Daftar</button>
                            </div>
                            <div class="text-center">
                                <a href="#">Sudah Punya Akun?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
