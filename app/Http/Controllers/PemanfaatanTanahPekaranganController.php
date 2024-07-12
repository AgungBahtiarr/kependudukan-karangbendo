<?php

namespace App\Http\Controllers;

use App\Models\PemanfaatanTanahPekarangan;
use App\Http\Requests\StorePemanfaatanTanahPekaranganRequest;
use App\Http\Requests\UpdatePemanfaatanTanahPekaranganRequest;
use App\Models\CatatanRumahTangga;
use Illuminate\Http\Request;

class PemanfaatanTanahPekaranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = "Pemanfaatan Tanah Pekarangan";

        $cargas = CatatanRumahTangga::with('makananPokok', 'sumberAir')->where('pemanfaatan_pekarangan', '1')->get();
        $cargas = json_decode($cargas);

        return view('pemanfaatan_pekarangan.index', compact('title', 'cargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        $title = "Pemanfaatan Tanah Pekarangan";
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);

        return view('pemanfaatan_pekarangan.create', compact('title', 'carga'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id_carga = $request->id_carga;
        $data = [
            'nkk' => $request->nkk,
            'tanaman_keras' => $request->tanaman_keras,
            'toga' => $request->toga,
            'lumbung_hidup' => $request->lumbung_hidup,
            'warung_hidup' => $request->warung_hidup,
            'perikanan' => $request->perikanan,
        ];

        $pekarangan = PemanfaatanTanahPekarangan::create($data);

        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id_carga);

        if ($carga->industri_rumah_tangga == 1) {
            return redirect('/industries/create/' . $carga->id);
        }


        return redirect(route('cargas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PemanfaatanTanahPekarangan $pemanfaatanTanahPekarangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemanfaatanTanahPekarangan $pemanfaatanTanahPekarangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemanfaatanTanahPekaranganRequest $request, PemanfaatanTanahPekarangan $pemanfaatanTanahPekarangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemanfaatanTanahPekarangan $pemanfaatanTanahPekarangan)
    {
        //
    }
}
