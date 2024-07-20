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
            "menempel_stiker_p4k" => $request->menempel_stiker_p4k,
            "aktivitas_up2k" => $request->aktivitas_up2k,
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
            'created_by' => auth()->user()->id,
            'verified' => "no"
        ];


        $allSession = array_merge($cargas1, $cargas2, $cargas3, $created_by);



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
            "menempel_stiker_p4k" => $request->menempel_stiker_p4k,
            "aktivitas_up2k" => $request->aktivitas_up2k,
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


    public function verify($id)
    {
        $carga = CatatanRumahTangga::findOrFail($id);

        $carga->update([
            'verified' => 'yes'
        ]);

        return redirect("/cargas");
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);
        $sumbers = SumberAir::get();
        $makanans = MakananPokok::get();

        return view('catatan_rumah_tangga.show.detail', compact('carga','sumbers','makanans'));
    }

    public function show2($id, Request $request)
    {
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);

        $carga = json_decode($carga);
        $sumbers = SumberAir::get();
        $makanans = MakananPokok::get();

        return view('catatan_rumah_tangga.show.detail2', compact('carga', 'makanans'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit1($id)
    {
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $sumbers = SumberAir::get();

        return view('catatan_rumah_tangga.edit.edit1', compact('carga', 'sumbers'))->fragment('detail-1');
    }

    public function edit2($id)
    {
        $makanans = MakananPokok::get();
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);

        return view('catatan_rumah_tangga.edit.edit2', compact('carga', 'makanans'))->fragment('detail-2');
    }

    public function edit3($id)
    {
        $makanans = MakananPokok::get();
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);

        return view('catatan_rumah_tangga.edit.edit3', compact('carga', 'makanans'))->fragment('detail-3');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update1(Request $request)
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

        $carga = CatatanRumahTangga::findOrFail($request->id);

        $carga->update($data);

        return redirect(route("cargas.show", $request->id));
    }

    public function update2(Request $request)
    {
        $data = [
            "id_makanan_pokok" => $request->id_makanan_pokok,
            "menempel_stiker_p4k" => $request->menempel_stiker_p4k,
            "aktivitas_up2k" => $request->aktivitas_up2k,
            "jenis_up2k" => $request->jenis_up2k,
            "usaha_kesehatan_lingkungan" => $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan" => $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga" => $request->industri_rumah_tangga,
            "kerja_bakti" => $request->kerja_bakti,
        ];

        $carga = CatatanRumahTangga::findOrFail($request->id);

        $carga->update($data);

        return redirect(route("cargas.show", $request->id));
    }

    public function update3(Request $request)
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

        $carga = CatatanRumahTangga::findOrFail($request->id);

        $carga->update($data);

        return redirect(route("cargas.show", $request->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    }
}
