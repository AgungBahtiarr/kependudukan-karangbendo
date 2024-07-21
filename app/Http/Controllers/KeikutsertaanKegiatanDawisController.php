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

        $dawisSession = $request->session()->get('dawis1');


        return view('keikutsertaandawis.create.create', compact('nik', 'title', 'kelompokBelajars', 'dawisSession'));
    }

    public function create2(Request $request, $nik)
    {
        $title = 'Tambah Catatan Dawis';
        $warga = Warga::where('nik', $nik)->get();
        $kelompokBelajars = KelompokBelajar::get();

        $warga = $warga[0];
        $nik = $warga->nik;

        $dawisSession = $request->session()->get('dawis2');

        return view('keikutsertaandawis.create.create2', compact('nik', 'title', 'kelompokBelajars', 'dawisSession'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $idKelompokBelajar = 0;

        if ($request->kelompok_belajar == 0) {
            $idKelompokBelajar = 4;
        } else {
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
        ];

        $request->session()->put('dawis1', $data);


        return redirect(route('dawis.create2', $request->nik));
    }


    public function backTo(Request $request)
    {
        $data = [
            'penghayatan_pengamalan_pancasila' => $request->penghayatan_pengamalan_pancasila,
            'gotong_royong' => $request->gotong_royong,
            'pendidikan_keterampilan' => $request->pendidikan_keterampilan,
            'kehidupan_berkolaborasi' => $request->kehidupan_berkolaborasi,
            'pangan' => $request->pangan,
            'sandang' => $request->sandang,
            'kegiatan_kesehatan' => $request->kegiatan_kesehatan,
            'perencanaan_kesehatan' => $request->perencanaan_kesehatan,
            'verified' => "no",
            'created_by' => auth()->user()->id,
        ];

        $request->session()->put('dawis2', $data);


        return response(null, 200, ["HX-Redirect" => route("dawis.create", $request->nik)]);
    }


    public function store2(Request $request)
    {

        $data = [
            'penghayatan_pengamalan_pancasila' => $request->penghayatan_pengamalan_pancasila,
            'gotong_royong' => $request->gotong_royong,
            'pendidikan_keterampilan' => $request->pendidikan_keterampilan,
            'kehidupan_berkolaborasi' => $request->kehidupan_berkolaborasi,
            'pangan' => $request->pangan,
            'sandang' => $request->sandang,
            'kegiatan_kesehatan' => $request->kegiatan_kesehatan,
            'perencanaan_kesehatan' => $request->perencanaan_kesehatan,
            'verified' => "no",
            'created_by' => auth()->user()->id,
        ];

        $request->session()->put('dawis2', $data);


        $dawis1 = $request->session()->get('dawis1');
        $dawis2 = $request->session()->get('dawis2');

        $allDawis = array_merge($dawis1, $dawis2);


        $dawis = KeikutsertaanKegiatanDawis::create($allDawis);

        return redirect(route('wargas.index'));
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
    public function edit(Request $request, $nik)
    {
        $title = 'Edit Catatan Dawis';
        $warga = Warga::where('nik', $nik)->get();
        $kelompokBelajars = KelompokBelajar::get();

        $warga = $warga[0];
        $nik = $warga->nik;

        $dawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->where('nik', $nik)->get();
        $dawis = $dawis[0];

        $dawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->findOrFail($dawis->id);



        return view('keikutsertaandawis.edit.edit', compact('nik', 'title', 'kelompokBelajars', 'dawis','warga'));
    }

    public function edit2(Request $request, $nik)
    {
        $title = 'Tambah Catatan Dawis';
        $warga = Warga::where('nik', $nik)->get();
        $kelompokBelajars = KelompokBelajar::get();

        $warga = $warga[0];
        $nik = $warga->nik;

        $dawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->where('nik', $nik)->get();
        $dawis = $dawis[0];

        $dawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->findOrFail($dawis->id);


        return view('keikutsertaandawis.edit.edit2', compact('nik', 'title', 'kelompokBelajars', 'dawis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idKelompokBelajar = 0;

        if ($request->kelompok_belajar == 0) {
            $idKelompokBelajar = 4;
        } else {
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
        ];

        $dawis = KeikutsertaanKegiatanDawis::findOrFail($request->id);

        $dawis->update($data);

        return redirect(route("dawis.edit2", $dawis->nik));
    }

    public function update2(Request $request)
    {

        $data = [
            'penghayatan_pengamalan_pancasila' => $request->penghayatan_pengamalan_pancasila,
            'gotong_royong' => $request->gotong_royong,
            'pendidikan_keterampilan' => $request->pendidikan_keterampilan,
            'kehidupan_berkolaborasi' => $request->kehidupan_berkolaborasi,
            'pangan' => $request->pangan,
            'sandang' => $request->sandang,
            'kegiatan_kesehatan' => $request->kegiatan_kesehatan,
            'perencanaan_kesehatan' => $request->perencanaan_kesehatan,
            'verified' => "no",
            'created_by' => auth()->user()->id,
        ];

        $dawis = KeikutsertaanKegiatanDawis::findOrFail($request->id);

        $dawis->update($data);

        return redirect(route("wargas.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeikutsertaanKegiatanDawis $keikutsertaanKegiatanDawis)
    {
        //
    }
}
