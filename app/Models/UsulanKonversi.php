<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsulanKonversi extends Model
{
    protected $table = 'usulan_konversi';
    protected $primaryKey = 'id_usulan';

    protected $fillable = [
        'nim', 'id_matkul',
        'sks', 'keterangan',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function programMagang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program');
    }
}
