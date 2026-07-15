@extends('layouts.app')

@section('title', 'Data User')
@section('header_title', 'Database User')

@section('content')
    <div class="space-y-6" x-data="{ 
                        addModal: false, 
                        editModal: false, 
                        newRole: 'admin_super',
                        editData: { id: '', name: '', email: '', role: '', nim: '', nuptk: '', prodi: '' },
                        openEdit(user) {
                            this.editData.id = user.id;
                            this.editData.name = user.name;
                            this.editData.email = user.email;
                            this.editData.role = user.role;
                            this.editData.nim = user.mahasiswa ? user.mahasiswa.nim : '';
                            this.editData.nuptk = user.dosen ? user.dosen.nuptk : '';
                            this.editData.prodi = user.mahasiswa ? user.mahasiswa.prodi : '';
                            this.editModal = true;
                        }
                    }">

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Header & Toolbar --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 fade-up">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Manajemen Data User</h3>
                <p class="text-sm text-gray-500">Kelola akun dan role pengguna</p>
            </div>

            <div class="flex gap-3">
                <button @click="addModal = true"
                    class="flex items-center justify-center gap-2 bg-tsu-teal hover:bg-tsu-teal-dark text-white px-5 py-3 rounded-2xl shadow-sm transition font-bold text-sm">
                    <span>➕</span>
                    <span>Tambah User</span>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Nama</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Email</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Role</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($users as $u)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-6 py-4 font-bold text-sm text-gray-800">{{ $u->name }}</td>
                                <td class="px-6 py-4 text-xs font-bold text-gray-700">{{ $u->email }}</td>
                                <td class="px-6 py-4 text-xs font-bold text-gray-700">
                                    <span class="bg-gray-100 px-3 py-1 rounded-full">{{ $u->role }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button @click="openEdit({{ json_encode($u) }})"
                                            class="w-8 h-8 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition"
                                            title="Edit">✏️</button>
                                        <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-8 h-8 flex items-center justify-center bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                                                title="Hapus">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Add Modal --}}
        <div x-show="addModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm" x-cloak>
            <div @click.outside="addModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Tambah User</h3>
                <form action="{{ route('admin.user.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama</label>
                        <input type="text" name="name" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 focus:ring-2 focus:ring-tsu-teal outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 focus:ring-2 focus:ring-tsu-teal outline-none">
                    </div>
                    <div x-data="{ show: false }">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password" required
                                class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 pr-12 focus:ring-2 focus:ring-tsu-teal outline-none">
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Role</label>
                        <select name="role" x-model="newRole" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 focus:ring-2 focus:ring-tsu-teal outline-none">
                            <option value="admin_super">Super Admin</option>
                            <option value="admin_fakultas">Admin Fakultas</option>
                            <option value="admin_universitas">Admin Universitas</option>
                            <option value="admin_prodi">Admin Prodi</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>

                    <div x-show="newRole === 'mahasiswa' || newRole === 'dosen'" class="mt-4" x-cloak>
                        <label class="block text-sm font-bold text-gray-700 mb-1"
                            x-text="newRole === 'mahasiswa' ? 'NIM' : 'NUPTK'"></label>

                        <div x-show="newRole === 'mahasiswa'" class="space-y-3">
                            <input type="text" name="nim" value="{{ old('nim') }}"
                                placeholder="2243XXXX" :required="newRole === 'mahasiswa'"
                                class="w-full bg-gray-50 border border-gray-200 px-4 py-3.5 rounded-2xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none">

                            <select name="prodi" :required="newRole === 'mahasiswa'"
                                class="w-full bg-gray-50 border border-gray-200 px-4 py-3.5 rounded-2xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none">
                                <option value="">Pilih Program Studi</option>
                                <option value="informatika">Informatika</option>
                                <option value="sistem_informasi">Sistem Informasi</option>
                                <option value="teknik_komputer">Teknik Komputer</option>
                                <option value="rekayasa_perangkat_lunak">Rekayasa Perangkat Lunak</option>
                            </select>
                        </div>

                        <input x-show="newRole === 'dosen'" type="text" name="nuptk" value="{{ old('nuptk') }}"
                            placeholder="0612XXXX" :required="newRole === 'dosen'"
                            class="w-full bg-gray-50 border border-gray-200 px-4 py-3.5 rounded-2xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none"
                            style="display: none;">
                    </div>
                    <div class="flex gap-4 mt-6">
                        <button type="button" @click="addModal = false"
                            class="flex-1 px-4 py-3 bg-gray-100 text-gray-600 font-bold rounded-2xl hover:bg-gray-200 transition">Batal</button>
                        <button type="submit"
                            class="flex-1 px-4 py-3 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark transition">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Edit Modal --}}
        <div x-show="editModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 backdrop-blur-sm" x-cloak>
            <div @click.outside="editModal = false" class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-8">
                <h3 class="text-xl font-bold text-gray-800 mb-6">Edit User</h3>
                <form :action="'{{ url('admin/user') }}/' + editData.id" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama</label>
                        <input type="text" name="name" x-model="editData.name" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 focus:ring-2 focus:ring-tsu-teal outline-none">
                    </div>
                    <div x-show="editData.role === 'mahasiswa' || editData.role === 'dosen'" class="mt-4" x-cloak>
                        <label class="block text-sm font-bold text-gray-700 mb-1"
                            x-text="editData.role === 'mahasiswa' ? 'NIM' : 'NUPTK'"></label>

                        <div x-show="editData.role === 'mahasiswa'" class="space-y-3">
                            <input type="text" name="nim" placeholder="2243XXXX" x-model="editData.nim"
                                :required="editData.role === 'mahasiswa'"
                                class="w-full bg-gray-50 border border-gray-200 px-4 py-3.5 rounded-2xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none">

                            <select name="prodi" x-model="editData.prodi" :required="editData.role === 'mahasiswa'"
                                class="w-full bg-gray-50 border border-gray-200 px-4 py-3.5 rounded-2xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none">
                                <option value="">Pilih Program Studi</option>
                                <option value="informatika">Informatika</option>
                                <option value="sistem_informasi">Sistem Informasi</option>
                                <option value="teknik_komputer">Teknik Komputer</option>
                                <option value="rekayasa_perangkat_lunak">Rekayasa Perangkat Lunak</option>
                            </select>
                        </div>

                        <input x-show="editData.role === 'dosen'" type="text" name="nuptk" placeholder="0612XXXX" x-model="editData.nuptk"
                            :required="editData.role === 'dosen'"
                            class="w-full bg-gray-50 border border-gray-200 px-4 py-3.5 rounded-2xl text-sm focus:bg-white focus:border-tsu-teal focus:ring-4 focus:ring-tsu-teal/10 outline-none"
                            style="display: none;">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" x-model="editData.email" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 focus:ring-2 focus:ring-tsu-teal outline-none">
                    </div>
                    <div x-data="{ show: false }">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Password (Kosongkan jika tidak
                            diubah)</label>
                        <div class="relative">
                            <input :type="show ? 'text' : 'password'" name="password"
                                class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 pr-12 focus:ring-2 focus:ring-tsu-teal outline-none">
                            <button type="button" @click="show = !show"
                                class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-500 hover:text-gray-700 focus:outline-none">
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <svg x-show="show" x-cloak xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Role</label>
                        <select name="role" x-model="editData.role" required
                            class="w-full bg-gray-50 border border-gray-200 rounded-2xl py-3 px-4 focus:ring-2 focus:ring-tsu-teal outline-none">
                            <option value="admin">Admin Fakultas</option>
                            <option value="admin_universitas">Admin Universitas</option>
                            <option value="admin_prodi">Admin Prodi</option>
                            <option value="dosen">Dosen</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <button type="button" @click="editModal = false"
                            class="flex-1 px-4 py-3 bg-gray-100 text-gray-600 font-bold rounded-2xl hover:bg-gray-200 transition">Batal</button>
                        <button type="submit"
                            class="flex-1 px-4 py-3 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection