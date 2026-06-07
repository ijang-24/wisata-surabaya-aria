@extends('layouts.app')

@section('content')
<style>
    .cutie-card {
        background: rgba(255, 255, 255, 0.9);
        border: 3px solid #fee2e2;
        border-radius: 2.5rem;
        box-shadow: 0 10px 0 0 #fecdd3;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .cutie-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 0 0 #fecdd3;
        border-color: #fda4af;
    }
    .floating-cute {
        animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    .bg-dots {
        background-image: radial-gradient(#fda4af 1px, transparent 1px);
        background-size: 20px 20px;
    }
    .btn-cute {
        background: #fb7185;
        border-bottom: 4px solid #e11d48;
        border-radius: 1.5rem;
        transition: all 0.1s;
    }
    .btn-cute:active {
        border-bottom-width: 0;
        transform: translateY(4px);
    }
</style>

<div class="bg-dots min-h-screen -mt-10 pt-10 px-4 md:px-10 pb-20">
    {{-- Header Section --}}
    <div class="max-w-7xl mx-auto mb-12">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8 bg-white/80 backdrop-blur-sm p-8 rounded-[3rem] border-4 border-pink-100 shadow-xl relative overflow-hidden">
            <div class="absolute -top-10 -right-10 text-pink-50 opacity-50">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z"/></svg>
            </div>
            
            <div class="relative z-10 text-center md:text-left">
                <div class="inline-flex items-center gap-2 bg-pink-100 px-4 py-1 rounded-full mb-3">
                    <span class="text-[10px] font-black uppercase tracking-widest text-pink-500">✨ Admin Wonderland ✨</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-zinc-800 tracking-tight">Halo, <span class="text-pink-500 italic">Sweet</span> Admin! 🎀</h2>
                <p class="text-zinc-500 font-bold mt-2">Mari kita buat daftar wisata Surabaya jadi lebih ceria hari ini!</p>
                
                <div class="flex flex-wrap gap-3 mt-6">
                    <a href="{{ route('admin.bookings.index') }}" class="bg-zinc-900 text-white text-[10px] font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-zinc-800 transition-all">
                        📋 Cek Data Booking
                    </a>
                    <a href="{{ route('admin.reports.wisata.pdf') }}" class="bg-rose-500 text-white text-[10px] font-black uppercase tracking-widest px-6 py-3 rounded-xl hover:bg-rose-600 transition-all">
                        📄 Export Laporan PDF
                    </a>
                </div>
            </div>

            <a href="{{ route('wisata.create') }}" class="btn-cute group text-white font-black px-10 py-5 flex items-center gap-3 hover:scale-105 transition-all relative z-10">
                <span class="text-2xl group-hover:animate-bounce">🎨</span>
                TAMBAH DATA BARU
            </a>
        </div>
    </div>

    {{-- Stats Row --}}
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        @php
            $stats = [
                ['label' => 'Total Wisata', 'val' => $wisatas->count(), 'icon' => '🌸', 'bg' => 'bg-pink-100', 'text' => 'text-pink-600'],
                ['label' => 'Kategori', 'val' => $wisatas->unique('kategori')->count(), 'icon' => '⭐', 'bg' => 'bg-amber-100', 'text' => 'text-amber-600'],
                ['label' => 'Status', 'val' => 'Online', 'icon' => '☁️', 'bg' => 'bg-sky-100', 'text' => 'text-sky-600'],
            ];
        @endphp

        @foreach($stats as $s)
        <div class="cutie-card p-6 flex flex-col items-center text-center">
            <div class="w-16 h-16 {{ $s['bg'] }} {{ $s['text'] }} rounded-full flex items-center justify-center text-3xl mb-4 floating-cute">
                {{ $s['icon'] }}
            </div>
            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-zinc-400">{{ $s['label'] }}</p>
            <h4 class="text-2xl font-black text-zinc-800">{{ $s['val'] }}</h4>
        </div>
        @endforeach
    </div>

    {{-- Search & Filter --}}
    <div class="max-w-7xl mx-auto mb-10">
        <form action="{{ route('admin.wisata.index') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-center">
            <div class="relative w-full flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari tempat lucu..." 
                    class="w-full bg-white border-4 border-pink-100 rounded-[2rem] px-10 py-5 text-lg font-bold text-zinc-600 focus:outline-none focus:border-pink-300 shadow-inner placeholder:text-pink-100 transition-all">
                <span class="absolute right-8 top-1/2 -translate-y-1/2 text-2xl">🔍</span>
            </div>
            
            <div class="flex gap-4 w-full lg:w-auto">
                <select name="kategori" class="flex-1 lg:min-w-[200px] bg-white border-4 border-pink-100 rounded-[2rem] px-8 py-5 font-black text-pink-400 text-sm appearance-none shadow-inner cursor-pointer">
                    <option value="">Semua Kategori</option>
                    @foreach(['alam', 'sejarah', 'religi', 'kuliner', 'hiburan', 'edukasi'] as $cat)
                        <option value="{{ $cat }}" {{ request('kategori') == $cat ? 'selected' : '' }}>🎀 {{ ucfirst($cat) }}</option>
                    @endforeach
                </select>
                
                <button type="submit" class="btn-cute text-white font-black px-12 py-5 shadow-lg shadow-pink-100 active:scale-95">
                    CARI!
                </button>
            </div>
        </form>
    </div>

    {{-- Main Grid Content --}}
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @forelse($wisatas as $w)
        <div class="cutie-card overflow-hidden group">
            <div class="relative h-60 overflow-hidden m-4 rounded-[2rem] border-4 border-white shadow-md">
                <img src="{{ asset($w->cover_foto) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute top-4 left-4">
                    <span class="bg-white/90 backdrop-blur px-4 py-2 rounded-full text-[10px] font-black uppercase tracking-widest text-pink-500 shadow-sm">
                        #{{ $w->kategori }}
                    </span>
                </div>
            </div>

            <div class="p-8 pt-2 space-y-4">
                <div class="space-y-1">
                    <h5 class="text-2xl font-black text-zinc-800 tracking-tight leading-none group-hover:text-pink-500 transition-colors">
                        {{ $w->nama }}
                    </h5>
                    <p class="text-xs text-zinc-400 font-bold flex items-center gap-1">
                        📍 {{ Str::limit($w->alamat, 40) }}
                    </p>
                </div>

                <div class="flex justify-between items-end bg-pink-50/50 p-4 rounded-2xl border-2 border-pink-100/50">
                    <div>
                        <p class="text-[9px] font-black text-pink-300 uppercase tracking-widest">Tiket Masuk</p>
                        <p class="text-lg font-black text-pink-500">{{ $w->harga_tiket_rupiah }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-[9px] font-black text-zinc-300 uppercase tracking-widest">Waktu</p>
                        <p class="text-xs font-bold text-zinc-500">{{ $w->jam_operasional }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3 pt-2">
                    <a href="{{ route('wisata.show', $w->id) }}" class="bg-zinc-100 hover:bg-zinc-200 p-4 rounded-2xl flex items-center justify-center text-xl transition-all shadow-sm" title="Lihat Detail">
                        👁️‍🗨️
                    </a>
                    <a href="{{ route('wisata.edit', $w->id) }}" class="bg-amber-100 hover:bg-amber-200 p-4 rounded-2xl flex items-center justify-center text-xl transition-all shadow-sm" title="Edit">
                        ✏️
                    </a>
                    <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" class="w-full" onsubmit="return confirm('Hapus ini beneran? Nanti ilang lho!')">
                        @csrf @method('DELETE')
                        <button type="submit" class="w-full bg-rose-100 hover:bg-rose-200 p-4 rounded-2xl flex items-center justify-center text-xl transition-all shadow-sm cursor-pointer" title="Hapus">
                            🗑️
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full cutie-card p-20 flex flex-col items-center gap-6">
            <div class="text-8xl floating-cute">🏜️</div>
            <div class="text-center">
                <h4 class="text-2xl font-black text-zinc-800 uppercase tracking-widest">Wah, Masih Kosong!</h4>
                <p class="text-zinc-400 font-bold mt-2 text-sm italic">Yuk tambahin tempat-tempat seru biar gak sepi!</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
