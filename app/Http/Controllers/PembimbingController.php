<?php

namespace App\Http\Controllers;

use App\Models\Pembimbing;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PembimbingController extends Controller
{
    public function index()
    {
        $pembimbing = Pembimbing::all();

        if ($pembimbing->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data pembimbing ditemukan.'
            ], 404);
        }

        return response()->json($pembimbing, 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_program' => 'required|exists:program_magang,id_program',
                'nuptk'      => 'required|exists:dosen,nuptk',
                'nim'        => 'required|exists:mahasiswa,nim'
            ]);

            $pembimbing = Pembimbing::create($validated);

            if ($pembimbing) {
                return response()->json([
                    'message' => 'Pembimbing berhasil ditambahkan',
                    'data' => $pembimbing
                ], 201);
            }

            return response()->json([
                'message' => 'Gagal menambahkan pembimbing.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($nuptk)
    {
        $pembimbing = Pembimbing::where('nuptk', $nuptk)->first();

        if (!$pembimbing) {
            return response()->json([
                'message' => "Pembimbing dengan nuptk $nuptk tidak ditemukan."
            ], 404);
        }

        return response()->json($pembimbing, 200);
    }

    public function update(Request $request, $nuptk)
    {
        $pembimbing = Pembimbing::where('nuptk', $nuptk)->first();

        if (!$pembimbing) {
            return response()->json([
                'message' => "Pembimbing dengan nuptk $nuptk tidak ditemukan."
            ], 404);
        }

        try {
            $update = $pembimbing->update($request->all());

            if ($update) {
                return response()->json([
                    'message' => 'Data pembimbing berhasil diperbarui.',
                    'data' => $pembimbing
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal memperbarui data pembimbing.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat update.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($nuptk)
    {
        $pembimbing = Pembimbing::where('nuptk', $nuptk)->first();

        if (!$pembimbing) {
            return response()->json([
                'message' => "Pembimbing dengan nuptk $nuptk tidak ditemukan."
            ], 404);
        }

        try {
            if ($pembimbing->delete()) {
                return response()->json([
                    'message' => "Pembimbing dengan nuptk $nuptk berhasil dihapus."
                ], 200);
            }

            return response()->json([
                'message' => 'Gagal menghapus pembimbing.'
            ], 500);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
