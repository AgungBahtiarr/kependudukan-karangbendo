<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBansos extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function program()
    {
        return $this->belongsTo(PenerimaProgram::class, 'id_penerima_program');
    }
}
