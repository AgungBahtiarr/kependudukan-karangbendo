<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function statusPerkawinan()
    {
        return $this->belongsTo(StatusPerkawinan::class, 'id_status_perkawinan');
    }
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
    public function pendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan');
    }
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan');
    }
}
