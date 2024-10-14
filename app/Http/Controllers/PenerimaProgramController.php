<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenerimaProgramRequest;
use App\Http\Requests\UpdatePenerimaProgramRequest;
use App\Models\PenerimaBansos;
use App\Models\PenerimaProgram;
use App\Models\TransaksiBansos;
use Illuminate\Http\Request;

class PenerimaProgramController extends Controller
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
    public function create($id)
    {
        $title = 'Tambah Data Penerima Program Bansos';

        $bansoses = PenerimaBansos::with('program', 'riwayat', 'warga')->get();

        $programId = $id;

        return view("program_bansos.add-penerima-program", compact('title', 'bansoses', 'programId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $penerimas = $request->selected_recipients;

        foreach ($penerimas as $penerima) {
            $data = [
                'id_program_bansos' => $request->program_id,
                'id_penerima_bansos' => $penerima
            ];

            $penerimaProgram = PenerimaProgram::create($data);

            $dataRiwayat = [
                'id_penerima_bansos' => $penerimaProgram->id_penerima_bansos,
                'id_penerima_program' => $penerimaProgram->id,
            ];

            $trabas = TransaksiBansos::create($dataRiwayat);
        }

        return redirect(route("programbansos.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $title = 'Detail Data Penerima Program Bansos';

        $penerimas = PenerimaProgram::with('penerimaBansos.warga', 'programBansos')->where('id_program_bansos', $id)->get();

        return view("program_bansos.show", compact('title', 'penerimas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenerimaProgram $penerimaProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenerimaProgramRequest $request, PenerimaProgram $penerimaProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenerimaProgram $penerimaProgram)
    {
        //
    }
}
