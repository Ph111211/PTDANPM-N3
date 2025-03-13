<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\GiangVienController;

Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');
Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');
Route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangvien.index');



// Các route khác
Route::get('/giangvien/edit', [GiangVienController::class, 'edit'])->name('giangvien.edit');
Route::put('/giangvien', [GiangVienController::class, 'update'])->name('giangvien.update');
Route::delete('/giangvien', [GiangVienController::class, 'destroy'])->name('giangvien.destroy');
Route::post('/giangvien', [GiangVienController::class, 'store'])->name('giangvien.store');
