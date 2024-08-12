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
            text-align: center;
            margin-bottom: 20px;
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
    <div class="header">
        <h1>Laporan Demografi Desa Karangbendo</h1>
        <p>Tanggal: {{ date('d F Y') }}</p>
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
