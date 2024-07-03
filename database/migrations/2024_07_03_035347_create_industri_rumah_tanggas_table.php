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
        Schema::create('industri_rumah_tanggas', function (Blueprint $table) {
            $table->id();
            $table->string('nkk',16);
            $table->enum('bidang_sandang',['0','1']);
            $table->enum('bidang_pangan',['0','1']);
            $table->enum('bidang_jasa',['0','1']);
            $table->string('nama_usaha',30);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industri_rumah_tanggas');
    }
};
