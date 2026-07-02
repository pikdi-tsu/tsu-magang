<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Illuminate\Database\QueryException;

class MitraController extends Controller
{
    public function index()
    {
        $data = Mitra::all();
        if ($data->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data mitra ditemukan'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
            'id_mitra'   => 'required|max:8|unique:mitra,id_mitra',
            'nama_mitra' => 'required|max:100',
            'alamat'     => 'required|max:255',
            'kontak'     => 'required|max:20',
            'gambar'     => 'nullable|max:50'
        ]);

            $data = Mitra::create($validated);
            return response()->json(['message' => 'Mitra berhasil ditambahkan', 'data' => $data], 201);

        } catch (QueryException $e) {
            return response()->json(['message' => 'Database error', 'error' => $e->getMessage()], 500);
        }
    }

    public function show($id_mitra)
    {
        $data = Mitra::find($id_mitra);
        if (!$data) {
            return response()->json(['message' => "Mitra dengan id $id_mitra tidak ditemukan"], 404);
        }
        return response()->json($data, 200);
    }

    public function update(Request $request, $id_mitra)
    {
        $data = Mitra::find($id_mitra);
        if (!$data) {
            return response()->json(['message' => 'Mitra tidak ditemukan'], 404);
        }

        try {
            $data->update($request->all());
            return response()->json(['message' => 'Data mitra berhasil diperbarui', 'data' => $data], 200);

        } catch (QueryException $e) {
            return response()->json(['message' => 'Error update', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id_mitra)
    {
        $data = Mitra::find($id_mitra);
        if (!$data) {
            return response()->json(['message' => 'Mitra tidak ditemukan'], 404);
        }

        try {
            $data->delete();
            return response()->json(['message' => 'Mitra berhasil dihapus'], 200);
        } catch (QueryException $e) {
            return response()->json(['message' => 'Error delete', 'error' => $e->getMessage()], 500);
        }
    }
}
