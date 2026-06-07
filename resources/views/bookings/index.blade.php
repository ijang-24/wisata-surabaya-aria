@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto pb-20">
    <div class="space-y-4 mb-10">
        <span class="text-[11px] font-black uppercase tracking-[0.3em] text-pink-400">Pariwisata Surabaya</span>
        <h2 class="text-4xl font-black text-zinc-900 tracking-tight">Riwayat Booking Anda</h2>
    </div>

    <div class="space-y-6">
        @forelse($bookings as $b)
        <div class="bg-white p-8 rounded-[2.5rem] border border-pink-50 shadow-sm flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-6 w-full">
                <div class="w-24 h-24 rounded-3xl overflow-hidden shrink-0 border-4 border-pink-50">
                    <img src="{{ asset($b->wisata->cover_foto) }}" class="w-full h-full object-cover">
                </div>
                <div class="space-y-1">
                    <h4 class="text-xl font-black text-zinc-800">{{ $b->wisata->nama }}</h4>
                    <p class="text-xs text-zinc-400 font-bold">📅 {{ \Carbon\Carbon::parse($b->booking_date)->format('d M Y') }}</p>
                    <p class="text-sm font-bold text-pink-500">Rp {{ number_format($b->total_price, 0, ',', '.') }} ({{ $b->quantity }} Tiket)</p>
                </div>
            </div>
            
            <div class="shrink-0 w-full md:w-auto">
                <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest block text-center
                    {{ $b->status === 'confirmed' ? 'bg-emerald-100 text-emerald-600' : ($b->status === 'cancelled' ? 'bg-rose-100 text-rose-600' : 'bg-amber-100 text-amber-600') }}">
                    {{ $b->status }}
                </span>
            </div>
        </div>
        @empty
        <div class="bg-white p-20 rounded-[3rem] border-2 border-dashed border-pink-100 text-center">
            <p class="text-zinc-400 font-bold">Belum ada riwayat booking.</p>
            <a href="{{ route('wisata.index') }}" class="text-pink-500 font-black text-sm mt-4 inline-block hover:underline">Mulai Cari Wisata 🌸</a>
        </div>
        @endforelse
    </div>
</div>
@endsection
