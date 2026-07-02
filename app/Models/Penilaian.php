<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_nilai';

    protected $fillable = [
        'nim', 'id_program',
        'nilai_angka', 'nilai_huruf', 'konversi_sks'
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
