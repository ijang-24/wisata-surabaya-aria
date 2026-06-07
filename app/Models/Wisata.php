<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Wisata extends Model
{
    protected $fillable = ['nama', 'alamat', 'deskripsi', 'harga_tiket', 'jam_operasional', 'nomor_kontak', 'cover_foto', 'kategori', 'video_url', 'maps_url'];

    protected function googleMapsSrc(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (str_contains($this->maps_url, 'google.com/maps/embed')) {
                    return $this->maps_url;
                }
                
                // Fallback: Use Google Maps search result if embed URL is not provided
                $query = urlencode($this->nama . ' ' . $this->alamat);
                return "https://maps.google.com/maps?q={$query}&t=&z=15&ie=UTF8&iwloc=&output=embed";
            }
        );
    }

    protected function youtubeId(): Attribute
    {
        return Attribute::make(
            get: function () {
                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->video_url, $match);
                return $match[1] ?? $this->video_url;
            }
        );
    }

    public function images()
    {
        return $this->hasMany(WisataImage::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected function hargaTiketRupiah(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp ' . number_format($this->harga_tiket, 0, ',', '.')
        );
    }
}