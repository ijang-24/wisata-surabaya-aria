<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Wisata extends Model
{
    protected $fillable = ['nama', 'alamat', 'deskripsi', 'harga_tiket', 'jam_operasional', 'nomor_kontak', 'cover_foto', 'kategori', 'video_url', 'maps_url'];

    public function images()
    {
        return $this->hasMany(WisataImage::class);
    }

    protected function hargaTiketRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp ' . number_format($this->harga_tiket, 0, ',', '.')
        );
    }
}