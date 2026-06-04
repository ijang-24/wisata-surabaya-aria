<?php

use App\Http\Controllers\WisataController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/wisata');
Route::resource('wisata', WisataController::class);