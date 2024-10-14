<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Models\Warga;
use Illuminate\Http\Request;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Kematian";

        $search = $request->input('strquery');

        $kematians = Kematian::with('warga');

        if ($search) {
            $kematians = $kematians->where(function ($query) use ($search) {
                $query->where('nik', 'like', '%' . $search . '%')
                    ->orWhereHas('warga', function ($subQuery) use ($search) {
                        $subQuery->where('nama', 'like', '%' . $search . '%');
                    });
            });
        }

        $kematians = $kematians->get();

        return view("kematian.index", compact("title", "kematians",));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Data Kematian';

        $wargas = Warga::get();
        return view("kematian.create", compact("title", 'wargas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $warga = Warga::where('nik', $request->nik)->first();

        if (!$warga) {
            return "<script>alert('NIK Belum Terdaftar Di Data Warga'); window.location = '/kematian/create';</script>";
        }

        $data = [
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
    public function show($id)
    {
        $title = 'Detail Kematian';

        $kematian = Kematian::with('warga')->findOrFail($id);

        return view('kematian.detail', compact("title", 'kematian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = 'Edit Data Kematian';

        $kematian = Kematian::with('warga')->findOrFail($id);

        return view('kematian.edit', compact("title", 'kematian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nik_pelapor' => $request->nik_pelapor,
            'waktu_kematian' => $request->waktu_kematian,
            'tanggal_pemakaman' => $request->tanggal_pemakaman,
            'tempat_meninggal' => $request->tempat_meninggal,
            'kontak_keluarga' => $request->kontak_keluarga,
            'sebab_kematian' => $request->sebab_kematian
        ];

        $kematian = Kematian::with('warga')->findOrFail($id);

        $kematian->update($data);

        return redirect(route("kematian.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kematian = Kematian::findOrFail($id);
        $warga = Warga::where('nik', $kematian->nik)->first();
        $warga->update(['status_kematian' => '0']);
        $kematian->delete();

        return response(null, 200, ["HX-Redirect" => route('kematian.index')]);
    }
}
