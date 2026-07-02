<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $primaryKey = 'id_daftar';


    protected $fillable = [
        'nim',
        'id_program',
        'status',
        'nuptk',
        'alasan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function programMagang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nuptk');
    }
}
