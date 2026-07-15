<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'mahasiswa')
            ->with(['mahasiswa.pendaftaran.programMagang.mitra', 'berkas']);

        // Check if user is Admin Prodi
        if ($request->user()->role === 'admin_prodi' && $request->user()->prodi) {
            $userProdi = $request->user()->prodi;
            $query->whereHas('mahasiswa', function($q) use ($userProdi) {
                $q->where('prodi', $userProdi);
            });
        }

        // Filter by Faculty
        if ($request->has('fakultas') && $request->fakultas != '') {
             $fakultas = $request->fakultas;
             $prodiList = [];
             
             // Map Fakultas to Prodi
             if ($fakultas == 'FTI') {
                 $prodiList = ['Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Rekayasa Perangkat Lunak'];
             } elseif ($fakultas == 'FEB') {
                 // Add FEB prodis if any
             } elseif ($fakultas == 'FK') {
                 // Add FK prodis if any
             }
             
             if (!empty($prodiList)) {
                 $query->whereHas('mahasiswa', function($q) use ($prodiList) {
                     $q->whereIn('prodi', $prodiList);
                 });
             }
        }

        // Filter by Prodi
        if ($request->has('prodi') && $request->prodi != '') {
             $prodi = $request->prodi;
             $query->whereHas('mahasiswa', function($q) use ($prodi) {
                 $q->where('prodi', $prodi);
             });
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhereHas('mahasiswa', function($q2) use ($search) {
                      $q2->where('nim', 'like', "%{$search}%");
                  });
            });
        }

        $mahasiswa = $query->get();

        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function export(Request $request)
    {
        $query = User::where('role', 'mahasiswa')
            ->with(['mahasiswa.pendaftaran.programMagang.mitra']);

        if ($request->user()->role === 'admin_prodi' && $request->user()->prodi) {
            $userProdi = $request->user()->prodi;
            $query->whereHas('mahasiswa', function($q) use ($userProdi) {
                $q->where('prodi', $userProdi);
            });
        }

        if ($request->has('fakultas') && $request->fakultas != '' && $request->fakultas != 'Semua') {
             $fakultas = $request->fakultas;
             $prodiList = [];
             
             if ($fakultas == 'FTI') {
                 $prodiList = ['Informatika', 'Sistem Informasi', 'Teknik Komputer', 'Rekayasa Perangkat Lunak'];
             } elseif ($fakultas == 'FEB') {
                 // Add FEB prodis if any
             } elseif ($fakultas == 'FK') {
                 // Add FK prodis if any
             }
             
             if (!empty($prodiList)) {
                 $query->whereHas('mahasiswa', function($q) use ($prodiList) {
                     $q->whereIn('prodi', $prodiList);
                 });
             }
        }

        if ($request->has('prodi') && $request->prodi != '' && $request->prodi != 'Semua') {
             $prodi = $request->prodi;
             $query->whereHas('mahasiswa', function($q) use ($prodi) {
                 $q->where('prodi', $prodi);
             });
        }

        $mahasiswa = $query->get();

        $headers = array(
            "Content-type"        => "application/vnd.ms-word",
            "Content-Disposition" => "attachment;Filename=Data_Mahasiswa.doc"
        );

        return response()->view('admin.mahasiswa.export', compact('mahasiswa'), 200, $headers);
    }
}
