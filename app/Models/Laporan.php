<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $fillable = [
        'nim', 'id_program', 'laporan_akhir',
        'sertifikat', 'transkrip_nilai',
        'status_validasi'
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
