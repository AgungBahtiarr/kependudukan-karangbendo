<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenerimaProgramRequest;
use App\Http\Requests\UpdatePenerimaProgramRequest;
use App\Models\PenerimaBansos;
use App\Models\PenerimaProgram;
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
        $bansoses = PenerimaBansos::with('program', 'riwayat')->get();
        $programId = $id;
        return view("program_bansos.add-penerima-program", compact('bansoses', 'programId'));
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
        }

        return redirect(route("programbansos.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $penerimas = PenerimaProgram::with('penerimaBansos', 'programBansos')->where('id_program_bansos', $id)->get();

        return view("program_bansos.show", compact('penerimas'));
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
