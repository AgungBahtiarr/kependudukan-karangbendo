<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansos extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function program()
    {
        return $this->belongsTo(ProgramBansos::class, 'id_program_bansos');
    }

    public function riwayat()
    {
        return $this->hasMany(TransaksiBansos::class, 'id_penerima_bansos');
    }


    public function warga()
    {
        return $this->belongsTo(Warga::class, 'nik', 'nik');
    }
}
