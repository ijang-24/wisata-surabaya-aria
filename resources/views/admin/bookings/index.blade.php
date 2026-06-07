@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto pb-20">
    <div class="flex justify-between items-end mb-10">
        <div class="space-y-4">
            <span class="text-[11px] font-black uppercase tracking-[0.3em] text-pink-400">Admin Management</span>
            <h2 class="text-4xl font-black text-zinc-900 tracking-tight">Data Semua Booking</h2>
        </div>
    </div>

    <div class="bg-white rounded-[3rem] border border-pink-100 shadow-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-zinc-900 text-white">
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">User</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Wisata</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Tanggal</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Harga</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Status</th>
                        <th class="px-8 py-5 text-[10px] font-black uppercase tracking-widest">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-50">
                    @forelse($bookings as $b)
                    <tr class="hover:bg-pink-50/30 transition-colors">
                        <td class="px-8 py-5">
                            <p class="text-sm font-black text-zinc-800">{{ $b->user->name }}</p>
                            <p class="text-[10px] text-zinc-400">{{ $b->user->email }}</p>
                        </td>
                        <td class="px-8 py-5 text-sm font-bold text-zinc-600">{{ $b->wisata->nama }}</td>
                        <td class="px-8 py-5 text-sm text-zinc-500 font-medium">{{ \Carbon\Carbon::parse($b->booking_date)->format('d/m/Y') }}</td>
                        <td class="px-8 py-5 text-sm font-black text-pink-500">Rp {{ number_format($b->total_price, 0, ',', '.') }}</td>
                        <td class="px-8 py-5">
                            <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-tighter
                                {{ $b->status === 'confirmed' ? 'bg-emerald-100 text-emerald-600' : ($b->status === 'cancelled' ? 'bg-rose-100 text-rose-600' : 'bg-amber-100 text-amber-600') }}">
                                {{ $b->status }}
                            </span>
                        </td>
                        <td class="px-8 py-5">
                            <form action="{{ route('admin.bookings.update', $b->id) }}" method="POST" class="flex gap-2">
                                @csrf @method('PATCH')
                                <select name="status" onchange="this.form.submit()" class="text-[10px] font-bold bg-zinc-50 border-none rounded-lg px-3 py-1 focus:ring-1 focus:ring-pink-200">
                                    <option value="pending" {{ $b->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $b->status === 'confirmed' ? 'selected' : '' }}>Confirm</option>
                                    <option value="cancelled" {{ $b->status === 'cancelled' ? 'selected' : '' }}>Cancel</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-8 py-20 text-center text-zinc-400 font-bold italic">Belum ada transaksi booking apapun.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
