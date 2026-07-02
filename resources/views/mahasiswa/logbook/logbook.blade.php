@extends('layouts.app')

@section('title', 'Logbook Kegiatan Magang')

@section('header_title', 'Logbook Kegiatan')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <div x-data="{
        today: new Date('{{ $today }}'), 
        startDate: new Date('{{ $startDate }}'),
        logbookData: {{ json_encode($logbookData) }},
        weeks: [],

        init() {
            for (let i = 0; i < 10; i++) {
                let wkId = i + 1;
                let start = new Date(this.startDate);
                start.setDate(start.getDate() + (i * 7));

                let end = new Date(start);
                end.setDate(end.getDate() + 6);

                let isLockedByDate = this.today < start;

                let existingLog = this.logbookData[wkId] || null;

                this.weeks.push({
                    id: wkId,
                    dateRange: this.formatRange(start, end),
                    rawStart: start.toISOString().split('T')[0],
                    rawEnd: end.toISOString().split('T')[0],
                    title: existingLog ? existingLog.title : '',
                    desc: existingLog ? existingLog.desc : '',
                    type: existingLog ? existingLog.type : 'Individu',
                    saved: existingLog ? existingLog.saved : false,
                    validated: existingLog ? existingLog.validated : false,
                    isLocked: isLockedByDate
                });
            }
        },

        formatRange(s, e) {
            const opt = { day: '2-digit', month: 'short' };
            return `${s.toLocaleDateString('id-ID', opt)} - ${e.toLocaleDateString('id-ID', opt)}`;
        },

        saveLog(id) {
            let week = this.weeks.find(w => w.id === id);
            if (!week.title || !week.desc) {
                Swal.fire('Perhatian', 'Harap isi nama dan uraian kegiatan!', 'warning');
                return;
            }

            Swal.fire({
                title: 'Simpan Logbook?',
                text: 'Setelah disimpan, data minggu ini akan dikunci selamanya.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    // Simpan ke database via AJAX Fetch
                    fetch('{{ route('logbook.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            minggu_ke: week.id,
                            tanggal_mulai: week.rawStart,
                            tanggal_selesai: week.rawEnd,
                            nama_kegiatan: week.title,
                            uraian_kegiatan: week.desc,
                            jenis_logbook: week.type
                        })
                    })
                    .then(res => res.json())
                    .then(res => {
                        if (!res.success) {
                            Swal.fire('Gagal', res.message || 'Terjadi kesalahan sistem.', 'error');
                            return;
                        }

                        week.saved = true;
                        Swal.fire('Tersimpan!', res.message || 'Logbook berhasil dikunci.', 'success');
                    })
                    .catch(err => {
                        console.error(err);
                        Swal.fire('Error', 'Gagal menghubungi server.', 'error');
                    });
                }
            });
        }
    }">

        <div class="fade-up bg-tsu-teal text-white rounded-xl p-6 mb-8 shadow-md">
            <h2 class="text-xl font-bold mb-2">Logbook Kegiatan Mingguan</h2>
            <p class="text-sm text-teal-50/80 font-light">
                Logbook hanya dapat diisi jika sudah memasuki range tanggal yang ditentukan.
                Pastikan mengisi sebelum batas waktu berakhir.
            </p>
        </div>

        <div class="fade-up delay-200 overflow-x-auto bg-white rounded-xl shadow-md border border-gray-200">
            <table id="tableLogbook" class="min-w-full border-collapse">
                <thead class="bg-tsu-teal text-white text-sm">
                    <tr>
                        <th class="py-4 px-4 text-center font-bold w-16 border-r border-white/10">Minggu</th>
                        <th class="py-4 px-4 text-center font-bold w-48 border-r border-white/10">Range Tanggal</th>
                        <th class="py-4 px-4 text-left font-bold w-1/4 border-r border-white/10">Nama Kegiatan</th>
                        <th class="py-4 px-4 text-left font-bold border-r border-white/10">Uraian Kegiatan</th>
                        <th class="py-4 px-4 text-center font-bold w-32 border-r border-white/10">Jenis</th>
                        <th class="py-4 px-4 text-center font-bold w-44">Status & Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <template x-for="week in weeks" :key="week.id">
                        <tr class="transition text-sm"
                            :class="week.isLocked ? 'bg-gray-50 opacity-60' : (week.saved ? 'bg-white' : 'bg-red-50/40')">

                            <td class="py-4 px-4 text-center font-black text-gray-700 border-r border-gray-100"
                                x-text="week.id"></td>
                            <td class="py-4 px-4 text-center text-gray-600 font-medium border-r border-gray-100"
                                x-text="week.dateRange"></td>

                            <td class="py-4 px-4 border-r border-gray-100">
                                <template x-if="!week.saved && !week.isLocked">
                                    <input type="text" x-model="week.title" placeholder="Input kegiatan..."
                                        class="w-full bg-white border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-tsu-teal/20 outline-none transition">
                                </template>
                                <template x-if="week.saved || week.isLocked">
                                    <span class="font-bold text-gray-800"
                                        x-text="week.title || (week.isLocked ? 'Belum Waktunya' : '-')"></span>
                                </template>
                            </td>

                            <td class="py-4 px-4 border-r border-gray-100">
                                <template x-if="!week.saved && !week.isLocked">
                                    <textarea x-model="week.desc"
                                        @input="$el.style.height = 'auto'; $el.style.height = $el.scrollHeight + 'px'"
                                        placeholder="Ceritakan detail kegiatan..."
                                        class="w-full bg-white border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-tsu-teal/20 outline-none overflow-hidden min-h-[42px] transition-all"></textarea>
                                </template>
                                <template x-if="week.saved || week.isLocked">
                                    <span class="text-gray-600 leading-relaxed block whitespace-pre-line"
                                        x-text="week.desc"></span>
                                </template>
                            </td>

                            <td class="py-4 px-4 text-center border-r border-gray-100">
                                <select x-model="week.type" :disabled="week.saved || week.isLocked"
                                    class="bg-white border border-gray-300 rounded px-2 py-1 text-xs outline-none disabled:bg-transparent disabled:border-none">
                                    <option>Individu</option>
                                    <option>Kelompok</option>
                                </select>
                            </td>

                            <td class="py-4 px-4 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <template x-if="week.isLocked">
                                        <span class="text-[10px] font-bold text-gray-400 uppercase italic">Belum
                                            Dibuka</span>
                                    </template>

                                    <template x-if="!week.saved && !week.isLocked">
                                        <div class="flex flex-col items-center gap-2">
                                            <span
                                                class="text-[9px] font-black text-red-500 uppercase tracking-widest animate-pulse">Belum
                                                Diisi</span>
                                            <button @click="saveLog(week.id)"
                                                class="bg-tsu-teal text-white px-5 py-1.5 rounded-full text-xs font-bold hover:bg-teal-700 shadow-sm transition active:scale-95">
                                                Simpan
                                            </button>
                                        </div>
                                    </template>

                                    <template x-if="week.saved">
                                        <span class="inline-block px-3 py-1 text-[10px] font-bold uppercase rounded-full"
                                            :class="week.validated ? 'text-green-700 bg-green-100' : 'text-yellow-700 bg-yellow-100'"
                                            x-text="week.validated ? 'Sudah Divalidasi' : 'Belum Divalidasi'">
                                        </span>
                                    </template>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <div class="mt-10 flex flex-col md:flex-row justify-between items-center gap-6 pb-10">
            <div class="flex gap-4">
                <button onclick="exportToWord()"
                    class="flex items-center gap-2 bg-gray-800 text-white px-6 py-3 rounded-xl font-bold text-sm hover:bg-black transition shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Download (.doc)
                </button>
            </div>

            <div class="bg-white p-4 rounded-2xl border-2 border-dashed border-gray-300 flex items-center gap-4 shadow-sm">
                <div class="text-right">
                    <p class="text-xs font-black text-gray-400 uppercase">Sudah Selesai Magang?</p>
                    <p class="text-sm font-bold text-gray-700">Upload Laporan Akhir</p>
                </div>
                <button @click="Swal.fire('Upload', 'Fitur upload laporan belum diaktivasi.', 'info')"
                    class="bg-tsu-teal text-white p-3 rounded-xl hover:bg-teal-700 transition shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <script>
        function exportToWord() {
            const table = document.getElementById('tableLogbook').cloneNode(true);
            const rows = table.rows;

            // Remove the action column (last column)
            for (let i = 0; i < rows.length; i++) {
                if (rows[i].cells.length > 0) {
                    rows[i].deleteCell(-1);
                }
            }

            const header = `
                <html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'>
                <head><meta charset='utf-8'><style>
                    table { border-collapse: collapse; width: 100%; border: 1px solid black; }
                    th { background-color: #086375; color: white; border: 1px solid black; padding: 10px; }
                    td { border: 1px solid black; padding: 8px; font-family: Arial; }
                    .title { text-align: center; font-size: 18pt; font-weight: bold; margin-bottom: 20px; }
                </style></head><body>
                <div class='title'>LOGBOOK KEGIATAN MAGANG</div>
            `;
            const footer = "</body></html>";
            const sourceHTML = header + table.outerHTML + footer;

            const blob = new Blob(['\\ufeff', sourceHTML], { type: 'application/msword' });
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = 'Logbook_Magang.doc';
            link.click();

            Swal.fire('Berhasil', 'Logbook diunduh sebagai file Word.', 'success');
        }
    </script>

@endsection