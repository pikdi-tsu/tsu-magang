@extends('layouts.app')

@section('title', 'Usulan Konversi')
@section('header_title', 'Usulan Konversi')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .file-card {
            @apply transition-all duration-300 border-2 border-dashed border-slate-200 rounded-[2rem] p-8 flex flex-col items-center justify-center gap-4 bg-white hover:border-tsu-teal hover:bg-teal-50/30 group cursor-pointer;
        }

        .file-icon-wrapper {
            @apply w-16 h-16 rounded-2xl flex items-center justify-center transition-all duration-300;
        }

        .autocomplete-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #ddd;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .autocomplete-item {
            padding: 10px 12px;
            cursor: pointer;
            font-size: 13px;
        }

        .autocomplete-item:hover {
            background: #f8fafc;
        }

        .table-input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            padding: 8px;
            text-align: center;
            transition: all 0.2s;
        }

        .table-input:focus {
            background: #f8fafc;
            border-radius: 4px;
        }

        [x-cloak] {
            display: none !important;
        }

        @media print {
            body * {
                visibility: hidden;
                background: none !important;
            }

            #printArea,
            #printArea * {
                visibility: visible !important;
            }

            #printArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100% !important;
                margin: 0 !important;
                padding: 20px !important;
                display: block !important;
            }

            .no-print,
            aside,
            nav,
            header,
            button,
            #fileDisplayArea,
            .file-management {
                display: none !important;
            }

            .rounded-[2.5rem] {
                border: 1px solid #ddd !important;
                border-radius: 12px !important;
            }

            .bg-slate-50\/80 {
                background-color: #f8fafc !important;
                -webkit-print-color-adjust: exact;
            }

            .shadow-sm,
            .shadow-xl,
            .shadow-2xl {
                box-shadow: none !important;
            }
        }
    </style>

    <div class="w-full pb-20 px-4 md:px-0">
        <form id="formPenilaian" enctype="multipart/form-data">
            @csrf

            @php
                $mhs_data = auth()->user()->mahasiswa;
                // Ambil pendaftaran yang statusnya diterima jika ada, jika tidak, pendaftaran pertama.
                $pendaftaran = $mhs_data->pendaftaran()->where('status', 'diterima')->first() ?? $mhs_data->pendaftaran()->first();
                $programData = $pendaftaran ? $pendaftaran->programMagang : null;
                $mitraData = $programData ? $programData->mitra : null;

                $mhs = auth()->user()->mahasiswa;
                $statusKonversi = $mhs->pengajuan_konversi;
                $isReadonly = in_array($statusKonversi, ['diisi', 'disetujui']);
                $konversiData = $isReadonly ? $mhs->konversi()->with('mataKuliah')->get() : [];
            @endphp

            <div id="printArea" class="max-w-5xl mx-auto">

                <div
                    class="fade-up bg-gradient-to-br from-white to-slate-50 border border-slate-200 rounded-[2.5rem] p-10 mb-8 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-tsu-teal/5 rounded-full -mr-20 -mt-20"></div>
                    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                        <div>
                            <span
                                class="px-4 py-1.5 bg-tsu-teal text-white text-[10px] font-black uppercase rounded-full tracking-widest shadow-lg shadow-tsu-teal/20">
                                {{ $programData ? $programData->jenis_bkp : 'Program Magang' }}
                            </span>
                            <h2 class="text-4xl font-black text-slate-800 mt-4 tracking-tighter">
                                {{ $programData ? $programData->nama_program : 'Program Magang' }}
                            </h2>
                            <p class="text-lg text-slate-500 font-medium">
                                {{ $mitraData ? $mitraData->nama_mitra : 'Nama Mitra' }}
                            </p>
                        </div>
                        <div
                            class="flex flex-col items-end bg-white/50 backdrop-blur p-4 rounded-2xl border border-slate-100">
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Periode Selesai</p>
                            <p class="text-xl font-black text-slate-700">{{ date('d F Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                    <div
                        class="fade-up bg-white border border-slate-100 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 flex flex-col items-center justify-center relative overflow-hidden group min-h-[220px]">
                        <div class="absolute top-0 left-0 w-2 h-full bg-tsu-teal"></div>
                        <h3 class="text-slate-400 font-black text-xs uppercase tracking-widest mb-2">Nilai Akhir Akademik
                        </h3>
                        <div class="flex items-baseline gap-1">
                            <span
                                class="text-8xl font-black text-tsu-teal tracking-tighter group-hover:scale-110 transition-transform duration-500">85</span>
                            <span class="text-2xl font-black text-tsu-teal">/100</span>
                        </div>
                        <p class="text-slate-500 mt-4 font-bold text-xs text-center leading-relaxed">Wawan Laksito,
                            M.M.<br><span class="text-[10px] text-slate-300 font-medium tracking-wide uppercase">Dosen
                                Pembimbing</span></p>
                    </div>

                    <div
                        class="fade-up bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2.5rem] p-8 text-white flex flex-col justify-between relative overflow-hidden shadow-2xl shadow-slate-900/20 group min-h-[220px]">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -mr-16 -mt-16 transition-transform group-hover:scale-150 duration-700">
                        </div>

                        <div class="relative z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-tsu-teal mb-4 opacity-50"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H14.017C13.4647 8 13.017 8.44772 13.017 9V15C13.017 16.3261 13.3468 17.6143 13.9366 18.7291L14.017 21ZM6.017 21L6.017 18C6.017 16.8954 6.91243 16 8.017 16H11.017C11.5693 16 12.017 15.5523 12.017 15V9C12.017 8.44772 11.5693 8 11.017 8H6.017C5.46472 8 5.017 8.44772 5.017 9V15C5.017 16.3261 5.34684 17.6143 5.93661 18.7291L6.017 21Z" />
                            </svg>
                            <p class="text-base italic font-medium leading-relaxed text-slate-200">
                                "Mahasiswa menunjukkan proaktifitas yang tinggi. Magang sudah memenuhi kriteria dengan
                                baik."
                            </p>
                        </div>

                        <div class="mt-6 pt-4 border-t border-white/10 flex justify-between items-center">
                            <span class="text-[10px] font-black uppercase tracking-widest text-tsu-teal">Catatan
                                Dosen</span>
                            <span class="text-[10px] text-slate-500 font-bold tracking-widest">VERIFIED</span>
                        </div>
                    </div>
                </div>

                @if($statusKonversi === 'ditolak')
                    <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm font-bold border border-red-200">
                        Pengajuan konversi Anda ditolak. Silakan periksa kembali dan isi ulang konversi mata kuliah.
                    </div>
                @elseif($statusKonversi === 'diisi')
                    <div
                        class="bg-orange-50 text-orange-600 p-4 rounded-xl mb-6 text-sm font-bold border border-orange-200 hidden print:hidden">
                        Data konversi berhasil disimpan dan sedang menunggu validasi dosen. Anda tidak dapat mengubah data ini.
                    </div>
                @endif

                <div id="tableToExport"
                    class="fade-up mb-10 overflow-hidden border border-slate-100 rounded-[2.5rem] shadow-xl shadow-slate-200/40 bg-white">
                    <div class="bg-slate-50/50 p-8 border-b border-slate-100 flex justify-between items-center">
                        <div>
                            <h3 class="text-base font-black text-slate-700 uppercase tracking-widest">Tabel Konversi Mata
                                Kuliah
                            </h3>
                            <p class="text-[10px] text-slate-400 font-bold mt-1 uppercase tracking-widest">Total SKS
                                Diterima:
                                <span id="totalSKSInfo">0</span> SKS
                            </p>
                        </div>
                        @if($statusKonversi === 'disetujui')
                            <span
                                class="px-5 py-2 bg-emerald-500 text-white text-[10px] font-black rounded-2xl shadow-lg shadow-emerald-200 uppercase tracking-widest">Tervalidasi
                                Prodi</span>
                        @endif
                    </div>

                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] bg-white">
                                <th class="px-8 py-6 text-center border-b w-16">No</th>
                                <th class="px-8 py-6 text-left border-b">Nama Mata Kuliah</th>
                                <th class="px-8 py-6 text-center border-b w-40">Kode</th>
                                <th class="px-8 py-6 text-center border-b w-24">SKS</th>
                                <th class="px-8 py-6 text-center border-b w-32 bg-slate-50/50">Nilai (Dosen)</th>
                            </tr>
                        </thead>
                        <tbody id="conversionTableBody" class="divide-y divide-slate-50 font-bold text-slate-700">
                            @if($isReadonly && count($konversiData) > 0)
                                @foreach($konversiData as $index => $kw)
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-8 py-5 text-center text-slate-400 font-medium">{{ $index + 1 }}</td>
                                        <td class="px-8 py-5 group-hover:text-tsu-teal transition-colors relative">
                                            <input type="text" value="{{ $kw->mataKuliah->nama_matkul ?? '-' }}" disabled
                                                class="table-input font-bold text-slate-700 bg-transparent outline-none w-full !text-left">
                                        </td>
                                        <td class="px-8 py-5 text-center text-slate-500 font-mono">
                                            <input type="text" value="{{ $kw->kode_mk }}" disabled
                                                class="table-input font-bold text-tsu-teal bg-transparent outline-none w-full !text-center">
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <input type="number" value="{{ $kw->mataKuliah->sks ?? 0 }}" disabled
                                                class="table-input font-bold text-slate-700 bg-transparent outline-none w-full !text-center sks-input">
                                        </td>
                                        <td class="px-8 py-5 text-center bg-slate-50/30 font-black text-tsu-teal text-lg">
                                            <input type="text" value="-" disabled
                                                class="table-input font-black text-tsu-blue bg-transparent outline-none w-full !text-center">
                                        </td>
                                    </tr>
                                @endforeach
                                <script>document.addEventListener("DOMContentLoaded", () => calculateTotalSKS());</script>
                            @else
                                @for ($i = 1; $i <= 7; $i++)
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-8 py-5 text-center text-slate-400 font-medium">{{ $i }}</td>
                                        <td class="px-8 py-5 group-hover:text-tsu-teal transition-colors relative">
                                            <input type="text" name="mk_name[]"
                                                class="table-input matkul-search bg-transparent outline-none w-full !text-left"
                                                placeholder="Nama Mata Kuliah">
                                        </td>
                                        <td class="px-8 py-5 text-center text-slate-500 font-mono">
                                            <input type="text" name="mk_code[]"
                                                class="table-input matkul-search text-tsu-teal bg-transparent outline-none w-full !text-center"
                                                placeholder="Kode MK">
                                        </td>
                                        <td class="px-8 py-5 text-center">
                                            <input type="number" name="mk_sks[]"
                                                class="table-input sks-input bg-transparent outline-none w-full !text-center">
                                        </td>
                                        <td class="px-8 py-5 text-center bg-slate-50/30 font-black text-tsu-teal text-lg">
                                            <input type="text" value="-" disabled
                                                class="table-input font-black text-tsu-blue bg-transparent outline-none w-full !text-center">
                                        </td>
                                    </tr>
                                @endfor
                            @endif
                        </tbody>
                        <tfoot class="bg-slate-50/80">
                            <tr class="font-black text-slate-800">
                                <td colspan="3"
                                    class="px-8 py-6 text-right uppercase text-[10px] tracking-[0.2em] text-slate-400">Total
                                    SKS Dikonversi</td>
                                <td class="px-8 py-6 text-center text-lg text-tsu-teal" id="totalSKS">0</td>
                                <td class="px-8 py-6 bg-slate-100/50 text-center" id="totalNilai">-</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Tanda Tangan untuk Print -->
                <div class="hidden print:grid grid-cols-2 gap-20 mt-20 text-center max-w-2xl mx-auto">
                    <div>
                        <p class="text-sm">Pembimbing Lapangan,</p>
                        <div class="h-20"></div>
                        <p class="font-bold underline">_________________________</p>
                    </div>
                    <div>
                        <p class="text-sm">Dosen Pembimbing Magang,</p>
                        <div class="h-20"></div>
                        <p class="font-bold underline">_________________________</p>
                    </div>
                </div>

            </div>

            @if(!$isReadonly)
                <div class="no-print space-y-6 mb-12 max-w-5xl mx-auto">
                    <div class="flex items-center gap-4 px-2">
                        <div class="h-6 w-1.5 bg-tsu-teal rounded-full"></div>
                        <h3 class="text-xl font-black text-slate-800 tracking-tight">Upload Formulir Pengajuan Konversi</h3>
                    </div>

                    <div class="w-full">
                        <input type="file" id="fileSertifikat" name="files[]" class="hidden" accept=".pdf" multiple
                            onchange="handleFileSelect(this)">
                        <div id="mainUploadBtn" onclick="document.getElementById('fileSertifikat').click()"
                            class="file-card border-tsu-teal/20 bg-tsu-teal/[0.02] py-10">
                            <div id="previewSertif" class="flex flex-col items-center">
                                <div
                                    class="file-icon-wrapper bg-tsu-teal/10 text-tsu-teal group-hover:bg-tsu-teal group-hover:text-white group-hover:-rotate-12 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="mt-4 text-center">
                                    <p class="text-lg font-black text-tsu-teal" id="uploadBtnText">Upload Formulir</p>
                                    <p class="text-xs font-semibold text-slate-400 mt-2 tracking-tight"> Upload formulir yang telah ditandatangani Kaprodi </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="fileDisplayArea" class="hidden fade-up mt-6">
                        <div class="flex items-center justify-between mb-4 px-2 border-b border-gray-100 pb-3">
                            <h3 class="text-sm font-bold text-gray-500 uppercase tracking-widest">File Terlampir</h3>
                            <button type="button" onclick="resetFiles()"
                                class="text-[10px] bg-red-50 text-red-500 px-3 py-1.5 rounded-lg font-bold hover:bg-red-100 hover:text-red-700 uppercase tracking-wider transition-colors">Hapus
                                Semua</button>
                        </div>
                        <div id="fileListContainer" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>
                    </div>
                </div>
            @endif

            <div class="no-print flex flex-col items-center gap-4 mt-12 mb-20 max-w-5xl mx-auto">
                <div class="flex flex-col md:flex-row justify-center gap-4 w-full">
                    <button type="button" onclick="handlePrint()"
                        class="flex items-center justify-center gap-3 bg-white border-2 border-slate-200 text-slate-600 px-8 py-4 rounded-[2rem] font-black text-xs uppercase tracking-[0.2em] hover:bg-slate-50 transition-all active:scale-95 flex-1 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 group-hover:-translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                        </svg>
                        Cetak PDF
                    </button>

                    <button type="button" onclick="exportOnlyTableToWord()"
                        class="flex items-center justify-center gap-3 bg-slate-900 text-white px-8 py-4 rounded-[2rem] font-black text-[11px] uppercase tracking-[0.2em] hover:bg-slate-800 transition-all shadow-2xl active:scale-95 flex-1 group">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 group-hover:-translate-y-1 transition-transform" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Cetak Word
                    </button>

                    @if(!$isReadonly)
                        <button type="button" onclick="submitFinal()"
                            class="flex items-center justify-center gap-3 bg-tsu-teal text-white px-8 py-4 rounded-[2rem] font-black text-xs uppercase tracking-[0.2em] hover:bg-teal-700 transition-all shadow-xl shadow-tsu-teal/30 active:scale-95 flex-[1.5] group">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Simpan & Kirim
                        </button>
                    @endif
                </div>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-4">Pastikan data yang diisi
                    sudah benar sebelum menyimpan dan mencetak.</p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.addEventListener("keyup", function (e) {
                if (!e.target.classList.contains("matkul-search")) return;

                let input = e.target;
                let keyword = input.value;
                let row = input.closest("tr");

                if (keyword.length < 2) return;

                fetch(`/search-matkul?q=${keyword}`)
                    .then(res => res.json())
                    .then(data => {
                        removeDropdown();

                        let dropdown = document.createElement("div");
                        dropdown.classList.add("autocomplete-dropdown");

                        data.forEach(item => {
                            let option = document.createElement("div");
                            option.classList.add("autocomplete-item");

                            option.innerHTML = `<b>${item.kode_mk}</b> - ${item.nama_matkul} (${item.sks} SKS)`;

                            option.onclick = function () {
                                row.querySelector('input[name="mk_name[]"]').value = item.nama_matkul;
                                row.querySelector('input[name="mk_code[]"]').value = item.kode_mk;
                                row.querySelector('input[name="mk_sks[]"]').value = item.sks;

                                calculateTotalSKS();
                                removeDropdown();
                            }
                            dropdown.appendChild(option);
                        });
                        input.closest("td").appendChild(dropdown);
                    });
            });

            // Coba kalkulasi SKS awal jika ada data
            calculateTotalSKS();
        });

        function removeDropdown() {
            document.querySelectorAll(".autocomplete-dropdown").forEach(el => el.remove());
        }

        function calculateTotalSKS() {
            let total = 0;
            document.querySelectorAll('.sks-input').forEach(input => {
                total += parseInt(input.value) || 0;
            });
            document.getElementById('totalSKS').innerText = total;
            const infoText = document.getElementById('totalSKSInfo');
            if (infoText) infoText.innerText = total;
        }

        function handleFileSelect(input) {
            const files = input.files;
            const container = document.getElementById('fileListContainer');
            const displayArea = document.getElementById('fileDisplayArea');
            const btnText = document.getElementById('uploadBtnText');

            if (files.length === 0) return;
            if (files.length > 2) {
                Swal.fire('Terlalu Banyak!', 'Maksimal 2 file PDF saja.', 'error');
                input.value = '';
                return;
            }

            container.innerHTML = '';
            displayArea.classList.remove('hidden');

            Array.from(files).forEach((file) => {
                container.innerHTML += `
                                <div class="bg-white border border-gray-200 p-4 rounded-2xl shadow-sm flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="bg-red-50 text-red-500 p-2 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div class="overflow-hidden">
                                            <p class="text-sm font-bold text-gray-800 truncate w-[14rem] sm:w-[16rem]">${file.name}</p>
                                            <p class="text-[10px] text-green-600 font-bold uppercase tracking-wider mt-1">Siap Dikirim</p>
                                        </div>
                                    </div>
                                </div>
                            `;
            });
            btnText.innerText = "Ganti File Magang";
            Swal.fire({ title: 'Berhasil!', text: files.length + ' file dipilih.', icon: 'success', timer: 1000, showConfirmButton: false });
        }

        function resetFiles() {
            document.getElementById('fileSertifikat').value = '';
            document.getElementById('fileDisplayArea').classList.add('hidden');
            document.getElementById('uploadBtnText').innerText = "Upload File Magang";
        }

        function submitFinal() {
            const form = document.getElementById('formPenilaian');
            const fileInput = document.getElementById('fileSertifikat');

            if (fileInput.files.length === 0) {
                Swal.fire('File Kosong', 'Harap upload sertifikat magang terlebih dahulu.', 'warning');
                return;
            }

            Swal.fire({
                title: 'Kirim Penilaian?',
                text: "Data konversi dan file akan dikirim ke server.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Ya, Kirim Sekarang'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({ title: 'Sedang Mengirim...', allowOutsideClick: false, didOpen: () => { Swal.showLoading(); } });

                    const formData = new FormData(form);

                    fetch("{{ route('penilaian.store.mhs') }}", {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({ title: 'Berhasil Terkirim!', text: data.message, icon: 'success', confirmButtonColor: '#086375' })
                                    .then(() => {
                                        window.location.reload();
                                    });
                            } else {
                                Swal.fire({ title: 'Gagal!', text: data.message || 'Terjadi kesalahan.', icon: 'error' });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({ title: 'Error!', text: 'Terjadi kesalahan pada server.', icon: 'error' });
                        });
                }
            });
        }

        function handlePrint() {
            document.querySelectorAll('.table-input').forEach(input => {
                input.setAttribute('value', input.value);
            });

            Swal.fire({
                title: 'Cetak Laporan?',
                text: 'Pastikan data tabel sudah terisi sebelum mencetak.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Cetak Sekarang'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.print();
                }
            });
        }

        function exportOnlyTableToWord() {
            document.querySelectorAll('.table-input').forEach(input => {
                input.setAttribute('value', input.value);
            });
            const tableElement = document.getElementById('tableToExport').querySelector('table').outerHTML;

            const header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
                "xmlns:w='urn:schemas-microsoft-com:office:word' " +
                "xmlns='http://www.w3.org/TR/REC-html40'>" +
                "<head><meta charset='utf-8'><title>Laporan Konversi</title><style>" +
                "body { font-family: 'Segoe UI', Arial, sans-serif; } " +
                "h2 { text-align: center; color: #333; margin-bottom: 5px; } " +
                "p { text-align: center; color: #666; font-size: 12px; margin-bottom: 20px; } " +
                "table { border-collapse: collapse; width: 100%; } " +
                "th, td { border: 1px solid #ddd; padding: 12px; text-align: center; font-size: 11px; } " +
                "th { background-color: #f8f9fa; font-weight: bold; text-transform: uppercase; } " +
                ".text-left { text-align: left; }" +
                "</style></head><body>" +
                "<h2>DAFTAR KONVERSI MATA KULIAH MAGANG</h2>" +
                "<p>Laporan Konversi Mata Kuliah</p>";

            const footer = "</body></html>";
            const sourceHTML = header + tableElement + footer;

            const source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
            const fileDownload = document.createElement("a");
            document.body.appendChild(fileDownload);
            fileDownload.href = source;
            fileDownload.download = 'Laporan-Konversi-Mata-Kuliah.doc';
            fileDownload.click();
            document.body.removeChild(fileDownload);

            Swal.fire({
                title: 'Berhasil!',
                text: 'Transkrip berhasil dikonversi ke format Word.',
                icon: 'success',
                confirmButtonColor: '#086375'
            });
        }
    </script>
@endsection