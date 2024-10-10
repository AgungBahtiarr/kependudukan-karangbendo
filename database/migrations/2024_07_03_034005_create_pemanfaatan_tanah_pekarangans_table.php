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
            $table->string('nkk', 16);
            $table->enum('tanaman_keras', ['0', '1']);
            $table->string('jenis_tanaman_keras')->nullable(true);
            $table->integer('volume_tanaman_keras')->nullable(true)->autoIncrement(false);
            $table->enum('toga', ['0', '1']);
            $table->string('jenis_toga')->nullable(true);
            $table->integer('volume_toga')->nullable(true)->autoIncrement(false);
            $table->enum('lumbung_hidup', ['0', '1']);
            $table->string('jenis_lumbung_hidup')->nullable(true);
            $table->integer('volume_lumbung_hidup')->nullable(true)->autoIncrement(false);
            $table->enum('warung_hidup', ['0', '1']);
            $table->string('jenis_warung_hidup')->nullable(true);
            $table->integer('volume_warung_hidup')->nullable(true)->autoIncrement(false);
            $table->enum('perikanan', ['0', '1']);
            $table->string('jenis_perikanan')->nullable(true);
            $table->integer('volume_perikanan')->nullable(true)->autoIncrement(false);
            $table->enum('peternakan', ['0', '1']);
            $table->string('jenis_peternakan')->nullable(true);
            $table->integer('volume_peternakan')->nullable(true)->autoIncrement(false);
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
