<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiBansosRequest;
use App\Http\Requests\UpdateTransaksiBansosRequest;
use App\Models\TransaksiBansos;
use Illuminate\Http\Request;

class TransaksiBansosController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, $penerima_program)
    {
        $data = [
            'id_penerima_bansos' => $id,
            'id_penerima_program' => $penerima_program,
        ];

        $trabas = TransaksiBansos::create($data);

        return response(null, 200, ["HX-Redirect" => url()->previous()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TransaksiBansos $transaksiBansos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiBansos $transaksiBansos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiBansosRequest $request, TransaksiBansos $transaksiBansos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiBansos $transaksiBansos)
    {
        //
    }
}
