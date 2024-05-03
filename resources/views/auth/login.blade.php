<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> MASUK | SARPAS</title>
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
                {{-- <h3 class="account-title text-white">Login</h3> --}}
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <img src="assets/img/logo.png" alt="logo">
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Surel</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Surel" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Kata Sandi" required autocomplete="current-password">
                                @error('password')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group text-center custom-mt-form-group">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Masuk</button>
                            </div>
                            <div class="text-center">
                                <a href="{{ url('/forgot-password') }}">Lupa Kata Sandi?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
