<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    protected $table = 'pembimbing';
    protected $primaryKey = 'id_pembimbing';

    protected $fillable = ['id_program', 'nuptk', 'nim'];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nuptk');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function programMagang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program');
    }
}
