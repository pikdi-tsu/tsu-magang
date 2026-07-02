<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();

        if ($laporan->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data laporan ditemukan.'
            ], 404);
        }

        return response()->json($laporan, 200);
    }

    public function store(Request $request)
    {
        try {
           $validated = $request->validate([
            'nim'               => 'required|exists:mahasiswa,nim',
            'id_program'        => 'required|exists:program_magang,id_program',
            'laporan_akhir'     => 'nullable|string',
            'sertifikat'        => 'nullable|string',
            'transkrip_nilai'   => 'nullable|string',
            'status_validasi'   => 'required|in:belum divalidasi,divalidasi',
        ]);



            $laporan = Laporan::create($validated);

            if ($laporan) {
                return response()->json([
                    'message' => 'Laporan berhasil ditambahkan',
                    'data' => $laporan
                ], 201);
            }

            return response()->json([
                'message' => 'Gagal menambahkan laporan.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($nim)
    {
        $laporan = Laporan::where('nim', $nim)->first();

        if (!$laporan) {
            return response()->json([
                'message' => "Laporan dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        return response()->json($laporan, 200);
    }

    public function update(Request $request, $nim)
    {
        $laporan = Laporan::where('nim', $nim)->first();

        if (!$laporan) {
            return response()->json([
                'message' => "Laporan dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        try {
            $update = $laporan->update($request->all());

            if ($update) {
                return response()->json([
                    'message' => 'Data laporan berhasil diperbarui.',
                    'data' => $laporan
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal memperbarui data laporan.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat update.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($nim)
    {
        $laporan = Laporan::where('nim', $nim)->first();

        if (!$laporan) {
            return response()->json([
                'message' => "Laporan dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        try {
            if ($laporan->delete()) {
                return response()->json([
                    'message' => "Laporan dengan NIM $nim berhasil dihapus."
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal menghapus laporan.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
