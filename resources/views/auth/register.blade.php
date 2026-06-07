@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-[70vh]">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-sm border border-pink-100/50 p-8">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-zinc-800">Buat Akun Baru</h2>
            <p class="text-zinc-500 text-sm mt-2">Mulai petualangan Anda di Surabaya</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1.5 ml-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full bg-white border {{ $errors->has('name') ? 'border-red-400 ring-2 ring-red-50' : 'border-zinc-200' }} rounded-2xl px-5 py-3 text-sm focus:outline-none focus:ring-2 {{ $errors->has('name') ? 'focus:ring-red-100 focus:border-red-400' : 'focus:ring-pink-200/50 focus:border-pink-300' }} transition-all"
                        placeholder="Masukkan nama lengkap">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1.5 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1.5 ml-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-white border {{ $errors->has('email') ? 'border-red-400 ring-2 ring-red-50' : 'border-zinc-200' }} rounded-2xl px-5 py-3 text-sm focus:outline-none focus:ring-2 {{ $errors->has('email') ? 'focus:ring-red-100 focus:border-red-400' : 'focus:ring-pink-200/50 focus:border-pink-300' }} transition-all"
                        placeholder="nama@email.com">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1.5 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1.5 ml-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-white border {{ $errors->has('password') ? 'border-red-400 ring-2 ring-red-50' : 'border-zinc-200' }} rounded-2xl px-5 py-3 text-sm focus:outline-none focus:ring-2 {{ $errors->has('password') ? 'focus:ring-red-100 focus:border-red-400' : 'focus:ring-pink-200/50 focus:border-pink-300' }} transition-all"
                        placeholder="••••••••">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1.5 ml-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-zinc-700 mb-1.5 ml-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-white border border-zinc-200 rounded-2xl px-5 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-pink-200/50 focus:border-pink-300 transition-all"
                        placeholder="••••••••">
                </div>

                <button type="submit" 
                    class="w-full bg-pink-400 hover:bg-pink-500 text-white font-bold py-3.5 rounded-2xl shadow-lg shadow-pink-200/50 transition-all transform active:scale-[0.98]">
                    Daftar Akun
                </button>

                <p class="text-center text-sm text-zinc-500 pt-4">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-pink-500 font-semibold hover:underline">Masuk di sini</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
