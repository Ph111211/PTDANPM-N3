<?php

use App\Http\Controllers\BaoCaoCuoiKYController;
use App\Http\Controllers\DangKyDeTaiNghiepController;
use App\Http\Controllers\DanhGiaTuDoanhNghiepController;
use App\Http\Controllers\GiangVienHuongDanController;
use App\Http\Controllers\KetQuaThucTapSinhVienController;
use App\Http\Controllers\TienDoThucTapController;
use App\Http\Controllers\UserController;
use App\Models\DoAn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\CapNhatKetQuaController;
use App\Http\Controllers\KetQuaThucTapController;
use App\Http\Controllers\PhanCongGVController;

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

// Khi nhấn vào "Quản lý tài khoản", chuyển đến trang index trong UserController
Route::get('/users', [UserController::class, 'index'])->name('admin/users.index');

// Các route users
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Các route capnhatketqua
Route::put('/capnhatketqua/{ma_do_an}', [CapNhatKetQuaController::class, 'update'])->name('capnhatketqua');

// Các route phanconggiangvien
Route::get('/phancong', [PhanCongGVController::class, 'index'])->name('phancong.index');
Route::put('/phancong/{ma_do_an}', [PhanCongGVController::class, 'update'])->name('phancong.update');
Route::delete('/phancong/{ma_do_an}', [PhanCongGVController::class, 'destroy'])->name('phancong.destroy');
Route::post('/assign-giang-vien', [PhanCongGVController::class, 'assignGiangVien'])->name('assign.giangvien');

//actor sinh vien
Route::get('/giangvienhd', [GiangVienHuongDanController::class, 'index'])->name('giangvienhd.index');

Route::get('/danhgiatudoanhnghiep', [DanhGiaTuDoanhNghiepController::class, 'index'])->name('danhgiatudoanhnghiep.index');

Route::get('/ketquathuctapsv', [KetQuaThucTapSinhVienController::class, 'index'])->name('ketquathuctapsv.index');

Route::get('/baocaocuoiky', [BaoCaoCuoiKYController::class, 'index'])->name('baocaocuoiky.index');

Route::put('/capnhatgiangvien/{user_id}', [GiangVienHuongDanController::class, 'updateSoLuong']);


route::get('/dangkydetai', [DangKyDeTaiNghiepController::class, 'index'])->name('dangkydetai.index');
Route::post('/do-an/store', [DangKyDeTaiNghiepController::class, 'store'])->name('doan.store');

Route::get('/tiendothuctap', [TienDoThucTapController::class, 'index'])->name('tiendothuctap.index');
Route::put('/tiendothuctap/{ma_do_an}', [TienDoThucTapController::class, 'update'])->name('tiendothuctap');
