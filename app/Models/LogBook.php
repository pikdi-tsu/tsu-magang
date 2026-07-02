<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogBook extends Model
{
    use HasFactory;

    protected $table = 'logbook';
    protected $primaryKey = 'id_logbook';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nim',
        'id_program',
        'minggu_ke',
        'tanggal_mulai',
        'tanggal_selesai',
        'nama_kegiatan',
        'uraian_kegiatan',
        'jenis_logbook',
        'status_validasi',
        'alasan'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function programMagang()
    {
        return $this->belongsTo(ProgramMagang::class, 'id_program', 'id_program');
    }
}