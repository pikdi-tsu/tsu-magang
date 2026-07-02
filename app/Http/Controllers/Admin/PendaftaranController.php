<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Database\QueryException;

class PendaftaranController extends Controller
{
    public function index()
    {
        // Fetch pendaftaran with related mahasiswa, program, and assigned dosen
        $pendaftarans = Pendaftaran::with(['mahasiswa.user', 'programMagang.mitra', 'dosen.user'])
            ->latest()
            ->get();

        // Fetch users with role 'dosen' that have a dosen profile
        $dosens = \App\Models\Dosen::with('user')->get();

        return view('admin.pendaftaran.index', compact('pendaftarans', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $request->validate([
            'status' => 'required|in:diterima,ditolak',
            'alasan' => 'nullable|string'
        ]);

        try {
            $pendaftaran->update([
                'status' => $request->status,
                'alasan' => $request->status === 'ditolak'
                    ? $request->alasan
                    : null
            ]);

            // Jika status diterima, tolak otomatis pendaftaran lain dari mahasiswa ini
            if ($request->status === 'diterima') {
                Pendaftaran::where('nim', $pendaftaran->nim)
                    ->where('id_daftar', '!=', $pendaftaran->id_daftar)
                    ->where('status', 'menunggu')
                    ->update([
                        'status' => 'ditolak',
                        'alasan' => 'Ditolak secara sistem karena Anda telah diterima di program magang lain.'
                    ]);
            }

            $message = $request->status === 'diterima'
                ? 'Mahasiswa berhasil diloloskan. Pendaftaran lainnya otomatis ditolak.'
                : 'Pendaftaran mahasiswa ditolak.';

            return response()->json([
                'success' => true,
                'message' => $message
            ]);

        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function assignDospem(Request $request, $id)
    {
        $request->validate([
            'nuptk' => 'required|exists:dosen,nuptk'
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        try {
            $pendaftaran->update([
                'nuptk' => $request->nuptk
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Dosen pembimbing berhasil ditetapkan.'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menetapkan dosen: ' . $e->getMessage()
            ], 500);
        }
    }
}
