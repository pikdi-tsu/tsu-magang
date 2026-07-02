<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;
use Illuminate\Database\QueryException;

class MataKuliahController extends Controller
{
    public function index()
    {
        $data = MataKuliah::all();
        if ($data->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data matakuliah ditemukan'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'id_matkul' => 'required|string|max:10|unique:mata_kuliah,id_matkul',
                'nama_matkul' => 'required|string|max:100',
                'sks' => 'required|integer|min:1',
                'semester' => 'required|string|max:2',
            ]);

            $data = MataKuliah::create($validated);
            return response()->json(['message' => 'Mata Kuliah berhasil ditambahkan', 'data' => $data], 201);

        } catch (QueryException $e) {
            return response()->json(['message' => 'Database error', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id_matkul)
    {
        $data = MataKuliah::find($id_matkul);
        if (!$data) {
            return response()->json(['message' => "Mata Kuliah dengan id $id_matkul tidak ditemukan"], 404);
        }
        return response()->json($data, 200);
    }

    public function update(Request $request, $id_matkul)
    {
        $data = MataKuliah::find($id_matkul);
        if (!$data) {
            return response()->json(['message' => 'Mata Kuliah tidak ditemukan'], 404);
        }

        try {
            $data->update($request->all());
            return response()->json(['message' => 'Data matakuliah berhasil diperbarui', 'data' => $data], 200);

        } catch (QueryException $e) {
            return response()->json(['message' => 'Error update', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id_matkul)
    {
        $data = MataKuliah::find($id_matkul);
        if (!$data) {
            return response()->json(['message' => 'Mata Kuliah tidak ditemukan'], 404);
        }

        try {
            $data->delete();
            return response()->json(['message' => 'Mata Kuliah berhasil dihapus'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error delete', 'error' => $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        $query = $request->q;

        $matkul = MataKuliah::where('kode_mk', 'like', "%$query%")
            ->orWhere('nama_matkul', 'like', "%$query%")
            ->limit(5)
            ->get();

        return response()->json($matkul);
    }
}
