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
        Schema::create('penerima_bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16);
            $table->string('jenis_bantuan',30);
            $table->string('periode_bulan',4);
            // $table->integer('periode_tahun',4);
            // $table->integer('nominal',8);
            $table->year('periode_tahun');
            $table->unsignedInteger('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_bansos');
    }
};
