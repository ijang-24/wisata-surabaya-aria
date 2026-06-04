<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WisataImage extends Model
{
    protected $fillable = ['wisata_id', 'foto_path', 'angle_foto'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}