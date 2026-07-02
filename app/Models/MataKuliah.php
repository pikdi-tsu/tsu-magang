<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $fillable = [
        'kode_mk',
        'nama_mk',
        'sks',
        'semester',
        'prodi'
    ];

    /**
     * Relasi ke konversi_mk
     */
    public function konversi()
    {
        return $this->hasMany(KonversiMk::class, 'kode_mk', 'kode_mk');
    }
}