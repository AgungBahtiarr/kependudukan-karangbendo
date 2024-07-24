<!DOCTYPE html>
<html lang="en" dir="" id="root">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Desa Karangbendo | {{ $title ?? '' }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logo-banyuwangi.svg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/backend-plugin.min.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=2.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@icon/dripicons/dripicons.css') }}">

    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/core/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/daygrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/timegrid/main.css') }}" />
    <link rel='stylesheet' href="{{ asset('assets/vendor/fullcalendar/list/main.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/vendor/mapbox/mapbox-gl.css') }}" />

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    @vite(['resources/js/app.js'])

    <style>
        .dataTables_filter {
            display: none;
        }
    </style>

    @yield('style')
</head>

<body class=" color-light ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        @include('partials.sidebar')
        @include('partials.navbar')
        <div class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper End-->

    @include('partials.footer')
    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>

    @yield('script')

    <!-- Flextree Javascript-->
    <script src="{{ asset('assets/js/flex-tree.min.js') }}"></script>
    <script src="{{ asset('assets/js/tree.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('assets/js/table-treeview.js') }}"></script>

    <!-- Masonary Gallery Javascript -->
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!-- Mapbox Javascript -->
    <script src="{{ asset('assets/js/mapbox-gl.js') }}"></script>
    <script src="{{ asset('assets/js/mapbox.js') }}"></script>

    <!-- Fullcalender Javascript -->
    <script src="{{ asset('assets/vendor/fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/daygrid/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('assets/vendor/fullcalendar/list/main.js') }}"></script>

    <!-- SweetAlert JavaScript -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    <!-- Vectoe Map JavaScript -->
    <script src="{{ asset('assets/js/vector-map-custom.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>
    <script src="{{ asset('assets/js/rtl.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('assets/js/chart-custom.js') }}"></script>

    <!-- Slider JavaScript -->
    <script src="{{ asset('assets/js/slider.js') }}"></script>

    <!-- App JavaScript -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>