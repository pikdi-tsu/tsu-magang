<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaian = Penilaian::all();

        if ($penilaian->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data penilaian ditemukan.'
            ], 404);
        }

        return response()->json($penilaian, 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
            'nim'          => 'required|exists:mahasiswa,nim',
            'id_program'   => 'required|exists:program_magang,id_program',
            'nilai_angka'  => 'required|numeric',
            'nilai_huruf'  => 'required|string|max:2',
            'konversi_sks' => 'required|integer'
        ]);

            $penilaian = Penilaian::create($validated);

            if ($penilaian) {
                return response()->json([
                    'message' => 'Penilaian berhasil ditambahkan',
                    'data' => $penilaian
                ], 201);
            }

            return response()->json([
                'message' => 'Gagal menambahkan penilaian.'
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
        $penilaian = Penilaian::where('nim', $nim)->first();

        if (!$penilaian) {
            return response()->json([
                'message' => "Penilaian dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        return response()->json($penilaian, 200);
    }

    public function update(Request $request, $nim)
    {
        $penilaian = Penilaian::where('nim', $nim)->first();

        if (!$penilaian) {
            return response()->json([
                'message' => "Penilaian dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        try {
            $update = $penilaian->update($request->all());

            if ($update) {
                return response()->json([
                    'message' => 'Data penilaian berhasil diperbarui.',
                    'data' => $penilaian
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal memperbarui data penilaian.'
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
        $penilaian = Penilaian::where('nim', $nim)->first();

        if (!$penilaian) {
            return response()->json([
                'message' => "Penilaian dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        try {
            if ($penilaian->delete()) {
                return response()->json([
                    'message' => "Penilaian dengan NIM $nim berhasil dihapus."
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal menghapus penilaian.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
