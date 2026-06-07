@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <header class="py-12 md:py-20 bg-gradient-to-br from-pink-50 to-white rounded-[3rem] border border-pink-100/50 overflow-hidden relative mb-20">
        <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-8 z-10">
                <div class="inline-flex items-center gap-2 bg-white/80 border border-pink-200 px-4 py-2 rounded-full shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-pink-500 animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-pink-600">Explore Surabaya City</span>
                </div>
                <h2 class="text-5xl md:text-7xl font-black text-zinc-900 leading-[1.1] tracking-tight">
                    Temukan Pesona <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-rose-500">Wisata Surabaya</span>
                </h2>
                <p class="text-lg text-zinc-500 leading-relaxed max-w-lg">
                    Jelajahi keindahan sejarah, kuliner, dan hiburan modern di Kota Pahlawan dengan panduan wisata terlengkap dan terupdate.
                </p>
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#destinasi" class="bg-zinc-900 hover:bg-zinc-800 text-white font-bold px-10 py-5 rounded-3xl transition-all shadow-xl shadow-zinc-200">
                        Mulai Jelajah
                    </a>
                </div>
            </div>
            <div class="relative hidden lg:block">
                <div class="absolute -top-20 -right-20 w-96 h-96 bg-pink-300/20 rounded-full blur-3xl"></div>
                <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white rotate-3 hover:rotate-0 transition-transform duration-700">
                    <img src="{{ asset('uploads/cover/patung.png') }}" class="w-full h-[500px] object-cover" alt="Hero">
                </div>
            </div>
        </div>
    </header>

    {{-- Stats --}}
    <section class="mb-24">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-8 bg-white rounded-3xl border border-pink-50 shadow-sm">
                <h4 class="text-4xl font-black text-zinc-800 mb-1">{{ $totalWisata }}+</h4>
                <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Destinasi</p>
            </div>
            <div class="text-center p-8 bg-white rounded-3xl border border-pink-50 shadow-sm">
                <h4 class="text-4xl font-black text-zinc-800 mb-1">{{ $totalKategori }}</h4>
                <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Kategori</p>
            </div>
            <div class="text-center p-8 bg-white rounded-3xl border border-pink-50 shadow-sm">
                <h4 class="text-4xl font-black text-zinc-800 mb-1">100%</h4>
                <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Terpercaya</p>
            </div>
            <div class="text-center p-8 bg-white rounded-3xl border border-pink-50 shadow-sm">
                <h4 class="text-4xl font-black text-zinc-800 mb-1">24/7</h4>
                <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Informasi</p>
            </div>
        </div>
    </section>

    {{-- Section Tentang Kota --}}
    <section id="tentang-kota" class="mb-32">
        <div class="bg-white rounded-[3.5rem] p-8 md:p-16 overflow-hidden relative border border-pink-100 shadow-sm">
            <div class="absolute top-0 right-0 w-1/3 h-full opacity-5">
                <img src="{{ asset('uploads/cover/patung.png') }}" class="w-full h-full object-contain" alt="Pattern">
            </div>
            
            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-pink-400">Mengenal Lebih Dekat</span>
                        <h3 class="text-4xl md:text-5xl font-black text-zinc-800 leading-tight">Surabaya: Harmoni <br> Sejarah & Modernitas</h3>
                    </div>
                    
                    <div class="space-y-6 text-zinc-500 leading-relaxed">
                        <div class="bg-pink-50/30 p-6 rounded-3xl border border-pink-100/50">
                            <h4 class="text-zinc-800 font-bold mb-2 flex items-center gap-2">
                                <span class="text-pink-500">📜</span> Sejarah Singkat
                            </h4>
                            <p class="text-sm">Dikenal sebagai Kota Pahlawan, Surabaya menjadi saksi bisu perjuangan heroik 10 November 1945. Nama Surabaya berasal dari filosofi pertarungan 'Sura' (Hiu) dan 'Baya' (Buaya) yang melambangkan keberanian.</p>
                        </div>
                        
                        <div class="bg-pink-50/30 p-6 rounded-3xl border border-pink-100/50">
                            <h4 class="text-zinc-800 font-bold mb-2 flex items-center gap-2">
                                <span class="text-pink-500">💎</span> Keunikan Kota
                            </h4>
                            <p class="text-sm">Perpaduan budaya Jawa, Madura, dan kolonial menciptakan karakter kota yang blak-blakan (egaliter) namun ramah. Surabaya juga dinobatkan sebagai salah satu kota terbersih dan terhijau di Indonesia.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-pink-400 to-rose-500 p-8 rounded-[3rem] shadow-2xl shadow-pink-200/50">
                        <h4 class="text-white text-2xl font-black mb-6">Daya Tarik Utama</h4>
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4 text-white/90">
                                <span class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0">🏙️</span>
                                <div>
                                    <p class="font-bold">Metropolitan Teratur</p>
                                    <p class="text-xs text-white/70">Pusat bisnis modern dengan tata ruang kota yang rapi dan taman yang asri.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 text-white/90">
                                <span class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0">🍲</span>
                                <div>
                                    <p class="font-bold">Surga Kuliner</p>
                                    <p class="text-xs text-white/70">Dari Rujak Cingur hingga Rawon Kalkulator, cita rasa otentik yang tak terlupakan.</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 text-white/90">
                                <span class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center shrink-0">🎭</span>
                                <div>
                                    <p class="font-bold">Wisata Budaya & Sejarah</p>
                                    <p class="text-xs text-white/70">Monumen Kapal Selam, Tugu Pahlawan, dan kawasan Kota Tua yang instagramable.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Destinations Section --}}
    <section id="destinasi" class="mb-20">
        <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-12">
            <div class="space-y-4">
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-pink-400">Destinasi Pilihan</span>
                <h3 class="text-4xl font-black text-zinc-900 tracking-tight">Terpopuler Saat Ini</h3>
            </div>
            <a href="{{ route('wisata.index') }}" class="text-sm font-bold text-pink-500 hover:text-pink-600 flex items-center gap-2 group">
                Lihat Semua Destinasi 
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($wisatas as $w)
            <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-pink-50/50">
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ asset($w->cover_foto) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="{{ $w->nama }}">
                    <div class="absolute top-6 right-6">
                        <span class="bg-white/90 backdrop-blur px-4 py-2 rounded-2xl text-[10px] font-bold uppercase tracking-wider shadow-sm text-pink-500">
                            {{ $w->kategori }}
                        </span>
                    </div>
                </div>
                <div class="p-8 space-y-4">
                    <h4 class="text-2xl font-black text-zinc-800 group-hover:text-pink-500 transition-colors">{{ $w->nama }}</h4>
                    <p class="text-sm text-zinc-400 line-clamp-2 leading-relaxed font-medium">
                        {{ $w->deskripsi }}
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-pink-50/50">
                        <div>
                            <p class="text-[10px] font-black text-zinc-300 uppercase tracking-widest mb-1">Tiket Masuk</p>
                            <p class="text-lg font-black text-pink-400">{{ $w->harga_tiket_rupiah }}</p>
                        </div>
                        <a href="{{ route('wisata.show', $w->id) }}" class="w-12 h-12 rounded-2xl bg-zinc-900 flex items-center justify-center text-white hover:bg-pink-500 transition-all shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
