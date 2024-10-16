<?php

namespace App\Http\Controllers;

use App\Models\CatatanRumahTangga;
use App\Models\IndustriRumahTangga;
use App\Models\MakananPokok;
use App\Models\PemanfaatanTanahPekarangan;
use App\Models\SumberAir;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CatatanRumahTanggaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Catatan Rumah Tangga';

        $cargas = CatatanRumahTangga::with('makananPokok', 'sumberAir');
        $select = $request->input('status');
        $seacrhQuery = $request->strquery;


        if ($seacrhQuery) {
            $cargas->where('nkk', 'like', '%' . strval($seacrhQuery) . '%');
        } elseif ($seacrhQuery == "") {
            $cargas->get();
        }

        if ($select == 'yes') {
            $cargas->where('verified', 'yes');
        }
        if ($select == 'no') {
            $cargas->where('verified', 'no');
        }
        if ($select == 'all') {
            $cargas->get();
        }

        if ($select == 'rumah_layak') {
            $cargas->where('kriteria_rumah', '1');
        }

        if ($select == 'rumah_tidak_layak') {
            $cargas->where('kriteria_rumah', '0');
        }

        if ($request->filterSumberAir) {
            $cargas->where('id_sumber_air', $request->filterSumberAir);
        }

        if ($request->filterMakananPokok) {
            $cargas->where('id_makanan_pokok', $request->filterMakananPokok);
        }

        if ($select == 'ada_nkk_inang') {
            $cargas->where('satu_rumah_satu_kk', '1');
        }
        if ($select == 'tidak_ada_nkk_inang') {
            $cargas->where('satu_rumah_satu_kk', '0');
        }

        $cargas = $cargas->get();
        $cargas = json_decode($cargas);

        return view("catatan_rumah_tangga.index", compact('cargas', 'title'));
    }


    public function sumberAir()
    {
        $title = 'Sumber Air';

        $sumbers = SumberAir::all();
        $makanans = MakananPokok::all();

        return view("catatan_rumah_tangga.partials.form", compact('title', 'sumbers', 'makanans'))->fragment('sumber-air');
    }

    public function makananPokok()
    {
        $title = 'Makanan Pokok';

        $sumbers = SumberAir::all();
        $makanans = MakananPokok::all();

        return view("catatan_rumah_tangga.partials.form", compact('title', 'sumbers', 'makanans'))->fragment('makanan-pokok');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create1(Request $request)
    {
        $title = 'Tambah Catatan Keluarga';

        $makanans = MakananPokok::get();
        $sumbers = SumberAir::get();

        $cargasSession = $request->session()->get('cargas1');

        return view('catatan_rumah_tangga.create.create1', compact('title', 'makanans', 'sumbers', 'cargasSession'));
    }

    public function isNkkInang(Request $request, $id)
    {
        $title = 'Catatan Keluarga';

        $cargasSession = $request->session()->get('cargas1');

        // return $id;

        if ($id == 0) {
            return view("catatan_rumah_tangga.partials.input", compact('title', 'cargasSession'))->fragment('nkkInang');
        } else {
            return "";
        }
    }

    public function isUp2k(Request $request, $id)
    {
        $title = 'Catatan Keluarga';

        $cargasSession = $request->session()->get('cargas2');

        // return $id;

        if ($id == 1) {
            return view("catatan_rumah_tangga.partials.satukk", compact('title', 'cargasSession'))->fragment('jenisUp2k');
        } else {
            return "";
        }
    }

    public function isPekarangan(Request $request, $id)
    {
        $title = 'Catatan Keluarga';

        $carga = CatatanRumahTangga::findOrFail($id);
        $pekarangan = PemanfaatanTanahPekarangan::where("nkk", $carga->nkk)->get();

        if (count($pekarangan) == 1 && $carga->pemanfaatan_pekarangan == "0") {
            return "<div></div>";
        }
        if (count($pekarangan) == 1 && $carga->pemanfaatan_pekarangan == "1") {
            return "<div></div>";
        }
        if (count($pekarangan) == 0 && $carga->pemanfaatan_pekarangan == "0") {
            return view("catatan_rumah_tangga.partials.isPekarangan", compact('title', "carga"))->fragment('isPekarangan');
        }
        if (count($pekarangan) == 0 && $carga->pemanfaatan_pekarangan == "1") {
            return view("catatan_rumah_tangga.partials.isPekarangan", compact('title', "carga"))->fragment('isPekarangan');
        }
    }

    public function isIndustri(Request $request, $id)
    {
        $title = 'Catatan Keluarga';

        $carga = CatatanRumahTangga::findOrFail($id);
        $industri = IndustriRumahTangga::where("nkk", $carga->nkk)->get();

        if (count($industri) == 1 && $carga->industri_rumah_tangga == "0") {
            return "<div></div>";
        }
        if (count($industri) == 1 && $carga->industri_rumah_tangga == "1") {
            return "<div></div>";
        }

        if (count($industri) == 0 && $carga->industri_rumah_tangga == "0") {
            return view("catatan_rumah_tangga.partials.isIndustri", compact('title', "carga"))->fragment('isIndustri');
        }

        if (count($industri) == 0 && $carga->industri_rumah_tangga == "1") {
            return view("catatan_rumah_tangga.partials.isIndustri", compact('title', "carga"))->fragment('isIndustri');
        }
    }

    public function create2(Request $request)
    {
        $title = 'Catatan Keluarga';

        $makanans = MakananPokok::get();
        $sumbers = SumberAir::get();
        $cargasSession = $request->session()->get('cargas2');

        return view('catatan_rumah_tangga.create.create2', compact('title', 'makanans', 'sumbers', 'cargasSession'));
    }

    public function create3(Request $request)
    {
        $title = 'Catatan Keluarga';

        $makanans = MakananPokok::get();
        $sumbers = SumberAir::get();
        $cargasSession = $request->session()->get('cargas3');

        return view('catatan_rumah_tangga.create.create3', compact('title', 'makanans', 'sumbers', 'cargasSession'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store1(Request $request)
    {
        $nkkInang = "";

        if ($request->satu_rumah_satu_kk == 0) {
            $nkkInang = $request->nkk_inang;
        } else {
            $nkkInang = "";
        }

        $data = [
            "nkk" => $request->nkk,
            "nkk_inang" => $nkkInang,
            "jumlah_jamban_keluarga" => $request->jumlah_jamban_keluarga,
            "id_sumber_air" => $request->id_sumber_air,
            "kriteria_rumah" => $request->kriteria_rumah,
            "ada_tempat_sampah" => $request->ada_tempat_sampah,
            "ada_saluran_pembuangan_limbah" => $request->ada_saluran_pembuangan_limbah,
            "satu_rumah_satu_kk" => $request->satu_rumah_satu_kk,
        ];

        // return $data;

        // if ($request->nkk == $nkkInang) {
        //     return redirect(route('cargas.create1'))->withErrors(['add1' => "NKK tidak boleh sama dengan NKK induk"]);
        // }

        $request->session()->put('cargas1', $data);

        return redirect(route('cargas.create2'));
    }


    public function store2(Request $request)
    {
        $up2k = "";

        if ($request->aktivitas_up2k == 0) {
            $up2k = "";
        } else {
            $up2k = $request->jenis_up2k;
        }
        $data = [
            "id_makanan_pokok" => $request->id_makanan_pokok,
            "menempel_stiker_p4k" => $request->menempel_stiker_p4k,
            "aktivitas_up2k" => $request->aktivitas_up2k,
            "jenis_up2k" => $up2k,
            "usaha_kesehatan_lingkungan" => $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan" => $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga" => $request->industri_rumah_tangga,
            "kerja_bakti" => $request->kerja_bakti,
        ];

        $request->session()->put('cargas2', $data);

        return redirect(route('cargas.create3'));
    }


    public function store3(Request $request)
    {
        $rawData = [
            "jumlah_balita" => $request->jumlah_balita,
            "jumlah_pus" => $request->jumlah_pus,
            "jumlah_wus" => $request->jumlah_wus,
            "jumlah_ibu_hamil" =>  $request->jumlah_ibu_hamil,
            "jumlah_ibu_menyusui" => $request->jumlah_ibu_menyusui,
            "jumlah_lansia" => $request->jumlah_lansia,
            "jumlah_buta_baca" => $request->jumlah_buta_baca,
            "jumlah_buta_tulis" => $request->jumlah_buta_tulis,
            "jumlah_buta_hitung" => $request->jumlah_buta_hitung,
            "jumlah_berkebutuhan_khusus" => $request->jumlah_berkebutuhan_khusus
        ];

        $request->session()->put('cargas3', $rawData);

        $userRole = auth()->user()->getRoleNames()->first();

        $cargas1 = $request->session()->get('cargas1');
        $cargas2 = $request->session()->get('cargas2');
        $cargas3 = $request->session()->get('cargas3');
        $created_by = [
            'created_by' => auth()->user()->id,
            'verified' => $userRole == "Admin" ? "yes" : "no"
        ];


        $allSession = array_merge($cargas1, $cargas2, $cargas3, $created_by);

        try {
            $cargas = CatatanRumahTangga::create($allSession);
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
                default:
                    $errorMessage = 'Terjadi kesalahan yang tidak terduga. Silakan coba lagi nanti atau hubungi dukungan pelanggan jika masalah berlanjut.';
            }


            return redirect(route("cargas.create1"))->withErrors(['error' => $errorMessage]);
        }

        $cargas = json_decode($cargas);

        if ($cargas->pemanfaatan_pekarangan == "1") {
            return redirect('/pekarangans/create/' . $cargas->id);
        }

        return redirect(route('cargas.index'));
    }

    public function backTo(Request $request)
    {
        $data = [
            "id_makanan_pokok" => $request->id_makanan_pokok,
            "menempel_stiker_p4k" => $request->menempel_stiker_p4k,
            "aktivitas_up2k" => $request->aktivitas_up2k,
            "jenis_up2k" => $request->jenis_up2k,
            "usaha_kesehatan_lingkungan" => $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan" => $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga" => $request->industri_rumah_tangga,
            "kerja_bakti" => $request->kerja_bakti,
        ];

        $request->session()->put('cargas2', $data);

        return response(null, 200, ["HX-Redirect" => '/cargas/create1']);
    }



    public function backTo2(Request $request)
    {
        $data = [
            "jumlah_balita" => $request->jumlah_balita,
            "jumlah_pus" => $request->jumlah_pus,
            "jumlah_wus" => $request->jumlah_wus,
            "jumlah_ibu_hamil" =>  $request->jumlah_ibu_hamil,
            "jumlah_ibu_menyusui" => $request->jumlah_ibu_menyusui,
            "jumlah_lansia" => $request->jumlah_lansia,
            "jumlah_buta_baca" => $request->jumlah_buta_baca,
            "jumlah_buta_tulis" => $request->jumlah_buta_tulis,
            "jumlah_buta_hitung" => $request->jumlah_buta_hitung,
            "jumlah_berkebutuhan_khusus" => $request->jumlah_berkebutuhan_khusus
        ];

        $request->session()->put('cargas3', $data);

        return response(null, 200, ["HX-Redirect" => '/cargas/create2']);
    }


    public function verify($id)
    {
        $carga = CatatanRumahTangga::findOrFail($id);

        $carga->update([
            'verified' => 'yes'
        ]);

        return redirect("/cargas");
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = 'Detail Catatan Keluarga';

        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);
        $sumbers = SumberAir::get();
        $makanans = MakananPokok::get();

        return view('catatan_rumah_tangga.show.detail', compact('title', 'carga', 'sumbers', 'makanans'));
    }

    public function show2($id, Request $request)
    {
        $title = 'Detail Catatan Keluarga';

        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);

        $carga = json_decode($carga);
        $sumbers = SumberAir::get();
        $makanans = MakananPokok::get();

        return view('catatan_rumah_tangga.show.detail2', compact('title', 'carga', 'makanans'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit1($id)
    {
        $title = 'Edit Catatan Keluarga';

        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $sumbers = SumberAir::get();

        return view('catatan_rumah_tangga.edit.edit1', compact('title', 'carga', 'sumbers'))->fragment('detail-1');
    }

    public function edit2($id)
    {
        $title = 'Edit Catatan Keluarga';

        $makanans = MakananPokok::get();
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);

        return view('catatan_rumah_tangga.edit.edit2', compact('title', 'carga', 'makanans'))->fragment('detail-2');
    }

    public function edit3($id)
    {
        $title = 'Edit Catatan Keluarga';

        $makanans = MakananPokok::get();
        $carga = CatatanRumahTangga::with('makananPokok', 'sumberAir')->findOrFail($id);
        $carga = json_decode($carga);

        return view('catatan_rumah_tangga.edit.edit3', compact('title', 'carga', 'makanans'))->fragment('detail-3');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update1(Request $request)
    {
        $data = [
            "nkk" => $request->nkk,
            "nkk_inang" => $request->nkk_inang,
            "jumlah_jamban_keluarga" => $request->jumlah_jamban_keluarga,
            "id_sumber_air" => $request->id_sumber_air,
            "kriteria_rumah" => $request->kriteria_rumah,
            "ada_tempat_sampah" => $request->ada_tempat_sampah,
            "ada_saluran_pembuangan_limbah" => $request->ada_saluran_pembuangan_limbah,
            "satu_rumah_satu_kk" => $request->satu_rumah_satu_kk,
        ];

        $carga = CatatanRumahTangga::findOrFail($request->id);

        $carga->update($data);

        return redirect(route("cargas.show", $request->id));
    }

    public function update2(Request $request)
    {
        $data = [
            "id_makanan_pokok" => $request->id_makanan_pokok,
            "menempel_stiker_p4k" => $request->menempel_stiker_p4k,
            "aktivitas_up2k" => $request->aktivitas_up2k,
            "jenis_up2k" => $request->jenis_up2k,
            "usaha_kesehatan_lingkungan" => $request->usaha_kesehatan_lingkungan,
            "pemanfaatan_pekarangan" => $request->pemanfaatan_pekarangan,
            "industri_rumah_tangga" => $request->industri_rumah_tangga,
            "kerja_bakti" => $request->kerja_bakti,
        ];


        $carga = CatatanRumahTangga::findOrFail($request->id);

        $pekarangan = PemanfaatanTanahPekarangan::where('nkk', $carga->nkk)->first();
        $industri = IndustriRumahTangga::where('nkk', $carga->nkk)->first();

        if ($request->pemanfaatan_pekarangan == '0') {
            $pekarangan->delete();
        }

        if ($request->industri_rumah_tangga == '0') {
            $industri->delete();
        }

        $carga->update($data);

        return redirect(route("cargas.show", $request->id));
    }

    public function update3(Request $request)
    {
        $data = [
            "jumlah_balita" => $request->jumlah_balita,
            "jumlah_pus" => $request->jumlah_pus,
            "jumlah_wus" => $request->jumlah_wus,
            "jumlah_ibu_hamil" =>  $request->jumlah_ibu_hamil,
            "jumlah_ibu_menyusui" => $request->jumlah_ibu_menyusui,
            "jumlah_lansia" => $request->jumlah_lansia,
            "jumlah_buta_baca" => $request->jumlah_buta_baca,
            "jumlah_buta_tulis" => $request->jumlah_buta_tulis,
            "jumlah_buta_hitung" => $request->jumlah_buta_hitung,
            "jumlah_berkebutuhan_khusus" => $request->jumlah_berkebutuhan_khusus
        ];

        $carga = CatatanRumahTangga::findOrFail($request->id);

        $carga->update($data);

        return redirect(route("cargas.show", $request->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carga = CatatanRumahTangga::findOrFail($id);
        $industri = IndustriRumahTangga::where('nkk', $carga->nkk)->get();
        $pekarangan =  PemanfaatanTanahPekarangan::where('nkk', $carga->nkk)->get();
        if (count($industri) == 1) {
            $industri[0]->delete();
        }

        if (count($pekarangan) == 1) {
            $pekarangan[0]->delete();
        }

        $carga->delete();

        return response(null, 200, ["HX-Redirect" => '/cargas']);
    }
}
