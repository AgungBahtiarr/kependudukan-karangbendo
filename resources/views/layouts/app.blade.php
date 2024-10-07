<!DOCTYPE html>
<html lang="en" dir="" id="root">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Desa Karangbendo | {{ $title ?? '' }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/images/logo/logo-banyuwangi.svg" />
    <link rel="stylesheet" href="/assets/css/backend-plugin.min.css?v=2.0.0">
    <link rel="stylesheet" href="/assets/css/backend.css?v=2.0.0">
    <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="/assets/vendor/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="/assets/vendor/@icon/dripicons/dripicons.css">
    <link rel='stylesheet' href="/assets/vendor/fullcalendar/core/main.css" />
    <link rel='stylesheet' href="/assets/vendor/fullcalendar/daygrid/main.css" />
    <link rel='stylesheet' href="/assets/vendor/fullcalendar/timegrid/main.css" />
    <link rel='stylesheet' href="/assets/vendor/fullcalendar/list/main.css" />
    <link rel="stylesheet" href="/assets/vendor/mapbox/mapbox-gl.css" />
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

    {{-- <script>
        const Swal = require('sweetalert2')
    </script> --}}

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css " rel="stylesheet">


    <!-- Backend Bundle JavaScript -->
    <script src="/assets/js/htmx.min.js"></script>
    <script src="/assets/js/backend-bundle.min.js"></script>
    @yield('script')
    <!-- Flextree Javascript-->
    <script src="/assets/js/flex-tree.min.js"></script>
    <script src="/assets/js/tree.js"></script>
    <!-- Table Treeview JavaScript -->
    <script src="/assets/js/table-treeview.js"></script>
    <!-- Masonary Gallery Javascript -->
    <script src="/assets/js/masonry.pkgd.min.js"></script>
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mapbox Javascript -->
    <script src="/assets/js/mapbox-gl.js"></script>
    <script src="/assets/js/mapbox.js"></script>

    <script src="/assets/js/morris.js"></script>

    <!-- Fullcalender Javascript -->
    <script src="/assets/vendor/fullcalendar/core/main.js"></script>
    <script src="/assets/vendor/fullcalendar/daygrid/main.js"></script>
    <script src="/assets/vendor/fullcalendar/timegrid/main.js"></script>
    <script src="/assets/vendor/fullcalendar/list/main.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="/assets/js/sweetalert.js"></script>
    <!-- Vectoe Map JavaScript -->
    <script src="/assets/js/vector-map-custom.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="/assets/js/customizer.js"></script>
    <script src="/assets/js/rtl.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="/assets/js/chart-custom.js"></script>
    <!-- Slider JavaScript -->
    <script src="/assets/js/slider.js"></script>
    <!-- App JavaScript -->
    <script src="/assets/js/app.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const widgetToggle = document.getElementById('widgetToggle');
            const widgetSubmenu = document.getElementById('widgetSubmenu');
            const widgetArrow = document.getElementById('widgetArrow');

            widgetToggle.addEventListener('click', function(e) {
                e.preventDefault();
                widgetSubmenu.classList.toggle('hidden');
                widgetArrow.classList.toggle('rotate-180');
            });
        });


        document.addEventListener('DOMContentLoaded', function() {
            const widgetToggle = document.getElementById('widgetToggle2');
            const widgetSubmenu = document.getElementById('widgetSubmenu2');
            const widgetArrow = document.getElementById('widgetArrow2');

            widgetToggle.addEventListener('click', function(e) {
                e.preventDefault();
                widgetSubmenu.classList.toggle('hidden');
                widgetArrow.classList.toggle('rotate-180');
            });
        });
    </script>
    <script>
        $(function() {
            $(document).on('click', '#btn-delete', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire({
                            title: "Data berhasil dihapus!",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 5000
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
