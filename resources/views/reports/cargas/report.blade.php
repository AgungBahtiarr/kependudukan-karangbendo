<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Catatan Rumah Tangga Desa</title>
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

    <h2>1. Kriteria Rumah Layak Huni</h2>
    <table>
        <tr>
            <th>Kriteria Rumah</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Layak Huni</td>
            <td>{{ $statistik['rumahLayak'] }}</td>
        </tr>
        <tr>
            <td>Tidak Layak Huni</td>
            <td>{{ $statistik['rumahTidakLayak'] }}</td>
        </tr>
    </table>

    <h2>2. Kepemilikan Jamban Di Rumah Tangga</h2>
    <table>
        <tr>
            <th>Kepemilikan Jamban</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Memiliki Jamban</td>
            <td>{{ $statistik['jamban']['ada'] }}</td>
        </tr>
        <tr>
            <td>Tidak Memiliki Jamban</td>
            <td>{{ $statistik['jamban']['tidak'] }}</td>
        </tr>
    </table>

    <h2>3. Sumber Air</h2>
    <table>
        <tr>
            <th>Sumber Air</th>
            <th>Jumlah</th>
        </tr>

        <tr>
            <td>PDAM</td>
            <td>{{ $sanitasi[0][0] }}</td>
        </tr>
        <tr>
            <td>Sumur</td>
            <td>{{ $sanitasi[0][1] }}</td>
        </tr>
        <tr>
            <td>Sungai</td>
            <td>{{ $sanitasi[0][2] }}</td>
        </tr>
        <tr>
            <td>Lainnya</td>
            <td>{{ $sanitasi[0][3] }}</td>
        </tr>
    </table>

    <h2>4. Memiliki Tempat Sampah Di Rumah Tangga</h2>
    <table>
        <tr>
            <th>Memiliki Tempat Sampah</th>
            <th>Jumlah</th>
        </tr>

        <tr>
            <td>Ada Tempat Sampah</td>
            <td>{{ $sanitasi['tempat_sampah']['ada'] }}</td>
        </tr>
        <tr>
            <td>Tidak Ada Tempat Sampah</td>
            <td>{{ $sanitasi['tempat_sampah']['tidak'] }}</td>
        </tr>

    </table>

    <h2>5. Memiliki Pembuangan Limbah Di Rumah Tangga</h2>
    <table>
        <tr>
            <th>Memiliki Pembuangan Limbah</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Ada Pembuangan Limbah</td>
            <td>{{ $sanitasi['pembuangan_limbah']['ada'] }}</td>
        </tr>
        <tr>
            <td>Ada Pembuangan Limbah</td>
            <td>{{ $sanitasi['pembuangan_limbah']['tidak'] }}</td>
        </tr>
    </table>

    <h2>6. Keikutsertaa Kegiatan Kerja Bakti</h2>
    <table>
        <tr>
            <th>Mengikuti Kegiatan Kerja Bakti</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Mengikuti Kegiatan Kerja Bakti</td>
            <td>{{ $sosial['kerja_bakti']['ada'] }}</td>
        </tr>
        <tr>
            <td>Tidak Mengikuti Kegiatan Kerja Bakti</td>
            <td>{{ $sosial['kerja_bakti']['tidak'] }}</td>
        </tr>
    </table>

    <h2>7. Memiliki Industri Rumah Tangga</h2>
    <table>
        <tr>
            <th>Mengikuti Industri Rumah Tangga</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Memiliki Industri Rumah Tangga</td>
            <td>{{ $sosial['industri']['ada'] }}</td>
        </tr>
        <tr>
            <td>Tidak Memiliki Industri Rumah Tangga</td>
            <td>{{ $sosial['industri']['tidak'] }}</td>
        </tr>
    </table>

    <h2>8. Mengikuti Kegiatan Kesehatan Lingkungan</h2>
    <table>
        <tr>
            <th>Mengikuti Kegiatan Kesehatan Lingkungan</th>
            <th>Jumlah</th>
        </tr>
        <tr>
            <td>Mengikuti Kegiatan Kesehatan Lingkungan</td>
            <td>{{ $sosial['kesehatan_lingkungan']['ada'] }}</td>
        </tr>
        <tr>
            <td>Mengikuti Kegiatan Kesehatan Lingkungan</td>
            <td>{{ $sosial['kesehatan_lingkungan']['tidak'] }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Laporan ini digenerate otomatis pada {{ date('d F Y H:i:s') }}</p>
    </div>
</body>

</html>
