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
        Schema::create('pemanfaatan_tanah_pekarangans', function (Blueprint $table) {
            $table->id();
            $table->string('nkk',16);
            $table->enum('tanaman_keras',['0','1']);
            $table->enum('toga',['0','1']);
            $table->enum('lumbung_hidup',['0','1']);
            $table->enum('warung_hidup',['0','1']);
            $table->enum('perikanan',['0','1']);
            $table->enum('peternakan',['0','1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemanfaatan_tanah_pekarangans');
    }
};
