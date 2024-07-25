<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWargaRequest;
use App\Models\Agama;
use App\Models\KeikutsertaanKegiatanDawis;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\StatusPerkawinan;
use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Warga';

        // auth()->user()->roles[0]->name;

        $wargas = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan');
        $status = $request->input('status');


        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();
        // $seacrhQuery = $request->strquery;


        // if ($seacrhQuery) {
        //     $warga->where('name', 'like', '%' . strval($seacrhQuery) . '%');
        // }

        if ($status == '1') {
            $wargas->where('status_keluarga', '1');
        } elseif ($status == '0') {
            $wargas->where('status_keluarga', '0');
        }

        $wargas = $wargas->get();

        return view('warga.index', compact('title', 'wargas', 'status', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans',));
    }


    public function isDawis($id)
    {
        $warga = Warga::findOrFail($id);
        $dawis = KeikutsertaanKegiatanDawis::where('nik', $warga->nik)->get();
        if (count($dawis) == 1) {
            return "";
        } else {
            return view('warga.partials.add-dawis', [
                'nik' => $warga->nik,
            ])->fragment('add-dawis');
        }
    }

    public function create1(Request $request)
    {
        $title = 'Tambah Data Warga';

        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();

        $wargaSession = $request->session()->get('warga1');

        return view('warga.create.create-1', compact('title', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'wargaSession'));
    }

    public function create2(Request $request)
    {
        $title = 'Tambah Data Warga';

        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();

        $wargaSession = $request->session()->get('warga2');

        return view('warga.create.create-2', compact('title', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'wargaSession'));
    }


    public function store1(Request $request)
    {
        $data = [
            'no_registrasi' => $request->no_registrasi,
            'nik' => $request->nik,
            'nkk' => $request->nkk,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'id_pendidikan' => $request->id_pendidikan,
            'id_status_perkawinan' => $request->id_status_perkawinan,
            'status_keluarga' => $request->status_keluarga,
            'id_pekerjaan' => $request->id_pekerjaan,
            'jabatan' => $request->jabatan,
        ];

        $request->session()->put('warga1', $data);

        return redirect('/warga/create/2');
    }


    public function backTo(Request $request)
    {
        $data = [
            'alamat_prov' => $request->alamat_prov,
            'alamat_kab' => $request->alamat_kab,
            'alamat_kec' => $request->alamat_kec,
            'alamat_desakel' => $request->alamat_desakel,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
        ];

        $request->session()->put('warga2', $data);

        return response(null, 200, ["HX-Redirect" => '/warga/create/1']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rawdata = [
            'alamat_prov' => $request->alamat_prov,
            'alamat_kab' => $request->alamat_kab,
            'alamat_kec' => $request->alamat_kec,
            'alamat_desakel' => $request->alamat_desakel,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
        ];

        $request->session()->put('warga2', $rawdata);

        $wargaSession = $request->session()->get('warga1');
        $wargaSession2 = $request->session()->get('warga2');

        $allSession = array_merge($wargaSession, $wargaSession2);

        $userRole = auth()->user()->getRoleNames()->first();

        $data = [
            'no_registrasi' => $allSession['no_registrasi'],
            'nik' => $allSession['nik'],
            'nkk' => $allSession['nkk'],
            'nama' => $allSession['nama'],
            'jabatan' => $allSession['jabatan'],
            'tempat_lahir' => $allSession['tempat_lahir'],
            'tanggal_lahir' => $allSession['tanggal_lahir'],
            "id_status_perkawinan" => $allSession['id_status_perkawinan'],
            'id_agama' => $allSession['id_agama'],
            'jenis_kelamin' => $allSession['jenis_kelamin'],
            'status_di_keluarga' => $allSession['status_keluarga'],
            'alamat_jalan' => $allSession['alamat_jalan'],
            'alamat_desakel' => $allSession['alamat_desakel'],
            'alamat_kec' => $allSession['alamat_kec'],
            'alamat_kab' => $allSession['alamat_kab'],
            'alamat_prov' => $allSession['alamat_prov'],
            'rt' => $allSession['rt'],
            'rw' => $allSession['rw'],
            'id_pendidikan' => $allSession['id_pendidikan'],
            'id_pekerjaan' => $allSession['id_pekerjaan'],
            'verified' => $userRole == 'Admin' ? 'yes' : 'no',
            'created_by' => auth()->user()->id,
        ];

        $warga = Warga::create(
            $data
        );

        $request->session()->forget(['warga1', 'warga2']);

        return redirect()->route('dawis.create', $warga->nik);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $warga = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan')->findOrFail($id);

        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();

        $dawisraw = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->where('nik', $warga->nik)->get();
        $dawisraw = $dawisraw[0];
        $dawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->findOrFail($dawisraw->id);
        $dawis = json_decode($dawis, true);
        $dawis = (object)$dawis;

        // return $dawis;
        return view("warga.show.detail", compact('warga', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'dawis'));
    }

    public function show2($id)
    {
        $warga = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan')->findOrFail($id);

        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();

        return view("warga.show.detail2", compact('warga', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans',));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit1($id, Request $request)
    {
        $warga = Warga::findOrFail($id);

        $title = 'Edit Data Warga';

        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();


        $wargaSession = $request->session()->get('editWarga1');

        return view('warga.edit.edit-1', compact('title', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'warga', 'wargaSession'));
    }

    public function backToEdit(Request $request)
    {
        $data = [
            'alamat_prov' => $request->alamat_prov,
            'alamat_kab' => $request->alamat_kab,
            'alamat_kec' => $request->alamat_kec,
            'alamat_desakel' => $request->alamat_desakel,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
        ];

        $request->session()->put('se', $data);

        return response(null, 200, ["HX-Redirect" => '/warga/edit/1/' . $request->id]);
    }

    public function edit2($id, Request $request)
    {
        $warga = Warga::findOrFail($id);

        $title = 'Edit Data Warga';

        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();


        $wargaSession = $request->session()->get('editWarga2');

        return view('warga.edit.edit-2', compact('title', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'warga', 'wargaSession'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update1(Request $request)
    {
        $data = [
            'no_registrasi' => $request->no_registrasi,
            'nik' => $request->nik,
            'nkk' => $request->nkk,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'id_agama' => $request->id_agama,
            'id_pendidikan' => $request->id_pendidikan,
            'id_status_perkawinan' => $request->id_status_perkawinan,
            'id_pendidikan' => $request->id_pendidikan,
            'status_keluarga' => $request->status_keluarga,
            'id_pekerjaan' => $request->id_pekerjaan,
            'jabatan' => $request->jabatan,
        ];

        $request->session()->put('editWarga1', $data);

        return redirect('/warga/edit/2/' . $request->id);
    }


    public function verify($id)
    {
        $warga = Warga::findOrFail($id);

        $warga->update([
            'verified' => 'yes'
        ]);

        return redirect("/warga");
    }

    public function update(Request $request)
    {
        $warga = Warga::findOrFail($request->id);

        $rawdata = [
            'alamat_prov' => $request->alamat_prov,
            'alamat_kab' => $request->alamat_kab,
            'alamat_kec' => $request->alamat_kec,
            'alamat_desakel' => $request->alamat_desakel,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
        ];

        $request->session()->put('editWarga2', $rawdata);

        $wargaSession = $request->session()->get('editWarga1');
        $wargaSession2 = $request->session()->get('editWarga2');

        $allSession = array_merge($wargaSession, $rawdata);

        $data = [
            'no_registrasi' => $allSession['no_registrasi'],
            'nik' => $allSession['nik'],
            'nkk' => $allSession['nkk'],
            'nama' => $allSession['nama'],
            'jabatan' => $allSession['jabatan'],
            'tempat_lahir' => $allSession['tempat_lahir'],
            'tanggal_lahir' => $allSession['tanggal_lahir'],
            "id_status_perkawinan" => $allSession['id_status_perkawinan'],
            'id_agama' => $allSession['id_agama'],
            'jenis_kelamin' => $allSession['jenis_kelamin'],
            'status_di_keluarga' => $allSession['status_keluarga'],
            'alamat_jalan' => $allSession['alamat_jalan'],
            'alamat_desakel' => $allSession['alamat_desakel'],
            'alamat_kec' => $allSession['alamat_kec'],
            'alamat_kab' => $allSession['alamat_kab'],
            'alamat_prov' => $allSession['alamat_prov'],
            'rt' => $allSession['rt'],
            'rw' => $allSession['rw'],
            'id_pendidikan' => $allSession['id_pendidikan'],
            'id_pekerjaan' => $allSession['id_pekerjaan'],
            'created_by' => auth()->user()->id,
        ];


        $warga->update($data);


        $request->session()->forget(['editWarga1', 'editWarga2']);


        return redirect(route("dawis.edit", $warga->nik));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $dawis = KeikutsertaanKegiatanDawis::where('nik', $warga->nik)->get();
        $dawis = $dawis[0];

        $dawis->delete();
        $warga->delete();
        return response(null, 200, ["HX-Redirect" => '/warga']);
    }
}
