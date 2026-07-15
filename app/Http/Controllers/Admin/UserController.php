<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['mahasiswa', 'dosen'])->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin_super,admin_fakultas,mahasiswa,dosen,admin_universitas,admin_prodi',
            'nim' => 'required_if:role,mahasiswa|nullable|unique:mahasiswa,nim',
            'prodi' => 'required_if:role,mahasiswa',
            'nuptk' => 'required_if:role,dosen|nullable|unique:dosen,nuptk',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            if ($request->role === 'mahasiswa') {
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'nim' => $request->nim,
                    'prodi' => $request->prodi,
                ]);
            }

            if ($request->role === 'dosen') {
                Dosen::create([
                    'user_id' => $user->id,
                    'nuptk' => $request->nuptk,
                ]);
            }
        });

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin_super,admin_fakultas,mahasiswa,dosen,admin_universitas,admin_prodi',
            'nim' => 'required_if:role,mahasiswa|nullable|unique:mahasiswa,nim,' . ($user->mahasiswa->id ?? 'NULL'),
            'prodi' => 'required_if:role,mahasiswa',
            'nuptk' => 'required_if:role,dosen|nullable|unique:dosen,nuptk,' . ($user->dosen->id ?? 'NULL'),
        ]);

        DB::transaction(function () use ($request, $user) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ];

            if ($request->filled('password')) {
                $request->validate(['password' => 'string|min:8']);
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            if ($request->role === 'mahasiswa') {
                if ($user->dosen) {
                    $user->dosen->delete();
                }
                Mahasiswa::updateOrCreate(
                    ['user_id' => $user->id],
                    ['nim' => $request->nim, 'prodi' => $request->prodi]
                );
            } elseif ($request->role === 'dosen') {
                if ($user->mahasiswa) {
                    $user->mahasiswa->delete();
                }
                Dosen::updateOrCreate(
                    ['user_id' => $user->id],
                    ['nuptk' => $request->nuptk]
                );
            } else {
                if ($user->mahasiswa) $user->mahasiswa->delete();
                if ($user->dosen) $user->dosen->delete();
            }
        });

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
