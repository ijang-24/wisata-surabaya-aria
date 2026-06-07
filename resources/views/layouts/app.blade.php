<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surabaya Tourism - Soft Pink Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        .glow-pink {
            box-shadow: 0 0 20px -5px rgba(244, 114, 182, 0.3);
        }
        .glow-pink-hover:hover {
            box-shadow: 0 10px 25px -5px rgba(244, 114, 182, 0.4);
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
        }
        .text-gradient-pink {
            background: linear-gradient(to right, #f472b6, #fb7185);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-[#fff9fa] text-zinc-700 antialiased flex flex-col min-h-screen">

    <nav class="bg-white/70 backdrop-blur-xl sticky top-0 z-50 border-b border-pink-100/30 py-4 px-6 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('landing') }}" class="flex items-center gap-4 hover:scale-105 transition-transform shrink-0">
                <img src="{{ asset('uploads/logo/image.png') }}" class="w-[80px] h-[80px] object-contain" alt="Logo">
                <span class="text-2xl font-black tracking-tighter text-zinc-800">
                    surabaya.<span class="text-gradient-pink">soft</span>
                </span>
            </a>
            
            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{ route('landing') }}" class="text-xs font-semibold {{ request()->routeIs('landing') ? 'text-pink-500' : 'text-zinc-600' }} hover:text-pink-500 transition-colors">
                    Home
                </a>
                <a href="{{ route('wisata.index') }}" class="text-xs font-semibold {{ request()->routeIs('wisata.index') ? 'text-pink-500' : 'text-zinc-600' }} hover:text-pink-500 transition-colors">
                    Destinasi Wisata
                </a>
                <a href="{{ route('tentang') }}" class="text-xs font-semibold {{ request()->routeIs('tentang') ? 'text-pink-500' : 'text-zinc-600' }} hover:text-pink-500 transition-colors">
                    Tentang Kota
                </a>
                <a href="{{ route('kontak') }}" class="text-xs font-semibold {{ request()->routeIs('kontak') ? 'text-pink-500' : 'text-zinc-600' }} hover:text-pink-500 transition-colors">
                    Kontak
                </a>
                @auth
                    @if(Auth::user()->role !== 'admin')
                        <a href="{{ route('bookings.index') }}" class="text-xs font-semibold {{ request()->routeIs('bookings.index') ? 'text-pink-500' : 'text-zinc-600' }} hover:text-pink-500 transition-colors">
                            Booking Saya
                        </a>
                    @endif
                    <div class="flex items-center space-x-4 border-l border-pink-100/50 pl-6 ml-4">
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.wisata.index') }}" class="text-xs font-bold text-white bg-zinc-900 hover:bg-zinc-800 px-4 py-2 rounded-xl transition-all">
                                Admin Panel
                            </a>
                        @endif
                        
                        <div class="flex items-center space-x-3">
                            <div class="text-right hidden xl:block">
                                <p class="text-[10px] font-black text-zinc-800 leading-none">{{ Auth::user()->name }}</p>
                                <p class="text-[9px] font-bold text-zinc-400 capitalize">{{ Auth::user()->role }}</p>
                            </div>
                            <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-pink-400 to-rose-400 border-2 border-white shadow-sm flex items-center justify-center text-white font-bold text-xs shrink-0">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </div>

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-xs font-semibold text-zinc-400 hover:text-pink-500 transition-colors cursor-pointer">
                                Keluar
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-semibold text-zinc-600 hover:text-pink-500 transition-colors ml-4">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="text-xs font-semibold text-pink-600 bg-pink-50 hover:bg-pink-100/80 px-4 py-2 rounded-xl transition-all duration-200">
                        Daftar
                    </a>
                @endauth
            </div>

            {{-- Mobile Hamburger Button --}}
            <button id="mobile-menu-button" class="lg:hidden p-2 rounded-xl bg-pink-50 text-pink-500 hover:bg-pink-100 transition-colors cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden lg:hidden mt-4 pt-4 border-t border-pink-50 space-y-4 animate-in slide-in-from-top duration-300">
            <div class="flex flex-col space-y-3">
                <a href="{{ route('landing') }}" class="text-sm font-bold {{ request()->routeIs('landing') ? 'text-pink-500' : 'text-zinc-600' }}">Home</a>
                <a href="{{ route('wisata.index') }}" class="text-sm font-bold {{ request()->routeIs('wisata.index') ? 'text-pink-500' : 'text-zinc-600' }}">Destinasi Wisata</a>
                <a href="{{ route('tentang') }}" class="text-sm font-bold {{ request()->routeIs('tentang') ? 'text-pink-500' : 'text-zinc-600' }}">Tentang Kota</a>
                <a href="{{ route('kontak') }}" class="text-sm font-bold {{ request()->routeIs('kontak') ? 'text-pink-500' : 'text-zinc-600' }}">Kontak</a>
                @auth
                    @if(Auth::user()->role !== 'admin')
                        <a href="{{ route('bookings.index') }}" class="text-sm font-bold {{ request()->routeIs('bookings.index') ? 'text-pink-500' : 'text-zinc-600' }}">Booking Saya</a>
                    @endif
                @endauth
            </div>
            
            <div class="pt-4 border-t border-pink-50 flex flex-col space-y-3">
                @auth
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-pink-400 to-rose-400 flex items-center justify-center text-white font-bold text-sm">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-black text-zinc-800 leading-none">{{ Auth::user()->name }}</p>
                            <p class="text-xs font-bold text-zinc-400 capitalize">{{ Auth::user()->role }}</p>
                        </div>
                    </div>
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.wisata.index') }}" class="w-full text-center bg-zinc-900 text-white py-3 rounded-xl font-bold text-sm">Admin Panel</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-center bg-pink-50 text-pink-600 py-3 rounded-xl font-bold text-sm">Keluar</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="w-full text-center bg-zinc-100 text-zinc-600 py-3 rounded-xl font-bold text-sm">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center bg-pink-500 text-white py-3 rounded-xl font-bold text-sm shadow-lg shadow-pink-200">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16 flex-grow mt-10">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-pink-100 mt-20 py-16 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div class="space-y-6">
                    <a href="#" class="flex items-center gap-4">
                        <img src="{{ asset('uploads/logo/image.png') }}" class="w-[80px] h-[80px] object-contain" alt="Logo Footer">
                        <span class="text-2xl font-black tracking-tighter text-zinc-800">
                            surabaya.<span class="text-gradient-pink">soft</span>
                        </span>
                    </a>
                    <p class="text-sm text-zinc-400 leading-relaxed">
                        Platform panduan wisata digital terbaik untuk menjelajahi setiap keajaiban di Kota Surabaya.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-zinc-50 flex items-center justify-center text-zinc-400 hover:bg-pink-500 hover:text-white transition-all shadow-sm">
                            <span class="text-sm">FB</span>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-zinc-50 flex items-center justify-center text-zinc-400 hover:bg-pink-500 hover:text-white transition-all shadow-sm">
                            <span class="text-sm">IG</span>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-zinc-50 flex items-center justify-center text-zinc-400 hover:bg-pink-500 hover:text-white transition-all shadow-sm">
                            <span class="text-sm">TW</span>
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <h5 class="text-xs font-black uppercase tracking-widest text-zinc-800">Alamat Kami</h5>
                    <p class="text-sm text-zinc-500 leading-relaxed italic">
                        Jl. Sedap Malam No. 1, <br>
                        Kec. Genteng, Kota Surabaya, <br>
                        Jawa Timur 60272
                    </p>
                </div>

                <div class="space-y-6">
                    <h5 class="text-xs font-black uppercase tracking-widest text-zinc-800">Kontak Cepat</h5>
                    <ul class="space-y-3">
                        <li class="text-sm text-zinc-500">📞 +62 856-9157-6503</li>
                        <li class="text-sm text-zinc-500">✉️ info@wisatasurabaya.go.id</li>
                        <li class="text-sm text-zinc-500">📍 Balai Kota Surabaya</li>
                    </ul>
                </div>

                <div class="space-y-6">
                    <h5 class="text-xs font-black uppercase tracking-widest text-zinc-800">Menu Utama</h5>
                    <ul class="space-y-3">
                        <li><a href="{{ route('landing') }}" class="text-sm text-zinc-500 hover:text-pink-500 transition-colors">Home</a></li>
                        <li><a href="{{ route('wisata.index') }}" class="text-sm text-zinc-500 hover:text-pink-500 transition-colors">Destinasi Wisata</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-sm text-zinc-500 hover:text-pink-500 transition-colors">Tentang Kota</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-sm text-zinc-500 hover:text-pink-500 transition-colors">Kontak</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-12 border-t border-pink-50 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-[10px] font-bold text-zinc-400">© {{ date('Y') }} Surabaya Tourism Soft. All Rights Reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="text-[10px] font-bold text-zinc-400 hover:text-pink-500">Privacy Policy</a>
                    <a href="#" class="text-[10px] font-bold text-zinc-400 hover:text-pink-500">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>

    @if(session('success'))
    <script>
        Swal.fire({ 
            title: 'Berhasil!', 
            text: "{{ session('success') }}", 
            icon: 'success', 
            confirmButtonColor: '#f472b6' 
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({ 
            title: 'Ups!', 
            text: "{{ session('error') }}", 
            icon: 'error', 
            confirmButtonColor: '#f472b6' 
        });
    </script>
    @endif
</body>
</html>
