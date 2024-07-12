<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanRumahTangga extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function sumberAir(){
        return $this->belongsTo(SumberAir::class, 'id_sumber_air');
    }

    public function makananPokok(){
        return $this->belongsTo(MakananPokok::class, 'id_makanan_pokok');
    }
}
