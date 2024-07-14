<?php

namespace App\Http\Controllers;

use App\Models\IndustriRumahTangga;
use App\Http\Requests\StoreIndustriRumahTanggaRequest;
use App\Http\Requests\UpdateIndustriRumahTanggaRequest;
use App\Models\CatatanRumahTangga;
use Illuminate\Http\Request;

class IndustriRumahTanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {

        $title = "Industri Rumah Tangga";

        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);

        $carga = json_decode($carga);

        return view('industri_rumah_tangga.create', compact('carga','title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id_carga = $request->id_carga;
        $data = [
            'nkk' => $request->nkk,
            'bidang_sandang' => $request->bidang_sandang,
            'bidang_pangan' => $request->bidang_pangan,
            'bidang_jasa' => $request->bidang_jasa,
            'nama_usaha' => $request->nama_usaha,
            'created_by' => auth()->user()->id
        ];

        $industri = IndustriRumahTangga::create($data);

        return redirect('/cargas');
    }

    /**
     * Display the specified resource.
     */
    public function show(IndustriRumahTangga $industriRumahTangga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IndustriRumahTangga $industriRumahTangga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIndustriRumahTanggaRequest $request, IndustriRumahTangga $industriRumahTangga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustriRumahTangga $industriRumahTangga)
    {
        //
    }
}
