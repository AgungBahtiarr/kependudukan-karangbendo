<?php

namespace App\Http\Controllers;

use App\Models\KeikutsertaanKegiatanDawis;
use App\Http\Requests\StoreKeikutsertaanKegiatanDawisRequest;
use App\Http\Requests\UpdateKeikutsertaanKegiatanDawisRequest;
use App\Models\KelompokBelajar;
use App\Models\Warga;
use Illuminate\Database\QueryException;
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


    public function isKelompokBelajar(Request $request, $id)
    {
        $dawisSession = $request->session()->get('dawis1');
        $kelompokBelajars = KelompokBelajar::get();
        if ($id == 1) {
            return view('keikutsertaandawis.partials.input', compact('kelompokBelajars', 'dawisSession'))->fragment('jenisKelompok');
        } else {
            return '<div></div>';
        }
    }

    public function isKb(Request $request, $id)
    {
        $dawisSession = $request->session()->get('dawis1');
        $kelompokBelajars = KelompokBelajar::get();
        if ($id == 1) {
            return view('keikutsertaandawis.partials.input', compact('kelompokBelajars', 'dawisSession'))->fragment('jenisKb');
        } else {
            return '<div></div>';
        }
    }

    public function isPosyandu(Request $request, $id)
    {
        $dawisSession = $request->session()->get('dawis1');
        $kelompokBelajars = KelompokBelajar::get();
        if ($id == 1) {
            return view('keikutsertaandawis.partials.input', compact('kelompokBelajars', 'dawisSession'))->fragment('frekPos');
        } else {
            return '<div></div>';
        }
    }


    public function isKoperasi(Request $request, $id)
    {
        $dawisSession = $request->session()->get('dawis1');
        $kelompokBelajars = KelompokBelajar::get();
        if ($id == 1) {
            return view('keikutsertaandawis.partials.input', compact('kelompokBelajars', 'dawisSession'))->fragment('jenisKoperasi');
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
        $jenisKb = "";
        $frekPos = "";
        $jenisKoperasi = "";

        if ($request->kelompok_belajar == 0) {
            $idKelompokBelajar = null;
        } else {
            $idKelompokBelajar = $request->id_jenis_kelompok_belajar;
        }

        if ($request->akseptor_kb == 0) {
            $jenisKb = "";
        } else {
            $jenisKb = $request->jenis_kb;
        }

        if ($request->posyandu == 0) {
            $frekPos = null;
        } else {
            $frekPos = $request->frekuensi_posyandu;
        }

        if ($request->koperasi == 0) {
            $jenisKoperasi = null;
        } else {
            $jenisKoperasi = $request->jenis_koperasi;
        }

        // $validator = $request->validate([
        //     'nik' => 'required|string|size:16', // NIK biasanya 16 digit
        //     'akseptor_kb' => 'required|boolean',
        //     'jenis_kb' => 'required_if:akseptor_kb,1|string',
        //     'posyandu' => 'required|boolean',
        //     'frekuensi_posyandu' => 'required_if:posyandu,1|integer|min:0',
        //     'bina_keluarga_balita' => 'required|boolean',
        //     'memiliki_tabungan' => 'required|boolean',
        //     'kelompok_belajar' => 'required|boolean',
        //     'id_jenis_kelompok_belajar' => 'required_if:kelompok_belajar,1|integer|exists:jenis_kelompok_belajar,id',
        //     'paud' => 'required|boolean',
        //     'koperasi' => 'required|boolean',
        //     'jenis_koperasi' => 'required_if:koperasi,1|string',
        //     'berkebutuhan_khusus' => 'required|boolean',
        // ]);



        $data = [
            'nik' => $request->nik,
            'akseptor_kb' => $request->akseptor_kb,
            'jenis_kb' => $jenisKb,
            'posyandu' => $request->posyandu,
            'frekuensi_posyandu' => $frekPos,
            'bina_keluarga_balita' => $request->bina_keluarga_balita,
            'memiliki_tabungan' => $request->memiliki_tabungan,
            'kelompok_belajar' => $request->kelompok_belajar,
            'id_jenis_kelompok_belajar' => $idKelompokBelajar,
            'paud' => $request->paud,
            'koperasi' => $request->koperasi,
            'jenis_koperasi' => $jenisKoperasi,
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

        $userRole = auth()->user()->getRoleNames()->first();

        $data = [
            'penghayatan_pengamalan_pancasila' => $request->penghayatan_pengamalan_pancasila,
            'gotong_royong' => $request->gotong_royong,
            'pendidikan_keterampilan' => $request->pendidikan_keterampilan,
            'kehidupan_berkolaborasi' => $request->kehidupan_berkolaborasi,
            'pangan' => $request->pangan,
            'sandang' => $request->sandang,
            'kegiatan_kesehatan' => $request->kegiatan_kesehatan,
            'perencanaan_kesehatan' => $request->perencanaan_kesehatan,
            'verified' => $userRole == "Admin" ? "yes" : "no",
            'created_by' => auth()->user()->id,
        ];

        $request->session()->put('dawis2', $data);


        $dawis1 = $request->session()->get('dawis1');
        $dawis2 = $request->session()->get('dawis2');

        $allDawis = array_merge($dawis1, $dawis2);


        try {
            $dawis = KeikutsertaanKegiatanDawis::create($allDawis);
        } catch (QueryException $e) {

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
                default:
                    $errorMessage = 'Terjadi kesalahan yang tidak terduga. Silakan coba lagi nanti atau hubungi dukungan pelanggan jika masalah berlanjut.';
            }


            return redirect(route("dawis.create", $dawis1['nik']))->withErrors(['error' => $errorMessage]);
        }


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



        return view('keikutsertaandawis.edit.edit', compact('nik', 'title', 'kelompokBelajars', 'dawis', 'warga'));
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
        $jenisKb = "";
        $frekPos = "";
        $jenisKoperasi = "";

        if ($request->kelompok_belajar == 0) {
            $idKelompokBelajar = null;
        } else {
            $idKelompokBelajar = $request->id_jenis_kelompok_belajar;
        }

        if ($request->akseptor_kb == 0) {
            $jenisKb = "";
        } else {
            $jenisKb = $request->jenis_kb;
        }

        if ($request->posyandu == 0) {
            $frekPos = null;
        } else {
            $frekPos = $request->frekuensi_posyandu;
        }

        if ($request->koperasi == 0) {
            $jenisKoperasi = null;
        } else {
            $jenisKoperasi = $request->jenis_koperasi;
        }

        $data = [
            'nik' => $request->nik,
            'akseptor_kb' => $request->akseptor_kb,
            'jenis_kb' => $jenisKb,
            'posyandu' => $request->posyandu,
            'frekuensi_posyandu' => $frekPos,
            'bina_keluarga_balita' => $request->bina_keluarga_balita,
            'memiliki_tabungan' => $request->memiliki_tabungan,
            'kelompok_belajar' => $request->kelompok_belajar,
            'id_jenis_kelompok_belajar' => $idKelompokBelajar,
            'paud' => $request->paud,
            'koperasi' => $request->koperasi,
            'jenis_koperasi' => $jenisKoperasi,
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
