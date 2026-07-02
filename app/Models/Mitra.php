<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id_mitra';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['id_mitra', 'nama_mitra', 'alamat', 'kontak','gambar',];

    public function programMagang()
    {
        return $this->hasMany(ProgramMagang::class, 'id_mitra');
    }

    public function transkrip()
    {
        return $this->hasMany(TranskripMagang::class, 'id_mitra');
    }
}
