<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\KonversiMk;
use App\Models\BerkasMahasiswa;

class AdminKonversiController extends Controller
{
    public function index()
    {
        // Cari mahasiswa yang sudah mengajukan konversi (diisi atau disetujui)
        $mahasiswas = Mahasiswa::with([
            'user',
            'konversi.mataKuliah',
            'pendaftaran.programMagang',
            'pendaftaran' => function ($q) {
                $q->where('status', 'diterima');
            }
        ])
            ->whereNotNull('pengajuan_konversi')
            ->whereIn('pengajuan_konversi', ['diisi', 'disetujui'])
            ->get();

        // Siapkan data untuk AlpineJS
        $usulans = $mahasiswas->map(function ($mhs) {
            $berkas = BerkasMahasiswa::where('user_id', $mhs->user_id)->first();
            $fileUrl = $berkas && $berkas->sertifikat_magang ? asset('storage/' . $berkas->sertifikat_magang) : null;

            // Format existing konversi jika ada
            $existingKonversi = $mhs->konversi->map(function ($k) {
                return [
                    'kode' => $k->kode_mk,
                    'nama' => $k->mataKuliah ? $k->mataKuliah->nama_matkul : '',
                    'sks' => $k->mataKuliah ? $k->mataKuliah->sks : 0,
                    'nilai' => $k->nilai ?? '-'
                ];
            });

            return [
                'id' => $mhs->nim,
                'nama' => $mhs->user->name,
                'nim' => $mhs->nim,
                'file' => $fileUrl,
                'status' => $mhs->pengajuan_konversi === 'disetujui' ? 'Disetujui' : 'Menunggu',
                'konversi_data' => $existingKonversi->isEmpty() ? [['kode' => '', 'nama' => '', 'sks' => '']] : $existingKonversi
            ];
        });

        return view('admin.konversi.konversi', compact('usulans'));
    }

    public function validasi(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $request->validate([
            'konversi' => 'required|array',
            'konversi.*.kode' => 'required|string',
            'konversi.*.nama' => 'required|string',
            'konversi.*.sks' => 'required|numeric'
        ]);

        // Hapus konversi lama jika ingin mereplace atau update sesuai kebutuhan
        // Di sini kita replace dengan data validasi baru
        $existingKonversi = KonversiMk::where('nim', $nim)->first();
        $semester = $existingKonversi ? $existingKonversi->semester : 1;
        $tahun_akademik = $existingKonversi ? $existingKonversi->tahun_akademik : '2025/2026';

        KonversiMk::where('nim', $nim)->delete();

        foreach ($request->konversi as $mk) {
            if (!empty($mk['kode']) && !empty($mk['nama'])) {
                KonversiMk::create([
                    'nim' => $nim,
                    'kode_mk' => $mk['kode'],
                    'semester' => $semester,
                    'tahun_akademik' => $tahun_akademik
                ]);
            }
        }

        $mahasiswa->update(['pengajuan_konversi' => 'disetujui']);

        return response()->json(['success' => true, 'message' => 'Validasi Berhasil']);
    }
}
