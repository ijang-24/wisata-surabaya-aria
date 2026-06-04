<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WisataRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        $coverRule = $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg|max:2048' : 'nullable|image|mimes:jpeg,png,jpg|max:2048';

        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
            'harga_tiket' => 'required|numeric|min:0',
            'jam_operasional' => 'required|string',
            'nomor_kontak' => 'required|string',
            'kategori' => 'required|string',
            'video_url' => 'required|string',
            'maps_url' => 'nullable|string',
            'cover_foto' => $coverRule,
            'galeri.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
}