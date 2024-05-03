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
    <!--[if lt IE 9]>
  <script src="assets/js/html5shiv.min.js"></script>
  <script src="assets/js/respond.min.js"></script>
 <![endif]-->
</head>

<body>

    <div class="main-wrapper">
        @include('layouts.header')

        @include('layouts.sidebar')


        <div class="page-wrapper">
            @yield('content')
        </div>

    </div>

@include('layouts.footer')
