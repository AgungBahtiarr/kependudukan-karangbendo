<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeikutsertaanKegiatanDawis extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function jenisKelompokBelajar()
    {
        return $this->belongsTo(KelompokBelajar::class, 'id_jenis_kelompok_belajar');
    }

    public function jenisDisabilitas()
    {
        return $this->belongsTo(Disabilitas::class, 'id_jenis_disabilitas');
    }
}
