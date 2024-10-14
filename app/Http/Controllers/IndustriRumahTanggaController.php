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

        return view('industri_rumah_tangga.create', compact('carga', 'title'));
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
            'keterangan_sandang' => $request->keterangan_sandang,
            'bidang_pangan' => $request->bidang_pangan,
            'keterangan_pangan' => $request->keterangan_pangan,
            'bidang_jasa' => $request->bidang_jasa,
            'keterangan_jasa' => $request->keterangan_jasa,
            'nama_usaha' => $request->nama_usaha,
            'created_by' => auth()->user()->id
        ];

        $industri = IndustriRumahTangga::create($data);

        return redirect('/cargas');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $nkk)
    {
        $title = 'Detail Industri Rumah Tangga';

        $industri = IndustriRumahTangga::where('nkk', $nkk)->get();

        $isIndustri = true;

        if (count($industri) != 0) {
            $industri = $industri[0];
            return view("industri_rumah_tangga.detail", compact('title', 'industri', 'id', 'nkk', 'isIndustri'));
        } else {
            $isIndustri = false;
            return view("industri_rumah_tangga.detail", compact('title', 'industri', 'id', 'nkk', 'isIndustri'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $title = 'Edit Industri Rumah Tangga';

        $industri = IndustriRumahTangga::findOrFail($id);

        return view('industri_rumah_tangga.edit', compact('title', 'industri'))->fragment('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = [
            'bidang_sandang' => $request->bidang_sandang,
            'keterangan_sandang' => $request->keterangan_sandang,
            'bidang_pangan' => $request->bidang_pangan,
            'keterangan_pangan' => $request->keterangan_pangan,
            'bidang_jasa' => $request->bidang_jasa,
            'keterangan_jasa' => $request->keterangan_jasa,
            'nama_usaha' => $request->nama_usaha,
        ];
        $industri = IndustriRumahTangga::findOrFail($request->id);

        $industri->update($data);

        return redirect(route("industries.show", [$industri->id, $industri->nkk]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IndustriRumahTangga $industriRumahTangga)
    {
        //
    }
}
