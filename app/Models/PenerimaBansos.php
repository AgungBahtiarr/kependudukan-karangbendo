<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBansos extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    public function program(){
        return $this->belongsTo(ProgramBansos::class,'id_program_bansos');
    }
}
