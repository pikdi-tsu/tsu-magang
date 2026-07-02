@extends('layouts.app')

@section('title', 'Kelola Program Magang')
@section('header_title', 'Manajemen Program')

@section('content')

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

{{-- Alerts --}}
@if(session('success'))
    <div class="bg-teal-50 border border-teal-200 text-teal-800 rounded-2xl p-4 flex items-center gap-3 fade-up mt-4">
        <svg class="w-5 h-5 text-teal-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        <span class="font-bold text-sm">{{ session('success') }}</span>
    </div>
@endif
@if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-800 rounded-2xl p-4 flex items-center gap-3 fade-up mt-4">
        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <span class="font-bold text-sm">{{ session('error') }}</span>
    </div>
@endif
@if($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-800 rounded-2xl p-4 fade-up mt-4">
        <ul class="list-disc list-inside text-sm">
            @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
@endif

<div x-data="programManager()" x-cloak>

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8 mt-4 fade-up">
        <div>
            <h3 class="text-xl font-black text-gray-800">Daftar Program Tersedia</h3>
            <p class="text-sm text-gray-500 font-medium">Kelola informasi, kuota, prodi, dan tipe program magang.</p>
        </div>
        <button @click="openAdd()"
            class="px-6 py-3 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/30 transition flex items-center gap-2 active:scale-95">
            <span class="text-xl leading-none">+</span> Tambah Program
        </button>
    </div>

    {{-- Program Cards --}}
    <div class="fade-up delay-100 border border-gray-200 bg-white rounded-[2.5rem] p-8 mb-8 shadow-sm">

        {{-- Tab Toggle --}}
        <div class="flex bg-gray-100 p-1.5 rounded-2xl w-full md:w-max mb-8">
            <button @click="tab = 'mandiri'; page = 1"
                    :class="tab === 'mandiri' ? 'bg-tsu-teal text-white shadow-sm' : 'text-gray-500'"
                    class="flex-1 md:flex-none px-10 py-3 rounded-xl text-sm font-bold transition-all duration-300">
                Magang Mandiri
            </button>
            <button @click="tab = 'studi'; page = 1"
                    :class="tab === 'studi' ? 'bg-tsu-teal text-white shadow-sm' : 'text-gray-500'"
                    class="flex-1 md:flex-none px-10 py-3 rounded-xl text-sm font-bold transition-all duration-300">
                Studi Independen
            </button>
        </div>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 min-h-[380px]">
            <template x-for="prog in filteredPrograms" :key="prog.id">
                <div class="border border-gray-100 rounded-[2.5rem] p-6 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all bg-white group relative overflow-hidden">

                    {{-- Status badges --}}
                    <div class="absolute top-5 right-5 flex gap-2">
                        <button @click="viewParticipants(prog)"
                            class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1 rounded-full uppercase hover:bg-blue-100 transition">
                            👥 <span x-text="prog.terisi"></span>
                        </button>
                        <span :class="prog.terisi >= prog.kuota ? 'bg-red-50 text-red-500' : 'bg-green-50 text-green-600'"
                              class="text-[10px] font-black px-3 py-1 rounded-full uppercase"
                              x-text="prog.terisi >= prog.kuota ? 'Penuh' : 'Aktif'"></span>
                    </div>

                    <div class="mt-4">
                        <div class="p-4 bg-gray-50 rounded-2xl inline-block group-hover:bg-teal-50 transition-colors mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-tsu-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <h4 class="font-bold text-xl mb-1 text-gray-800 group-hover:text-tsu-teal transition-colors" x-text="prog.title"></h4>
                        <div class="text-sm text-gray-500 mb-3 font-medium" x-text="prog.company"></div>

                        {{-- Prodi badges --}}
                        <div class="flex flex-wrap gap-1.5 mb-4" x-show="prog.prodi && prog.prodi.length > 0">
                            <template x-for="p in prog.prodi" :key="p">
                                <span class="px-2 py-1 bg-gray-800 text-white text-[9px] font-black rounded-lg tracking-wider" x-text="p"></span>
                            </template>
                        </div>

                        <div class="flex items-center gap-2 mb-4">
                            <span class="inline-block bg-teal-50 text-tsu-teal font-black text-[10px] uppercase px-3 py-1.5 rounded-lg border border-teal-100" x-text="prog.role"></span>
                            <span class="text-[10px] text-gray-400 font-bold" x-text="prog.terisi + '/' + prog.kuota + ' Kuota'"></span>
                        </div>

                        <div class="w-full h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-tsu-teal transition-all duration-500" :style="`width: ${prog.kuota > 0 ? (prog.terisi/prog.kuota)*100 : 0}%`"></div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-2 mt-5">
                        <a :href="`{{ url('admin/program') }}/${prog.id}`"
                            class="flex-1 bg-tsu-teal text-white text-xs font-bold py-3 rounded-xl hover:bg-tsu-teal-dark shadow-md shadow-teal-100 text-center transition-all active:scale-95 flex items-center justify-center">
                            Detail
                        </a>
                        <button @click="openEdit(prog)"
                            class="p-3 bg-orange-50 text-orange-500 rounded-xl hover:bg-orange-100 transition active:scale-95 flex items-center justify-center" title="Edit Program">
                            ✏️
                        </button>
                        <button @click="deleteProgram(prog.id)"
                            class="p-3 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition active:scale-95 flex items-center justify-center" title="Hapus Program">
                            🗑️
                        </button>
                    </div>
                </div>
            </template>

            {{-- Empty State --}}
            <div x-show="filteredPrograms.length === 0" class="col-span-3 flex flex-col items-center justify-center py-20 text-gray-400">
                <svg class="w-16 h-16 mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <p class="text-sm font-semibold">Belum ada program untuk kategori ini.</p>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-center gap-2 mt-10" x-show="totalPages > 1">
            <button @click="page = Math.max(1, page - 1)" :disabled="page === 1"
                class="p-2 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-30 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
            <template x-for="p in totalPages" :key="p">
                <button @click="page = p"
                    :class="page === p ? 'bg-tsu-teal text-white' : 'border border-gray-200 text-gray-600'"
                    class="w-10 h-10 rounded-lg font-bold text-sm transition-all" x-text="p"></button>
            </template>
            <button @click="page = Math.min(totalPages, page + 1)" :disabled="page === totalPages"
                class="p-2 rounded-lg border border-gray-200 hover:bg-gray-50 disabled:opacity-30 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Modal Tambah/Edit Program --}}
    <div x-show="showModal"
         class="fixed inset-0 z-[70] flex items-center justify-center bg-black/60 backdrop-blur-md p-4"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <div class="bg-white w-full max-w-2xl rounded-[3rem] shadow-2xl overflow-hidden" @click.away="showModal = false">
            {{-- Modal Header --}}
            <div class="p-8 bg-tsu-teal text-white flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-black" x-text="isEdit ? '✏️ Edit Program' : '🚀 Tambah Program Baru'"></h3>
                    <p class="text-teal-50/70 text-xs mt-1">Pastikan informasi diisi dengan akurat.</p>
                </div>
                <button @click="showModal = false"
                    class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center hover:bg-white/20 transition text-lg">✕</button>
            </div>

            {{-- Modal Form --}}
            <form :action="isEdit ? `{{ url('admin/program') }}/${formData.id_program}` : `{{ route('admin.program.store') }}`"
                  method="POST"
                  class="p-8 space-y-5 max-h-[70vh] overflow-y-auto"
                  @submit.prevent="submitForm">
                @csrf
                <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

                <div class="grid grid-cols-2 gap-5">
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📌 ID Program (Unik)</label>
                        <input type="text" name="id_program" x-model="formData.id_program"
                            :readonly="isEdit"
                            :class="isEdit ? 'bg-gray-100 cursor-not-allowed text-gray-400' : 'bg-gray-50 focus:border-tsu-teal focus:bg-white'"
                            class="w-full border-2 border-transparent rounded-2xl py-3.5 px-5 mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Contoh: PROG001" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📌 Nama Program / Role</label>
                        <input type="text" name="nama_program" x-model="formData.nama_program"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Contoh: Frontend Developer" required>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">🏢 Mitra / Perusahaan</label>
                        <select name="id_mitra" x-model="formData.id_mitra"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition" required>
                            <option value="">— Pilih Mitra —</option>
                            @foreach($mitras ?? [] as $mitra)
                                <option value="{{ $mitra->id_mitra }}">{{ $mitra->nama_mitra }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📂 Tipe Program</label>
                        <select name="jenis_bkp" x-model="formData.jenis_bkp"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition" required>
                            <option value="Magang Mandiri">Magang Mandiri</option>
                            <option value="Studi Independen">Studi Independen</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📅 Periode</label>
                        <input type="text" name="periode" x-model="formData.periode"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Contoh: Genap 2024" required>
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">👥 Kuota</label>
                        <input type="number" name="kuota" x-model="formData.kuota" min="1"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Minimal 1" required>
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📍 Lokasi Penempatan</label>
                        <input type="text" name="lokasi_penempatan" x-model="formData.lokasi_penempatan"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Alamat atau Work From Home..." required>
                    </div>

                    {{-- Prodi Checkbox --}}
                    <div class="col-span-2 bg-gray-50 p-5 rounded-[2rem] border border-dashed border-gray-200">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 block">🎓 Target Program Studi</label>
                        <div class="flex gap-4">
                            <label class="flex-1 cursor-pointer group">
                                <input type="checkbox" name="prodi[]" value="IF" x-model="formData.prodi" class="peer hidden">
                                <div class="p-4 rounded-2xl border-2 border-transparent bg-white text-center transition-all peer-checked:border-tsu-teal peer-checked:bg-teal-50">
                                    <span class="text-sm font-black text-gray-400 peer-checked:text-tsu-teal group-hover:text-gray-600 transition-colors">Informatika (IF)</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer group">
                                <input type="checkbox" name="prodi[]" value="SI" x-model="formData.prodi" class="peer hidden">
                                <div class="p-4 rounded-2xl border-2 border-transparent bg-white text-center transition-all peer-checked:border-tsu-teal peer-checked:bg-teal-50">
                                    <span class="text-sm font-black text-gray-400 peer-checked:text-tsu-teal group-hover:text-gray-600 transition-colors">Sistem Informasi (SI)</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📋 Syarat</label>
                        <textarea name="syarat" x-model="formData.syarat" rows="2"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Syarat pendaftaran..."></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📝 Deskripsi Silabus</label>
                        <textarea name="deskripsi_silabus" x-model="formData.deskripsi_silabus" rows="2"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Deskripsi silabus..."></textarea>
                    </div>
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">🎯 Capaian Pembelajaran</label>
                        <textarea name="dampak_program" x-model="formData.dampak_program" rows="2"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Capaian pembelajaran yang diharapkan..."></textarea>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="button" @click="showModal = false"
                        class="flex-1 py-4 text-gray-400 font-black rounded-2xl hover:bg-gray-50 transition uppercase text-xs tracking-widest">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-[2] py-4 bg-tsu-teal text-white font-black rounded-2xl hover:bg-tsu-teal-dark transition shadow-xl uppercase text-xs tracking-widest"
                        x-text="isEdit ? 'Simpan Perubahan' : '🚀 Tambahkan Sekarang'">
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<style>[x-cloak] { display: none !important; }</style>

<script>
function programManager() {
    return {
        tab: 'mandiri',
        showModal: false,
        isEdit: false,
        page: 1,
        perPage: 6,

        formData: {
            id_program: '', nama_program: '', id_mitra: '',
            jenis_bkp: 'Magang Mandiri', periode: '', kuota: 1,
            lokasi_penempatan: '', syarat: '', deskripsi_silabus: '',
            dampak_program: '', prodi: []
        },

        programs: [
            @foreach($programs as $prog)
            {
                id: @json($prog->id_program),
                type: '{{ stripos($prog->jenis_bkp, "Studi") !== false ? "studi" : "mandiri" }}',
                role: @json($prog->nama_program),
                company: @json($prog->mitra->nama_mitra ?? 'Mitra tidak ditemukan'),
                title: @json($prog->nama_program),
                kuota: {{ (int) $prog->kuota }},
                terisi: {{ collect($prog->pendaftaran)->count() }},
                mhs: @json(collect($prog->pendaftaran)->map(fn($d) => $d->mahasiswa->user->name ?? $d->nim)->values()),
                // Form fields
                id_program: @json($prog->id_program),
                nama_program: @json($prog->nama_program),
                id_mitra: @json($prog->id_mitra),
                jenis_bkp: @json($prog->jenis_bkp),
                periode: @json($prog->periode),
                lokasi_penempatan: @json($prog->lokasi_penempatan),
                syarat: @json($prog->syarat ?? ''),
                deskripsi_silabus: @json($prog->deskripsi_silabus ?? ''),
                dampak_program: @json($prog->dampak_program ?? ''),
                prodi: @json(is_array($prog->prodi) ? $prog->prodi : [])
            },
            @endforeach
        ],

        get filteredPrograms() {
            return this.programs.filter(p => p.type === this.tab)
                .slice((this.page - 1) * this.perPage, this.page * this.perPage);
        },

        get totalPages() {
            const total = this.programs.filter(p => p.type === this.tab).length;
            return Math.max(1, Math.ceil(total / this.perPage));
        },

        openAdd() {
            this.isEdit = false;
            this.formData = {
                id_program: '', nama_program: '', id_mitra: '',
                jenis_bkp: 'Magang Mandiri', periode: '', kuota: 1,
                lokasi_penempatan: '', syarat: '', deskripsi_silabus: '',
                dampak_program: '', prodi: []
            };
            this.showModal = true;
        },

        openEdit(prog) {
            this.isEdit = true;
            this.formData = {
                id_program: prog.id_program,
                nama_program: prog.nama_program,
                id_mitra: prog.id_mitra,
                jenis_bkp: prog.jenis_bkp,
                periode: prog.periode,
                kuota: prog.kuota,
                lokasi_penempatan: prog.lokasi_penempatan,
                syarat: prog.syarat,
                deskripsi_silabus: prog.deskripsi_silabus,
                dampak_program: prog.dampak_program,
                prodi: Array.isArray(prog.prodi) ? [...prog.prodi] : []
            };
            this.showModal = true;
        },

        submitForm(event) {
            event.target.submit();
        },

        deleteProgram(id) {
            Swal.fire({
                title: 'Hapus Program?',
                text: 'Data yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/program') }}/${id}`;
                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        },

        viewParticipants(prog) {
            const listHtml = prog.mhs.length > 0
                ? `<ul class='text-left space-y-2'>${prog.mhs.map(m => `<li class='p-3 bg-gray-50 rounded-xl font-bold text-gray-700 flex items-center gap-2'><span class='w-2 h-2 bg-tsu-teal rounded-full inline-block'></span>${m}</li>`).join('')}</ul>`
                : `<p class='text-gray-400 italic'>Belum ada peserta yang bergabung.</p>`;
            Swal.fire({
                title: `<span class='text-lg font-black'>Peserta: ${prog.title}</span>`,
                html: `<div class='mt-4'>${listHtml}</div>`,
                confirmButtonColor: '#086375',
                confirmButtonText: 'Tutup',
                customClass: { popup: 'rounded-[2.5rem]' }
            });
        }
    };
}
</script>

@endsection