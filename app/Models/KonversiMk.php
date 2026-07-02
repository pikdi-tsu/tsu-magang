<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonversiMk extends Model
{
    protected $table = 'konversi_mk';

    protected $fillable = [
        'nim',
        'semester',
        'tahun_akademik',
        'kode_mk',
        'nilai'
    ];

    /**
     * Relasi ke Mahasiswa
     */
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    /**
     * Relasi ke MataKuliah
     */
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}