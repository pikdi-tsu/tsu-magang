@extends('layouts.app')

@section('title', 'Kelola Pengumuman')
@section('header_title', 'Manajemen Pengumuman')

@section('content')

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<div class="space-y-6" x-data="pengumumanManager()" x-cloak>
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <span class="font-bold text-sm">{{ session('error') }}</span>
        </div>
    @endif

    <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-8 mt-4 fade-up">
        <div>
            <h3 class="text-xl font-black text-gray-800">Daftar Pengumuman</h3>
            <p class="text-sm text-gray-500 font-medium">Kelola pengumuman untuk mahasiswa dan dosen</p>
        </div>
        <button @click="openAdd()"
            class="px-6 py-3 bg-tsu-teal text-white font-bold rounded-2xl hover:bg-tsu-teal-dark shadow-lg shadow-tsu-teal/30 transition flex items-center gap-2 active:scale-95">
            <span class="text-xl leading-none">+</span> Tambah Pengumuman
        </button>
    </div>

    <div class="fade-up delay-100 border border-gray-200 bg-white rounded-[2.5rem] p-8 mb-8 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pengumumans as $p)
                <div class="border border-gray-100 rounded-[2.5rem] p-6 flex flex-col justify-between hover:shadow-2xl hover:-translate-y-2 transition-all bg-white group relative overflow-hidden">
                    <div class="absolute top-5 right-5 flex gap-2">
                        <span class="bg-indigo-50 text-indigo-600 text-[10px] font-black px-3 py-1 rounded-full uppercase border border-indigo-100">
                            {{ $p->jenis_pengumuman ?? 'Info' }}
                        </span>
                        <span class="{{ $p->status === 'aktif' ? 'bg-green-50 text-green-600 border-green-100' : 'bg-red-50 text-red-500 border-red-100' }} border text-[10px] font-black px-3 py-1 rounded-full uppercase">
                            {{ $p->status ?? 'Aktif' }}
                        </span>
                    </div>

                    <div class="mt-4">
                        <div class="p-4 bg-gray-50 rounded-2xl inline-block group-hover:bg-teal-50 transition-colors mb-4 border border-transparent group-hover:border-teal-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-tsu-teal" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                        </div>
                        <h4 class="font-bold text-xl mb-1 text-gray-800 group-hover:text-tsu-teal transition-colors truncate" title="{{ $p->judul }}">{{ $p->judul }}</h4>
                        <div class="text-xs text-gray-400 mb-3 font-bold">{{ $p->created_at->format('d M Y') }}</div>
                        <p class="text-gray-500 text-sm line-clamp-3 font-medium">{{ $p->isi }}</p>
                    </div>

                    <div class="flex gap-2 mt-6">
                        <button @click='openEdit(@json($p))'
                            class="flex-1 bg-orange-50 text-orange-500 text-xs font-bold py-3 rounded-xl hover:bg-orange-100 transition active:scale-95 flex items-center justify-center gap-2">
                            <span>✏️</span> Edit
                        </button>
                        <button @click="deletePengumuman({{ $p->id }})"
                            class="p-3 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition active:scale-95 flex items-center justify-center" title="Hapus">
                            🗑️
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-3 flex flex-col items-center justify-center py-20 text-gray-400">
                    <svg class="w-16 h-16 mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <p class="text-sm font-semibold">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Modal Tambah/Edit --}}
    <div x-show="showModal"
         class="fixed inset-0 z-[70] flex items-center justify-center bg-black/60 backdrop-blur-md p-4"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">

        <div class="bg-white w-full max-w-2xl rounded-[3rem] shadow-2xl overflow-hidden" @click.away="showModal = false">
            <div class="p-8 bg-tsu-teal text-white flex justify-between items-center">
                <div>
                    <h3 class="text-2xl font-black" x-text="isEdit ? '✏️ Edit Pengumuman' : '📢 Tambah Pengumuman'"></h3>
                    <p class="text-teal-50/70 text-xs mt-1">Sampaikan informasi terbaru kepada mahasiswa.</p>
                </div>
                <button @click="showModal = false"
                    class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center hover:bg-white/20 transition text-lg">✕</button>
            </div>

            <form :action="isEdit ? `{{ url('admin/pengumuman') }}/${formData.id}` : `{{ route('admin.pengumuman.store') }}`"
                  method="POST"
                  class="p-8 space-y-5 max-h-[70vh] overflow-y-auto"
                  @submit.prevent="submitForm">
                @csrf
                <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

                <div class="grid grid-cols-2 gap-5">
                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📌 Judul</label>
                        <input type="text" name="judul" x-model="formData.judul"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Judul Pengumuman" required>
                    </div>
                    
                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">🏷️ Jenis Pengumuman</label>
                        <select name="jenis_pengumuman" x-model="formData.jenis_pengumuman"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition" required>
                            <option value="informasi">Informasi</option>
                            <option value="himbauan">Himbauan</option>
                            <option value="deadline">Deadline</option>
                            <option value="kegiatan">Kegiatan</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">✅ Status</label>
                        <select name="status" x-model="formData.status"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition" required>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <div class="col-span-2">
                        <label class="text-[10px] font-black text-gray-400 uppercase tracking-widest ml-1">📝 Isi Pengumuman</label>
                        <textarea name="isi" x-model="formData.isi" rows="4"
                            class="w-full bg-gray-50 border-2 border-transparent rounded-2xl py-3.5 px-5 focus:border-tsu-teal focus:bg-white mt-2 outline-none font-bold text-gray-700 transition"
                            placeholder="Detail pengumuman..." required></textarea>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="button" @click="showModal = false"
                        class="flex-1 py-4 text-gray-400 font-black rounded-2xl hover:bg-gray-50 transition uppercase text-xs tracking-widest">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-[2] py-4 bg-tsu-teal text-white font-black rounded-2xl hover:bg-tsu-teal-dark transition shadow-xl uppercase text-xs tracking-widest"
                        x-text="isEdit ? 'Simpan Perubahan' : '📢 Sebarkan Pengumuman'">
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>[x-cloak] { display: none !important; }</style>

<script>
function pengumumanManager() {
    return {
        showModal: false,
        isEdit: false,
        formData: {
            id: '', judul: '', jenis_pengumuman: 'informasi', status: 'aktif', isi: ''
        },

        openAdd() {
            this.isEdit = false;
            this.formData = { id: '', judul: '', jenis_pengumuman: 'informasi', status: 'aktif', isi: '' };
            this.showModal = true;
        },

        openEdit(p) {
            this.isEdit = true;
            this.formData = { 
                id: p.id, 
                judul: p.judul, 
                jenis_pengumuman: p.jenis_pengumuman, 
                status: p.status, 
                isi: p.isi 
            };
            this.showModal = true;
        },

        submitForm(event) {
            event.target.submit();
        },

        deletePengumuman(id) {
            Swal.fire({
                title: 'Hapus Pengumuman?',
                text: 'Pengumuman yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EF4444',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `{{ url('admin/pengumuman') }}/${id}`;
                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    };
}
</script>
@endsection