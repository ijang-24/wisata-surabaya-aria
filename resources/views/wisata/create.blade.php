@extends('layouts.app')

@section('content')
<style>
    .cutie-card {
        background: rgba(255, 255, 255, 0.9);
        border: 4px solid #fee2e2;
        border-radius: 3rem;
        box-shadow: 0 12px 0 0 #fecdd3;
    }
    .bg-dots {
        background-image: radial-gradient(#fda4af 1px, transparent 1px);
        background-size: 20px 20px;
    }
    .btn-cute-back {
        background: #f472b6;
        border-bottom: 4px solid #db2777;
        border-radius: 1.5rem;
        transition: all 0.1s;
    }
    .btn-cute-back:active {
        border-bottom-width: 0;
        transform: translateY(4px);
    }
</style>

<div class="bg-dots min-h-screen -mt-10 pt-10 px-4 pb-20">
    <div class="max-w-4xl mx-auto">
        {{-- Back Button --}}
        <a href="{{ route('wisata.index') }}" class="btn-cute-back inline-flex items-center gap-2 text-white font-black px-6 py-3 mb-8 hover:scale-105 transition-all uppercase text-xs tracking-widest">
            <span>⬅️</span> KEMBALI KE WONDERLAND
        </a>

        <div class="cutie-card p-10 md:p-16 relative overflow-hidden">
            {{-- Decorative Elements --}}
            <div class="absolute -top-10 -right-10 text-pink-50 opacity-50">
                <svg class="w-40 h-40" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14l-5-4.87 6.91-1.01L12 2z"/></svg>
            </div>

            <div class="relative z-10">
                <div class="text-center mb-12">
                    <span class="text-4xl mb-4 block">🎨</span>
                    <h2 class="text-4xl font-black text-zinc-800 tracking-tight">Tambah <span class="text-pink-500 italic">Destinasi</span> Baru</h2>
                    <p class="text-zinc-400 font-bold mt-2">Isi formulir di bawah dengan penuh cinta! ✨</p>
                </div>

                <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @include('wisata._form')

                    <div class="pt-10 flex justify-center">
                        <button type="submit" class="bg-[#fb7185] border-bottom-4 border-[#e11d48] rounded-[2rem] text-white font-black px-16 py-6 text-xl shadow-xl shadow-pink-100 hover:scale-105 active:scale-95 transition-all flex items-center gap-4">
                            <span>✨</span> SIMPAN DATA AJAIB <span>✨</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    button[type="submit"] {
        border-bottom: 6px solid #e11d48;
    }
    button[type="submit"]:active {
        border-bottom-width: 0;
        transform: translateY(6px);
    }
</style>
@endsection
