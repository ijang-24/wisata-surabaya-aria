<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Nama Tempat Wisata</label>
        <input type="text" name="nama" value="{{ old('nama', $wisata->nama ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
        @error('nama') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Kategori Wisata</label>
        <select name="kategori" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
            @php $kat = $wisata->kategori ?? ''; @endphp
            <option value="alam" {{ $kat == 'alam' ? 'selected' : '' }}>Wisata Alam</option>
            <option value="sejarah" {{ $kat == 'sejarah' ? 'selected' : '' }}>Wisata Sejarah</option>
            <option value="religi" {{ $kat == 'religi' ? 'selected' : '' }}>Wisata Religi</option>
            <option value="kuliner" {{ $kat == 'kuliner' ? 'selected' : '' }}>Wisata Kuliner</option>
            <option value="hiburan" {{ $kat == 'hiburan' ? 'selected' : '' }}>Wisata Hiburan / Waterboom</option>
            <option value="edukasi" {{ $kat == 'edukasi' ? 'selected' : '' }}>Wisata Edukasi</option>
        </select>
    </div>

    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Harga Tiket Masuk (IDR)</label>
        <input type="number" name="harga_tiket" value="{{ old('harga_tiket', $wisata->harga_tiket ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
        @error('harga_tiket') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Jam Operasional</label>
        <input type="text" name="jam_operasional" placeholder="Contoh: 08.00 - 16.00 WIB" value="{{ old('jam_operasional', $wisata->jam_operasional ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
        @error('jam_operasional') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Nomor Kontak</label>
        <input type="text" name="nomor_kontak" value="{{ old('nomor_kontak', $wisata->nomor_kontak ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
        @error('nomor_kontak') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">ID Video YouTube Embed</label>
        <input type="text" name="video_url" placeholder="Contoh: dQw4w9WgXcQ" value="{{ old('video_url', $wisata->video_url ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
        @error('video_url') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Link URL Google Maps Embed</label>
        <input type="text" name="maps_url" value="{{ old('maps_url', $wisata->maps_url ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
    </div>

    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Alamat Lengkap</label>
        <input type="text" name="alamat" value="{{ old('alamat', $wisata->alamat ?? '') }}" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">
        @error('alamat') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Deskripsi Wisata</label>
        <textarea name="deskripsi" rows="4" class="w-full border border-pink-100/80 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all">{{ old('deskripsi', $wisata->deskripsi ?? '') }}</textarea>
        @error('deskripsi') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Foto Cover Utama</label>
        <input type="file" name="cover_foto" class="w-full bg-white border border-pink-100/80 p-2.5 rounded-xl shadow-xs file:mr-4 file:py-1 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100">
        @error('cover_foto') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    @if(!isset($wisata))
    <div>
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Gambar Galeri (Multi-upload)</label>
        <input type="file" name="galeri[]" multiple class="w-full bg-white border border-pink-100/80 p-2.5 rounded-xl shadow-xs file:mr-4 file:py-1 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100">
    </div>
    @endif
</div>