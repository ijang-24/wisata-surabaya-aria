@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-3xl shadow-xs border border-pink-100/40 mb-8 flex flex-wrap justify-between items-center gap-4">
    <div>
        <h2 class="text-2xl font-bold text-zinc-800 tracking-tight">Daftar Objek Wisata Surabaya</h2>
        <p class="text-sm text-zinc-400">Total Terdata: <span class="font-semibold text-pink-500">{{ $wisatas->count() }} Lokasi</span></p>
    </div>
    <a href="{{ route('wisata.create') }}" class="bg-pink-400 hover:bg-pink-500 text-white font-medium px-5 py-3 rounded-2xl transition-all duration-200 shadow-sm shadow-pink-100">
        + Tambah Wisata
    </a>
</div>

<form action="{{ route('wisata.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari destinasi..." class="border border-pink-100/80 rounded-2xl p-3 bg-white w-full focus:outline-none focus:ring-2 focus:ring-pink-300/40 shadow-xs transition-all">
    
    <select name="kategori" class="border border-pink-100/80 rounded-2xl p-3 bg-white w-full focus:outline-none focus:ring-2 focus:ring-pink-300/40 shadow-xs transition-all text-zinc-600">
        <option value="">Semua Kategori</option>
        <option value="alam" {{ request('kategori') == 'alam' ? 'selected' : '' }}>Alam</option>
        <option value="sejarah" {{ request('kategori') == 'sejarah' ? 'selected' : '' }}>Sejarah</option>
        <option value="religi" {{ request('kategori') == 'religi' ? 'selected' : '' }}>Religi</option>
        <option value="kuliner" {{ request('kategori') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
        <option value="hiburan" {{ request('kategori') == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
    </select>
    
    <button type="submit" class="bg-zinc-800 text-white font-medium p-3 rounded-2xl hover:bg-zinc-900 transition-all duration-200">
        Terapkan Filter
    </button>
</form>

<div class="bg-white rounded-3xl shadow-xs border border-pink-100/40 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#fffbfc] border-b border-pink-50/80 text-pink-600/90 text-xs font-bold uppercase tracking-wider">
                    <th class="p-5">Cover</th>
                    <th class="p-5">Nama Tempat</th>
                    <th class="p-5">Kategori</th>
                    <th class="p-5">Harga Tiket</th>
                    <th class="p-5">Jam Operasional</th>
                    <th class="p-5 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-pink-50/50 text-sm text-zinc-600">
                @forelse($wisatas as $w)
                <tr class="hover:bg-pink-50/10 transition-colors">
                    <td class="p-5">
                        <img src="{{ asset($w->cover_foto) }}" class="w-20 h-14 object-cover rounded-2xl border border-pink-100/60 shadow-xs">
                    </td>
                    <td class="p-5 font-semibold text-zinc-800">{{ $w->nama }}</td>
                    <td class="p-5">
                        <span class="text-[11px] font-medium px-2.5 py-1 rounded-lg uppercase bg-pink-50 text-pink-600 tracking-wider">
                            {{ $w->kategori }}
                        </span>
                    </td>
                    <td class="p-5 font-bold text-pink-500">{{ $w->harga_tiket_rupiah }}</td>
                    <td class="p-5 text-zinc-400 font-medium">{{ $w->jam_operasional }}</td>
                    <td class="p-5">
                        <div class="flex justify-center items-center gap-1.5">
                            <a href="{{ route('wisata.show', $w->id) }}" class="text-xs font-semibold text-zinc-600 bg-zinc-50 hover:bg-zinc-100 px-3 py-2 rounded-xl transition">
                                Detail
                            </a>
                            <a href="{{ route('wisata.edit', $w->id) }}" class="text-xs font-semibold text-amber-600 bg-amber-50 hover:bg-amber-100 px-3 py-2 rounded-xl transition">
                                Edit
                            </a>
                            <form action="{{ route('wisata.destroy', $w->id) }}" method="POST" onsubmit="return confirm('Hapus destinasi ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-xs font-semibold text-rose-600 bg-rose-50 hover:bg-rose-100 px-3 py-2 rounded-xl transition cursor-pointer">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-12 text-zinc-400 font-medium">Data pariwisata belum diinput atau tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection