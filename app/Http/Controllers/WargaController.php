<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWargaRequest;
use App\Models\Agama;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Warga';

        $wargas = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan')->get();
        $status = $request->input('status');


        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();
        // $seacrhQuery = $request->strquery;


        // if ($seacrhQuery) {
        //     $warga->where('name', 'like', '%' . strval($seacrhQuery) . '%');
        // }


        if ($status == 'Kepala Keluarga') {
            $wargas->where('status_di_keluarga', '1');
        } elseif ($status == 'Anggota Keluarga') {
            $wargas->where('status_di_keluarga', '0');
        }


        // return $wargas;


        return view('warga.index', compact('title', 'wargas', 'status', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans'));
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
            'jabatan' => $request->jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            "id_status_perkawinan" => $request->id_status_perkawinan,
            'id_agama' => $request->id_agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_di_keluarga' => $request->status_di_keluarga,
            'alamat_jalan' => $request->alamat_jalan,
            'alamat_desakel' => $request->alamat_jalan,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'id_pendidikan' => $request->id_pendidikan,
            'id_pekerjaan' => $request->id_pekerjaan,
            'verified' => 'no',
            'created_by' => auth()->user()->id,
        ];

        // return $data;

        $warga = Warga::create(
            $data
        );

        return $warga;


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
