@extends('layouts.app')

@section('title', 'Data Mahasiswa')
@section('header_title', 'Database Mahasiswa')

@section('content')
    <div class="space-y-6">
        {{-- Header & Toolbar --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 fade-up">
            <div>
                <h3 class="text-xl font-bold text-gray-800">Manajemen Data Mahasiswa</h3>
                <p class="text-sm text-gray-500">Total <span id="student-count" class="font-bold text-tsu-teal">0</span>
                    mahasiswa terdaftar</p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                @php
                    $userRole = auth()->user()->role;
                    $isAdminUniversitas = $userRole === 'admin_universitas';
                    $isAdminProdi = $userRole === 'admin_prodi';
                    $requestRole = request()->get('role');

                    // If admin_universitas or admin_prodi, force role to 'universitas' for view compatibility
                    if ($isAdminUniversitas || $isAdminProdi) {
                        $adminRole = 'universitas';
                    } else {
                        $adminRole = $requestRole ?? 'fakultas';
                    }
                @endphp

                @if($adminRole == 'universitas' && !$isAdminProdi)
                    <select id="filterFakultas"
                        class="bg-white border-none rounded-2xl py-3 px-4 shadow-sm focus:ring-2 focus:ring-tsu-teal text-sm font-medium text-gray-600 outline-none">
                        <option value="">Semua Fakultas</option>
                        <option value="FTI">Fakultas Teknologi Informasi</option>
                        <option value="FEB">Fakultas Ekonomi & Bisnis</option>
                        <option value="FK">Fakultas Kedokteran</option>
                    </select>
                @endif

                @if(($adminRole == 'universitas' || $adminRole == 'fakultas') && !$isAdminProdi)
                    <select id="filterProdi"
                        class="bg-white border-none rounded-2xl py-3 px-4 shadow-sm focus:ring-2 focus:ring-tsu-teal text-sm font-medium text-gray-600 outline-none">
                        <option value="">Semua Program Studi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                @endif

                <button onclick="exportToWord()"
                    class="flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-2xl shadow-sm transition font-bold text-sm">
                    <span>📄</span>
                    <span>Export Word</span>
                </button>

                <div class="relative w-full md:w-64">
                    <input type="text" id="searchInput" onkeyup="searchMahasiswa()" placeholder="Cari Nama atau NIM..."
                        class="w-full bg-white border-none rounded-2xl py-3 px-11 shadow-sm focus:ring-2 focus:ring-tsu-teal transition text-sm">
                    <span class="absolute left-4 top-3.5 text-gray-400">🔍</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="mahasiswaTable">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Kontak & Email</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Prodi</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Program Saat Ini</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Berkas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($mahasiswa as $mhs)
                            @php
                                $mhsData = $mhs->mahasiswa;
                                $registration = $mhsData ? $mhsData->pendaftaran->where('status', 'diterima')->first() : null;
                                $program = $registration ? $registration->programMagang : null;
                                $inisial = substr($mhs->name, 0, 2);
                                $colorIndex = crc32($mhs->name) % 3;

                                $colors = [
                                    ['bg' => 'bg-tsu-teal/10', 'text' => 'text-tsu-teal'],
                                    ['bg' => 'bg-blue-100', 'text' => 'text-blue-600'],
                                    ['bg' => 'bg-orange-100', 'text' => 'text-orange-600']
                                ];
                                $colorClass = $colors[$colorIndex];
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition mhs-row">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full {{ $colorClass['bg'] }} flex items-center justify-center font-bold {{ $colorClass['text'] }}">
                                            {{ strtoupper($inisial) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-800 student-name">{{ $mhs->name }}</p>
                                            <p class="text-[10px] text-gray-400">NIM: {{ $mhsData ? $mhsData->nim : '-' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-xs font-bold text-gray-700">{{ $mhs->email }}</td>
                                <td class="px-6 py-4 text-xs font-bold text-gray-700">{{ $mhsData ? $mhsData->prodi : '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($program)
                                        <button
                                            onclick="viewProgramDetail('{{ addslashes($program->nama_program) }}', '{{ addslashes($program->mitra->nama_mitra ?? 'Mitra tidak ditemukan') }}', '{{ addslashes($program->posisi ?? 'Peserta Magang') }}')"
                                            class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                            <span>{{ $program->nama_program }}</span>
                                            <span class="text-[10px]">ℹ️</span>
                                        </button>
                                    @else
                                        <span class="text-xs font-medium text-gray-400 italic">Belum Mengikuti Program</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button onclick="previewFile('CV', '{{ addslashes($mhs->name) }}')"
                                            class="w-8 h-8 flex items-center justify-center bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition">📄</button>
                                        <button onclick="previewFile('KRS', '{{ addslashes($mhs->name) }}')"
                                            class="w-8 h-8 flex items-center justify-center bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition">📋</button>
                                        <button onclick="previewFile('Transkrip', '{{ addslashes($mhs->name) }}')"
                                            class="w-8 h-8 flex items-center justify-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition">📊</button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function updateStudentCount() {
            const rows = document.querySelectorAll('.mhs-row');
            let visibleCount = 0;
            rows.forEach(row => {
                if (row.style.display !== "none") visibleCount++;
            });
            document.getElementById('student-count').innerText = visibleCount;
        }

        function searchMahasiswa() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('.mhs-row');

            rows.forEach(row => {
                const name = row.querySelector('.student-name').innerText.toLowerCase();
                const nim = row.innerText.toLowerCase();
                if (name.includes(input) || nim.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
            updateStudentCount();
        }

        // Filter Logic
        document.addEventListener('DOMContentLoaded', function () {
            const filterFakultas = document.getElementById('filterFakultas');
            const filterProdi = document.getElementById('filterProdi');

            function applyFilters() {
                const params = new URLSearchParams(window.location.search);

                if (filterFakultas) {
                    if (filterFakultas.value) {
                        params.set('fakultas', filterFakultas.value);
                    } else {
                        params.delete('fakultas');
                    }
                }

                if (filterProdi) {
                    if (filterProdi.value) {
                        params.set('prodi', filterProdi.value);
                    } else {
                        params.delete('prodi');
                    }
                }

                window.location.search = params.toString();
            }

            if (filterFakultas) {
                const params = new URLSearchParams(window.location.search);
                if (params.has('fakultas')) {
                    filterFakultas.value = params.get('fakultas');
                }
                filterFakultas.addEventListener('change', applyFilters);
            }

            if (filterProdi) {
                const params = new URLSearchParams(window.location.search);
                if (params.has('prodi')) {
                    filterProdi.value = params.get('prodi');
                }
                filterProdi.addEventListener('change', applyFilters);
            }
        });

        function exportToWord() {
            const fakultas = document.getElementById('filterFakultas')?.value || 'Semua';
            const prodi = document.getElementById('filterProdi')?.value || 'Semua';

            let infoText = `Mengekspor data mahasiswa untuk:<br><b>Fakultas: ${fakultas}</b><br><b>Prodi: ${prodi}</b>`;

            Swal.fire({
                title: 'Generating Word File...',
                html: infoText,
                icon: 'info',
                showConfirmButton: false,
                timer: 2000,
                didOpen: () => {
                    Swal.showLoading();
                }
            }).then(() => {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'File Word mahasiswa berhasil diunduh.',
                    icon: 'success',
                    confirmButtonColor: '#086375',
                });

                // Arahne ke route backendmu lukk
                // window.location.href = `/mahasiswa/export?fakultas=${fakultas}&prodi=${prodi}`;
            });
        }

        function viewProgramDetail(name, company, role) {
            Swal.fire({
                title: '<span class="text-lg font-bold">Detail Program Magang</span>',
                html: `
                    <div class="text-left space-y-4 p-2">
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nama Program</p>
                            <p class="text-sm font-bold text-gray-800">${name}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Perusahaan</p>
                            <p class="text-sm font-bold text-tsu-teal">${company}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100">
                            <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Role Pekerjaan</p>
                            <p class="text-sm font-bold text-gray-800">${role}</p>
                        </div>
                    </div>
                `,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Tutup'
            });
        }

        function previewFile(type, mhs) {
            Swal.fire({
                title: 'Membuka ' + type,
                text: 'Menghubungkan ke server untuk file ' + mhs + '...',
                icon: 'info',
                timer: 1000,
                showConfirmButton: false
            });
        }

        window.onload = updateStudentCount;
    </script>
@endsection