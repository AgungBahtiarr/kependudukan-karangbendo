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

        $cargas = CatatanRumahTangga::with('makananPokok', 'sumberAir')->get();

        $cargas = json_decode($cargas);

        return view("catatan_rumah_tangga.index", compact('cargas', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create1(Request $request)
    {
        $makanans = MakananPokok::get();
        $sumbers = SumberAir::get();

        $cargasSession = $request->session()->get('cargas1');


        return view('catatan_rumah_tangga.create.create1', compact('makanans', 'sumbers', 'cargasSession'));
    }

    public function create2(Request $request)
    {
        $makanans = MakananPokok::get();
        $sumbers = SumberAir::get();
        $cargasSession = $request->session()->get('cargas2');

        return view('catatan_rumah_tangga.create.create2', compact('makanans', 'sumbers', 'cargasSession'));
    }

    public function create3(Request $request)
    {
        $makanans = MakananPokok::get();
        $sumbers = SumberAir::get();
        $cargasSession = $request->session()->get('cargas3');

        return view('catatan_rumah_tangga.create.create3', compact('makanans', 'sumbers', 'cargasSession'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store1(Request $request)
    {
        $data = [
            "nkk" => $request->nkk,
            "nkk_inang" => $request->nkk_inang,
            "jumlah_jamban_keluarga" => $request->jumlah_jamban_keluarga,
            "id_sumber_air" => $request->id_sumber_air,
            "kriteria_rumah" => $request->kriteria_rumah,
            "ada_tempat_sampah" => $request->ada_tempat_sampah,
            "ada_saluran_pembuangan_limbah" => $request->ada_saluran_pembuangan_limbah,
            "satu_rumah_satu_kk" => $request->satu_rumah_satu_kk,
        ];


        $request->session()->put('cargas1', $data);


        return redirect(route('cargas.create2'));
    }


    public function store2(Request $request)
    {
        $data = [
            "id_makanan_pokok" => $request->id_makanan_pokok,
            "menempel_stiker_p4K" => $request->menempel_stiker_p4K,
            "aktifitas_UP2K" => $request->aktifitas_UP2K,
            "jenis_up2k" => $request->jenis_up2k,
            "usaha_kesehatan_lingkungan" => $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan" => $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga" => $request->industri_rumah_tangga,
            "kerja_bakti" => $request->kerja_bakti,
        ];

        $request->session()->put('cargas2', $data);

        return redirect(route('cargas.create3'));
    }







    public function store3(Request $request)
    {
        $rawData = [
            "jumlah_balita" => $request->jumlah_balita,
            "jumlah_pus" => $request->jumlah_pus,
            "jumlah_wus" => $request->jumlah_wus,
            "jumlah_ibu_hamil" =>  $request->jumlah_ibu_hamil,
            "jumlah_ibuta" => $request->jumlah_ibuta,
            "jumlah_ibu_menyusui" => $request->jumlah_ibu_menyusui,
            "jumlah_lansia" => $request->jumlah_lansia,
        ];

        $request->session()->put('cargas3', $rawData);


        $cargas1 = $request->session()->get('cargas1');
        $cargas2 = $request->session()->get('cargas2');
        $cargas3 = $request->session()->get('cargas3');
        $created_by = [
            'created_by' => auth()->user()->id
        ];


        $allSession = array_merge($cargas1,$cargas2,$cargas3,$created_by);



        $cargas = CatatanRumahTangga::create($allSession);
        $cargas = json_decode($cargas);

        if ($cargas->pemanfaatan_pekarangan == "1") {
            return redirect('/pekarangans/create/' . $cargas->id);
        }

        return redirect(route('cargas.index'));
    }

    public function backTo(Request $request)
    {
        $data = [
            "id_makanan_pokok" => $request->id_makanan_pokok,
            "menempel_stiker_p4K" => $request->menempel_stiker_p4K,
            "aktifitas_UP2K" => $request->aktifitas_UP2K,
            "jenis_up2k" => $request->jenis_up2k,
            "usaha_kesehatan_lingkungan" => $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan" => $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga" => $request->industri_rumah_tangga,
            "kerja_bakti" => $request->kerja_bakti,
        ];

        $request->session()->put('cargas2', $data);

        return response(null, 200, ["HX-Redirect" => '/cargas/create1']);
    }



    public function backTo2(Request $request)
    {
        $data = [
            "jumlah_balita" => $request->jumlah_balita,
            "jumlah_pus" => $request->jumlah_pus,
            "jumlah_wus" => $request->jumlah_wus,
            "jumlah_ibu_hamil" =>  $request->jumlah_ibu_hamil,
            "jumlah_ibuta" => $request->jumlah_ibuta,
            "jumlah_ibu_menyusui" => $request->jumlah_ibu_menyusui,
            "jumlah_lansia" => $request->jumlah_lansia,
        ];

        $request->session()->put('cargas3', $data);

        return response(null, 200, ["HX-Redirect" => '/cargas/create2']);
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
