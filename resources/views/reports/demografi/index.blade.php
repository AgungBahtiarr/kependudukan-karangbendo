<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Demografi Desa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }

        .header {
            padding: 20px;
            border-bottom: 2px solid #000;
        }

        .img-logo {
            width: 50px;
            height: 50px;
            max-width: 100%;
            object-fit: contain;
        }

        .wrapper-header {
            display: flex;
            align-items: center;
            justify-content: flex-start;

        }

        .wrapper-header>div:first-child {
            flex-shrink: 0;
            margin-right: 20px;
        }

        .wrapper-header img {
            width: 100px;
            /* Sesuaikan ukuran gambar */
            height: auto;
            max-width: 100%;
        }

        .kata-kata {
            flex-grow: 1;
            text-align: center;
            display: inline-block;
            margin-left: 60px;
        }

        .kata-kata h1 {
            margin: 0;
            font-size: 18px;
            /* Sesuaikan ukuran font */
            font-weight: bold;
            line-height: 1.2;
        }

        .kata-kata p {
            margin: 5px 0 0;
            font-size: 14px;
            /* Sesuaikan ukuran font */
        }

        /* Media query untuk layar kecil */
        @media (max-width: 768px) {
            .wrapper-header {
                flex-direction: column;
                align-items: center;
            }

            .wrapper-header>div:first-child {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .kata-kata {
                text-align: center;
            }
        }

        h1 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 16px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-style: italic;
        }
    </style>
</head>

<body>
    @php
        $path = 'assets/images/logo/logobwi.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    @endphp
    <div class="header">
        <div class="wrapper-header">
            <img class="img-logo" src="{{ $base64 }}" alt="" width="50" height="50" srcset="" />

            <div class="kata-kata">
                <h1>
                    PEMERINTAH KABUPATEN BANYUWANGI
                </h1>
                <span>KECAMATAN ROGOJAMPI</span>
                <span>DESA KARANGBENDO</span>
                <p> Jl. H. Muso No.86 Phone (0333) 630786 </p>
                <p>@mail : desa.karangbendo@gmail.com </p>
            </div>
        </div>
    </div>

    <h2>1. Distribusi Jenis Kelamin</h2>
    <table>
        <tr>
            <th>Jenis Kelamin</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Laki-laki</td>
            <td>{{ $jenisKelamin['laki_laki'] }}</td>
        </tr>
        <tr>
            <td>Perempuan</td>
            <td>{{ $jenisKelamin['perempuan'] }}</td>
        </tr>
    </table>

    <h2>2. Distribusi Usia</h2>
    <table>
        <tr>
            <th>Rentang Usia</th>
            <th>Jumlah</th>
        </tr>

        @php
            $namaRentangUsia = [
                '0-4 tahun',
                '5-6 tahun',
                '7-12 tahun',
                '13-15 tahun',
                '16-18 tahun',
                '19-24 tahun',
                '25-49 tahun',
                '50-64 tahun',
                '65+ tahun',
            ];
        @endphp

        @foreach ($rentangUsia as $index => $item)
            <tr>
                <td>{{ $namaRentangUsia[$index] }}</td>
                <td>{{ $item }}</td>
            </tr>
        @endforeach

    </table>

    <h2>3. Distribusi Agama</h2>
    <table>
        <tr>
            <th>Agama</th>
            <th>Jumlah</th>
        </tr>
        @php
            $agamaLabels = ['Islam', 'Kristen', 'Hindu', 'Budha', 'Katolik', 'Khong Hu Cu'];
        @endphp

        @foreach ($agama as $index => $item)
            <tr>
                <td>{{ $agamaLabels[$index] }}</td>
                <td>{{ $item }}</td>
            </tr>
        @endforeach
    </table>

    <h2>4. Tingkat Pendidikan</h2>
    <table>
        <tr>
            <th>Tingkat Pendidikan</th>
            <th>Jumlah</th>
        </tr>
        @php
            $pendidikanLabels = ['SD', 'SMP', 'SMA', 'D3', 'D4/S1', 'S2', 'S3'];
        @endphp
        @foreach ($pendidikan as $index => $item)
            <tr>
                <td>{{ $pendidikanLabels[$index] }}</td>
                <td>{{ $item }}</td>
            </tr>
        @endforeach

    </table>

    <h2>5. Jenis Pekerjaan</h2>
    <table>
        <tr>
            <th>Jenis Pekerjaan</th>
            <th>Jumlah</th>
        </tr>
        @php
            $pekerjaanLabels = [
                'Pegawai Negeri Sipil',
                'Pegawai Swasta',
                'Pelayan',
                'Karyawan',
                'Belum Bekerja',
                'Lainnya',
            ];
        @endphp
        @foreach ($pekerjaan as $index => $item)
            <tr>
                <td>{{ $pekerjaanLabels[$index] }}</td>
                <td>{{ $item }}</td>
            </tr>
        @endforeach

    </table>

    <h2>6. Status Perkawinan</h2>
    <table>
        <tr>
            <th>Status Perkawinan</th>
            <th>Jumlah</th>
        </tr>
        @php
            $perkawinanLabels = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];
        @endphp
        @foreach ($perkawinan as $index => $item)
            <tr>
                <td>{{ $perkawinanLabels[$index] }}</td>
                <td>{{ $item }}</td>
            </tr>
        @endforeach

    </table>

    <div class="footer">
        <p>Laporan ini digenerate otomatis pada {{ date('d F Y H:i:s') }}</p>
    </div>
</body>

</html>
