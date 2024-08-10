@extends('layouts.app')


@section('content')
    <div class="flex justify-between mx-4 my-4">
        <h1 class="text-xl font-bold">Laporan Demografi</h1>
        <button class="btn btn-primary">Cetak Laporan</button>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mx-4">

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Total Warga</h4>
            </div>

            <div class="card-body flex justify-center items-center my-10">
                <h1 class="text-5xl font-medium">100+</h1>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Jenis Kelamin</h4>
            </div>

            <div class="card-body">
                <div id="morris-donut-chart"></div>
            </div>
        </div>

        <div class="card col-span-2">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Usia</h4>
            </div>
            <div class="card-body">
                <div id="usia"></div>
            </div>
        </div>

        <div class="card ">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Agama</h4>
            </div>
            <div class="card-body">
                <div id="agama"></div>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Tingkat Pendidikan</h4>
            </div>
            <div class="card-body">
                <div id="pendidikan"></div>
            </div>
        </div>



        <div class="card ">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Pekerjaan Warga</h4>
            </div>
            <div class="card-body">
                <div id="pekerjaan"></div>
            </div>
        </div>

        <div class="card ">
            <div class="card-header">
                <h4 class="header-title">Berdasarkan Status Perkawinan</h4>
            </div>
            <div class="card-body">
                <div id="perkawinan"></div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        const jenisKelamin = Morris.Donut({
            // ID of the element in which to draw the chart.
            element: 'morris-donut-chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [{
                    label: "Laki-laki",
                    value: 55
                },
                {
                    label: "Perempuan",
                    value: 45
                }
            ],
            colors: ['#3498db', '#e74c3c'],
            formatter: function(y, data) {
                return y;
            }
        });

        const agamaOptions = {
            series: [{
                name: 'Jumlah Warga',
                data: [100, 75, 50, 75, 65, 54]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#1E90FF', '#32CD32', '#FFA500', '#FF6347', '#8A2BE2', '#20B2AA'],
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
                categories: ['Islam', 'Kristen', 'Hindu', 'Budha', 'Katholik', 'Kong Hu Cu'],
            },
            yaxis: {
                title: {
                    text: 'Jumlah Warga'
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

        const agama = new ApexCharts(document.querySelector("#agama"), agamaOptions);
        agama.render();

        const pendidikanOptions = {
            series: [{
                name: 'Jumlah',
                data: [100, 75, 50, 75, 65, 54, 54]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#FF69B4', '#CD5C5C', '#FFA07A', '#FFD700', '#98FB98', '#AFEEEE', '#DB7093'],
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
                categories: ['SD', 'SMP', 'SMA', 'D3', 'D4/S1', 'S2', 'S3'],
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

        const pendidikan = new ApexCharts(document.querySelector("#pendidikan"), pendidikanOptions);
        pendidikan.render();

        const pekerjaanOptions = {
            series: [{
                name: 'Jumlah',
                data: [100, 75, 50, 75, 65, 54]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#4682B4', '#6A5ACD', '#B22222', '#7FFF00', '#FF7F50', '#8B4513'],
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
                categories: ['Pegawai Negeri Sipil', 'Pegawai Swasta', 'Pelayan', 'Karyawan', 'Belum Bekerja',
                    'Lainnya'
                ],
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

        const pekerjaan = new ApexCharts(document.querySelector("#pekerjaan"), pekerjaanOptions);
        pekerjaan.render();

        const perkawinanOptions = {
            series: [{
                name: 'Jumlah Warga',
                data: [100, 75, 50, 75]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            colors: ['#FF4500', '#DA70D6', '#32CD32', '#87CEEB'],
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
                categories: ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'],
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

        const perkawinan = new ApexCharts(document.querySelector("#perkawinan"), perkawinanOptions);
        perkawinan.render();

        var usiaOtions = {
            series: [{
                data: [8, 3, 12, 6, 6, 10, 30, 15, 10]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['0-4 tahun', '5-6 tahun', '7-12 tahun', '13-15 tahun', '16-18 tahun', '19-24 tahun',
                    '25-49 tahun', '50-64 tahun', '65+ tahun'
                ],
                title: {
                    text: 'Persentase Penduduk'
                }
            },
            yaxis: {
                title: {
                    text: 'Rentang Usia'
                }
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val + "%"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#usia"), usiaOtions);
        chart.render();
    </script>
@endsection
