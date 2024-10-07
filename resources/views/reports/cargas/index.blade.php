@extends('layouts.app')


@section('content')
    <div class="flex justify-between mx-4 my-4">
        <h1 class="text-xl font-bold">Laporan Catatan Rumah Tangga</h1>
        {{-- <form action={{ route('laporan.cargas_report') }} method="POST">
            @csrf
            <button class="btn btn-primary">Cetak Laporan</button>
        </form> --}}
        <a href={{ route('laporan.cargas_report') }} target="_blank" class="btn btn-primary">Cetak Laporan</a>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mx-4">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Total Rumah Tangga</h4>
            </div>

            <div class="card-body flex justify-center items-center my-10">
                <h1 class="text-5xl font-medium">{{ $statistikDasar['totalRumahTangga'] }}</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Kriteria Rumah Layak Huni/Tidak</h4>
            </div>

            <div class="card-body">
                <div id="morris-donut-chart">
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Rumah Tanggan Dengan Jamban/Tidak</h4>
            </div>

            <div class="card-body">
                <div id="jamban">
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Rumah Tangga Dengan Tempat Sampah/Tidak</h4>
            </div>
            <div class="card-body">
                <div id="tempat_sampah"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Rumah Tangga Dengan Pembuangan Limbah/Tidak</h4>
            </div>
            <div class="card-body">
                <div id="limbah"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Sumber Air</h4>
            </div>
            <div class="card-body">
                <div id="sumberAir"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Rumah Tangga Mengikuti Kerja Bakti</h4>
            </div>
            <div class="card-body">
                <div id="kerja_bakti"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Rumah Tangga Dengan Industri Rumah Tangga</h4>
            </div>
            <div class="card-body">
                <div id="industri"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Rumah Tangga Dengan Aktivitas Kesehatan Lingkungan</h4>
            </div>
            <div class="card-body">
                <div id="kesehatan_lingkungan"></div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const kriteriaRumah = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'morris-donut-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Layak Huni",
                    value: {{ $statistikDasar['rumahLayak'] }}
                },
                {
                    label: "Tidak Layah Huni",
                    value: {{ $statistikDasar['rumahTidakLayak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });

        const jamban = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'jamban',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Ada Jamban",
                    value: {{ $statistikDasar['jamban']['ada'] }}
                },
                {
                    label: "Tidak Ada Jamban",
                    value: {{ $statistikDasar['jamban']['tidak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });

        const limbah = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'limbah',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Ada limbah",
                    value: {{ $sanitasi['pembuangan_limbah']['ada'] }}
                },
                {
                    label: "Tidak Ada limbah",
                    value: {{ $sanitasi['pembuangan_limbah']['tidak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });

        const tempat_sampah = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'tempat_sampah',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Ada Tempat Sampah",
                    value: {{ $sanitasi['tempat_sampah']['ada'] }}
                },
                {
                    label: "Tidak Ada Tempat Sampah",
                    value: {{ $sanitasi['tempat_sampah']['tidak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });

        const kerja_bakti = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'kerja_bakti',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Mengkikuti Kerja Bakti",
                    value: {{ $sosial['kerja_bakti']['ada'] }}
                },
                {
                    label: "Tidak Mengikuti Kerja Bakti",
                    value: {{ $sosial['kerja_bakti']['tidak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });


        const industri = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'industri',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Memiliki Industri Rumah Tangga",
                    value: {{ $sosial['industri']['ada'] }}
                },
                {
                    label: "Tidak Memiliki Industri Rumah Tangga",
                    value: {{ $sosial['industri']['tidak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });

        const kesehatan_lingkungan = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'kesehatan_lingkungan',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Mengikuti Kesehatan Kegiatan Lingkungan",
                    value: {{ $sosial['kesehatan_lingkungan']['ada'] }}
                },
                {
                    label: "Tidak Mengikuti Kesehatan Kegiatan Lingkungan",
                    value: {{ $sosial['kesehatan_lingkungan']['tidak'] }}
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });


        const sumberAirData = <?php echo json_encode($sanitasi[0]); ?>;
        const sumberAirOptions = {
            series: [{
                name: 'Jumlah',
                data: sumberAirData.map(function(sumberAir) {
                    return sumberAir;
                })
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#4682B4', '#6A5ACD', '#B22222', '#7FFF00'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['PDAM', 'Sumur', 'Sungai', 'Lainnya'],
            },
            yaxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            }
        };

        const sumberAir = new ApexCharts(document.querySelector("#sumberAir"), sumberAirOptions);
        sumberAir.render();
    </script>
@endsection
