<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Surabaya - Jelajahi Keindahan Kota Pahlawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .pink-gradient { background: linear-gradient(135deg, #fff5f7 0%, #fde2e8 100%); }
    </style>
</head>
<body class="bg-white text-zinc-800 antialiased overflow-x-hidden">

    {{-- Navbar --}}
    <nav class="fixed top-0 inset-x-0 z-50 bg-white/80 backdrop-blur-lg border-b border-pink-100/50 py-4">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <h1 class="text-2xl font-black tracking-tighter">
                🌸 surabaya.<span class="text-pink-400">tourism</span>
            </h1>
            <div class="flex items-center gap-8">
                <a href="#destinasi" class="text-sm font-bold text-zinc-500 hover:text-pink-500 transition-colors uppercase tracking-widest">Destinasi</a>
                <a href="{{ route('wisata.index') }}" class="bg-pink-500 hover:bg-pink-600 text-white text-[11px] font-black uppercase tracking-widest px-6 py-3 rounded-2xl transition-all shadow-lg shadow-pink-200">
                    Admin Panel
                </a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <header class="pt-32 pb-20 pink-gradient relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
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
                    <div class="flex -space-x-3 items-center">
                        @foreach($wisatas->take(3) as $w)
                            <img src="{{ asset($w->cover_foto) }}" class="w-12 h-12 rounded-full border-4 border-white object-cover">
                        @endforeach
                        <span class="pl-6 text-sm font-bold text-zinc-400 italic">+10 Lokasi Populer</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-20 -right-20 w-96 h-96 bg-pink-300/20 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-rose-300/20 rounded-full blur-3xl"></div>
                <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white rotate-3 hover:rotate-0 transition-transform duration-700">
                    <img src="https://images.unsplash.com/photo-1596402184320-417d7178b2cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="w-full h-[600px] object-cover" alt="Hero">
                </div>
            </div>
        </div>
    </header>

    {{-- Stats --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center p-6 bg-pink-50/30 rounded-3xl border border-pink-50">
                    <h4 class="text-4xl font-black text-zinc-800 mb-1">10+</h4>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Destinasi</p>
                </div>
                <div class="text-center p-6 bg-pink-50/30 rounded-3xl border border-pink-50">
                    <h4 class="text-4xl font-black text-zinc-800 mb-1">6</h4>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Kategori</p>
                </div>
                <div class="text-center p-6 bg-pink-50/30 rounded-3xl border border-pink-50">
                    <h4 class="text-4xl font-black text-zinc-800 mb-1">100%</h4>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Terpercaya</p>
                </div>
                <div class="text-center p-6 bg-pink-50/30 rounded-3xl border border-pink-50">
                    <h4 class="text-4xl font-black text-zinc-800 mb-1">24/7</h4>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-400">Informasi</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Destinations Section --}}
    <section id="destinasi" class="py-24 bg-[#faf5f6]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end gap-6 mb-16">
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
        </div>
    </section>

    {{-- Footer --}}
    <footer class="py-12 bg-white border-t border-pink-100/50">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <h1 class="text-xl font-black tracking-tighter">
                🌸 surabaya.<span class="text-pink-400">tourism</span>
            </h1>
            <p class="text-sm font-medium text-zinc-400">
                &copy; 2026 Wisata Surabaya Aria. Semua hak cipta dilindungi.
            </p>
            <div class="flex gap-6">
                <a href="#" class="text-zinc-400 hover:text-pink-500 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                <a href="#" class="text-zinc-400 hover:text-pink-500 transition-colors"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
            </div>
        </div>
    </footer>

</body>
</html>
