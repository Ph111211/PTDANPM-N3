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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GiangVienHuongDanController;
use App\Http\Controllers\DanhGiaTuDoanhNghiepController;
use App\Http\Controllers\DangKyDeTaiNghiepController;
use App\Http\Controllers\TienDoThucTapController;
use App\Http\Controllers\BaoCaoCuoiKYController;
use App\Http\Controllers\GV_QLyDoAnController;
use App\Http\Controllers\GV_QLyDeTaiController;
use App\Http\Controllers\GV_QLySinhvienController;






Route::middleware('guest')->group(function () {
    Route::get('/trangchu', [HomeController::class, 'trangchu'])->name('trangchu');
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
    
    
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('change-password', [ProfileController::class ,'showChangePasswordForm']);
    
    Route::get('/dashboardadmin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    // Các route users
    // Khi nhấn vào "Quản lý tài khoản", chuyển đến trang index trong UserController
    Route::get('/users', [UserController::class, 'index'])->name('admin/users.index');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Cac route sinh vien
    Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');
    Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhviens.create');
    Route::post('/sinhvien/store', [SinhVienController::class, 'store'])->name('sinhviens.store');
    Route::get('/sinhvien/{user_id}/edit', [SinhVienController::class, 'edit'])->name('sinhviens.edit');
    Route::put('/sinhvien/{user_id}', [SinhVienController::class, 'update'])->name('sinhviens.update');
    Route::match(['get', 'delete'], '/sinhvien/{user_id}/xoa', [SinhVienController::class, 'destroy'])->name('sinhviens.destroy');
    // Cac route giang vien
    route::get('/giangvien', [GiangVienController::class, 'index'])->name('giangviens.index');
    route::post('/giangvien/store', [GiangVienController::class, 'store'])->name('giangviens.store');
    Route::delete('/giangvien/{user_id}/xoa', [GiangVienController::class, 'destroy'])->name('giangviens.destroy');
    Route::put('/giangvien/{user_id}', [GiangVienController::class, 'update'])->name('giangviens.update');
    //route lichbaove
    route::get('/lichbaove', [LichBaoVeController::class, 'index'])->name('lichbaove.index');
    route::put('/lichbaove/{tieu_de}', [LichBaoVeController::class, 'update'])->name('lichbaove.update');
    
    // Cập nhập kết quả đồ án
    Route::get('/capnhatketqua', [CapNhatKetQuaController::class, 'index'])->name('capnhatketqua.index');
    Route::put('/capnhatketqua/{ma_do_an}', [CapNhatKetQuaController::class, 'update'])->name('capnhatketqua');
    // Các route phanconggiangvien
    Route::get('/phancong', [PhanCongGVController::class, 'index'])->name('phancong.index');
    Route::put('/phancong/{ma_do_an}', [PhanCongGVController::class, 'update'])->name('phancong.update');
    Route::delete('/phancong/{ma_do_an}', [PhanCongGVController::class, 'destroy'])->name('phancong.destroy');
    Route::post('/assign-giang-vien', [PhanCongGVController::class, 'assignGiangVien'])->name('assign.giangvien');
    Route::get('/giangvienhd', [GiangVienHuongDanController::class, 'index'])->name('giangvienhd.index');
    Route::post('/capnhat-giangvien/{ma_do_an}', [GiangVienHuongDanController::class, 'capnhatGiangVien']);
    Route::get('/tiendothuctap', [TienDoThucTapController::class, 'index'])->name('tiendothuctap.index');
    Route::get('/baocaocuoiky', [BaoCaoCuoiKYController::class, 'index'])->name('baocaocuoiky.index');
    Route::get('/danhgiatudoanhnghiep', [DanhGiaTuDoanhNghiepController::class, 'index'])->name('danhgiatudoanhnghiep.index');
    




    
        
        Route::get('/dashboardgiangvien', [DashboardController::class, 'giangvien'])->name('dashboard.giangvien');
        // Cập nhập kết quả đồ án
        Route::get('/capnhatketqua', [CapNhatKetQuaController::class, 'index'])->name('capnhatketqua.index');
        Route::put('/capnhatketqua/{ma_do_an}', [CapNhatKetQuaController::class, 'update'])->name('capnhatketqua');
        
        // Add other giangvien-specific routes here
   




    
        
    //dashboard sinh vien
    Route::get('/dashboardsinhvien', [DashboardController::class, 'sinhvien'])->name('dashboard.sinhvien');
     //them gv huong dan
    Route::get('/giangvienhd', [GiangVienHuongDanController::class, 'index'])->name('giangvienhd.index');
    Route::post('/capnhat-giangvien/{ma_do_an}', [GiangVienHuongDanController::class, 'capnhatGiangVien']);
    Route::get('/dangkithuctap', [KetQuaThucTapSinhVienController::class, 'create'])->name('dangkithuctap');
    // Route::get('/danhgiatudoanhnghiep', [DanhGiaTuDoanhNghiepController::class, 'index'])->name('danhgiatudoanhnghiep.index');

    // Route::get('/ketquathuctapsv', [KetQuaThucTapSinhVienController::class, 'index'])->name('ketquathuctapsv.index');
   Route::post('/dangkithuctap', [KetQuaThucTapSinhVienController::class, 'store'])->name('dangkithuctap.store');
    
    
        // Add other sinhvien-specific routes here
    
        

    
        
      

    
       
    
    
    
    

Route::get('/ketquathuctap', [KetQuaThucTapController::class, 'index'])->name('ketquathuctap.index');
route::get('/dangkydetai', [DangKyDeTaiNghiepController::class, 'index'])->name('dangkydetai.index');
Route::post('/do-an/store', [DangKyDeTaiNghiepController::class, 'store'])->name('doan.store');





Route::get('/thongke', [ThongKeController::class, 'index'])->name('thongke.index');



Route::get('/danhgiatudoanhnghiep', [DanhGiaTuDoanhNghiepController::class, 'index'])->name('danhgiatudoanhnghiep.index');

Route::get('/ketquathuctapsv', [KetQuaThucTapSinhVienController::class, 'index'])->name('ketquathuctapsv.index');
Route::put('/tiendothuctap/{ma_do_an}', [TienDoThucTapController::class, 'update'])->name('tiendothuctap');


Route::get('/giangvien/quanlysinhvien', [GV_QLySinhvienController::class, 'index'])->name('giangvien/quanlysinhvien.index');
Route::post('/cap-nhat-trang-thai', [GV_QLySinhvienController::class, 'capNhatTrangThai'])->name('doan.capnhat');
Route::post('/huy-phan-cong', [GV_QLySinhvienController::class, 'huyPhanCong'])->name('doan.huyPhanCong');
Route::get('/giangvien/quanlysinhvien/create', [GV_QLySinhvienController::class, 'create'])->name('giangvien/quanlysinhvien.create');
Route::post('/giangvien/quanlysinhvien/store', [GV_QLySinhvienController::class, 'store'])->name('giangvien/quanlysinhvien.store');



Route::get('/giangvien/quanlydetai', [GV_QLyDeTaiController::class, 'index'])->name('giangvien/quanlydetai.index');
Route::get('/giangvien/quanlydetai/create', [GV_QLyDeTaiController::class, 'create'])->name('giangvien/quanlydetai.create');
Route::post('/giangvien/quanlydetai/store', [GV_QLyDeTaiController::class, 'store'])->name('giangvien/quanlydetai.store');
Route::get('/giangvien/quanlydetai/show/{id}', [GV_QLyDeTaiController::class, 'show'])->name('giangvien/quanlydetai.show');
Route::get('/giangvien/quanlydetai/edit/{id}', [GV_QLyDeTaiController::class, 'edit'])->name('giangvien/quanlydetai.edit');
Route::put('/giangvien/quanlydetai/{id}', [GV_QLyDeTaiController::class, 'update'])->name('giangvien/quanlydetai.update');
Route::delete('giangvien/quanlydetai/{ma_do_an}', [GV_QLyDeTaiController::class, 'destroy'])->name('giangvien/quanlydetai.destroy');
Route::post('/giangvien/quanlydetai/phancong', [GV_QLyDeTaiController::class, 'phancong'])->name('giangvien/quanlydetai.phancong');

Route::delete('/giangvien/{user_id}/xoa', [GiangVienController::class, 'destroy'])->name('giangviens.destroy');
Route::put('/giangvien/{user_id}', [GiangVienController::class, 'update'])->name('giangviens.update');
Route::get('/giangvien/quanlydoan', [GV_QLyDoAnController::class, 'index'])->name('giangvien/quanlydoan.index');
Route::get('/giangvien/quanlydoan/show/{id}', [GV_QLyDoanController::class, 'show'])->name('giangvien/quanlydoan.show');
Route::post('/giangvien/quanlydoan/chamdiem', [GV_QLyDoanController::class, 'chamdiem'])->name('giangvien/quanlydoan.chamdiem');
Route::get('/giangvien/quanlydoan/lichnop', [GV_QLyDoAnController::class, 'lichnop'])->name('giangvien/quanlydoan.lichnop');


});

