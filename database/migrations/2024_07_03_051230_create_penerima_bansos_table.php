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
            $table->string('nik', 16);
            $table->unsignedBigInteger('id_program_bansos');
            $table->unsignedBigInteger('created_by');
            $table->enum('status',['0','1']);
            $table->timestamps();
            // $table->string('periode_bulan',4);
            // $table->year('periode_tahun');
            // $table->unsignedInteger('nominal');
            // $table->string('jenis_bantuan',30);
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
