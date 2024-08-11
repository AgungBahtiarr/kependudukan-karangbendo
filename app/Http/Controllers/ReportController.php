<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function rentangUsia($wargas)
    {
        // $wargas = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan')->get();
        $rentangUsia = [
            '0-4' => 0,
            '5-6' => 0,
            '7-12' => 0,
            '13-15' => 0,
            '16-18' => 0,
            '19-24' => 0,
            '25-49' => 0,
            '50-64' => 0,
            '65+' => 0
        ];

        foreach ($wargas as $warga) {
            $tanggalLahir = Carbon::parse($warga->tanggal_lahir);
            $usia = $tanggalLahir->age;

            if ($usia >= 0 && $usia <= 4) {
                $rentangUsia['0-4']++;
            } elseif ($usia >= 5 && $usia <= 6) {
                $rentangUsia['5-6']++;
            } elseif ($usia >= 7 && $usia <= 12) {
                $rentangUsia['7-12']++;
            } elseif ($usia >= 13 && $usia <= 15) {
                $rentangUsia['13-15']++;
            } elseif ($usia >= 16 && $usia <= 18) {
                $rentangUsia['16-18']++;
            } elseif ($usia >= 19 && $usia <= 24) {
                $rentangUsia['19-24']++;
            } elseif ($usia >= 25 && $usia <= 49) {
                $rentangUsia['25-49']++;
            } elseif ($usia >= 50 && $usia <= 64) {
                $rentangUsia['50-64']++;
            } elseif ($usia >= 65) {
                $rentangUsia['65+']++;
            }
        }

        $usia = [
            $rentangUsia['0-4'],
            $rentangUsia['5-6'],
            $rentangUsia['7-12'],
            $rentangUsia['13-15'],
            $rentangUsia['16-18'],
            $rentangUsia['19-24'],
            $rentangUsia['25-49'],
            $rentangUsia['50-64'],
            $rentangUsia['65+'],
        ];

        return $usia;

        // $totalWarga = count($wargas);
        // $rentangUsiaPersentase = array_map(function ($value) use ($totalWarga) {
        //     return round(($value / $totalWarga) * 100, 2);
        // }, $rentangUsia);

    }

    public function jenisKelamin($wargas)
    {
        $pria = [];
        $wanita = [];
        foreach ($wargas as $warga) {
            if ($warga->jenis_kelamin == "L") {
                array_push($pria, $warga);
            }
            if ($warga->jenis_kelamin == "P") {
                array_push($wanita, $warga);
            }
        }

        $jenis_kelamin = [
            'laki_laki' => count($pria),
            'perempuan' => count($wanita)
        ];

        return $jenis_kelamin;
    }

    public function agama($wargas)
    {
        $agamaList = [
            'Islam' => 0,
            'Kristen' => 0,
            'Katolik' => 0,
            'Hindu' => 0,
            'Budha' => 0,
            'Khong Hu Cu' => 0,
        ];

        foreach ($wargas as $warga) {
            $namaAgama = $warga->agama->nama_agama;
            if (array_key_exists($namaAgama, $agamaList)) {
                $agamaList[$namaAgama]++;
            } else {
                $agamaList['Lainnya']++;
            }
        }

        $totalWarga = count($wargas);
        $agamaDistribusi = array_map(function ($jumlah) use ($totalWarga) {
            return $jumlah;
        }, $agamaList);


        $agama = [
            $agamaDistribusi['Islam'],
            $agamaDistribusi['Kristen'],
            $agamaDistribusi['Hindu'],
            $agamaDistribusi['Budha'],
            $agamaDistribusi['Katolik'],
            $agamaDistribusi['Khong Hu Cu']
        ];

        return $agama;
    }


    public function pendidikan($wargas)
    {
        $pendidikanList = [
            'SD' => 0,
            'SMP' => 0,
            'SMA' => 0,
            'D3' => 0,
            'D4/S1' => 0,
            'S2' => 0,
            'S3' => 0,
        ];

        foreach ($wargas as $warga) {
            $namaPendidikan = $warga->pendidikan->nama_pendidikan;
            if (array_key_exists($namaPendidikan, $pendidikanList)) {
                $pendidikanList[$namaPendidikan]++;
            } else {
                $pendidikanList['Lainnya']++;
            }
        }

        $totalWarga = count($wargas);
        $pendidikanDistribusi = array_map(function ($jumlah) use ($totalWarga) {
            return $jumlah;
        }, $pendidikanList);


        $pendidikan = [
            $pendidikanDistribusi['SD'],
            $pendidikanDistribusi['SMP'],
            $pendidikanDistribusi['SMA'],
            $pendidikanDistribusi['D3'],
            $pendidikanDistribusi['D4/S1'],
            $pendidikanDistribusi['S2'],
            $pendidikanDistribusi['S3']
        ];

        return $pendidikan;
    }


    public function pekerjaan($wargas)
    {
        $pekerjaanList = [
            'Pegawai Negeri Sipil' => 0,
            'Pegawai Swasta' => 0,
            'Pelayan' => 0,
            'Karyawan' => 0,
            'Belum Bekerja' => 0,
            'Lainnya' => 0,
        ];

        foreach ($wargas as $warga) {
            $namapekerjaan = $warga->pekerjaan->nama_pekerjaan;
            if (array_key_exists($namapekerjaan, $pekerjaanList)) {
                $pekerjaanList[$namapekerjaan]++;
            } else {
                $pekerjaanList['Lainnya']++;
            }
        }

        $totalWarga = count($wargas);
        $pekerjaanDistribusi = array_map(function ($jumlah) use ($totalWarga) {
            return $jumlah;
        }, $pekerjaanList);


        $pekerjaan = [
            $pekerjaanDistribusi['Pegawai Negeri Sipil'],
            $pekerjaanDistribusi['Pegawai Swasta'],
            $pekerjaanDistribusi['Pelayan'],
            $pekerjaanDistribusi['Karyawan'],
            $pekerjaanDistribusi['Belum Bekerja'],
            $pekerjaanDistribusi['Lainnya'],
        ];

        return $pekerjaan;
    }


    public function perkawinan($wargas)
    {
        $status_perkawinanList = [
            'Belum Kawin' => 0,
            'Kawin' => 0,
            'Cerai Hidup' => 0,
            'Cerai Mati' => 0,
        ];

        foreach ($wargas as $warga) {
            $namastatus_perkawinan = $warga->statusPerkawinan->nama_status_kawin;
            if (array_key_exists($namastatus_perkawinan, $status_perkawinanList)) {
                $status_perkawinanList[$namastatus_perkawinan]++;
            } else {
                $status_perkawinanList['Lainnya']++;
            }
        }

        $totalWarga = count($wargas);
        $status_perkawinanDistribusi = array_map(function ($jumlah) use ($totalWarga) {
            return $jumlah;
        }, $status_perkawinanList);


        $status_perkawinan = [
            $status_perkawinanDistribusi['Belum Kawin'],
            $status_perkawinanDistribusi['Kawin'],
            $status_perkawinanDistribusi['Cerai Hidup'],
            $status_perkawinanDistribusi['Cerai Mati'],
        ];

        return $status_perkawinan;
    }

    public function index()
    {
        $wargas = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan')->get();

        $jenis_kelamin = ReportController::jenisKelamin($wargas);
        $rentangUsia = ReportController::rentangUsia($wargas);
        $agama = ReportController::agama($wargas);
        $pendidikan = ReportController::pendidikan($wargas);
        $pekerjaan = ReportController::pekerjaan($wargas);
        $perkawinan = ReportController::perkawinan($wargas);

        return view("reports.index", compact('wargas', 'jenis_kelamin', 'rentangUsia', 'agama', 'pendidikan', 'pekerjaan', 'perkawinan'));
    }
}
