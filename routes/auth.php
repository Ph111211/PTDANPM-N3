<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectDefenseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KetQuaThucTapController;
use App\Http\Controllers\PhanCongGVController;
use App\Http\Controllers\CapNhatKetQuaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\KetQuaThucTapSinhVienController;
use App\Http\Controllers\LichBaoVeController;




Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::get('change-password', [ProfileController::class ,'showChangePasswordForm']);
    Route::get('add-date-defence',[ProjectDefenseController::class,'showProjectnullDate']);
    Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');


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
Route::put('/phancong/{id}', [PhanCongGVController::class, 'update'])->name('phancong.update');
Route::delete('/phancong/{id}', [PhanCongGVController::class, 'destroy'])->name('phancong.destroy');
Route::post('/phancong', [PhanCongGVController::class, 'store'])->name('phancong.store');
// Cac route sinh vien
Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhviens.create');
Route::post('/sinhvien/store', [SinhVienController::class, 'store'])->name('sinhviens.store');
Route::get('/sinhvien/{user_id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
Route::put('/sinhvien/{user_id}', [SinhVienController::class, 'update'])->name('sinhviens.update');
Route::match(['get', 'delete'], '/sinhvien/{user_id}/xoa', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');

Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');
route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangviens.index');
route::post('/giangvien/store', [GiangVienController::class, 'store'])->name('giangviens.store');
Route::delete('/giangvien/{user_id}/xoa', [GiangVienController::class, 'destroy'])->name('giangviens.destroy');
Route::put('/giangvien/{user_id}', [GiangVienController::class, 'update'])->name('giangviens.update');
// Các route capnhatketqua
Route::put('/capnhatketqua/{ma_do_an}', [CapNhatKetQuaController::class, 'update'])->name('capnhatketqua');

// Các route phanconggiangvien
Route::get('/phancong', [PhanCongGVController::class, 'index'])->name('phancong.index');
Route::put('/phancong/{ma_do_an}', [PhanCongGVController::class, 'update'])->name('phancong.update');
Route::delete('/phancong/{ma_do_an}', [PhanCongGVController::class, 'destroy'])->name('phancong.destroy');
Route::post('/assign-giang-vien', [PhanCongGVController::class, 'assignGiangVien'])->name('assign.giangvien');
Route::get('/giangvienhd', [GiangVienHuongDanController::class, 'index'])->name('giangvienhd.index');
Route::post('/capnhat-giangvien/{ma_do_an}', [GiangVienHuongDanController::class, 'capnhatGiangVien']);

Route::get('/danhgiatudoanhnghiep', [DanhGiaTuDoanhNghiepController::class, 'index'])->name('danhgiatudoanhnghiep.index');

Route::get('/ketquathuctapsv', [KetQuaThucTapSinhVienController::class, 'index'])->name('ketquathuctapsv.index');
route::get('/lichbaove', [LichBaoVeController::class, 'index'])->name('lichbaove.index');
route::put('/lichbaove/{tieu_de}', [LichBaoVeController::class, 'update'])->name('lichbaove.update');

route::put('/lichbaove/{tieu_de}', [LichBaoVeController::class, 'update'])->name('lichbaove.update');
});

