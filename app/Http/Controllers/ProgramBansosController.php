<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramBansosRequest;
use App\Http\Requests\UpdateProgramBansosRequest;
use App\Models\PenerimaBansos;
use App\Models\ProgramBansos;
use Illuminate\Http\Request;

class ProgramBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programs = ProgramBansos::query();
        $search = $request->strquery;

        if ($search) {
            $programs->where('nama_program', 'like', '%' . strval($search) . '%');
        }

        if ($search == "") {
            $programs->get();
        }

        $programs = $programs->get();

        return view('program_bansos.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program_bansos.create');
    }

    public function isUsed($id)
    {
        $penerima = PenerimaBansos::where('id_program_bansos', $id)->get();
        $program = ProgramBansos::findOrFail($id);
        if (count($penerima) == 0) {
            return view("program_bansos.partials.delete", compact('program'))->fragment('delete');
        } else {
            return "";
        }
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
    public function edit($id)
    {
        $program = ProgramBansos::findOrFail($id);

        return view('program_bansos.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nama_program' => $request->nama_program,
            'sumber_dana' => $request->sumber_dana,
            'jenis_bantuan' => $request->jenis_bantuan,
            'detail_bantuan' => $request->detail_bantuan
        ];
        $program = ProgramBansos::findOrFail($id);
        $program->update($data);

        return redirect(route("programbansos.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = ProgramBansos::findOrFail($id);
        $penerima = PenerimaBansos::where('id_program_bansos', $id)->get();
        if (count($penerima) == 0) {
            $program->delete();
        }
        return response(null, 200, ["HX-Redirect" => route('programbansos.index')]);
    }
}
