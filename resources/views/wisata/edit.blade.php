@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-xs border border-pink-100/60">
    <h2 class="text-2xl font-bold mb-6 text-zinc-800 tracking-tight">Perbarui Destinasi: <span class="text-pink-600">{{ $wisata->nama }}</span></h2>
    <form action="{{ route('wisata.update', $wisata->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('wisata._form')
        <div class="mt-8 flex gap-3">
            <button type="submit" class="bg-gradient-to-r from-pink-500 to-rose-500 text-white px-6 py-3 rounded-2xl font-semibold hover:opacity-90 transition shadow-sm">Simpan Perubahan</button>
            <a href="{{ route('wisata.index') }}" class="bg-zinc-100 text-zinc-600 px-6 py-3 rounded-2xl font-medium hover:bg-zinc-200 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
