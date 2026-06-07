<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataApiController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::all();
        return response()->json([
            'success' => true,
            'data' => $wisatas
        ]);
    }

    public function show($id)
    {
        $wisata = Wisata::with(['images', 'reviews.user'])->find($id);
        
        if (!$wisata) {
            return response()->json([
                'success' => false,
                'message' => 'Wisata tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $wisata
        ]);
    }
}
