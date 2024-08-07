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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nik',16)->unique();
            $table->string('nkk',16);
            $table->string('nama',50);
            $table->string('jabatan',50)->nullable(true);
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('tempat_lahir',30);
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('id_status_perkawinan');
            $table->enum('status_keluarga',['1','0']);
            $table->unsignedBigInteger('id_agama');
            $table->string('alamat_jalan',100);
            $table->string('alamat_desakel')->default('Karangbendo');
            $table->string('alamat_kec')->default('Rogojampi');
            $table->string('alamat_kab')->default('Banyuwangi');
            $table->string('alamat_prov')->default('Jawa Timur');
            $table->enum('domisili_sesuai_ktp',['0','1']);
            $table->string('alamat_domisili')->nullable(true);
            $table->string('rt',3);
            $table->string('rw',3);
            $table->unsignedBigInteger('id_pendidikan');
            $table->unsignedBigInteger('id_pekerjaan');
            $table->enum('verified',['yes','no']);
            $table->enum('status_kematian',["0","1"])->default('0');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
