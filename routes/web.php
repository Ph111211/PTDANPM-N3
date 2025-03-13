<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;
Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');
Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');

Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhviens.create');
Route::post('/sinhvien/store', [SinhVienController::class, 'store'])->name('sinhviens.store');
Route::get('/sinhvien/{ma_sv}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{ma_sv}', [SinhVienController::class, 'update'])->name('sinhviens.update');
Route::match(['get', 'delete'], '/sinhvien/{ma_sv}/xoa', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

