<?php

namespace App\Http\Controllers;

use App\Models\usulankonversi;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UsulanKonversiController extends Controller
{
    public function index()
    {
        $usulankonversi = UsulanKonversi::all();

        if ($usulankonversi->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data logbook ditemukan.'
            ], 404);
        }

        return response()->json($usulankonversi, 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nim'       => 'required|exists:mahasiswa,nim',
                'id_matkul' => 'required|exists:mata_kuliah,id_matkul',
                'sks'       => 'nullable|integer'
            ]);

            $usulankonversi = UsulanKonversi::create($validated);

            if ($usulankonversi) {
                return response()->json([
                    'message' => 'UsulanKonversi berhasil ditambahkan',
                    'data' => $usulankonversi
                ], 201);
            }

            return response()->json([
                'message' => 'Gagal menambahkan logbook.'
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
        $usulankonversi = UsulanKonversi::where('nim', $nim)->first();

        if (!$usulankonversi) {
            return response()->json([
                'message' => "UsulanKonversi dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        return response()->json($usulankonversi, 200);
    }

    public function update(Request $request, $nim)
    {
        $usulankonversi = UsulanKonversi::where('nim', $nim)->first();

        if (!$usulankonversi) {
            return response()->json([
                'message' => "UsulanKonversi dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        try {
            $update = $usulankonversi->update($request->all());

            if ($update) {
                return response()->json([
                    'message' => 'Data logbook berhasil diperbarui.',
                    'data' => $usulankonversi
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal memperbarui data logbook.'
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
        $usulankonversi = UsulanKonversi::where('nim', $nim)->first();

        if (!$usulankonversi) {
            return response()->json([
                'message' => "UsulanKonversi dengan NIM $nim tidak ditemukan."
            ], 404);
        }

        try {
            if ($usulankonversi->delete()) {
                return response()->json([
                    'message' => "UsulanKonversi dengan NIM $nim berhasil dihapus."
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal menghapus logbook.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
