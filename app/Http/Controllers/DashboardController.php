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

        return view('dashboard.index', compact('title', 'jumlahWarga', 'jumlahCatatanKeluarga'));
    }
}
