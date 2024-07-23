<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansos;
use App\Http\Requests\StorePenerimaBansosRequest;
use App\Http\Requests\UpdatePenerimaBansosRequest;
use Illuminate\Http\Request;

class PenerimaBansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Bansos";

        $bansoses = PenerimaBansos::get();
        return view("bansos.index", compact('title', 'bansoses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Data Bansos';
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];
        return view('bansos.create', compact('title', 'months'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nik' => $request->nik,
            'jenis_bantuan' => $request->jenis_bantuan,
            'periode_bulan' => $request->periode_bulan,
            'periode_tahun' => $request->periode_tahun,
            'nominal' => $request->nominal,
            'created_by' => auth()->user()->id
        ];

        $bansos = PenerimaBansos::create($data);


        return redirect('/bansos');
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
        $title = 'Data Bansos';
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'];

        return view('bansos.edit', compact('bansos', 'title', 'months'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nik' => $request->nik,
            'jenis_bantuan' => $request->jenis_bantuan,
            'periode_bulan' => $request->periode_bulan,
            'periode_tahun' => $request->periode_tahun,
            'nominal' => $request->nominal,
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
