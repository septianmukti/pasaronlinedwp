<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | {{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="description" content="Pasar Online Dharma Wanita Persatuan (DWP) Kabupaten Madiun">
    <meta name="author" content="Diskominfo">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('include.front.head')
</head>

<body>
    <!-- BEGIN #page-container -->
    <div id="page-container" class="fade">

        @include('include.front.header')

        <!-- BEGIN #page-header -->
        <div id="page-header" class="section-container page-header-container bg-black">
            <div class="page-header-cover">
                <img src="{{ asset('assets/front/img/pendopo.png') }}" alt="" />
            </div>
            <div class="container">
            <img src="{{ asset('assets/front/img/logo_dharma_wanita_persatuan.png') }}" style="display: block; margin-left: auto; margin-right: auto; width:70px; height:70px;">
                <h1 class="page-header m-t-15"><b>Pasar Online Dharma Wanita Persatuan (DWP)<br>Kabupaten Madiun</b></h1>
            </div>
        </div>
        <!-- BEGIN #page-header -->

        @yield('konten')

        @include('include.front.footer')

        @include('include.front.copyright')

    </div>
    <!-- END #page-container -->

    @include('include.front.script')

    @yield('js')

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('[data-toggle="keterangan"]').tooltip()
        })
    </script>
</body>

</html>