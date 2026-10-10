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

        $mahasiswa = Mahasiswa::with(['user.berkas', 'pendaftaran.programMagang', 'penilaian', 'konversiMk'])
            ->whereHas('pendaftaran', function ($q) use ($nuptk) {
                $q->where('nuptk', $nuptk)
                    ->where('status', 'diterima');
            })
            ->get();

        // Calculate dynamic statuses
        foreach ($mahasiswa as $mhs) {
            $hasSertifikat = $mhs->user && $mhs->user->berkas && $mhs->user->berkas->sertifikat_magang;
            $konversiCount = $mhs->konversiMk->count();

            if ($konversiCount == 0 || !$hasSertifikat) {
                $mhs->status_penilaian = 'tunggu-dokumen';
            } else {
                $missingGrades = $mhs->konversiMk->whereNull('nilai')->count();
                if ($missingGrades > 0) {
                    $mhs->status_penilaian = 'perlu-dinilai';
                } else {
                    $mhs->status_penilaian = 'sudah-dinilai';
                }
            }
        }

        return view('dosen.penilaian', compact('mahasiswa'));
    }

    public function getPenilaianData($nim)
    {
        $konversi = \App\Models\KonversiMk::with('mataKuliah')
            ->where('nim', $nim)
            ->get();

        return response()->json($konversi);
    }


    public function store(Request $request, $nim)
    {
        $request->validate([
            'nilai' => 'required|array',
            'mk_code' => 'required|array',
        ]);

        $totalNilai = 0;
        $countMk = 0;
        $totalSks = 0;

        foreach ($request->mk_code as $index => $kode_mk) {
            if (isset($request->nilai[$index])) {
                $nilai = floatval($request->nilai[$index]);

                \App\Models\KonversiMk::where('nim', $nim)
                    ->where('kode_mk', $kode_mk)
                    ->update(['nilai' => $nilai]);

                $mk = \App\Models\MataKuliah::where('kode_mk', $kode_mk)->first();
                if ($mk) {
                    $totalNilai += $nilai;
                    $countMk++;
                    $totalSks += $mk->sks;
                }
            }
        }

        $nilaiAngka = $countMk > 0 ? $totalNilai / $countMk : 0;

        if ($nilaiAngka >= 80) $nilaiHuruf = 'A';
        elseif ($nilaiAngka >= 70) $nilaiHuruf = 'B';
        elseif ($nilaiAngka >= 60) $nilaiHuruf = 'C';
        else $nilaiHuruf = 'D';

        $pendaftaran = \App\Models\Pendaftaran::where('nim', $nim)
            ->where('status', 'diterima')
            ->first();

        if ($pendaftaran) {
            Penilaian::updateOrCreate(
                ['nim' => $nim],
                [
                    'id_program' => $pendaftaran->id_program,
                    'nilai_angka' => $nilaiAngka,
                    'nilai_huruf' => $nilaiHuruf,
                    'konversi_sks' => $totalSks
                ]
            );
        }

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Penilaian berhasil disimpan']);
        }

        return back()->with('success', 'Penilaian berhasil disimpan');
    }
}
