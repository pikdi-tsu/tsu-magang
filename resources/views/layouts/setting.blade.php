@extends('layouts.app')

@section('title', 'Pengaturan Akun')
@section('header_title', 'Pengaturan')

@section('content')

    @php
        $user = auth()->user();

        $isMahasiswa = $user->role === 'mahasiswa';
        $isDosen = $user->role === 'dosen';
        $isAdmin = $user->role === 'admin';

        // Route upload foto
        $photoRoute = '#'; // Default
        if ($isMahasiswa && $user->mahasiswa) {
            $photoRoute = route('mahasiswa.photomhs', $user->mahasiswa->nim);
        } elseif ($isDosen && $user->dosen) {
            $photoRoute = route('dosen.foto', $user->dosen->nuptk);
        }

        // Foto profil
        if ($isMahasiswa && $user->mahasiswa?->foto) {
            $foto = asset('storage/' . $user->mahasiswa->foto);
        } elseif ($isDosen && $user->dosen?->foto) {
            $foto = asset('storage/' . $user->dosen->foto);
        } else {
            $foto = 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=0d9488&color=fff&size=128';
        }
    @endphp

    <div class="max-w-6xl mx-auto pb-10">

        {{-- TAB HEADER --}}
        <div class="flex flex-wrap items-center gap-2 mb-8 bg-white p-2 rounded-3xl border border-gray-100 shadow-sm">
            <button onclick="switchTab('profile')" id="btn-profile"
                class="tab-btn active flex-1 flex items-center justify-center gap-3 px-6 py-4 rounded-2xl font-bold">
                Profil
            </button>

            <button onclick="switchTab('security')" id="btn-security"
                class="tab-btn flex-1 flex items-center justify-center gap-3 px-6 py-4 rounded-2xl font-bold text-gray-500 hover:bg-gray-50">
                Keamanan
            </button>

            @if(!$isAdmin)
                <button onclick="switchTab('extra')" id="btn-extra"
                    class="tab-btn flex-1 flex items-center justify-center gap-3 px-6 py-4 rounded-2xl font-bold text-gray-500 hover:bg-gray-50 relative">
                    {{ $isDosen ? 'WhatsApp' : 'Dokumen' }}
                    @php
    $berkas = auth()->user()->berkas;

    $berkasLengkap = $berkas
        && $berkas->cv_file
        && $berkas->transkrip_file
        && $berkas->krs_file;
@endphp

@if($isMahasiswa && !$berkasLengkap)
    <span id="docPing" 
          class="absolute top-3 right-1/4 w-2.5 h-2.5 bg-red-500 rounded-full animate-ping">
    </span>
