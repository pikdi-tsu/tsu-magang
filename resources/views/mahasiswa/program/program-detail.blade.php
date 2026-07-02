@extends('layouts.app')

@section('title', 'Detail Program - ' . $program->nama_program)

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @php
        $isMahasiswa = request()->is('mahasiswa*');
        $isDosen = request()->is('dosen*');
        $isAdmin = request()->is('admin*');

        if ($program->deadline) {
            $deadlineDate = \Carbon\Carbon::parse($program->deadline);
        } else {
            $deadlineDate = \Carbon\Carbon::now()->addYear();
        }
        $isClosed = now()->greaterThan($deadlineDate);

        // Hitung slot tersisa
        $terdaftar = collect($program->pendaftaran ?? [])
            ->whereIn('status', ['Lolos', 'Menunggu', 'lolos', 'menunggu'])
            ->count();
        $sisaKuota = max(0, ($program->kuota ?? 0) - $terdaftar);
    @endphp

    {{-- Header Program --}}
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h2 class="fade-up text-3xl font-bold text-black mb-2">{{ $program->nama_program }}</h2>

            <span
                class="fade-up delay-100 inline-block bg-blue-100 text-blue-600 font-semibold px-4 py-1 rounded-full text-sm mb-3">
                {{ $program->mitra->nama_mitra ?? '-' }}
            </span>

            {{-- Prodi Badges --}}
            @if(!empty($program->prodi) && count($program->prodi) > 0)
                <div class="flex flex-wrap gap-2 mb-3">
                    @foreach($program->prodi as $p)
                        <span
                            class="inline-block bg-gray-800 text-white text-[10px] font-black px-3 py-1 rounded-lg tracking-wider uppercase">{{ $p }}</span>
                    @endforeach
                </div>
            @endif

            <div class="flex flex-wrap items-center gap-4 mt-1">
                @if($isClosed)
                    <span
                        class="fade-up delay-200 bg-red-100 text-red-600 px-4 py-0.5 rounded-full text-sm font-bold border border-red-200">Ditutup</span>
                @else
                    <span
                        class="fade-up delay-200 bg-green-100 text-green-700 px-4 py-0.5 rounded-full text-sm font-bold">Aktif</span>
                @endif

                <div class="fade-up delay-200 flex items-center gap-1 text-black font-bold text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Durasi: {{ $program->periode ?? '-' }}
                </div>

                <div
                    class="fade-up delay-200 flex items-center gap-1 text-black font-bold text-sm border-l-2 border-gray-200 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Deadline: {{ $deadlineDate->translatedFormat('d F Y') }}
                </div>

                <div
                    class="fade-up delay-200 flex items-center gap-1 text-black font-bold text-sm border-l-2 border-gray-200 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-tsu-teal" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Jenis: {{ $program->jenis_bkp ?? '-' }}
                </div>
            </div>
        </div>

        {{-- Tombol Daftar --}}
        @if($isClosed)
            <button
                class="fade-up delay-300 bg-gray-400 text-white font-bold py-3 px-8 rounded-full flex items-center gap-2 shadow-lg cursor-not-allowed"
                disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Pendaftaran Ditutup
            </button>
        @elseif($isDosen || $isAdmin)
            <button
                class="fade-up delay-300 bg-gray-300 text-gray-500 font-bold py-3 px-8 rounded-full flex items-center gap-2 cursor-not-allowed"
                disabled>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                Hanya Mahasiswa
            </button>
        @else
            @php
                 $btnDisabled = $isRegistered || (isset($isLimitReached) && $isLimitReached);
            @endphp
            <button id="btnDaftar" onclick="prosesPendaftaran()"
                class="fade-up delay-300 {{ $btnDisabled ? 'bg-gray-400 cursor-not-allowed' : 'bg-tsu-teal hover:bg-tsu-teal-dark hover:-translate-y-0.5' }} text-white font-bold py-3 px-8 rounded-full flex items-center gap-2 shadow-lg transition transform"
                {{ $btnDisabled ? 'disabled' : '' }}>
                <svg id="iconDaftar" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 {{ $isRegistered ? '' : 'rotate-45' }}"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if($isRegistered)
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    @endif
                </svg>
                <span id="textDaftar">
                    @if($isRegistered)
                        Sudah Mendaftar
                    @elseif(isset($isLimitReached) && $isLimitReached)
                        Pendaftaran Maksimal Tercapai
                    @else
                        Daftar Sekarang
                    @endif
                </span>
            </button>
        @endif
    </div>

    {{-- Info Cards: Lokasi + Kuota --}}
    <div class="fade-up delay-400 grid grid-cols-1 lg:grid-cols-5 gap-6 mb-6">
        <div class="lg:col-span-3 border border-gray-300 bg-white rounded-2xl p-5 flex items-start gap-4 shadow-sm">
            <div class="mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-black text-lg">Lokasi Penempatan</h3>
                <p class="text-sm text-gray-800 font-medium leading-relaxed mt-1">
                    {{ $program->lokasi_penempatan ?? 'Informasi lokasi tidak tersedia.' }}
                </p>
            </div>
        </div>

        <div
            class="lg:col-span-2 border border-gray-300 bg-white rounded-2xl p-5 flex flex-col items-center justify-center shadow-sm text-center gap-1">
            <h3 class="font-bold text-black text-lg">Sisa Kuota Pendaftar</h3>
            <span class="text-4xl font-extrabold {{ $sisaKuota <= 0 ? 'text-red-500' : 'text-tsu-teal' }}">
                {{ $sisaKuota <= 0 ? 'Penuh' : $sisaKuota }}
            </span>
            <span class="text-xs text-gray-400 font-medium">dari kuota {{ $program->kuota }} peserta</span>
        </div>
    </div>

    {{-- Deskripsi / Silabus --}}
    @if($program->deskripsi_silabus)
        <div class="fade-up delay-500 border border-gray-300 bg-white rounded-2xl p-6 mb-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h3 class="font-bold text-black text-lg">Deskripsi Program</h3>
            </div>
            <div class="text-sm text-black leading-relaxed whitespace-pre-line">{{ $program->deskripsi_silabus }}</div>
        </div>
    @endif

    {{-- Syarat / Kriteria --}}
    @if($program->syarat)
        <div class="fade-up delay-600 border border-gray-300 bg-white rounded-2xl p-6 mb-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                <h3 class="font-bold text-black text-lg">Syarat &amp; Kriteria Pendaftar</h3>
            </div>
            <div class="text-sm text-black leading-relaxed whitespace-pre-line">{{ $program->syarat }}</div>
        </div>
    @endif

    {{-- Dampak / Capaian --}}
    @if($program->dampak_program)
        <div class="fade-up delay-700 border border-gray-300 bg-white rounded-2xl p-6 mb-8 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
                <h3 class="font-bold text-black text-lg">Dampak &amp; Capaian Pembelajaran</h3>
            </div>
            <div class="text-sm text-black leading-relaxed whitespace-pre-line">{{ $program->dampak_program }}</div>
        </div>
    @endif

    <script>
        let hasDocuments = @json($hasDocuments);
        let isRegistered = @json($isRegistered);
        let isLimitReached = @json($isLimitReached ?? false);

        function prosesPendaftaran() {
            if (isRegistered) {
                Swal.fire({
                    icon: 'info',
                    title: 'Anda Sudah Terdaftar',
                    text: 'Anda tidak dapat mendaftar ulang pada program ini.',
                    confirmButtonColor: '#086375'
                });
                return;
            }

            if (isLimitReached) {
                Swal.fire({
                    icon: 'error',
                    title: 'Batas Pendaftaran Tercapai',
                    text: 'Anda hanya dapat mendaftar maksimal 3 program.',
                    confirmButtonColor: '#086375'
                });
                return;
            }

            if (!hasDocuments) {
                Swal.fire({
                    title: 'Dokumen Belum Lengkap!',
                    text: 'Silakan upload CV dan Transkrip Nilai di menu Setting terlebih dahulu.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#086375',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ke Pengaturan Sekarang',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('setting') }}#extra";
                    }
                });
                return;
            }

            Swal.fire({
                title: 'Konfirmasi Pendaftaran',
                text: "Setelah mendaftar, Anda tidak dapat membatalkan pendaftaran ini. Yakin ingin melanjutkan?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Ya, Daftar Sekarang',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    performRegistration();
                }
            });
        }

        function performRegistration() {
            fetch("{{ route('pendaftaran.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    program_id: @json($program->id_program)
                })
            })
                .then(async response => {
                    const data = await response.json();
                    if (!response.ok) {
                        throw new Error(data.message || 'Terjadi kesalahan pada server.');
                    }
                    return data;
                })
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message || 'Pendaftaran gagal.');
                    }
                    simulasiSuksesDaftar();
                    setTimeout(() => {
                        window.location.href = "{{ route('mahasiswa.dashboard') }}";
                    }, 2000);
                })
                .catch(error => {
                    console.error(error);
                    Swal.fire('Gagal', error.message, 'error');
                });
        }

        function simulasiSuksesDaftar() {
            isRegistered = true;

            Swal.fire({
                title: 'Berhasil Terdaftar!',
                text: 'Lamaran Anda telah terkirim ke tim Program.',
                icon: 'success',
                confirmButtonColor: '#086375',
                timer: 2000,
                showConfirmButton: false
            });

            const btn = document.getElementById('btnDaftar');
            const icon = document.getElementById('iconDaftar');
            const text = document.getElementById('textDaftar');

            if (btn) {
                btn.classList.remove('bg-tsu-teal', 'hover:bg-tsu-teal-dark', 'hover:-translate-y-0.5');
                btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                btn.disabled = true;
            }
            if (icon) {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />`;
                icon.classList.remove('rotate-45');
            }
            if (text) {
                text.innerText = 'Sudah Mendaftar';
            }
        }
    </script>

@endsection