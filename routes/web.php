<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\CapNhatKetQuaController;
use App\Http\Controllers\KetQuaThucTapController;
use App\Http\Controllers\LichBaoVeController;
use App\Http\Controllers\PhanCongGVController;
use App\Http\Controllers\QuanLiDeTaiController;
use App\Http\Controllers\QuanLiDoAnController;

Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');
Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');

Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhviens.create');
Route::post('/sinhvien/store', [SinhVienController::class, 'store'])->name('sinhviens.store');
Route::get('/sinhvien/{user_id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{user_id}', [SinhVienController::class, 'update'])->name('sinhviens.update');
Route::match(['get', 'delete'], '/sinhvien/{user_id}/xoa', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');


route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangviens.index');
route::post('/giangvien/store', [GiangVienController::class, 'store'])->name('giangviens.store');

Route::get('/capnhatketqua', [CapNhatKetQuaController::class, 'index'])->name('capnhatketqua.index');

Route::get('/ketquathuctap', [KetQuaThucTapController::class, 'index'])->name('ketquathuctap.index');

Route::get('/phancong', [PhanCongGVController::class, 'index'])->name('phancong.index');
route::put('/phancong/{user_id}', [PhanCongGVController::class, 'update'])->name('phancong.update');

route::get('/lichbaove', [LichBaoVeController::class, 'index'])->name('lichbaove.index');
Route::delete('/giangvien/{user_id}/xoa', [GiangVienController::class, 'destroy'])->name('giangviens.destroy');
Route::put('/giangvien/{user_id}', [GiangVienController::class, 'update'])->name('giangviens.update');

route::put('/lichbaove/{tieu_de}', [LichBaoVeController::class, 'update'])->name('lichbaove.update');

//quanlidoan

route::get('/quanlidetai', [QuanLiDeTaiController::class, 'index'])->name('quanlidetai.index');
route::get('/quanlidoan', [QuanLiDoAnController::class, 'index'])->name('quanlidoan.index');
