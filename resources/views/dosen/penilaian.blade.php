@extends('layouts.app')

@section('title', 'Penilaian Mahasiswa - Dosen')
@section('header_title', 'Penilaian Mahasiswa')

@section('content')
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 fade-up">
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center text-lg">👥</div>
                <div>
                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">Total Bimbingan</p>
                    <h3 class="text-xl font-bold" id="stat-total">0</h3>
                </div>
            </div>
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center text-lg">⏳
                </div>
                <div>
                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">Belum Dinilai</p>
                    <h3 class="text-xl font-bold" id="stat-pending">0</h3>
                </div>
            </div>
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 bg-green-50 text-green-500 rounded-xl flex items-center justify-center text-lg">✅
                </div>
                <div>
                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">Sudah Dinilai</p>
                    <h3 class="text-xl font-bold" id="stat-done">0</h3>
                </div>
            </div>
            <div class="bg-white p-5 rounded-3xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 bg-gray-50 text-gray-500 rounded-xl flex items-center justify-center text-lg">📄</div>
                <div>
                    <p class="text-gray-400 text-[10px] font-bold uppercase tracking-wider">Tunggu Dokumen</p>
                    <h3 class="text-xl font-bold" id="stat-docs">0</h3>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
            <div class="p-6 border-b border-gray-50">
                <h3 class="font-bold text-lg text-gray-800">Daftar Mahasiswa Bimbingan</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Program</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Dokumen</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse ($mahasiswa as $mhs)
                            @php
                                $status = $mhs->penilaian ? 'sudah-dinilai' : 'perlu-dinilai';

                                $namePieces = explode(' ', $mhs->user->name ?? '');
                                $initials = '';
                                foreach (array_slice($namePieces, 0, 2) as $piece) {
                                    $initials .= strtoupper(substr($piece, 0, 1));
                                }
                                if (empty($initials))
                                    $initials = '-';
                            @endphp
                            <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="{{ $status }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full {{ $mhs->penilaian ? 'bg-green-50 text-green-600' : 'bg-tsu-teal/10 text-tsu-teal' }} flex items-center justify-center font-bold">
                                            {{ $initials }}</div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-800">{{ $mhs->user->name ?? '-' }}</p>
                                            <p class="text-[10px] text-gray-400">{{ $mhs->nim }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-600">
                                    {{ $mhs->programMagang->nama_program ?? '-' }}</td>
                                <td class="px-6 py-4 text-[10px]">
                                    <button class="p-1.5 bg-red-50 text-red-500 rounded-lg font-bold">📄 Sertif</button>
                                    <button class="p-1.5 bg-blue-50 text-blue-500 rounded-lg font-bold">📊 Nilai</button>
                                </td>
                                <td class="px-6 py-4">
                                    @if($mhs->penilaian)
                                        <span
                                            class="status-badge px-3 py-1 bg-green-100 text-green-600 text-[10px] font-bold rounded-full uppercase">Sudah
                                            Dinilai</span>
                                    @else
                                        <span
                                            class="status-badge px-3 py-1 bg-orange-100 text-orange-600 text-[10px] font-bold rounded-full uppercase">Perlu
                                            Dinilai</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($mhs->penilaian)
                                        <button onclick="openModal('{{ $mhs->user->name ?? '-' }}', '{{ $mhs->nim }}', true, this)"
                                            class="action-btn bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold hover:bg-gray-200">Edit
                                            Nilai</button>
                                    @else
                                        <button onclick="openModal('{{ $mhs->user->name ?? '-' }}', '{{ $mhs->nim }}', false, this)"
                                            class="action-btn bg-tsu-teal text-white px-4 py-2 rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/20">Input
                                            Nilai</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">Belum ada mahasiswa bimbingan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modalPenilaian"
        class="fixed inset-0 z-[60] hidden items-center justify-center bg-black/50 backdrop-blur-md p-4">
        <div
            class="bg-white w-full max-w-5xl rounded-[2.5rem] shadow-2xl overflow-hidden transform transition-all scale-95 duration-300">
            <div class="p-8 bg-tsu-teal text-white flex justify-between items-start">
                <div>
                    <div class="bg-white/20 text-[10px] font-bold uppercase px-3 py-1 rounded-full w-fit mb-2 text-white">
                        Konversi SKS</div>
                    <h3 class="text-2xl font-bold" id="modalTitle">Form Konversi Nilai</h3>
                    <p class="text-sm text-teal-100/80" id="mhsNamePlaceholder">Memuat...</p>
                </div>
                <button type="button" onclick="closeModal()"
                    class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition text-white">✕</button>
            </div>

            <form id="formPenilaian" onsubmit="handleSave(event)" class="p-8">
                <input type="hidden" name="nim" id="mhsNimInput" value="">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mb-8 overflow-y-auto max-h-[50vh] pr-2">
                    @php
                        $mkData = [
                            ['code' => 'IF201', 'name' => 'Workshop Framework', 'sks' => 4],
                            ['code' => 'IF202', 'name' => 'Manajemen Proyek SI', 'sks' => 3],
                            ['code' => 'IF203', 'name' => 'Etika Profesi IT', 'sks' => 2],
                            ['code' => 'IF204', 'name' => 'Keamanan Informasi', 'sks' => 3],
                            ['code' => 'IF205', 'name' => 'Cloud Computing', 'sks' => 3],
                            ['code' => 'IF206', 'name' => 'Data Science Dasar', 'sks' => 3],
                            ['code' => 'IF207', 'name' => 'Mobile Programming', 'sks' => 4],
                            ['code' => 'IF208', 'name' => 'Bahasa Inggris Teknis', 'sks' => 2],
                        ];
                    @endphp

                    @foreach($mkData as $index => $mk)
                        <div class="flex items-center gap-4 bg-gray-50/50 p-4 rounded-3xl border border-gray-100">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-1">
                                    <span
                                        class="text-[10px] font-extrabold bg-tsu-teal text-white px-2 py-0.5 rounded">{{ $mk['code'] }}</span>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tight">{{ $mk['sks'] }}
                                        SKS</span>
                                </div>
                                <h4 class="text-sm font-bold text-gray-700 leading-tight">{{ $mk['name'] }}</h4>
                                <input type="hidden" name="mk_code[{{ $index }}]" value="{{ $mk['code'] }}">
                            </div>
                            <div class="flex items-center gap-2">
                                <input type="number" oninput="calculateGrade(this)" name="nilai[{{ $index }}]" required min="0"
                                    max="100" placeholder="0"
                                    class="w-20 bg-white border-2 border-gray-100 rounded-2xl text-center font-bold text-tsu-teal focus:border-tsu-teal focus:ring-0 py-2">
                                <div
                                    class="grade-box w-10 h-10 flex items-center justify-center bg-white border-2 border-gray-100 rounded-xl font-black text-sm text-gray-300">
                                    -</div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex gap-4">
                    <button type="button" onclick="closeModal()"
                        class="flex-1 py-4 bg-gray-100 text-gray-500 font-bold rounded-2xl hover:bg-gray-200 transition">Batal</button>
                    <button type="submit"
                        class="flex-[2] py-4 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark transition shadow-xl shadow-tsu-teal/30">Simpan
                        Seluruh Nilai</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentMhs = "";
        let currentNim = "";
        let selectedBtn = null;

        function calculateGrade(input) {
            const val = input.value;
            const box = input.nextElementSibling;
            let grade = "-";
            let colorClass = "text-gray-300 border-gray-100 bg-white";

            if (val !== "") {
                const n = parseFloat(val);
                if (n >= 80) { grade = "A"; colorClass = "text-green-600 border-green-200 bg-green-50"; }
                else if (n >= 70) { grade = "B"; colorClass = "text-blue-600 border-blue-200 bg-blue-50"; }
                else if (n >= 60) { grade = "C"; colorClass = "text-orange-600 border-orange-200 bg-orange-50"; }
                else { grade = "D"; colorClass = "text-red-600 border-red-200 bg-red-50"; }
            }
            box.innerText = grade;
            box.className = `grade-box w-10 h-10 flex items-center justify-center border-2 rounded-xl font-black text-sm transition-all ${colorClass}`;
        }

        function updateStats() {
            document.getElementById('stat-total').innerText = document.querySelectorAll('.mhs-row').length;
            document.getElementById('stat-pending').innerText = document.querySelectorAll('[data-status="perlu-dinilai"]').length;
            document.getElementById('stat-done').innerText = document.querySelectorAll('[data-status="sudah-dinilai"]').length;
            document.getElementById('stat-docs').innerText = document.querySelectorAll('[data-status="tunggu-dokumen"]').length;
        }

        function openModal(name, nim, isEdit, btnElement) {
            currentMhs = name;
            currentNim = nim;
            selectedBtn = btnElement;
            const modal = document.getElementById('modalPenilaian');
            document.getElementById('mhsNamePlaceholder').innerText = 'Mahasiswa: ' + name;
            document.getElementById('mhsNimInput').value = nim;

            const inputs = document.querySelectorAll('#formPenilaian input[type="number"]');
            inputs.forEach(input => {
                input.value = isEdit ? Math.floor(Math.random() * 10) + 85 : "";
                calculateGrade(input);
            });

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => modal.querySelector('div').classList.replace('scale-95', 'scale-100'), 10);
        }

        function closeModal() {
            const modal = document.getElementById('modalPenilaian');
            modal.querySelector('div').classList.replace('scale-100', 'scale-95');
            setTimeout(() => modal.classList.replace('flex', 'hidden'), 200);
        }

        function handleSave(e) {
            e.preventDefault();

            // Disini anda dapat menambahkan AJAX (fetch/axios) untuk mengirim data formPenilaian ke backend

            if (selectedBtn) {
                const row = selectedBtn.closest('tr');

                const badge = row.querySelector('.status-badge');
                badge.innerText = "Sudah Dinilai";
                badge.className = "status-badge px-3 py-1 bg-green-100 text-green-600 text-[10px] font-bold rounded-full uppercase";

                selectedBtn.innerText = "Edit Nilai";
                selectedBtn.className = "action-btn bg-gray-100 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold hover:bg-gray-200 transition";
                selectedBtn.onclick = function () { openModal(currentMhs, currentNim, true, this); };

                row.setAttribute('data-status', 'sudah-dinilai');

                const avatar = row.querySelector('.rounded-full');
                if (avatar) {
                    avatar.className = "w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center font-bold";
                }
            }

            Swal.fire({
                title: 'Berhasil!',
                text: 'Nilai mahasiswa ' + currentMhs + ' telah disimulasikan sebagai tersimpan.',
                icon: 'success',
                confirmButtonColor: '#086375'
            }).then(() => {
                closeModal();
                updateStats();
            });
        }

        document.addEventListener("DOMContentLoaded", updateStats);
    </script>
@endsection