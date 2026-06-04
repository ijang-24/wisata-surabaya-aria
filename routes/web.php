<?php

use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WisataController::class, 'landing'])->name('landing');
Route::resource('wisata', WisataController::class);
