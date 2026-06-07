@extends('layouts.app')

@section('content')
<div class="bg-white rounded-[3rem] border border-pink-100/50 p-12 shadow-sm">
    <div class="max-w-3xl mx-auto space-y-12">
        <div class="space-y-4 text-center">
            <span class="text-[11px] font-black uppercase tracking-[0.3em] text-pink-400">Kontak Kami</span>
            <h2 class="text-4xl font-black text-zinc-900 tracking-tight">Hubungi Pariwisata Surabaya</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-pink-50/50 p-8 rounded-[2rem] border border-pink-100/50 space-y-4">
                <h4 class="font-bold text-zinc-800">Alamat Kantor</h4>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Jl. Sedap Malam No. 1, <br>
                    Surabaya, Jawa Timur <br>
                    Indonesia
                </p>
            </div>
            <div class="bg-pink-50/50 p-8 rounded-[2rem] border border-pink-100/50 space-y-4">
                <h4 class="font-bold text-zinc-800">Informasi Kontak</h4>
                <p class="text-sm text-zinc-500 leading-relaxed">
                    Email: info@wisatasurabaya.go.id <br>
                    Telepon: +62 856-9157-6503 <br>
                    Instagram: @wisatasurabaya
                </p>
            </div>
        </div>

        <form class="space-y-6 bg-white p-8 rounded-[2rem] border border-pink-100/30">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-zinc-400 px-1">Nama Lengkap</label>
                    <input type="text" class="w-full bg-zinc-50 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-pink-200 transition-all" placeholder="Masukkan nama Anda">
                </div>
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-widest text-zinc-400 px-1">Email</label>
                    <input type="email" class="w-full bg-zinc-50 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-pink-200 transition-all" placeholder="email@contoh.com">
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-[10px] font-black uppercase tracking-widest text-zinc-400 px-1">Pesan</label>
                <textarea rows="4" class="w-full bg-zinc-50 border-none rounded-2xl px-5 py-4 text-sm focus:ring-2 focus:ring-pink-200 transition-all" placeholder="Apa yang ingin Anda tanyakan?"></textarea>
            </div>
            <button type="button" class="w-full bg-zinc-900 text-white font-bold py-5 rounded-2xl hover:bg-zinc-800 transition-all shadow-lg shadow-zinc-200">
                Kirim Pesan
            </button>
        </form>
    </div>
</div>
@endsection
