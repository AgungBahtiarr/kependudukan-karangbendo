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
        Schema::create('program_bansos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->string('sumber_dana');
            $table->date('periode');
            $table->enum('jenis_bantuan', ["tunai", "non-tunai"]);
            $table->string('detail_bantuan')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_bansos');
    }
};
