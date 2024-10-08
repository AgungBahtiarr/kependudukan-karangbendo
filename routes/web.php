<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatatanRumahTanggaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndustriRumahTanggaController;
use App\Http\Controllers\KeikutsertaanKegiatanDawisController;
use App\Http\Controllers\KematianController;
use App\Http\Controllers\PemanfaatanTanahPekaranganController;
use App\Http\Controllers\PenerimaBansosController;
use App\Http\Controllers\ProgramBansosController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransaksiBansosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Middleware\CleanSession;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::prefix('auth')->group(function () {
    // Login
    Route::prefix('login')->group(function () {
        Route::get('', [AuthController::class, 'index'])->middleware('guest')->name('login');
        Route::post('', [AuthController::class, 'login'])->middleware('guest');
    });

    // Logout
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    // Data Kader
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->middleware('can:read_users')->name('users.index');
        Route::post('store', [UserController::class, 'store'])->middleware('can:create_users')->name('users.store');
        Route::patch('/{user}/update', [UserController::class, 'update'])->middleware('can:update_users')->name('users.update');
        Route::patch('/{id}/status', [UserController::class, 'updateUserStatus'])->middleware('can:update_user_status')->name('users.status.update');
    });

    // Data Warga
    Route::prefix('warga')->group(function () {
        Route::get('', [WargaController::class, 'index'])->middleware('can:read_wargas', CleanSession::class)->name('wargas.index');
        Route::get('/create/1', [WargaController::class, 'create1'])->middleware('can:create_wargas')->name('wargas.create1');
        Route::get('/create/2', [WargaController::class, 'create2'])
            ->middleware('can:create_wargas')->name('wargas.create2');

        Route::post('/store/back', [WargaController::class, 'backTo'])->middleware('can:create_wargas')->name('wargas.back');
        Route::post('/store/1', [WargaController::class, 'store1'])->middleware('can:create_wargas')->name('wargas.store1');
        Route::post('/store', [WargaController::class, 'store'])->middleware('can:create_wargas')->name('wargas.store');
        Route::get('/edit/1/{id}', [WargaController::class, 'edit1'])->middleware('can:edit_wargas')->name('wargas.edit1');
        Route::get('/edit/2/{id}', [WargaController::class, 'edit2'])->middleware('can:edit_wargas')->name('wargas.edit2');
        Route::patch('/edit/back', [WargaController::class, 'backToEdit'])->middleware('can:edit_wargas')->name('wargas-edit.back');
        Route::patch('/update1', [WargaController::class, 'update1'])->middleware('can:update_wargas')->name('wargas.update1');
        Route::patch('/update', [WargaController::class, 'update'])->middleware('can:update_wargas')->name('wargas.update');
        Route::patch('/{id}/status', [WargaController::class, 'updateWargaStatus'])->middleware('can:update_wargas_status')->name('wargas.status.update');
        Route::get('/{id}', [WargaController::class, 'show'])->middleware('can:read_wargas')->name('wargas.show');
        Route::get('/verify/{id}', [WargaController::class, 'verify'])->middleware('can:edit_wargas')->name('wargas.verify');
        Route::get('/isDawis/{id}', [WargaController::class, 'isDawis'])->name('wargas.isDawis');
        Route::post('/isDomisili/{id}', [WargaController::class, 'isDomisili'])->name('wargas.isDomisili');
        Route::patch('/isDomisili/{id}', [WargaController::class, 'isDomisili'])->name('wargas.isDomisiliPatch');
        Route::delete('/{id}', [WargaController::class, 'destroy'])->name('wargas.delete');


        Route::get('/filter/pendidikan', [WargaController::class, 'filterPendidikan'])->name('wargas.filter-pendidikan');
        Route::get('/filter/agama', [WargaController::class, 'filterAgama'])->name('wargas.filter-agama');
        Route::get('/filter/pekerjaan', [WargaController::class, 'filterPekerjaan'])->name('wargas.filter-pekerjaan');
        Route::get('/filter/status-perkawinan', [WargaController::class, 'filterStatusPerkawinan'])->name('wargas.filter-status-perkawinan');
    });

    Route::prefix('kematian')->group(function () {
        Route::get('', [KematianController::class, 'index'])->name('kematian.index');
        Route::get('/create', [KematianController::class, 'create'])->name('kematian.create');
        Route::get('/{id}', [KematianController::class, 'show'])->name('kematian.show');
        Route::post('', [KematianController::class, 'store'])->name('kematian.store');
        Route::get('/edit/{id}', [KematianController::class, 'edit'])->name('kematian.edit');
        Route::patch('/{id}', [KematianController::class, 'update'])->name('kematian.update');
        Route::delete('/{id}', [KematianController::class, 'destroy'])->name('kematian.delete');
    });

    Route::prefix('dawis')->group(function () {
        Route::get('', [KeikutsertaanKegiatanDawisController::class, 'index'])->middleware('can:read_dawis')->name('dawis.index');
        Route::get('/create/{nik}', [KeikutsertaanKegiatanDawisController::class, 'create'])->middleware('can:create_dawis')->name('dawis.create');
        Route::get('/create2/{nik}', [KeikutsertaanKegiatanDawisController::class, 'create2'])->middleware('can:create_dawis')->name('dawis.create2');
        Route::post('/backTo', [KeikutsertaanKegiatanDawisController::class, 'backTo'])->middleware('can:create_dawis')->name('dawis.backTo');
        Route::post('/store', [KeikutsertaanKegiatanDawisController::class, 'store'])->middleware('can:create_dawis')->name('dawis.store');
        Route::post('/store2', [KeikutsertaanKegiatanDawisController::class, 'store2'])->middleware('can:create_dawis')->name('dawis.store2');

        Route::get('/edit/{nik}', [KeikutsertaanKegiatanDawisController::class, 'edit'])->middleware('can:edit_dawis')->name('dawis.edit');
        Route::get('/edit2/{nik}', [KeikutsertaanKegiatanDawisController::class, 'edit2'])->middleware('can:edit_dawis')->name('dawis.edit2');

        Route::patch('/update', [KeikutsertaanKegiatanDawisController::class, 'update'])->middleware('can:update_dawis')->name('dawis.update');
        Route::patch('/update2', [KeikutsertaanKegiatanDawisController::class, 'update2'])->middleware('can:update_dawis')->name('dawis.update2');

        Route::get('/{id}', [KeikutsertaanKegiatanDawisController::class, 'show'])->middleware('can:read_dawis')->name('dawis.show');

        Route::post('/isKelompokBelajar/{id}', [KeikutsertaanKegiatanDawisController::class, 'isKelompokBelajar']);

        Route::post('/isJenisKb/{id}', [KeikutsertaanKegiatanDawisController::class, 'isKb'])->name('dawis.isKb');

        Route::post('/isPosyandu/{id}', [KeikutsertaanKegiatanDawisController::class, 'isPosyandu'])->name('dawis.isPosyandu');
        Route::post('/isKoperasi/{id}', [KeikutsertaanKegiatanDawisController::class, 'isKoperasi'])->name('dawis.isKoperasi');
    });

    Route::prefix('cargas')->group(function () {
        Route::get('', [CatatanRumahTanggaController::class, 'index'])->middleware('can:read_cargas', CleanSession::class)->name('cargas.index');
        Route::get('/create1', [CatatanRumahTanggaController::class, 'create1'])->middleware('can:create_cargas')->name('cargas.create1');
        Route::get('/create2', [CatatanRumahTanggaController::class, 'create2'])->middleware('can:create_cargas')->name('cargas.create2');
        Route::get('/create3', [CatatanRumahTanggaController::class, 'create3'])->middleware('can:create_cargas')->name('cargas.create3');

        Route::post('/store1', [CatatanRumahTanggaController::class, 'store1'])->middleware('can:create_cargas')->name('cargas.store1');
        Route::post('/store2', [CatatanRumahTanggaController::class, 'store2'])->middleware('can:create_cargas')->name('cargas.store2');
        Route::post('/store3', [CatatanRumahTanggaController::class, 'store3'])->middleware('can:create_cargas')->name('cargas.store3');

        Route::post('/store/back', [CatatanRumahTanggaController::class, 'backTo'])->middleware('can:create_cargas')->name('cargas.back');
        Route::post('/store/back2', [CatatanRumahTanggaController::class, 'backTo2'])->middleware('can:create_cargas')->name('cargas.back2');

        Route::get('/show/{id}', [CatatanRumahTanggaController::class, 'show'])->middleware('can:read_cargas')->name('cargas.show');
        Route::get('/show2/{id}', [CatatanRumahTanggaController::class, 'show2'])->middleware('can:read_cargas')->name('cargas.show2');

        Route::get('/verify/{id}', [CatatanRumahTanggaController::class, 'verify'])->middleware('can:edit_cargas')->name('cargas.verify');

        Route::get('/edit1/{id}', [CatatanRumahTanggaController::class, 'edit1'])->name('cargas.edit1');
        Route::get('/edit2/{id}', [CatatanRumahTanggaController::class, 'edit2'])->name('cargas.edit2');
        Route::get('/edit3/{id}', [CatatanRumahTanggaController::class, 'edit3'])->name('cargas.edit3');

        Route::patch('/update1', [CatatanRumahTanggaController::class, 'update1'])->name('cargas.update1');
        Route::patch('/update2', [CatatanRumahTanggaController::class, 'update2'])->name('cargas.update2');
        Route::patch('/update3', [CatatanRumahTanggaController::class, 'update3'])->name('cargas.update3');

        Route::post('/isNkkInang/{id}', [CatatanRumahTanggaController::class, 'isNkkInang']);
        Route::post('/isUp2k/{id}', [CatatanRumahTanggaController::class, 'isUp2k']);

        Route::get('/isPekarangan/{id}', [CatatanRumahTanggaController::class, 'isPekarangan']);
        Route::get('/isIndustri/{id}', [CatatanRumahTanggaController::class, 'isIndustri']);


        Route::delete('/{id}', [CatatanRumahTanggaController::class, 'destroy'])->name('cargas.delete');

        // Route::get('/filter/kriteria-rumah', [CatatanRumahTanggaController::class, 'kriteriaRumah'])->name('cargas.filter-kriteria-rumah');
        Route::get('/filter/sumber-air', [CatatanRumahTanggaController::class, 'sumberAir'])->name('cargas.filter-sumber-air');
        Route::get('/filter/makanan-pokok', [CatatanRumahTanggaController::class, 'makananPokok'])->name('cargas.filter-makanan-pokok');
    });

    Route::prefix('pekarangans')->group(function () {
        Route::get('', [PemanfaatanTanahPekaranganController::class, 'index'])->middleware('can:read_pekarangans')->name('pekarangans.index');
        Route::get('/create/{id}', [PemanfaatanTanahPekaranganController::class, 'create'])->middleware('can:create_pekarangans')->name('pekarangans.create');
        Route::post('/store', [PemanfaatanTanahPekaranganController::class, 'store'])->middleware('can:create_pekarangans')->name('pekarangans.store');
        Route::get('/detail/{id}/{nkk}', [PemanfaatanTanahPekaranganController::class, 'show'])->middleware('can:read_pekarangans')->name('pekarangans.show');
        Route::get('/edit/{id}', [PemanfaatanTanahPekaranganController::class, 'edit'])->middleware('can:edit_pekarangans')->name('pekarangans.edit');
        Route::patch('/update', [PemanfaatanTanahPekaranganController::class, 'update'])->middleware('can:edit_pekarangans')->name('pekarangans.update');
    });

    Route::prefix('industries')->group(function () {
        Route::get('', [IndustriRumahTanggaController::class, 'index'])->middleware('can:read_industries')->name('industries.index');
        Route::get('/create/{id}', [IndustriRumahTanggaController::class, 'create'])->middleware('can:create_industries')->name('industries.create');
        Route::post('/store', [IndustriRumahTanggaController::class, 'store'])->middleware('can:create_industries')->name('industries.store');
        Route::get('/detail/{id}/{nkk}', [IndustriRumahTanggaController::class, 'show'])->middleware('can:read_industries')->name('industries.show');
        Route::get('/edit/{id}', [IndustriRumahTanggaController::class, 'edit'])->middleware('can:edit_industries')->name('industries.edit');
        Route::patch('/update', [IndustriRumahTanggaController::class, 'update'])->middleware('can:edit_industries')->name('industries.update');
    });

    Route::prefix('bansos')->group(function () {
        Route::get('', [PenerimaBansosController::class, 'index'])->middleware('can:read_bansos')->name('bansos.index');
        Route::get('/create', [PenerimaBansosController::class, 'create'])->middleware('can:create_bansos')->name('bansos.create');
        Route::post('/store', [PenerimaBansosController::class, 'store'])->middleware('can:create_bansos')->name('bansos.store');
        Route::get('/edit/{id}', [PenerimaBansosController::class, 'edit'])->middleware('can:edit_bansos')->name('bansos.edit');
        Route::patch('/update/{id}', [PenerimaBansosController::class, 'update'])->middleware('can:edit_bansos')->name('bansos.update');
        Route::delete('/{id}', [PenerimaBansosController::class, 'destroy'])->name('bansos.delete');
        Route::get('is-log/{id}', [PenerimaBansosController::class, 'isLog'])->name('bansos.isLog');
        Route::post('/status/{bansosid}/{id}', [PenerimaBansosController::class, 'status']);
    });

    Route::prefix('transaksi-bansos')->group(function () {
        Route::post('/create/{id}', [TransaksiBansosController::class, 'store'])->name('trabas.store');
    });

    Route::prefix('program-bansos')->group(function () {
        Route::get('', [ProgramBansosController::class, 'index'])->name('programbansos.index');
        Route::get('/create', [ProgramBansosController::class, 'create'])->name('programbansos.create');
        Route::post('', [ProgramBansosController::class, 'store'])->name('programbansos.store');
        Route::get('/edit/{id}', [ProgramBansosController::class, 'edit'])->name('programbansos.edit');
        Route::patch('/{id}', [ProgramBansosController::class, 'update'])->name('programbansos.update');
        Route::delete('/delete/{id}', [ProgramBansosController::class, 'destroy'])->name('programbansos.delete');

        Route::post('/is-used/{id}', [ProgramBansosController::class, 'isUsed'])->name('programbansos.is-used');
    });

    Route::prefix('laporan')->group(function () {
        Route::get('', [ReportController::class, 'index'])->name('laporan.index');
        Route::get('/demografi', [ReportController::class, 'reportDemografi'])->name('laporan.demografi');
        Route::get('/cargas', [ReportController::class, 'indexCargas'])->name('laporan.cargas');
        Route::get('/carga', [ReportController::class, 'reportCargas'])->name('laporan.cargas_report');
    });
});
