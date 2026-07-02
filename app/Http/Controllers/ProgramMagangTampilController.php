<?php

namespace App\Http\Controllers;

use App\Models\ProgramMagang;
use App\Models\Pendaftaran;
use App\Models\BerkasMahasiswa;
use App\Models\Mahasiswa;

class ProgramMagangTampilController extends Controller
{
    public function index()
    {
        $programs = ProgramMagang::with(['mitra', 'pendaftaran.mahasiswa.user'])->get();

        $jumlahPeserta = Mahasiswa::count();
        $pesertaAktif = Pendaftaran::where('status', 'diterima')->count();
        $pesertaLulus = Pendaftaran::where('status', 'lulus')->count();

        return view('mahasiswa.program.program', compact('programs', 'jumlahPeserta', 'pesertaAktif', 'pesertaLulus'));
    }

    public function show($id_program)
    {
        $program = ProgramMagang::with(['mitra', 'pendaftaran'])->findOrFail($id_program);
        $user = auth()->user();

        $hasDocuments = false;
        $isRegistered = false;
        $isLimitReached = false;

        if ($user && $user->role === 'mahasiswa' && $user->mahasiswa) {
            $berkas = BerkasMahasiswa::where('user_id', $user->id)->first();

            $hasDocuments = $berkas && $berkas->isLengkap();

            $isRegistered = Pendaftaran::where('nim', $user->mahasiswa->nim)
                ->where('id_program', $program->id_program)
                ->exists();

            $jumlahPendaftaran = Pendaftaran::where('nim', $user->mahasiswa->nim)->count();
            $isLimitReached = $jumlahPendaftaran >= 3;
        }
        return view('mahasiswa.program.program-detail', compact('program', 'hasDocuments', 'isRegistered', 'isLimitReached'));
    }

}
