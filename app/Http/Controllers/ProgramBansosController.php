<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramBansosRequest;
use App\Http\Requests\UpdateProgramBansosRequest;
use App\Models\ProgramBansos;
use Illuminate\Http\Request;

class ProgramBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs =  ProgramBansos::all();
        return view('program_bansos.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program_bansos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_program' => $request->nama_program,
            'sumber_dana' => $request->sumber_dana,
            'jenis_bantuan' => $request->jenis_bantuan,
            'detail_bantuan' => $request->detail_bantuan
        ];

        $program = ProgramBansos::create($data);

        return redirect('/program-bansos');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgramBansos $programBansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramBansos $programBansos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramBansosRequest $request, ProgramBansos $programBansos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramBansos $programBansos)
    {
        //
    }
}
