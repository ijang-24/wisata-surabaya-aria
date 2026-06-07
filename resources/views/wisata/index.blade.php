@extends('layouts.app')

@section('content')
<div class="bg-[#fff9fa] min-h-screen -mt-10 pt-10 px-4 md:px-10 pb-20">
    {{-- Header Section --}}
    <div class="max-w-7xl mx-auto mb-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8 bg-white p-8 rounded-[3rem] border border-pink-100 shadow-sm relative overflow-hidden">
            <div class="relative z-10 text-center md:text-left">
                <div class="inline-flex items-center gap-2 bg-pink-50 px-4 py-1 rounded-full mb-3">
                    <span class="text-[10px] font-black uppercase tracking-widest text-pink-500">✨ Jelajah Surabaya ✨</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-zinc-800 tracking-tight">Destinasi <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-500 italic">Wisata</span> Populer 🌸</h2>
                <p class="text-zinc-500 font-medium mt-2">Temukan keindahan dan keseruan di setiap sudut Kota Surabaya!</p>
            </div>
        </div>
    </div>

    {{-- Search & Filter --}}
    <div class="max-w-7xl mx-auto mb-10">
        <form action="{{ route('wisata.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4 items-center">
            <div class="relative w-full flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari destinasi wisata..." 
                    class="w-full bg-white border border-pink-100 rounded-2xl px-6 py-4 text-sm font-semibold text-zinc-600 focus:outline-none focus:ring-2 focus:ring-pink-200 transition-all">
            </div>
            
            <div class="flex gap-4 w-full lg:w-auto">
                <select name="kategori" class="flex-1 lg:min-w-[200px] bg-white border border-pink-100 rounded-2xl px-6 py-4 font-bold text-zinc-500 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200">
                    <option value="">Semua Kategori</option>
                    @foreach(['alam', 'sejarah', 'religi', 'kuliner', 'hiburan', 'edukasi'] as $cat)
                        <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                    @endforeach
                </select>
                
                <button type="submit" class="bg-zinc-900 text-white font-bold px-8 py-4 rounded-2xl hover:bg-zinc-800 transition-all shadow-lg active:scale-95">
                    Cari Sekarang
                </button>
            </div>
        </form>
    </div>

    {{-- Main Grid Content --}}
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($wisatas as $w)
        <div class="bg-white rounded-[2.5rem] overflow-hidden group shadow-sm hover:shadow-xl transition-all duration-500 border border-pink-50/50">
            {{-- Image Header --}}
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset($w->cover_foto) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute top-6 right-6">
                    <span class="bg-white/90 backdrop-blur px-4 py-2 rounded-xl text-[10px] font-bold uppercase tracking-wider shadow-sm text-pink-500">
                        {{ $w->kategori }}
                    </span>
                </div>
            </div>

            {{-- Body --}}
            <div class="p-8 space-y-4">
                <div class="space-y-1">
                    <h5 class="text-2xl font-black text-zinc-800 group-hover:text-pink-500 transition-colors">
                        {{ $w->nama }}
                    </h5>
                    <p class="text-xs text-zinc-400 font-bold flex items-center gap-1">
                        📍 {{ Str::limit($w->alamat, 50) }}
                    </p>
                </div>

                <div class="flex justify-between items-end bg-pink-50/30 p-4 rounded-2xl border border-pink-50">
                    <div>
                        <p class="text-[9px] font-black text-pink-300 uppercase tracking-widest mb-1">Tiket Masuk</p>
                        <p class="text-lg font-black text-pink-500">{{ $w->harga_tiket_rupiah }}</p>
                    </div>
                    <a href="{{ route('wisata.show', $w->id) }}" class="w-12 h-12 rounded-2xl bg-zinc-900 flex items-center justify-center text-white hover:bg-pink-500 transition-all shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white rounded-[3rem] p-20 flex flex-col items-center gap-6 border border-pink-50 shadow-sm">
            <div class="text-6xl">🏜️</div>
            <div class="text-center">
                <h4 class="text-2xl font-black text-zinc-800 tracking-widest uppercase">Destinasi Tidak Ditemukan</h4>
                <p class="text-zinc-400 font-medium mt-2 italic">Coba cari dengan kata kunci lain ya!</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
