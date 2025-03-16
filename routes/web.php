<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeTaiController;
// use App\Http\Controllers\GiangVienController;

// Route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangviens.index');

// Route::resource('giangviens', GiangVienController::class);

Route::get('/giangviens/{ma_gv}', [DeTaiController::class, 'index']);
