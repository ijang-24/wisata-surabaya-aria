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
        <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400 font-bold text-sm">Rp</span>
            <input type="number" name="harga_tiket" value="{{ old('harga_tiket', $wisata->harga_tiket ?? '') }}" 
                class="w-full border border-pink-100/80 rounded-xl p-3 pl-11 focus:outline-none focus:ring-2 focus:ring-pink-300/50 bg-white/80 shadow-xs transition-all"
                placeholder="0">
        </div>
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

    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-1.5">Foto Cover Utama</label>
        <div class="flex items-start gap-4">
            <div id="cover-preview-container" class="{{ isset($wisata) && $wisata->cover_foto ? '' : 'hidden' }}">
                <img id="cover-preview" src="{{ isset($wisata) ? asset($wisata->cover_foto) : '#' }}" class="w-24 h-24 object-cover rounded-2xl border-2 border-pink-100 shadow-sm">
            </div>
            <div class="flex-1">
                <input type="file" name="cover_foto" id="cover_foto" onchange="previewImage(this, 'cover-preview', 'cover-preview-container')"
                    class="w-full bg-white border border-pink-100/80 p-2.5 rounded-xl shadow-xs file:mr-4 file:py-1 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100">
                @error('cover_foto') <p class="text-rose-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>

    <div class="md:col-span-2">
        <label class="block text-xs font-semibold text-zinc-500 uppercase tracking-wider mb-3">Gambar Galeri (Multi-upload)</label>
        
        <div id="gallery-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4">
            <div class="gallery-item bg-white p-3 rounded-2xl border border-pink-50 shadow-sm space-y-3">
                <div class="preview-box hidden h-32 w-full rounded-xl border-2 border-dashed border-pink-50 overflow-hidden">
                    <img src="#" class="w-full h-full object-cover">
                </div>
                <input type="file" name="galeri[]" onchange="previewGallery(this)"
                    class="w-full text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[10px] file:font-bold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100 transition-all">
            </div>
        </div>

        <button type="button" id="add-gallery-item" class="inline-flex items-center gap-2 text-xs font-bold text-pink-500 bg-pink-50 hover:bg-pink-100 px-4 py-2.5 rounded-xl transition-all cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Slot Foto Galeri
        </button>
    </div>
</div>

<script>
    function previewImage(input, previewId, containerId) {
        const preview = document.getElementById(previewId);
        const container = document.getElementById(containerId);
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewGallery(input) {
        const item = input.closest('.gallery-item');
        const previewBox = item.querySelector('.preview-box');
        const previewImg = previewBox.querySelector('img');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewBox.classList.remove('hidden');
                previewBox.classList.add('flex');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    document.getElementById('add-gallery-item').addEventListener('click', function() {
        const container = document.getElementById('gallery-container');
        const newItem = document.createElement('div');
        newItem.className = 'gallery-item bg-white p-3 rounded-2xl border border-pink-50 shadow-sm space-y-3 animate-in fade-in zoom-in duration-300 relative';
        newItem.innerHTML = `
            <button type="button" class="remove-item absolute -top-2 -right-2 z-10 bg-rose-500 text-white p-1 rounded-full hover:bg-rose-600 shadow-sm transition-all">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="preview-box hidden h-32 w-full rounded-xl border-2 border-dashed border-pink-50 overflow-hidden">
                <img src="#" class="w-full h-full object-cover">
            </div>
            <input type="file" name="galeri[]" onchange="previewGallery(this)"
                class="w-full text-xs file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-[10px] file:font-bold file:bg-pink-50 file:text-pink-600 hover:file:bg-pink-100 transition-all">
        `;
        container.appendChild(newItem);

        newItem.querySelector('.remove-item').addEventListener('click', function() {
            newItem.remove();
        });
    });
</script>