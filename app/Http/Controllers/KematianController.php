<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKematianRequest;
use App\Http\Requests\UpdateKematianRequest;
use App\Models\Kematian;
use App\Models\Warga;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kematians = Kematian::with('warga')->get();
        $title = "Kematian";
        return view("kematian.index", compact("title", "kematians"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("kematian.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =[
            'nik' => $request->nik,
            'nik_pelapor' => $request->nik_pelapor,
            'waktu_kematian' => $request->waktu_kematian,
            'tanggal_pemakaman' => $request->tanggal_pemakaman,
            'tempat_meninggal' => $request->tempat_meninggal,
            'kontak_keluarga' => $request->kontak_keluarga,
            'sebab_kematian' => $request->sebab_kematian
        ];
        $wargas = Warga::where('nik', $request->nik)->get();

        if (count($wargas) == 0) {
            return redirect('/kematian');
        }
        $wargas = $wargas[0];

        $warga = Warga::findOrFail($wargas->id);
        $warga->update(['status_kematian' => "1"]);
        $kematian = Kematian::create($data);

        return redirect('/kematian');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kematian $kematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKematianRequest $request, Kematian $kematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kematian $kematian)
    {
        //
    }
}
