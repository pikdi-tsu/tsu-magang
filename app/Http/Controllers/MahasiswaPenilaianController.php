<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KonversiMk;
use App\Models\BerkasMahasiswa;

class MahasiswaPenilaianController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'mk_code' => 'required|array',
            'mk_code.*' => 'nullable|string',
            'mk_sks' => 'required|array',
            'mk_sks.*' => 'nullable|numeric',
            'files' => 'required',
            'files.*' => 'mimes:pdf|max:2048'
        ]);

        $user = auth()->user();
        if (!$user->mahasiswa) {
            return response()->json(['success' => false, 'message' => 'Akses ditolak.'], 403);
        }

        $nim = $user->mahasiswa->nim;
        $semester_aktif = 1; // Fallback integer since database expects integer for semester
        $tahun_akademik = '2025/2026'; // Misal

        // Simpan Konversi
        foreach ($request->mk_code as $index => $kode_mk) {
            if (!empty($kode_mk) && !empty($request->mk_sks[$index])) {
                KonversiMk::updateOrCreate(
                    [
                        'nim' => $nim,
                        'kode_mk' => $kode_mk,
                        'tahun_akademik' => $tahun_akademik
                    ],
                    [
                        'semester' => $semester_aktif
                    ]
                );
            }
        }

        // Simpan Berkas Sertifikat
        if ($request->hasFile('files')) {
            $berkas = BerkasMahasiswa::firstOrCreate(['user_id' => $user->id]);

            // Simpan file pertama sebagai sertifikat magang
            $file = $request->file('files')[0];
            $path = $file->store('documents/sertifikat', 'public');

            $berkas->sertifikat_magang = $path;
            $berkas->save();
        }

        // Update status pengajuan_konversi di tabel mahasiswa
        $user->mahasiswa->update([
            'pengajuan_konversi' => 'diisi'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Penilaian dan berkas berhasil disimpan.'
        ]);
    }
}
