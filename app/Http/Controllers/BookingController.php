<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request, $wisata_id)
    {
        $request->validate([
            'booking_date' => 'required|date|after_or_equal:today',
            'quantity' => 'required|integer|min:1',
        ]);

        $wisata = Wisata::findOrFail($wisata_id);
        $totalPrice = $wisata->harga_tiket * $request->quantity;

        Booking::create([
            'user_id' => Auth::id(),
            'wisata_id' => $wisata->id,
            'booking_date' => $request->booking_date,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Booking berhasil! Silakan cek riwayat Anda.');
    }

    public function index()
    {
        $bookings = Booking::with('wisata')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
        return view('bookings.index', compact('bookings'));
    }

    public function adminIndex()
    {
        $bookings = Booking::with(['wisata', 'user'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => $request->status]);
        return back()->with('success', 'Status booking berhasil diperbarui!');
    }
}
