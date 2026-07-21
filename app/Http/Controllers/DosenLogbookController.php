<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\LogBook;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenLogbookController extends Controller
{
    public function index()
    {
        $nuptk = auth()->user()->dosen->nuptk;

        $mahasiswa = Mahasiswa::with('logbook')
            ->whereHas('pendaftaran', function ($q) use ($nuptk) {
                $q->where('nuptk', $nuptk)
                    ->where('status', 'diterima');
            })
            ->get();

        $countPending = 0;
        $countSuccess = 0;

        foreach ($mahasiswa as $mhs) {

            $countPending += $mhs->logbook
                ->where('status_validasi', 'pending')
                ->count();

            $countSuccess += $mhs->logbook
                ->whereIn('status_validasi', ['disetujui', 'ditolak'])
                ->count();
        }

        return view('dosen.logbook', compact(
            'mahasiswa',
            'countPending',
            'countSuccess'
        ));
    }

    public function validasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:disetujui,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $logbook = LogBook::findOrFail($id);

        $logbook->update([
            'status_validasi' => $request->status,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Logbook berhasil divalidasi']);
        }

        return back()->with('success', 'Logbook berhasil divalidasi');
    }

    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasan' => 'required|string'
        ]);

        $logbook = LogBook::findOrFail($id);

        $logbook->update([
            'status_validasi' => 'ditolak',
            'alasan' => $request->alasan
        ]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Logbook ditolak']);
        }

        return back()->with('success', 'Logbook ditolak');
    }

    public function getLogbooks($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

        $logbooks = $mahasiswa->logbook()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($logbooks);
    }
}
