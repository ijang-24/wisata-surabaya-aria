<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\WisataImage;
use Illuminate\Http\Request;
use App\Http\Requests\WisataRequest;
use Illuminate\Support\Facades\File;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $query = Wisata::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $wisatas = $query->latest()->get();
        return view('wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('wisata.create');
    }

    public function store(WisataRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_foto')) {
            $fileName = time() . '_' . $request->file('cover_foto')->getClientOriginalName();
            $request->file('cover_foto')->move(public_path('uploads/cover'), $fileName);
            $data['cover_foto'] = 'uploads/cover/' . $fileName;
        }

        $wisata = Wisata::create($data);

        if ($request->hasFile('galeri')) {
            $angles = ['Tampak Depan', 'Tampak Samping', 'Area Dalam', 'Spot Utama', 'Fasilitas'];
            foreach ($request->file('galeri') as $index => $file) {
                $galeriName = time() . '_' . $index . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/galeri'), $galeriName);

                WisataImage::create([
                    'wisata_id' => $wisata->id,
                    'foto_path' => 'uploads/galeri/' . $galeriName,
                    'angle_foto' => $angles[$index] ?? 'Lainnya'
                ]);
            }
        }

        return redirect()->route('wisata.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function show($id)
    {
        $wisata = Wisata::with('images')->findOrFail($id);
        return view('wisata.show', compact('wisata'));
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('wisata.edit', compact('wisata'));
    }

    public function update(WisataRequest $request, $id)
    {
        $wisata = Wisata::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('cover_foto')) {
            if (File::exists(public_path($wisata->cover_foto))) {
                File::delete(public_path($wisata->cover_foto));
            }
            $fileName = time() . '_' . $request->file('cover_foto')->getClientOriginalName();
            $request->file('cover_foto')->move(public_path('uploads/cover'), $fileName);
            $data['cover_foto'] = 'uploads/cover/' . $fileName;
        }

        $wisata->update($data);
        return redirect()->route('wisata.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        
        if (File::exists(public_path($wisata->cover_foto))) {
            File::delete(public_path($wisata->cover_foto));
        }

        $wisata->delete(); 
        return redirect()->route('wisata.index')->with('success', 'Data berhasil dihapus!');
    }
}