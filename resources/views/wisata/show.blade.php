@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <a href="{{ route('wisata.index') }}" class="inline-flex items-center text-pink-600 font-semibold mb-6 hover:underline">
        ← Kembali ke Manajemen Panel
    </a>

    <div class="mb-6">
        <span class="text-xs font-bold uppercase bg-pink-100 text-pink-700 px-3 py-1 rounded-full">{{ $wisata->kategori }}</span>
        <h1 class="text-3xl md:text-5xl font-extrabold text-zinc-800 mt-2 tracking-tight">{{ $wisata->nama }}</h1>
    </div>

    <div class="rounded-3xl overflow-hidden shadow-xs border border-pink-100 mb-10">
        <img src="{{ asset($w->cover_foto ?? $wisata->cover_foto) }}" class="w-full h-[45vh] object-cover" alt="Cover">
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
        <div class="lg:col-span-2 space-y-8">
            <div>
                <h3 class="text-xl font-bold text-zinc-800 mb-3 border-b border-pink-100 pb-2">Deskripsi Tempat Wisata</h3>
                <p class="text-zinc-600 leading-relaxed text-justify whitespace-pre-line">{{ $wisata->deskripsi }}</p>
            </div>

            <div>
                <h3 class="text-xl font-bold text-zinc-800 mb-4 border-b border-pink-100 pb-2">Video Visual</h3>
                <div class="aspect-video rounded-2xl overflow-hidden shadow-xs border border-pink-100">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $wisata->video_url }}" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xs border border-pink-100/60 h-fit space-y-4">
            <h4 class="text-lg font-bold text-zinc-800 border-b border-pink-50 pb-2">Detail Kontak & Lokasi</h4>
            <div>
                <span class="text-xs text-zinc-400 font-bold block">ALAMAT</span>
                <p class="text-sm text-zinc-700 font-medium">{{ $wisata->alamat }}</p>
            </div>
            <div>
                <span class="text-xs text-zinc-400 font-bold block">TIKET MASUK</span>
                <p class="text-sm text-pink-600 font-bold">{{ $wisata->harga_tiket_rupiah }}</p>
            </div>
            <div>
                <span class="text-xs text-zinc-400 font-bold block">JAM OPERASIONAL</span>
                <p class="text-sm text-zinc-700 font-medium">{{ $wisata->jam_operasional }}</p>
            </div>
            <div>
                <span class="text-xs text-zinc-400 font-bold block">NOMOR TELEPON</span>
                <p class="text-sm text-zinc-700 font-medium">{{ $wisata->nomor_kontak }}</p>
            </div>

            @if($wisata->maps_url)
            <div class="pt-2">
                <span class="text-xs text-zinc-400 font-bold block mb-2">GOOGLE MAPS</span>
                <div class="rounded-2xl overflow-hidden h-40 border border-pink-50">
                    <iframe src="{{ $wisata->maps_url }}" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="border-t border-pink-100 pt-8">
        <h3 class="text-2xl font-bold text-zinc-800 mb-2">Galeri Foto (5 Sudut Pandang)</h3>
        <p class="text-sm text-zinc-400 mb-6">Dokumentasi lingkungan area destinasi.</p>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            @forelse($wisata->images as $img)
            <div class="group relative rounded-2xl overflow-hidden bg-zinc-100 aspect-square shadow-xs border border-pink-50">
                <img src="{{ asset($img->foto_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                <div class="absolute bottom-0 inset-x-0 bg-pink-900/70 text-white text-xs text-center py-2 font-medium">
                    {{ $img->angle_foto }}
                </div>
            </div>
            @empty
            <p class="text-zinc-400 text-sm col-span-5">Belum ada foto galeri pendukung.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection