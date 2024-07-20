<?php

namespace App\Http\Controllers;

use App\Models\KeikutsertaanKegiatanDawis;
use App\Http\Requests\StoreKeikutsertaanKegiatanDawisRequest;
use App\Http\Requests\UpdateKeikutsertaanKegiatanDawisRequest;
use App\Models\KelompokBelajar;
use App\Models\Warga;
use Illuminate\Http\Request;

class KeikutsertaanKegiatanDawisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function isKelompokBelajar($id)
    {
        $kelompokBelajars = KelompokBelajar::get();
        if ($id == 1) {
            return view('keikutsertaandawis.partials.input', compact('kelompokBelajars'))->fragment('jenisKelompok');
        } else {
            return '<div></div>';
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $nik)
    {
        $title = 'Tambah Catatan Dawis';
        $warga = Warga::where('nik', $nik)->get();
        $kelompokBelajars = KelompokBelajar::get();

        $warga = $warga[0];
        $nik = $warga->nik;
        return view('keikutsertaandawis.create.create', compact('nik', 'title', 'kelompokBelajars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $idKelompokBelajar = 0;

        if ($request->kelompok_belajar == 0) {
            $idKelompokBelajar = 4;
        }else{
            $idKelompokBelajar = $request->id_jenis_kelompok_belajar;
        }

        $data = [
            'nik' => $request->nik,
            'akseptor_kb' => $request->akseptor_kb,
            'jenis_kb' => $request->jenis_kb,
            'posyandu' => $request->posyandu,
            'frekuensi_posyandu' => $request->frekuensi_posyandu,
            'bina_keluarga_balita' => $request->bina_keluarga_balita,
            'memiliki_tabungan' => $request->memiliki_tabungan,
            'kelompok_belajar' => $request->kelompok_belajar,
            'id_jenis_kelompok_belajar' => $idKelompokBelajar,
            'paud' => $request->paud,
            'koperasi' => $request->koperasi,
            'jenis_koperasi' => $request->jenis_koperasi,
            'berkebutuhan_khusus' => $request->berkebutuhan_khusus,
            'penghayatan_pengamalan_pancasila' => $request->penghayatan_pengamalan_pancasila,
            'gotong_royong' => $request->gotong_royong,
            'pendidikan_keterampilan' => $request->pendidikan_keterampilan,
            'kehidupan_berteknologi' => $request->kehidupan_berteknologi,
            'pangan' => $request->pangan,
            'sandang' => $request->sandang,
            'kegiatan_kesehatan' => $request->kegiatan_kesehatan,
            'perencanaan_kesehatan' => $request->perencanaan_kesehatan,
            'verified' => "no",
            'created_by' => auth()->user()->id,
        ];

        $catatanDawis = KeikutsertaanKegiatanDawis::create($data);

        return redirect('/warga');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $catatanDawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->findOrFail($id);
        return $catatanDawis;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeikutsertaanKegiatanDawis $keikutsertaanKegiatanDawis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeikutsertaanKegiatanDawisRequest $request, KeikutsertaanKegiatanDawis $keikutsertaanKegiatanDawis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeikutsertaanKegiatanDawis $keikutsertaanKegiatanDawis)
    {
        //
    }
}
