<?php

namespace App\Http\Controllers;

use App\Models\CatatanRumahTangga;
use App\Http\Requests\StoreCatatanRumahTanggaRequest;
use App\Http\Requests\UpdateCatatanRumahTanggaRequest;
use App\Models\MakananPokok;
use App\Models\SumberAir;
use Illuminate\Http\Request;

class CatatanRumahTanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Catatan Rumah Tangga';

        $cargas = CatatanRumahTangga::with('makananPokok','sumberAir')->get();

        $cargas = json_decode($cargas);

        return view("catatan_rumah_tangga.index", compact('cargas','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
           $makanans = MakananPokok::get();
           $sumbers = SumberAir::get();
        return view('catatan_rumah_tangga.create.create',compact('makanans','sumbers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            "nkk"=> $request->nkk,
            "kriteria_rumah"=> $request->kriteria_rumah,
            "jumlah_jamban_keluarga"=> $request->jumlah_jamban_keluarga,
            "id_sumber_air"=> $request->id_sumber_air,
            "ada_tempat_sampah"=> $request->ada_tempat_sampah,
            "ada_saluran_pembuangan_limbah"=> $request->ada_saluran_pembuangan_limbah,
            "satu_rumah_satu_kk"=> $request->satu_rumah_satu_kk,
            "nkk_inang"=> $request->nkk_inang,
            "jumlah_balita"=> $request->jumlah_balita,
            "jumlah_pus"=> $request->jumlah_pus,
            "jumlah_wus"=> $request->jumlah_wus,
            "jumlah_ibu_hamil"=>  $request->jumlah_ibu_hamil,
            "jumlah_ibuta"=> $request->jumlah_ibuta,
            "jumlah_ibu_menyusui"=> $request->jumlah_ibu_menyusui,
            "jumlah_lansia"=> $request->jumlah_lansia,
            "id_makanan_pokok"=> $request->id_makanan_pokok,
            "menempel_stiker_p4K"=> $request->menempel_stiker_p4K,
            "aktifitas_UP2K"=> $request->aktifitas_UP2K,
            "jenis_up2k"=> $request->jenis_up2k,
            "usaha_kesehatan_lingkungan"=> $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan"=> $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga"=> $request->industri_rumah_tangga,
            "kerja_bakti"=> $request->kerja_bakti,
            "verified" => 'no',
            "created_by" => auth()->user()->id,
        ];

        $cargas = CatatanRumahTangga::create($data);

        return redirect(route('cargas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CatatanRumahTangga $catatanRumahTangga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatatanRumahTangga $catatanRumahTangga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateCatatanRumahTanggaRequest $request,
        CatatanRumahTangga $catatanRumahTangga
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CatatanRumahTangga $catatanRumahTangga)
    {
        //
    }
}
