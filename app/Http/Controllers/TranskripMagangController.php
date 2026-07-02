<?php

namespace App\Http\Controllers;

use App\Models\TranskripMagang;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;

class TranskripMagangController extends Controller
{
    public function index()
    {
        $transkripmagang = TranskripMagang::all();

        if ($transkripmagang->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada data transkrip ditemukan.'
            ], 404);
        }

        return response()->json($transkripmagang, 200);
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
            'id_mitra'      => 'required|exists:mitra,id_mitra',
            'nim'           => 'required|exists:mahasiswa,nim',
            'course'        => 'required|string|max:100',
            'hours'         => 'required|integer',
            'suggested_sks' => 'required|integer',
            'nilai'         => 'required|numeric'
        ]);

            $transkripmagang = TranskripMagang::create($validated);

            return response()->json([
                'message' => 'TranskripMagang berhasil ditambahkan.',
                'data' => $transkripmagang
            ], 201);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan pada database.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function show($id_transkrip)
    {
        $transkripmagang = TranskripMagang::find($id_transkrip);

        if (!$transkripmagang) {
            return response()->json([
                'message' => "TranskripMagang dengan ID $id_transkrip tidak ditemukan."
            ], 404);
        }

        return response()->json($transkripmagang, 200);
    }


    public function update(Request $request, $id_transkrip)
    {
        $transkripmagang = TranskripMagang::find($id_transkrip);

        if (!$transkripmagang) {
            return response()->json([
                'message' => "TranskripMagang dengan ID $id_transkrip tidak ditemukan."
            ], 404);
        }

        try {
            $validated = $request->validate([
                'id_mitra'      => 'sometimes|exists:mitra,id_mitra',
                'nim'           => 'sometimes|exists:mahasiswa,nim',

                'code' => [
                    'sometimes',
                    'string',
                    'max:15',
                    Rule::unique('transkrip_magang', 'code')
                        ->ignore($id_transkrip, 'id_transkrip')
                ],

                'course'        => 'sometimes|string|max:100',
                'hours'         => 'sometimes|integer',
                'suggested_sks' => 'sometimes|integer',
                'nilai'         => 'sometimes|numeric'
            ]);

            $transkripmagang->update($validated);

            return response()->json([
                'message' => 'Data transkrip berhasil diperbarui.',
                'data' => $transkripmagang
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Kesalahan Validasi.',
                'errors' => $e->errors()
            ], 422);
        }
    }


    public function destroy($id_transkrip)
    {
        $transkripmagang = TranskripMagang::find($id_transkrip);

        if (!$transkripmagang) {
            return response()->json([
                'message' => "TranskripMagang dengan ID $id_transkrip tidak ditemukan."
            ], 404);
        }

        try {
            $transkripmagang->delete();

            return response()->json([
                'message' => "TranskripMagang dengan ID $id_transkrip berhasil dihapus."
            ], 200);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat menghapus.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
