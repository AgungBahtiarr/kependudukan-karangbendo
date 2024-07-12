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
        Schema::create('keikutsertaan_kegiatan_dawis', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16)->unique();
            $table->enum('akseptor_kb', ['0','1']);
            $table->string('jenis_kb',30);
            $table->enum('posyandu', ['0','1']);
            $table->integer('frekuensi_posyandu', 3)->autoIncrement(false);
            $table->enum('bina_keluarga_balita', ['0','1']);
            $table->enum('memilki_tabungan', ['0','1']);
            $table->enum('kelompok_belajar', ['0','1']);
            $table->unsignedBigInteger('id_jenis_kelompok_belajar');
            $table->enum('paud', ['0','1']);
            $table->enum('koperasi', ['0','1']);
            $table->string('jenis_koperasi',30);
            $table->enum('berkebutuhan_khusus', ['0','1']);
            $table->enum('penghayatan_pengamalan_pancasila', ['0','1']);
            $table->enum('gotong_royong', ['0','1']);
            $table->enum('pendidikan_keterampilan', ['0','1']);
            $table->enum('kehidupan_berkolaborasi', ['0','1']);
            $table->enum('pangan', ['0','1']);
            $table->enum('sandang', ['0','1']);
            $table->enum('kegiatan_kesehatan', ['0','1']);
            $table->enum('perencanaan_kesehatan', ['0','1']);
            $table->enum('verified', ['yes','no']);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keikutsertaan_kegiatan_dawis');
    }
};
