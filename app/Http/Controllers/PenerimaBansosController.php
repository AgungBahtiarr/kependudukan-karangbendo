<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansos;
use App\Models\PenerimaProgram;
use App\Models\ProgramBansos;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class PenerimaBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Data Bansos";

        $search = $request->strquery;
        $select = $request->input('status');
        $bansoses = PenerimaBansos::with('program', 'riwayat', 'warga');
        $programs = ProgramBansos::get();

        if ($search) {
            $bansoses->where('nik', 'like', '%' . strval($search) . '%');
        }
        if ($search == "") {
            $bansoses->get();
        }

        if ($select == 'aktif') {
            $bansoses->where('status', '1');
        }

        if ($select == 'non aktif') {
            $bansoses->where('status', '0');
        }

        foreach ($programs as $program) {
            if ($select == $program->nama_program) {
                $bansoses->whereHas('program', function ($q) use ($program) {
                    $q->where('nama_program', $program->nama_program);
                });
            }
        }

        $bansoses = $bansoses->get();

        // return $bansoses;

        return view("bansos.index", compact('title', 'bansoses', 'programs'));
    }


    public function isLog($id, $penerima_program)
    {
        $title = 'Penerima Bansos';

        $bansos = PenerimaProgram::with('riwayat', 'penerimaBansos')->findOrFail($penerima_program);

        $riwayats = $bansos->riwayat;

        if ($bansos->penerimaBansos->status == "1") {

            if (count($riwayats) == 0) {
                return view("bansos.partials.log", compact('title', 'bansos', 'penerima_program'))->fragment('log');
            }

            foreach ($riwayats as $riwayat) {
                if ($riwayat->created_at->format('M') == Carbon::now()->format('M')) {
                    return "<div></div>";
                } else {
                    return view("bansos.partials.log", compact('title', 'bansos', 'penerima_program'))->fragment('log');
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Bansos';

        $programs = ProgramBansos::get();
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];

        return view('bansos.create', compact('title', 'months', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            return redirect(route("bansos.create"))->withErrors(["penerimaBansos" => "NIK tidak terdaftar di data warga!"]);
        }

        $data = [
            'nik' => $request->nik,
            'status' => '1',
            'created_by' => auth()->user()->id
        ];

        try {
            $bansos = PenerimaBansos::create($data);
        } catch (QueryException $e) {
            return redirect(route("bansos.create"))->withErrors(["penerimaBansos" => "NIK tidak boleh duplikat"]);
        }



        return redirect('/bansos');
    }


    public function status($bansosid, $id)
    {
        $penerima = PenerimaBansos::findOrFail($bansosid);

        $penerima->update(['status' => $id]);

        return response(null, 200, ["HX-Redirect" => '/bansos']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerimaBansos $penerimaBansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bansos = PenerimaBansos::findOrFail($id);

        $title = 'Edit Data Bansos';
        // $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];
        $programs = ProgramBansos::get();

        return view('bansos.edit', compact('bansos', 'title', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nik' => $request->nik,
            'status' => '1',
            'created_by' => auth()->user()->id
        ];
        $bansos = PenerimaBansos::findOrFail($id);

        $bansos->update($data);

        return redirect('/bansos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bansos = PenerimaBansos::findOrFail($id);

        $bansos->delete();

        return response(null, 200, ["HX-Redirect" => '/bansos']);
    }
}
