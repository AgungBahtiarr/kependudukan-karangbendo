<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Disabilitas;
use App\Models\JenjangSekolah;
use App\Models\KeikutsertaanKegiatanDawis;
use App\Models\Kematian;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\PenerimaBansos;
use App\Models\StatusPerkawinan;
use App\Models\TransaksiBansos;
use App\Models\Warga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Warga';


        $wargas = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan');
        $status = $request->input('status');


        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();
        $searchQuery = $request->strquery;

        if ($request->filterPendidikan) {
            $wargas->where('id_pendidikan', $request->filterPendidikan);
        }

        if ($request->filterAgama) {
            $wargas->where('id_agama', $request->filterAgama);
        }

        if ($request->filterPekerjaan) {
            $wargas->where('id_pekerjaan', $request->filterPekerjaan);
        }

        if ($request->filterPerkawinan) {
            $wargas->where('id_status_perkawinan', $request->filterPerkawinan);
        }

        if ($request->alamat_dusun) {
            $wargas->where(['alamat_dusun' => $request->alamat_dusun, 'rt' => $request->rt, 'rw' => $request->rw]);
        }


        if ($searchQuery) {
            $wargas = $wargas->where(function ($query) use ($searchQuery) {
                $query->whereRaw('LOWER(nama) LIKE ?', ['%' . strtolower($searchQuery) . '%'])
                    ->orWhereRaw('LOWER(nik) LIKE ?', ['%' . strtolower($searchQuery) . '%']);
            });
        }

        if ($searchQuery == "") {
            $wargas->get();
        }

        if ($status == 'yes') {
            $wargas->where('verified', 'yes');
        }
        if ($status == 'no') {
            $wargas->where('verified', 'no');
        }
        if ($status == 'all') {
            $wargas->get();
        }

        if ($status == 'domisili_sesuai') {
            $wargas->where('domisili_sesuai_ktp', '1');
        }
        if ($status == 'domisili_tidak_sesuai') {
            $wargas->where('domisili_sesuai_ktp', '0');
        }


        $wargas = $wargas->get();

        // return $wargas;

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

        $dusun_data = [
            'Karanganyar' => [
                'jumlah_rw' => 4,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002', '003'],
                    '004' => ['001', '002', '003']
                ]
            ],
            'Krajan' => [
                'jumlah_rw' => 2,
                'rw_rt' => [
                    '001' => ['001', '002'],
                    '002' => ['001', '002', '003']
                ]
            ],
            'Bades' => [
                'jumlah_rw' => 4,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002'],
                    '004' => ['001', '002']
                ]
            ],
            'Jajangsurat' => [
                'jumlah_rw' => 5,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002', '003'],
                    '004' => ['001', '002', '003', '004'],
                    '005' => ['001', '002', '003', '004']
                ]
            ],
            'Pancoran' => [
                'jumlah_rw' => 3,
                'rw_rt' => [
                    '001' => ['001', '002'],
                    '002' => ['001', '002'],
                    '003' => ['001', '002', '003']
                ]
            ]
        ];


        $wargaSession = $request->session()->get('warga2');

        return view('warga.create.create-2', compact('title', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'wargaSession', 'dusun_data'));
    }


    public function store1(Request $request)
    {
        $jabatan = '';
        if ($request->jabatan == null) {
            $jabatan = '';
        } else {
            $jabatan = $request->jabatan;
        }
        $data = [
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
            'jabatan' => $jabatan,
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
            'alamat_dusun' => $request->alamat_dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
            'domisili_sesuai_ktp' => $request->domisili_sesuai_ktp,
            'alamat_domisili' => $request->alamat_domisili
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
            'alamat_dusun' => $request->alamat_dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
            'domisili_sesuai_ktp' => $request->domisili_sesuai_ktp,
            'alamat_domisili' => $request->alamat_domisili
        ];

        $request->session()->put('warga2', $rawdata);

        $wargaSession = $request->session()->get('warga1');
        $wargaSession2 = $request->session()->get('warga2');

        $allSession = array_merge($wargaSession, $wargaSession2);

        $userRole = auth()->user()->getRoleNames()->first();

        $data = [
            // 'no_registrasi' => $allSession['no_registrasi'],
            'nik' => $allSession['nik'],
            'nkk' => $allSession['nkk'],
            'nama' => $allSession['nama'],
            'jabatan' => $allSession['jabatan'],
            'tempat_lahir' => $allSession['tempat_lahir'],
            'tanggal_lahir' => $allSession['tanggal_lahir'],
            "id_status_perkawinan" => $allSession['id_status_perkawinan'],
            'id_agama' => $allSession['id_agama'],
            'jenis_kelamin' => $allSession['jenis_kelamin'],
            'status_keluarga' => $allSession['status_keluarga'],
            'alamat_jalan' => $allSession['alamat_jalan'],
            'alamat_desakel' => $allSession['alamat_desakel'],
            'alamat_dusun' => $allSession['alamat_dusun'],
            'alamat_kec' => $allSession['alamat_kec'],
            'alamat_kab' => $allSession['alamat_kab'],
            'alamat_prov' => $allSession['alamat_prov'],
            'rt' => $allSession['rt'],
            'rw' => $allSession['rw'],
            'domisili_sesuai_ktp' => $allSession['domisili_sesuai_ktp'],
            'alamat_domisili' => $allSession['alamat_domisili'],
            'id_pendidikan' => $allSession['id_pendidikan'],
            'id_pekerjaan' => $allSession['id_pekerjaan'],
            'verified' => $userRole == 'Admin' ? 'yes' : 'no',
            'created_by' => auth()->user()->id,
        ];

        try {
            $warga = Warga::create(
                $data
            );
        } catch (QueryException $e) {
            return $e;
            $errorCode = $e->getCode();
            $errorMessage = 'Mohon maaf, terjadi kesalahan saat menyimpan data.';

            switch ($errorCode) {
                case '23000':
                    if (str_contains($e->getMessage(), 'Duplicate entry')) {
                        $errorMessage = 'Data yang Anda masukkan sudah ada dalam sistem. Mohon periksa kembali untuk menghindari duplikasi.';
                    } else {
                        $errorMessage = 'Data yang dimasukkan tidak sesuai dengan ketentuan. Mohon periksa kembali isian Anda.';
                    }
                    break;
                case '22001':
                    $errorMessage = 'Beberapa informasi yang Anda masukkan terlalu panjang. Mohon persingkat isian tersebut.';
                    break;
                case '22003':
                    $errorMessage = 'Nilai angka yang Anda masukkan terlalu besar. Mohon masukkan nilai yang lebih kecil.';
                    break;
                case '22007':
                    $errorMessage = 'Format tanggal yang Anda masukkan tidak sesuai. Mohon periksa kembali format tanggalnya.';
                    break;
                case '42S22':
                    $errorMessage = 'Terjadi kesalahan teknis pada sistem kami. Tim teknis kami akan segera menangani masalah ini.';
                    break;
                case '23505':
                    $errorMessage = 'Data yang Anda masukkan (NIK) sudah ada dalam sistem. Mohon periksa kembali untuk menghindari duplikasi.';
                    break;
                default:
                    $errorMessage = 'Terjadi kesalahan yang tidak terduga. Silakan coba lagi nanti atau hubungi dukungan pelanggan jika masalah berlanjut.';
            }

            return redirect(route("wargas.create1"))->withErrors(['error' => $errorMessage]);
        }


        $request->session()->forget(['warga1', 'warga2']);

        return redirect()->route('dawis.create', $warga->nik);
    }


    public function isDomisili($id)
    {

        if ($id == '0') {
            return view('warga.partials.alamat')->fragment('domisili');
        }

        return "<div></div>";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Detail Warga';
        $warga = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan',)->findOrFail($id);


        $perkawinan = StatusPerkawinan::get();
        $agamas = Agama::get();
        $pendidikans = Pendidikan::get();
        $pekerjaans = Pekerjaan::get();
        $jenjangSekolah = JenjangSekolah::get();
        $jenisDisabilitas = Disabilitas::get();

        $dawisraw = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->where('nik', $warga->nik)->first();
        $dawis = KeikutsertaanKegiatanDawis::with('jenisKelompokBelajar')->findOrFail($dawisraw->id);
        $dawis = json_decode($dawis, true);
        $dawis = (object)$dawis;

        $kematian = Kematian::where('nik', $warga->nik)->first();

        $penerimaBansos = PenerimaBansos::with('program', 'riwayat')->where('nik', $warga->nik)->first();

        $riwayatBansos = null;

        if ($penerimaBansos) {
            $riwayatBansos = TransaksiBansos::with('program.programBansos')->where('id_penerima_bansos', $penerimaBansos->id)->get();
        }

        // return $riwayatBansos;

        return view("warga.show.detail", compact('warga', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'dawis', 'kematian', 'riwayatBansos', 'jenjangSekolah', 'jenisDisabilitas'));
    }

    // public function show2($id)
    // {
    //     $warga = Warga::with('agama', 'pendidikan', 'pekerjaan', 'statusPerkawinan')->findOrFail($id);

    //     $perkawinan = StatusPerkawinan::get();
    //     $agamas = Agama::get();
    //     $pendidikans = Pendidikan::get();
    //     $pekerjaans = Pekerjaan::get();

    //     return view("warga.show.detail2", compact('warga', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans',));
    // }



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
            'alamat_dusun' => $request->alamat_dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
            'domisili_sesuai_ktp' => $request->domisili_sesuai_ktp,
            'alamat_domisili' => $request->alamat_domisili
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

        $dusun_data = [
            'Karanganyar' => [
                'jumlah_rw' => 4,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002', '003'],
                    '004' => ['001', '002', '003']
                ]
            ],
            'Krajan' => [
                'jumlah_rw' => 2,
                'rw_rt' => [
                    '001' => ['001', '002'],
                    '002' => ['001', '002', '003']
                ]
            ],
            'Bades' => [
                'jumlah_rw' => 4,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002'],
                    '004' => ['001', '002']
                ]
            ],
            'Jajangsurat' => [
                'jumlah_rw' => 5,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002', '003'],
                    '004' => ['001', '002', '003', '004'],
                    '005' => ['001', '002', '003', '004']
                ]
            ],
            'Pancoran' => [
                'jumlah_rw' => 3,
                'rw_rt' => [
                    '001' => ['001', '002'],
                    '002' => ['001', '002'],
                    '003' => ['001', '002', '003']
                ]
            ]
        ];


        $wargaSession = $request->session()->get('editWarga2');



        return view('warga.edit.edit-2', compact('title', 'perkawinan', 'agamas', 'pekerjaans', 'pendidikans', 'warga', 'wargaSession', 'dusun_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update1(Request $request)
    {
        $data = [
            // 'no_registrasi' => $request->no_registrasi,
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
            'alamat_dusun' => $request->alamat_dusun,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'alamat_jalan' => $request->alamat_jalan,
            'domisili_sesuai_ktp' => $request->domisili_sesuai_ktp,
            'alamat_domisili' => $request->alamat_domisili
        ];

        $request->session()->put('editWarga2', $rawdata);

        $wargaSession = $request->session()->get('editWarga1');
        $wargaSession2 = $request->session()->get('editWarga2');

        $allSession = array_merge($wargaSession, $rawdata);

        $data = [
            // 'no_registrasi' => $allSession['no_registrasi'],
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
            'alamat_dusun' => $allSession['alamat_dusun'],
            'alamat_kec' => $allSession['alamat_kec'],
            'alamat_kab' => $allSession['alamat_kab'],
            'alamat_prov' => $allSession['alamat_prov'],
            'rt' => $allSession['rt'],
            'rw' => $allSession['rw'],
            'domisili_sesuai_ktp' => $allSession['domisili_sesuai_ktp'],
            'alamat_domisili' => $allSession['alamat_domisili'],
            'id_pendidikan' => $allSession['id_pendidikan'],
            'id_pekerjaan' => $allSession['id_pekerjaan'],
            'created_by' => auth()->user()->id,
        ];


        $warga->update($data);


        $request->session()->forget(['editWarga1', 'editWarga2']);


        return redirect(route("dawis.edit", $warga->nik));
    }


    public function filterAlamat()
    {
        $dusun_data = [
            'Karanganyar' => [
                'jumlah_rw' => 4,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002', '003'],
                    '004' => ['001', '002', '003']
                ]
            ],
            'Krajan' => [
                'jumlah_rw' => 2,
                'rw_rt' => [
                    '001' => ['001', '002'],
                    '002' => ['001', '002', '003']
                ]
            ],
            'Bades' => [
                'jumlah_rw' => 4,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002'],
                    '004' => ['001', '002']
                ]
            ],
            'Jajangsurat' => [
                'jumlah_rw' => 5,
                'rw_rt' => [
                    '001' => ['001', '002', '003'],
                    '002' => ['001', '002', '003'],
                    '003' => ['001', '002', '003'],
                    '004' => ['001', '002', '003', '004'],
                    '005' => ['001', '002', '003', '004']
                ]
            ],
            'Pancoran' => [
                'jumlah_rw' => 3,
                'rw_rt' => [
                    '001' => ['001', '002'],
                    '002' => ['001', '002'],
                    '003' => ['001', '002', '003']
                ]
            ]
        ];

        return view('warga.partials.filteralamat', compact('dusun_data'))->fragment('filterAlamat');
    }

    public function filterPendidikan()
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $perkawinan = StatusPerkawinan::all();
        return view('warga.partials.form', compact('pendidikan', 'agama', 'pekerjaan', 'perkawinan'))->fragment('pendidikan');
    }
    public function filterAgama()
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $perkawinan = StatusPerkawinan::all();
        return view('warga.partials.form', compact('pendidikan', 'agama', 'pekerjaan', 'perkawinan'))->fragment('agama');
    }

    public function filterPekerjaan()
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $perkawinan = StatusPerkawinan::all();
        return view('warga.partials.form', compact('pendidikan', 'agama', 'pekerjaan', 'perkawinan'))->fragment('pekerjaan');
    }

    public function filterStatusPerkawinan()
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $perkawinan = StatusPerkawinan::all();
        return view('warga.partials.form', compact('pendidikan', 'agama', 'pekerjaan', 'perkawinan'))->fragment('perkawinan');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $dawis = KeikutsertaanKegiatanDawis::where('nik', $warga->nik)->get();

        if (count($dawis)  != 0) {
            $dawis = $dawis[0];
            $dawis->delete();
        }


        $warga->delete();
        return response(null, 200, ["HX-Redirect" => '/warga']);
    }
}
