<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranskripMagang extends Model
{
    protected $table = 'transkrip_magang';
    protected $primaryKey = 'id_transkrip';

    protected $fillable = [
        'id_mitra', 'nim', 'course',
        'hours', 'suggested_sks', 'nilai'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'id_mitra');
    }
}
