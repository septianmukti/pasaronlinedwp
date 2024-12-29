<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('judul') | {{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="Halaman Admin Katalog Produk Kabupaten Madiun">
    <meta name="author" content="Septian">
    @include('include.admin.head')
</head>
<body>
    @include('include.admin.header')
    @include('include.admin.sidebar')
    <div class="main-container">
        <div class="pd-ltr-20 height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        @yield('breadcrumb')
                    </div>
                </div>
                @yield('konten')
            </div>
            @include('include.admin.footer')
        </div>
    </div>
    @include('include.admin.script')
    @yield('js')
</body>
</html>