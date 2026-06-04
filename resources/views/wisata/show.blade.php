@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto pb-20">
    {{-- Breadcrumb / Back Navigation --}}
    <nav class="flex items-center gap-2 text-sm font-medium mb-8">
        <a href="{{ route('wisata.index') }}" class="text-zinc-400 hover:text-pink-500 transition-colors">Management Panel</a>
        <span class="text-zinc-300">/</span>
        <span class="text-pink-400">Detail Destinasi</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        {{-- Left Column: Visuals & Description --}}
        <div class="lg:col-span-8 space-y-10">
            
            {{-- Main Header & Cover --}}
            <div class="space-y-6">
                <div class="flex flex-wrap items-center gap-3">
                    <span class="px-4 py-1.5 rounded-full bg-pink-100 text-pink-600 text-[11px] font-bold uppercase tracking-widest shadow-sm">
                        {{ $wisata->kategori }}
                    </span>
                    <span class="px-4 py-1.5 rounded-full bg-zinc-100 text-zinc-500 text-[11px] font-bold uppercase tracking-widest shadow-sm">
                        Verified Destination
                    </span>
                </div>
                
                <h1 class="text-4xl md:text-6xl font-black text-zinc-800 tracking-tight leading-tight">
                    {{ $wisata->nama }}
                </h1>

                <div class="relative group rounded-[2.5rem] overflow-hidden shadow-2xl shadow-pink-200/40 border-8 border-white">
                    <img src="{{ asset($wisata->cover_foto) }}" class="w-full h-[500px] object-cover group-hover:scale-105 transition-transform duration-700" alt="{{ $wisata->nama }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60"></div>
                </div>
            </div>

            {{-- Description Section --}}
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-pink-50/50">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-10 h-10 rounded-2xl bg-pink-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-zinc-800">Tentang Destinasi</h3>
                </div>
                <p class="text-zinc-500 leading-relaxed text-lg whitespace-pre-line text-justify">
                    {{ $wisata->deskripsi }}
                </p>
            </div>

            {{-- Video Section --}}
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-2xl bg-rose-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-zinc-800">Visual Cinematic</h3>
                </div>
                <div class="rounded-[2.5rem] overflow-hidden shadow-xl border-4 border-white aspect-video bg-zinc-100">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $wisata->video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            {{-- Gallery --}}
            <div class="space-y-6">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-2xl bg-amber-50 flex items-center justify-center">
                        <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-zinc-800">Galeri Eksklusif</h3>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @forelse($wisata->images as $img)
                    <div class="group relative rounded-3xl overflow-hidden aspect-square border-4 border-white shadow-sm hover:shadow-md transition-all">
                        <img src="{{ asset($img->foto_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/60 to-transparent">
                            <span class="text-[10px] text-white font-bold uppercase tracking-wider">{{ $img->angle_foto }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-12 text-center bg-white rounded-[2.5rem] border-2 border-dashed border-pink-100">
                        <p class="text-zinc-400 font-medium">Belum ada foto galeri pendukung.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Right Column: Information Card --}}
        <div class="lg:col-span-4 space-y-8">
            <div class="sticky top-28 space-y-6">
                
                {{-- Quick Info Card --}}
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-pink-100/30 border border-pink-50/50 space-y-6">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-bold text-zinc-800">Informasi Kunjungan</h4>
                        <div class="w-12 h-1 bg-pink-200 rounded-full"></div>
                    </div>

                    <div class="space-y-5">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex-shrink-0 flex items-center justify-center text-emerald-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-zinc-400 font-black uppercase tracking-widest block">Harga Tiket</span>
                                <span class="text-xl font-black text-pink-500">{{ $wisata->harga_tiket_rupiah }}</span>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-sky-50 flex-shrink-0 flex items-center justify-center text-sky-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-zinc-400 font-black uppercase tracking-widest block">Operasional</span>
                                <span class="text-sm font-bold text-zinc-700">{{ $wisata->jam_operasional }}</span>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50 flex-shrink-0 flex items-center justify-center text-purple-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <span class="text-[10px] text-zinc-400 font-black uppercase tracking-widest block">Kontak</span>
                                <span class="text-sm font-bold text-zinc-700">{{ $wisata->nomor_kontak }}</span>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-pink-50">
                            <span class="text-[10px] text-zinc-400 font-black uppercase tracking-widest block mb-3">Alamat Lengkap</span>
                            <p class="text-sm text-zinc-600 leading-relaxed font-medium">
                                {{ $wisata->alamat }}
                            </p>
                        </div>
                    </div>

                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $wisata->nomor_kontak) }}" target="_blank" class="flex items-center justify-center gap-2 w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-pink-200">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        Hubungi via WhatsApp
                    </a>
                </div>

                {{-- Map Card --}}
                @if($wisata->maps_url)
                <div class="bg-white p-4 rounded-[2.5rem] shadow-xl shadow-pink-100/30 border border-pink-50/50">
                    <div class="rounded-[2.0rem] overflow-hidden h-64 bg-zinc-50 border border-pink-50">
                        <iframe src="{{ $wisata->maps_url }}" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                @endif

                {{-- Action Panel --}}
                <div class="flex gap-3">
                    <a href="{{ route('wisata.edit', $wisata->id) }}" class="flex-1 bg-amber-400 hover:bg-amber-500 text-white font-bold py-4 rounded-2xl transition-all text-center">
                        Edit Data
                    </a>
                    <form action="{{ route('wisata.destroy', $wisata->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus data ini permanent?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full bg-rose-500 hover:bg-rose-600 text-white font-bold py-4 rounded-2xl transition-all">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
