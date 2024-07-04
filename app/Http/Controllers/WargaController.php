<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWargaRequest;
use App\Http\Requests\UpdateWargaRequest;
use App\Models\Warga;
use Illuminate\Support\Facades\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Kader';

        $warga = Warga::all();
        $status = $request->input('status');
        // $seacrhQuery = $request->strquery;


        // if ($seacrhQuery) {
        //     $warga->where('name', 'like', '%' . strval($seacrhQuery) . '%');
        // }


        if ($status == 'Kepala Keluarga') {
            $warga->where('status_di_keluarga', '1');
        } elseif ($status == 'Anggota Keluarga') {
            $warga->where('status_di_keluarga', '0');
        }


        return view('warga.index', compact('title', 'warga', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        // ]);

        $data = [
            'no_registrasi' => $request->no_registrasi,
            'nik' => $request->nik,
            'nkk' => $request->nkk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_di_keluarga' => $request->status_di_keluarga,
            'alamat_jalan' => $request->alamat_jalan,
            'alamat_desakel' => $request->alamat_jalan,
            'alamat_kec' => $request->alamat_kec,
            'alamat_kab' => $request->alamat_kab,
            'alamat_prov' => $request->alamat_prov,
        ];

        $warga = Warga::create(
            $data
        );


        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan data kader');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warga $warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWargaRequest $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        //
    }
}
