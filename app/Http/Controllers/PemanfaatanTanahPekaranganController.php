<?php

namespace App\Http\Controllers;

use App\Models\PemanfaatanTanahPekarangan;

use App\Models\CatatanRumahTangga;
use Illuminate\Http\Request;

class PemanfaatanTanahPekaranganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = "Pemanfaatan Tanah Pekarangan";

        $cargas = CatatanRumahTangga::with('makananPokok', 'sumberAir')->where('pemanfaatan_pekarangan', '1')->get();
        $cargas = json_decode($cargas);

        return view('pemanfaatan_pekarangan.index', compact('title', 'cargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        $title = "Pemanfaatan Tanah Pekarangan";
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);

        $data_pekarangan = [
            'peternakan' => [
                'Kambing',
                'Sapi',
                'Ayam',
                'Burung Puyuh',
                'Burung Dara',
                'Itik (Bebek)',
                'Itik (Mentok)',
                'Kelinci',
                'Lain-lain'
            ],
            'perikanan' => [
                'Ikan Lele',
                'Ikan Mas',
                'Ikan Nila',
                'Ikan Mujahir',
                'Ikan Gurami',
                'Ikan Patin',
                'Lain-lain'
            ],
            'warungHidup' => [
                'Cabe / Lombok',
                'Tomat / Ranti',
                'Bayam',
                'Kangkung',
                'Sawi / Sawen',
                'Kol / Kubis',
                'Terong',
                'Daun Katu',
                'Kelor',
                'Pare',
                'Kenikir',
                'Kentang',
                'Wortel',
                'Bawang',
                'Pepaya',
                'Lain-Lain (Warung Hidup)'
            ],
            'lumbungHidup' => [
                'Singkong',
                'Ketela Rambat',
                'Gembili',
                'Talas',
                'Suwek',
                'Ganyong',
                'Pisang',
                'Jagung',
                'Sukun',
                'Bentol',
                'Lain-Lain (Lumbung Hidup)'
            ],
            'toga' => [
                'Kunir / Kunyit',
                'Laos',
                'Kencur',
                'Kunci',
                'Jahe',
                'Jambu Biji',
                'Lidah Buaya',
                'Sere',
                'Sirih',
                'Kumis Kucing',
                'Salambihanong',
                'Beluntas',
                'Adas',
                'Jeruk Nipis',
                'Belimbing Wuluh',
                'Belimbing Buah',
                'Lain-Lain (Toga)'
            ],
            'tanamanKeras' => [
                'Mangga',
                'Rambutan',
                'Klengkeng',
                'Manggis',
                'Durian',
                'Jambu Air',
                'Mlinjo',
                'Sukun',
                'Lain-Lain (Tanaman Keras)'
            ]
        ];

        return view('pemanfaatan_pekarangan.create', compact('title', 'carga', 'data_pekarangan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id_carga = $request->id_carga;
        $data = [
            'nkk' => $request->nkk,
            'tanaman_keras' => $request->tanaman_keras,
            'jenis_tanaman_keras' => $request->jenis_tanaman_keras,
            'volume_tanaman_keras' => $request->volume_tanaman_keras,
            'toga' => $request->toga,
            'jenis_toga' => $request->jenis_toga,
            'volume_toga' => $request->volume_toga,
            'lumbung_hidup' => $request->lumbung_hidup,
            'jenis_lumbung_hidup' => $request->jenis_lumbung_hidup,
            'volume_lumbung_hidup' => $request->volume_lumbung_hidup,
            'warung_hidup' => $request->warung_hidup,
            'jenis_warung_hidup'  => $request->jenis_warung_hidup,
            'volume_warung_hidup' => $request->volume_warung_hidup,
            'perikanan' => $request->perikanan,
            'jenis_perikanan' => $request->jenis_perikanan,
            'volume_perikanan' => $request->volume_perikanan,
            'peternakan' => $request->peternakan,
            'jenis_peternakan' => $request->jenis_peternakan,
            'volume_peternakan' => $request->volume_peternakan,
        ];


        $pekarangan = PemanfaatanTanahPekarangan::create($data);

        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id_carga);

        if ($carga->industri_rumah_tangga == 1) {
            return redirect('/industries/create/' . $carga->id);
        }


        return redirect(route('cargas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $nkk)
    {

        $pekarangan = PemanfaatanTanahPekarangan::where('nkk', $nkk)->get();

        $isPekarangan = true;
        if (count($pekarangan) != 0) {
            $pekarangan = $pekarangan[0];
            return view('pemanfaatan_pekarangan.detail', compact('pekarangan', 'id', 'isPekarangan', 'nkk'));
        } else {
            $isPekarangan = false;
            return view('pemanfaatan_pekarangan.detail', compact('pekarangan', 'id', 'isPekarangan', 'nkk'));;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pekarangan = PemanfaatanTanahPekarangan::findOrFail($id);
        $data_pekarangan = [
            'peternakan' => [
                'Kambing',
                'Sapi',
                'Ayam',
                'Burung Puyuh',
                'Burung Dara',
                'Itik (Bebek)',
                'Itik (Mentok)',
                'Kelinci',
                'Lain-lain'
            ],
            'perikanan' => [
                'Ikan Lele',
                'Ikan Mas',
                'Ikan Nila',
                'Ikan Mujahir',
                'Ikan Gurami',
                'Ikan Patin',
                'Lain-lain'
            ],
            'warungHidup' => [
                'Cabe / Lombok',
                'Tomat / Ranti',
                'Bayam',
                'Kangkung',
                'Sawi / Sawen',
                'Kol / Kubis',
                'Terong',
                'Daun Katu',
                'Kelor',
                'Pare',
                'Kenikir',
                'Kentang',
                'Wortel',
                'Bawang',
                'Pepaya',
                'Lain-Lain (Warung Hidup)'
            ],
            'lumbungHidup' => [
                'Singkong',
                'Ketela Rambat',
                'Gembili',
                'Talas',
                'Suwek',
                'Ganyong',
                'Pisang',
                'Jagung',
                'Sukun',
                'Bentol',
                'Lain-Lain (Lumbung Hidup)'
            ],
            'toga' => [
                'Kunir / Kunyit',
                'Laos',
                'Kencur',
                'Kunci',
                'Jahe',
                'Jambu Biji',
                'Lidah Buaya',
                'Sere',
                'Sirih',
                'Kumis Kucing',
                'Salambihanong',
                'Beluntas',
                'Adas',
                'Jeruk Nipis',
                'Belimbing Wuluh',
                'Belimbing Buah',
                'Lain-Lain (Toga)'
            ],
            'tanamanKeras' => [
                'Mangga',
                'Rambutan',
                'Klengkeng',
                'Manggis',
                'Durian',
                'Jambu Air',
                'Mlinjo',
                'Sukun',
                'Lain-Lain (Tanaman Keras)'
            ]
        ];


        return view("pemanfaatan_pekarangan.edit", compact('pekarangan', 'data_pekarangan'))->fragment('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $data = [
            'tanaman_keras' => $request->tanaman_keras,
            'jenis_tanaman_keras' => $request->jenis_tanaman_keras,
            'volume_tanaman_keras' => $request->volume_tanaman_keras,
            'toga' => $request->toga,
            'jenis_toga' => $request->jenis_toga,
            'volume_toga' => $request->volume_toga,
            'lumbung_hidup' => $request->lumbung_hidup,
            'jenis_lumbung_hidup' => $request->jenis_lumbung_hidup,
            'volume_lumbung_hidup' => $request->volume_lumbung_hidup,
            'warung_hidup' => $request->warung_hidup,
            'jenis_warung_hidup'  => $request->jenis_warung_hidup,
            'volume_warung_hidup' => $request->volume_warung_hidup,
            'perikanan' => $request->perikanan,
            'jenis_perikanan' => $request->jenis_perikanan,
            'volume_perikanan' => $request->volume_perikanan,
            'peternakan' => $request->peternakan,
            'jenis_peternakan' => $request->jenis_peternakan,
            'volume_peternakan' => $request->volume_peternakan,
        ];

        $pekarangan = PemanfaatanTanahPekarangan::findOrFail($request->id);

        $pekarangan->update($data);

        return redirect('/pekarangans/detail/' . $pekarangan->id . '/' . $pekarangan->nkk);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemanfaatanTanahPekarangan $pemanfaatanTanahPekarangan)
    {
        //
    }
}
