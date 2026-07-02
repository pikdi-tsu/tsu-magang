@extends('layouts.app')

@section('title', 'ACC Pendaftaran Mahasiswa')
@section('header_title', 'Verifikasi Pendaftaran')

@section('content')
    @php
        $menunggu = $pendaftarans->where('status', 'menunggu');
        $diterima = $pendaftarans->where('status', 'diterima');
        $ditolak = $pendaftarans->where('status', 'ditolak');
    @endphp

    <div class="space-y-6">
        <div class="flex flex-wrap gap-4 fade-up">
            <button id="tab-all-btn" onclick="filterTab('pending')"
                class="px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all">
                Validasi Pendaftar
                <span class="bg-white/20 px-2 py-0.5 rounded-full text-[10px]">{{ $menunggu->count() }}</span>
            </button>
            <button id="tab-lolos-btn" onclick="filterTab('lolos')"
                class="px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 transition border border-gray-100 transition-all">
                Pendaftar Lolos
                <span class="bg-gray-100 px-2 py-0.5 rounded-full text-[10px]">{{ $diterima->count() }}</span>
            </button>
            <button id="tab-tolak-btn" onclick="filterTab('rejected')"
                class="px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 transition border border-gray-100 transition-all">
                Pendaftar Ditolak
                <span class="bg-gray-100 px-2 py-0.5 rounded-full text-[10px]">{{ $ditolak->count() }}</span>
            </button>
        </div>

        <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden fade-up delay-100">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Mahasiswa</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Program Pilihan</th>
                            <th id="dospem-header" class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Dosen
                                Pembimbing</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase">Berkas</th>
                            <th class="px-6 py-5 text-xs font-bold text-gray-400 uppercase text-center">Status/Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pendaftaran-body" class="divide-y divide-gray-50">

                        {{-- Loop Menunggu (Pending) --}}
                        @foreach($menunggu as $p)
                            <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="pending"
                                id="row-{{ $p->id_daftar }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center font-bold text-blue-600">
                                            {{ substr($p->mahasiswa->user->name ?? '?', 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-800">
                                                {{ $p->mahasiswa->user->name ?? 'Nama Tidak Ditemukan' }}
                                            </p>
                                            <p class="text-[10px] text-gray-400">{{ $p->nim }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="viewProgramDetail('{{ $p->programMagang->nama_program ?? '-' }}', '{{ $p->programMagang->mitra->nama_mitra ?? '-' }}', '{{ $p->programMagang->jenis_bkp ?? '-' }}')"
                                        class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                        <span>{{ Str::limit($p->programMagang->nama_program ?? '-', 20) }}</span>
                                        <span class="text-[10px]">ℹ️</span>
                                    </button>
                                </td>
                                <td class="px-6 py-4 dospem-cell">
                                    <span class="text-gray-300 text-xs">-</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        @php $berkas = $p->mahasiswa->user->berkas ?? null; @endphp
                                        @if($berkas && $berkas->cv_file)
                                            <button
                                                onclick="previewDoc('CV - {{ $p->nim }}', 'CV', '{{ Storage::url($berkas->cv_file) }}')"
                                                class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄
                                                CV</button>
                                        @endif
                                        @if($berkas && $berkas->transkrip_file)
                                            <button
                                                onclick="previewDoc('Transkrip - {{ $p->nim }}', 'Transkrip', '{{ Storage::url($berkas->transkrip_file) }}')"
                                                class="p-2 bg-green-50 text-green-600 rounded-xl text-[10px] font-bold">📄
                                                TRANSKRIP</button>
                                        @endif
                                        @if($berkas && $berkas->krs_file)
                                            <button
                                                onclick="previewDoc('KRS - {{ $p->nim }}', 'KRS', '{{ Storage::url($berkas->krs_file) }}')"
                                                class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold">📄
                                                KRS</button>
                                        @endif
                                        @if(!$berkas)
                                            <span class="text-xs text-gray-300 italic">Tidak ada berkas</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center action-cell">
                                    <div class="flex justify-center gap-2">
                                        <button
                                            onclick="handleAcc('{{ $p->mahasiswa->user->name ?? 'Mahasiswa' }}', '{{ $p->id_daftar }}')"
                                            class="px-4 py-2 bg-tsu-teal text-white rounded-xl text-xs font-bold hover:bg-tsu-teal-dark shadow-md">ACC</button>
                                        <button
                                            onclick="handleReject('{{ $p->mahasiswa->user->name ?? 'Mahasiswa' }}', '{{ $p->id_daftar }}')"
                                            class="px-4 py-2 bg-red-50 text-red-500 rounded-xl text-xs font-bold hover:bg-red-100 transition">Tolak</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop Diterima (Lolos) --}}
                        @foreach($diterima as $p)
                            <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="lolos" id="row-{{ $p->id_daftar }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center font-bold text-green-600">
                                            {{ substr($p->mahasiswa->user->name ?? '?', 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-800">
                                                {{ $p->mahasiswa->user->name ?? 'Nama Tidak Ditemukan' }}
                                            </p>
                                            <p class="text-[10px] text-gray-400">{{ $p->nim }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <button
                                        onclick="viewProgramDetail('{{ $p->programMagang->nama_program ?? '-' }}', '{{ $p->programMagang->mitra->nama_mitra ?? '-' }}', '{{ $p->programMagang->jenis_bkp ?? '-' }}')"
                                        class="text-xs font-bold text-tsu-teal bg-teal-50 px-3 py-1 rounded-lg hover:bg-teal-100 transition flex items-center gap-2">
                                        <span>{{ Str::limit($p->programMagang->nama_program ?? '-', 20) }}</span>
                                        <span class="text-[10px]">ℹ️</span>
                                    </button>
                                </td>
                                <td class="px-6 py-4 dospem-cell">
                                    @if($p->dosen)
                                        <div class="flex flex-col">
                                            <span
                                                class="text-xs font-bold text-gray-800">{{ $p->dosen->user->name ?? $p->nuptk }}</span>
                                            <button onclick="setDospem('{{ $p->id_daftar }}', '{{ $p->nuptk }}')"
                                                class="text-[9px] text-blue-500 hover:underline text-left">
                                                Ganti Dosen
                                            </button>
                                        </div>
                                    @else
                                        <button onclick="setDospem('{{ $p->id_daftar }}')"
                                            class="text-[10px] font-bold text-blue-600 bg-blue-50 px-3 py-1.5 rounded-lg border border-blue-100 hover:bg-blue-100 transition">
                                            + Tambah Dospem
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        @php $berkas = $p->mahasiswa->user->berkas ?? null; @endphp
                                        @if($berkas && $berkas->cv_file)
                                            <button
                                                onclick="previewDoc('CV - {{ $p->nim }}', 'CV', '{{ Storage::url($berkas->cv_file) }}')"
                                                class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄
                                                CV</button>
                                        @endif
                                        @if($berkas && $berkas->transkrip_file)
                                            <button
                                                onclick="previewDoc('Transkrip - {{ $p->nim }}', 'Transkrip', '{{ Storage::url($berkas->transkrip_file) }}')"
                                                class="p-2 bg-green-50 text-green-600 rounded-xl text-[10px] font-bold">📄
                                                TRANSKRIP</button>
                                        @endif
                                        @if($berkas && $berkas->krs_file)
                                            <button
                                                onclick="previewDoc('KRS - {{ $p->nim }}', 'KRS', '{{ Storage::url($berkas->krs_file) }}')"
                                                class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold">📄
                                                KRS</button>
                                        @endif
                                        @if(!$berkas)
                                            <span class="text-xs text-gray-300 italic">Tidak ada berkas</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center action-cell">
                                    <span
                                        class="inline-block px-4 py-1.5 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-green-100">
                                        ✅ LOLOS SELEKSI
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop Ditolak (Rejected) --}}
                        @foreach($ditolak as $p)
                            <tr class="hover:bg-gray-50/50 transition mhs-row" data-status="rejected"
                                id="row-{{ $p->id_daftar }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center font-bold text-red-600">
                                            {{ substr($p->mahasiswa->user->name ?? '?', 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-800">
                                                {{ $p->mahasiswa->user->name ?? 'Nama Tidak Ditemukan' }}
                                            </p>
                                            <p class="text-[10px] text-gray-400">{{ $p->nim }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm font-bold text-gray-800">{{ $p->programMagang->nama_program ?? '-' }}</span>
                                        <span
                                            class="text-[10px] text-gray-500">{{ $p->programMagang->mitra->nama_mitra ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 dospem-cell">
                                    <span class="text-gray-300 text-xs">-</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        @php $berkas = $p->mahasiswa->user->berkas ?? null; @endphp
                                        @if($berkas && $berkas->cv_file)
                                            <button
                                                onclick="previewDoc('CV - {{ $p->nim }}', 'CV', '{{ Storage::url($berkas->cv_file) }}')"
                                                class="p-2 bg-purple-50 text-purple-600 rounded-xl text-[10px] font-bold">📄
                                                CV</button>
                                        @endif
                                        @if($berkas && $berkas->transkrip_file)
                                            <button
                                                onclick="previewDoc('Transkrip - {{ $p->nim }}', 'Transkrip', '{{ Storage::url($berkas->transkrip_file) }}')"
                                                class="p-2 bg-green-50 text-green-600 rounded-xl text-[10px] font-bold">📄
                                                TRANSKRIP</button>
                                        @endif
                                        @if($berkas && $berkas->krs_file)
                                            <button
                                                onclick="previewDoc('KRS - {{ $p->nim }}', 'KRS', '{{ Storage::url($berkas->krs_file) }}')"
                                                class="p-2 bg-orange-50 text-orange-600 rounded-xl text-[10px] font-bold">📄
                                                KRS</button>
                                        @endif
                                        @if(!$berkas)
                                            <span class="text-xs text-gray-300 italic">Tidak ada berkas</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center action-cell">
                                    <span
                                        class="inline-block px-4 py-1.5 bg-red-50 text-red-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-red-100">
                                        ❌ DITOLAK
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div id="empty-state" class="{{ ($menunggu->count() > 0) ? 'hidden' : '' }} p-20 text-center text-gray-400">
                    <span class="text-5xl block mb-4">📂</span>
                    <p class="font-bold" id="empty-text">Tidak ada pendaftaran baru.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="modalPreview" class="fixed inset-0 z-[70] hidden items-center justify-center bg-black/60 backdrop-blur-md p-4">
        <div class="bg-white w-full max-w-6xl h-[85vh] rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col">
            <div class="p-6 bg-white border-b flex justify-between items-center">
                <h3 class="font-bold text-gray-800" id="previewTitle">Preview Dokumen</h3>
                <button onclick="closePreview()"
                    class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-gray-200 transition">✕</button>
            </div>
            <div class="flex-1 bg-gray-100">
                <span class="text-5xl mb-2">📄</span>
                <p class="font-bold" id="docTypeDisplay">Memuat File...</p>
            </div>
            <div class="p-6 bg-gray-50 border-t flex justify-end">
                <button onclick="closePreview()" class="px-8 py-3 bg-gray-800 text-white font-bold rounded-2xl">Tutup
                    Preview</button>
            </div>
        </div>
    </div>

    <script>
        let currentActiveTab = 'pending';

        // Dynamic Dosen List from Controller
        const daftarDosen = @json($dosens->mapWithKeys(fn($d) => [$d->nuptk => $d->user->name ?? $d->nuptk]));

        function filterTab(status) {
            currentActiveTab = status;
            const rows = document.querySelectorAll('.mhs-row');
            const dospemHeader = document.getElementById('dospem-header');
            const dospemCells = document.querySelectorAll('.dospem-cell');

            const btnPending = document.getElementById('tab-all-btn');
            const btnLolos = document.getElementById('tab-lolos-btn');
            const btnTolak = document.getElementById('tab-tolak-btn');
            const emptyState = document.getElementById('empty-state');
            const emptyText = document.getElementById('empty-text');
            let count = 0;

            if (status === 'lolos') {
                dospemHeader.classList.remove('hidden');
                dospemCells.forEach(cell => cell.classList.remove('hidden'));
            } else {
                dospemHeader.classList.add('hidden');
                dospemCells.forEach(cell => cell.classList.add('hidden'));
            }

            // Reset Styles
            [btnPending, btnLolos, btnTolak].forEach(btn => {
                btn.className = "px-6 py-2 bg-white text-gray-500 rounded-full text-xs font-bold hover:bg-gray-50 border border-gray-100 transition-all";
            });

            // Set Active Style
            if (status === 'pending') {
                btnPending.className = "px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all";
                emptyText.innerText = "Tidak ada pendaftaran baru.";
            } else if (status === 'lolos') {
                btnLolos.className = "px-6 py-2 bg-tsu-teal text-white rounded-full text-xs font-bold shadow-lg shadow-tsu-teal/20 transition-all";
                emptyText.innerText = "Belum ada mahasiswa yang diloloskan.";
            } else {
                btnTolak.className = "px-6 py-2 bg-red-500 text-white rounded-full text-xs font-bold shadow-lg shadow-red-500/20 transition-all";
                emptyText.innerText = "Tidak ada pendaftar yang ditolak.";
            }

            // Filter Rows
            rows.forEach(row => {
                if (row.getAttribute('data-status') === status) {
                    row.style.display = "";
                    count++;
                } else {
                    row.style.display = "none";
                }
            });

            emptyState.style.display = count === 0 ? "block" : "none";
        }

        function handleAcc(name, id) {
            Swal.fire({
                title: 'ACC Mahasiswa?',
                text: `Apakah anda yakin meloloskan ${name}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Ya, Loloskan!',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch("{{ url('/admin/pendaftaran') }}/" + id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            _method: 'PUT',
                            status: 'diterima'
                        })
                    })
                        .then(response => {
                            if (!response.ok) throw new Error(response.statusText)
                            return response.json()
                        })
                        .catch(error => Swal.showValidationMessage(`Request failed: ${error}`))
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: `${name} telah lolos.`,
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => location.reload());
                }
            })
        }

        function setDospem(id_daftar, currentNuptk = null) {
            Swal.fire({
                title: 'Pilih Dosen Pembimbing',
                input: 'select',
                inputOptions: daftarDosen,
                inputValue: currentNuptk,
                inputPlaceholder: '--- Pilih Dosen ---',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                showLoaderOnConfirm: true,
                inputValidator: (value) => {
                    if (!value) return 'Anda harus memilih dosen!';
                },
                preConfirm: (nuptk) => {
                    return fetch("{{ url('/admin/pendaftaran') }}/" + id_daftar + "/assign-dospem", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            _method: 'PUT',
                            nuptk: nuptk
                        })
                    })
                        .then(response => {
                            if (!response.ok) throw new Error(response.statusText)
                            return response.json()
                        })
                        .catch(error => Swal.showValidationMessage(`Request failed: ${error}`))
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Tersimpan!',
                        text: 'Dosen pembimbing berhasil ditetapkan.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => location.reload());
                }
            });
        }

        function handleReject(name, id) {
            Swal.fire({
                title: 'Tolak Pendaftaran?',
                text: `Berikan alasan penolakan untuk ${name}`,
                input: 'textarea',
                inputPlaceholder: 'Tulis alasan penolakan...',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                confirmButtonText: 'Tolak',
                showLoaderOnConfirm: true,
                preConfirm: (reason) => {
                    return fetch("{{ url('/admin/pendaftaran') }}/" + id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            _method: 'PUT',
                            status: 'ditolak',
                            alasan: reason
                        })
                    })
                        .then(response => {
                            if (!response.ok) throw new Error(response.statusText)
                            return response.json()
                        })
                        .catch(error => Swal.showValidationMessage(`Request failed: ${error}`))
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Ditolak',
                        text: 'Mahasiswa dipindahkan ke daftar ditolak.',
                        icon: 'error',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => location.reload());
                }
            })
        }

        function viewProgramDetail(name, company, role) {
            Swal.fire({
                title: '<span class="text-lg font-bold">Detail Program Magang</span>',
                html: `<div class="text-left space-y-4 p-2">
                                                                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100"><p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Nama Program</p><p class="text-sm font-bold text-gray-800">${name}</p></div>
                                                                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100"><p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Perusahaan</p><p class="text-sm font-bold text-tsu-teal">${company}</p></div>
                                                                <div class="bg-gray-50 p-4 rounded-2xl border border-gray-100"><p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Jenis BKP/Role</p><p class="text-sm font-bold text-gray-800">${role}</p></div>
                                                            </div>`,
                confirmButtonColor: '#086375', confirmButtonText: 'Tutup'
            });
        }

        function previewDoc(title, type, url) {
            const modal = document.getElementById('modalPreview');
            document.getElementById('previewTitle').innerText = title;
            document.getElementById('docTypeDisplay').innerHTML = `<iframe src="${url}" class="w-full h-full"></iframe>`;
            modal.classList.replace('hidden', 'flex');
        }

        function closePreview() {
            const modal = document.getElementById('modalPreview');
            modal.classList.replace('flex', 'hidden');
            document.getElementById('docTypeDisplay').innerHTML = `<p class="font-bold">Memuat File...</p>`;
        }

        window.onload = () => filterTab('pending');
    </script>
@endsection