<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Penilaian;

class DosenPenilaianController extends Controller
{
    public function index()
    {
        $nuptk = auth()->user()->dosen->nuptk;

        $mahasiswa = Mahasiswa::with(['user', 'programMagang', 'penilaian'])
            ->whereHas('pendaftaran', function ($q) use ($nuptk) {
                $q->where('nuptk', $nuptk)
                    ->where('status', 'diterima');
            })
            ->get();

        return view('dosen.penilaian', compact('mahasiswa'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|exists:mahasiswa,nim',
        ]);

        Penilaian::updateOrCreate(
            ['nim' => $request->nim],
            [
                'nuptk' => auth()->user()->dosen->nuptk
            ]
        );

        return back()->with('success', 'Penilaian berhasil disimpan');
    }
}
