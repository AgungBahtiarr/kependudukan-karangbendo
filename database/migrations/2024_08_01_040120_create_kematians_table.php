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
        Schema::create('kematians', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16);
            $table->string('nik_pelapor',16);
            $table->dateTime('waktu_kematian');
            $table->string('tempat_meninggal');
            $table->date('tanggal_pemakaman');
            $table->string('kontak_keluarga');
            $table->string('sebab_kematian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kematians');
    }
};
