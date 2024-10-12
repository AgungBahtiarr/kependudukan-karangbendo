<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaProgram extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];

    public function programBansos()
    {
        return $this->belongsTo(ProgramBansos::class, 'id_program_bansos');
    }

    public function penerimaBansos()
    {
        return $this->belongsTo(PenerimaBansos::class, 'id_penerima_bansos');
    }
    public function riwayat()
    {
        return $this->hasMany(TransaksiBansos::class, 'id_penerima_program');
    }
}
