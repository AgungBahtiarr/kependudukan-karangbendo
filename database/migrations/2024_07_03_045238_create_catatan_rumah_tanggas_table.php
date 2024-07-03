<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catatan_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->string('nkk',16);
            $table->enum('kriteria_rumah',['0','1']);
            $table->integer('jumlah_jamban_keluarga');
            $table->enum('sumber_air',['PDAM','Sumur','Sungai','Lainnya']);
            $table->enum('ada_tempat_sampah',['0','1']);
            $table->enum('ada_saluran_pembuangan_limbah',['0','1']);
            $table->enum('satu_rumah_satu_kk',['0','1']);
            $table->string('nkk_inang',16);
            // $table->integer('jumlah_balita',2);
            // $table->integer('jumlah_pus',2);
            // $table->integer('jumlah_wus',2);
            // $table->integer('jumlah_ibuta',2);
            // $table->integer('jumlah_lansia',2);
            $table->unsignedTinyInteger('jumlah_balita');
            $table->unsignedTinyInteger('jumlah_pus');
            $table->unsignedTinyInteger('jumlah_wus');
            $table->unsignedTinyInteger('jumlah_ibuta');
            $table->unsignedTinyInteger('jumlah_lansia');
            $table->unsignedBigInteger('id_makanan_pokok');
            $table->enum('menempel_stiker_p4k',['0','1']);
            $table->enum('aktivitas_UP2k',['0','1']);
            $table->string('jenis_up2k');
            $table->enum('usaha_kesehatan_lingkungan',['0','1']);
            $table->enum('pemanfaatan_pekarangan',['0','1']);
            $table->enum('kerja_bakti',['0','1']);
            $table->enum('verified',['yes','no']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_rumah_tanggas');
    }
};
