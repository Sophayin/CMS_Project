<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/svg/icon121.jpg') }}">
    <link rel="icon" type="image/jpg" href="{{ url('assets/svg/icon121.jpg') }}">
    <title>{{ $title ?? env("APP_NAME") }}</title>
    <!--<meta content="" name="description">
  <meta content="" name="keywords">-->
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <!--<link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">-->
    <!--<link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">-->
    <!--<link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">-->
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <!--<link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">-->

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/lib/css/sweetalert2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/lib/css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/lib/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/lib/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" />
    @livewireStyles
</head>

<body>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/lib/js/query-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/lib/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/lib/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Vendor JS Files -->
    <!--<script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>-->
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <!--<script src="/assets/vendor/quill/quill.min.js"></script>-->
    <!--<script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>-->
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <!--<script src="/assets/vendor/php-email-form /validate.js"></script>-->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- Chartjs -->
    <!--<script src="{{asset('assets/js/chart.min.js')}}"></script>-->
    <script src="{{asset('assets/js/jsscript.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js"></script>

    <main id="main" class="main">
        @include("layouts.navbars.header")
        @include("layouts.navbars.sidebar")
        @yield('content')
        {{ $slot }}
    </main>
</body>

@livewireScripts
@stack('scripts')

</html>