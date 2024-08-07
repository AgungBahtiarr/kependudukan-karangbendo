<?php

namespace App\Http\Controllers;

use App\Models\CatatanRumahTangga;
use App\Models\Warga;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';

        $jumlahWarga = Warga::count();
        $jumlahCatatanKeluarga = CatatanRumahTangga::count();

        $jumlahWargaTerverifikasi = Warga::where('verified', 'yes')->count();
        $jumlahCatatanKeluargaTerverifikasi = CatatanRumahTangga::where('verified', 'yes')->count();


        return view('dashboard.index', compact('title', 'jumlahWarga', 'jumlahCatatanKeluarga', 'jumlahWargaTerverifikasi', 'jumlahCatatanKeluargaTerverifikasi'));
    }
}