@endif
                </button>
            @endif
        </div>

        {{-- CONTENT --}}
        <div class="bg-white border border-gray-200 rounded-[2.5rem] p-8 md:p-12 shadow-sm min-h-[500px]">

            {{-- ================= PROFIL ================= --}}
            <div id="tab-profile" class="tab-content">
                <h3 class="text-2xl font-black mb-8">Informasi Profil</h3>

                @if($photoRoute)
                    <form action="{{ $photoRoute }}" method="POST" enctype="multipart/form-data" onsubmit="confirmSubmit(event, 'Apakah Anda yakin ingin memperbarui foto profil Anda?')">
                        @csrf
                @endif

                    <div class="flex flex-col md:flex-row items-center gap-8 pb-8 border-b">
                        <div class="relative">
                            <div class="w-36 h-36 rounded-full overflow-hidden border-4">
                                <img id="previewFoto" src="{{ $foto }}" class="w-full h-full object-cover">
                            </div>
                            @if($photoRoute)
                                <label for="foto"
                                    class="absolute bottom-1 right-1 bg-tsu-blue text-white p-2 rounded-full cursor-pointer">
                                    ✎
                                </label>
                                <input type="file" id="foto" name="foto" class="hidden" accept="image/*"
                                    onchange="previewImageProfile(this)">
                                @error('foto')
                                    <p
                                        class="text-red-500 text-xs mt-1 bg-white p-1 rounded absolute -bottom-8 whitespace-nowrap shadow">
                                        {{ $message }}
                                    </p>
                                @enderror
                            @endif
                        </div>

                        <div>
                            <h4 class="font-bold">Foto Profil</h4>
                            <p class="text-sm text-gray-400">JPG / PNG maks 2MB</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                        <div>
                            <label class="text-sm font-bold">Nama Lengkap</label>
                            <input type="text" value="{{ $user->name }}" disabled
                                class="w-full px-5 py-4 rounded-2xl bg-gray-100">
                        </div>
                        <div>
                            <label class="text-sm font-bold">
                                {{ $isMahasiswa ? 'NIM' : ($isDosen ? 'NUPTK' : 'ROLE') }}
                            </label>
                            <input type="text"
                                value="{{ $isMahasiswa ? $user->mahasiswa?->nim : ($isDosen ? $user->dosen?->nuptk : 'ADMIN') }}"
                                disabled class="w-full px-5 py-4 rounded-2xl bg-gray-100">
                        </div>
                    </div>

                    @if($photoRoute)
                            <button class="mt-8 bg-tsu-teal text-white px-12 py-4 rounded-2xl font-bold">
                                Simpan Profil
                            </button>
                        </form>
                    @endif
            </div>

            {{-- ================= KEAMANAN ================= --}}
            <div id="tab-security" class="tab-content hidden">
                <h3 class="text-2xl font-black mb-8">Ubah Kata Sandi</h3>

                <form action="{{ route('password.update') }}" method="POST" class="max-w-md space-y-5" onsubmit="confirmSubmit(event, 'Apakah Anda yakin ingin merubah kata sandi akun Anda?')">
                    @csrf
                    @method('PUT')

                    <input type="password" name="current_password" placeholder="Kata sandi lama"
                        class="w-full px-5 py-4 rounded-2xl border">

                    <input type="password" name="password" placeholder="Kata sandi baru"
                        class="w-full px-5 py-4 rounded-2xl border">

                    <input type="password" name="password_confirmation" placeholder="Konfirmasi kata sandi"
                        class="w-full px-5 py-4 rounded-2xl border">

                    <button class="bg-tsu-blue text-white px-10 py-4 rounded-2xl font-bold">
                        Perbarui Kata Sandi
                    </button>
                </form>
            </div>

            {{-- ================= EXTRA ================= --}}
            @if(!$isAdmin)
                <div id="tab-extra" class="tab-content hidden">

                    {{-- DOSEN --}}
                    @if($isDosen)
                        <h3 class="text-2xl font-black mb-4">Nomor WhatsApp</h3>
                        <form action="{{ route('dosen.kontak.update', $user->dosen->nuptk) }}" method="POST">
                            @csrf
                            <input type="text" name="kontak" value="{{ $user->dosen->kontak }}" placeholder="08xxxxxxxxxx"
                                class="w-full max-w-md px-5 py-4 rounded-2xl border">
                            <button type="submit" class="mt-4 bg-tsu-teal text-white px-10 py-4 rounded-2xl font-bold">
                                Simpan
                            </button>
                        </form>

                        {{-- MAHASISWA --}}
                    @else
                        <h3 class="text-2xl font-black mb-4">Dokumen Pendukung</h3>

                        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" onsubmit="confirmSubmit(event, 'Apakah Anda yakin ingin menyimpan perubahan dokumen tersebut?')">
                            @csrf

                                <div class="grid grid-cols-1 gap-8">
                            @foreach(['cv_file'=>'CV','transkrip_file'=>'Transkrip','krs_file'=>'KRS'] as $field=>$label)
                            <div class="p-6 border border-gray-200 rounded-2xl bg-gray-50">
                                <div class="flex flex-col md:flex-row gap-6">
                                    {{-- Preview Area --}}
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <h4 class="font-bold text-lg text-gray-800">{{ $label }}</h4>
                                            @if($user->berkas?->$field)
                                                <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-lg font-bold">Terupload</span>
                                            @else
                                                <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded-lg font-bold">Belum Ada</span>
                                            @endif
                                        </div>

                                        <div class="relative w-full h-[400px] border-2 border-dashed border-gray-300 rounded-xl overflow-hidden bg-white">
                                            @if($user->berkas?->$field)
                                                <iframe id="preview-{{ $field }}" src="{{ asset('storage/'.$user->berkas->$field) }}" class="w-full h-full"></iframe>
                                                <div id="placeholder-{{ $field }}" class="hidden absolute inset-0 flex items-center justify-center text-gray-400">
                                                    <div class="text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                        <span class="text-sm">Preview Dokumen</span>
                                                    </div>
                                                </div>
                                            @else
                                                <iframe id="preview-{{ $field }}" class="hidden w-full h-full"></iframe>
                                                <div id="placeholder-{{ $field }}" class="absolute inset-0 flex items-center justify-center text-gray-400">
                                                    <div class="text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                        </svg>
                                                        <span class="text-sm font-medium">Belum ada dokumen yang dipilih</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Action Area --}}
                                    <div class="w-full md:w-1/3 flex flex-col justify-center">
                                        <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                                            <h5 class="font-bold text-gray-700 mb-2">Upload {{ $label }}</h5>
                                            <p class="text-xs text-gray-500 mb-4">Format PDF. Maksimal 2MB.</p>
                                            
                                            <label class="group flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-tsu-teal rounded-xl cursor-pointer hover:bg-teal-50 transition">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-tsu-teal mb-2 group-hover:scale-110 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                                    </svg>
                                                    <p class="text-sm text-gray-600 font-bold group-hover:text-tsu-teal">
                                                        {{ $user->berkas?->$field ? 'Ganti File' : 'Pilih File' }}
                                                    </p>
                                                </div>
                                                <input type="file" name="{{ $field }}" class="hidden" accept=".pdf" onchange="previewPdf(this, '{{ $field }}')">
                                            </label>

                                            <div id="file-info-{{ $field }}" class="hidden mt-3 p-2 bg-gray-100 rounded text-xs text-gray-600 truncate">
                                                <!-- Filename will appear here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                            <button class="w-full mt-8 bg-tsu-teal text-white py-5 rounded-2xl font-black text-lg">
                                Simpan Semua Dokumen
                            </button>
                        </form>
                    @endif
                </div>
            @endif

        </div>
    </div>

    <style>
        .tab-btn.active {
            background: #0d9488;
            color: white;
        }
    </style>

    <script>
        function switchTab(tab) {
            document.querySelectorAll('.tab-content').forEach(t => t.classList.add('hidden'));
            document.getElementById('tab-' + tab).classList.remove('hidden');

            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.getElementById('btn-' + tab).classList.add('active');
        }

        function previewImageProfile(input) {
            if (input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => document.getElementById('previewFoto').src = e.target.result;
                reader.readAsDataURL(input.files[0]);
            }
        }

        function previewPdf(input, field) {
            const preview = document.getElementById('preview-' + field);
            const placeholder = document.getElementById('placeholder-' + field);
            const fileInfo = document.getElementById('file-info-' + field);

            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validate PDF validation (simple check)
                if (file.type !== 'application/pdf') {
                    Swal.fire('Format Salah', 'Harap upload file dalam format PDF.', 'error');
                    input.value = ''; // Reset input
                    return;
                }

                // Validate size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    Swal.fire('File Terlalu Besar', 'Maksimal ukuran file adalah 2MB.', 'error');
                    input.value = ''; // Reset input
                    return;
                }

                // Show Preview
                const fileURL = URL.createObjectURL(file);
                preview.src = fileURL;
                preview.classList.remove('hidden');
                if (placeholder) placeholder.classList.add('hidden');

                // Show Filename
                if (fileInfo) {
                    fileInfo.textContent = 'File terpilih: ' + file.name;
                    fileInfo.classList.remove('hidden');
                }
            }
        }

        function saveWA() {
            alert('Nomor WhatsApp berhasil disimpan');
        }

        function confirmSubmit(e, textMsg) {
            e.preventDefault();
            const form = e.target;
            Swal.fire({
                title: 'Konfirmasi',
                text: textMsg,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menyimpan...',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        didOpen: () => { Swal.showLoading() }
                    });
                    form.submit();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            const hash = window.location.hash.replace('#', '');
            if (hash && document.getElementById('tab-' + hash)) {
                switchTab(hash);
            }

            // Notifikasi Session SweetAlert
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#086375'
                });
            @endif

            @if(session('status') == 'password-updated')
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "Kata sandi Anda berhasil diperbarui.",
                    confirmButtonColor: '#086375'
                });
            @elseif(session('status'))
                Swal.fire({
                    icon: 'info',
                    title: 'Info',
                    text: "{{ session('status') }}",
                    confirmButtonColor: '#086375'
                });
            @endif

            @if($errors->updatePassword->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Memperbarui Sandi!',
                    text: "{{ $errors->updatePassword->first() }}",
                    confirmButtonColor: '#d33'
                });
            @elseif($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ $errors->first() }}",
                    confirmButtonColor: '#d33'
                });
            @endif
        });
    </script>

@endsection