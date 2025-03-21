<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\GV_QLySinhvienController;
use App\Http\Controllers\GV_QLyDeTaiController;
Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');
Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');

Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhviens.create');
Route::post('/sinhvien/store', [SinhVienController::class, 'store'])->name('sinhviens.store');
Route::get('/sinhvien/{user_id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{user_id}', [SinhVienController::class, 'update'])->name('sinhviens.update');
Route::match(['get', 'delete'], '/sinhvien/{user_id}/xoa', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');

Route::get('/giangvien/quanlysinhvien', [GV_QLySinhvienController::class, 'index'])->name('giangvien/quanlysinhvien.index');
Route::post('/cap-nhat-trang-thai', [GV_QLySinhvienController::class, 'capNhatTrangThai'])->name('doan.capnhat');
Route::post('/huy-phan-cong', [GV_QLySinhvienController::class, 'huyPhanCong'])->name('doan.huyPhanCong');
Route::get('/giangvien/quanlysinhvien/create', [GV_QLySinhvienController::class, 'create'])->name('giangvien/quanlysinhvien.create');
Route::post('/giangvien/quanlysinhvien/store', [GV_QLySinhvienController::class, 'store'])->name('giangvien/quanlysinhvien.store');

Route::get('/giangvien/quanlydetai', [GV_QLyDeTaiController::class, 'index'])->name('giangvien/quanlydetai.index');
Route::get('/giangvien/quanlydetai/create', [GV_QLyDeTaiController::class, 'create'])->name('giangvien/quanlydetai.create');
Route::post('/giangvien/quanlydetai/store', [GV_QLyDeTaiController::class, 'store'])->name('giangvien/quanlydetai.store');