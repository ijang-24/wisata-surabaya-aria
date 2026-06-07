<?php

use App\Http\Controllers\WisataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [WisataController::class, 'landing'])->name('landing');
    Route::get('/wisata', [WisataController::class, 'index'])->name('wisata.index');
    Route::get('/wisata/{id}', [WisataController::class, 'show'])->name('wisata.show');
    Route::get('/tentang-kota', [WisataController::class, 'tentang'])->name('tentang');
    Route::get('/kontak', [WisataController::class, 'kontak'])->name('kontak');
    
    // Bookings
    Route::post('/wisata/{id}/book', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
    
    // Reviews
    Route::post('/wisata/{id}/review', [ReviewController::class, 'store'])->name('reviews.store');
});

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin ONLY Routes (Management)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/wisata', [WisataController::class, 'adminIndex'])->name('admin.wisata.index');
    Route::get('/wisata/create', [WisataController::class, 'create'])->name('wisata.create');
    Route::post('/wisata', [WisataController::class, 'store'])->name('wisata.store');
    Route::get('/wisata/{id}/edit', [WisataController::class, 'edit'])->name('wisata.edit');
    Route::put('/wisata/{id}', [WisataController::class, 'update'])->name('wisata.update');
    Route::delete('/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata.destroy');
    
    // Admin Bookings
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::patch('/bookings/{id}', [BookingController::class, 'updateStatus'])->name('admin.bookings.update');
    
    // Reports
    Route::get('/reports/wisata-pdf', [ReportController::class, 'exportPdf'])->name('admin.reports.wisata.pdf');
});
