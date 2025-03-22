<?php
namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\DoAn;
use App\Models\User;
use Illuminate\Http\Request;

class GV_QLySinhVienController extends Controller
{
    public function index()
    {   
        $logo = asset('storage/images/logo.png');
        $sinhviens = SinhVien::with('doAn')->paginate(5);
        return view('giangvien/quanlysinhvien.index', compact('sinhviens','logo'));
    }
    public function capNhatTrangThai(Request $request)
{
    $doAn = Doan::where('ma_sv', $request->user_id)->first();

    if ($doAn) {
        $doAn->trang_thai = $request->trang_thai;
        $doAn->save();
        return back()->with('success', 'Cập nhật trạng thái thành công!');
    }

    return back()->with('error', 'Không tìm thấy đề án!');
}
public function huyPhanCong(Request $request)
{
    $sinhvien = SinhVien::where('user_id', $request->user_id)->first();

    if ($sinhvien && $sinhvien->doAn) {
        $sinhvien->doAn->update([
            "ma_sv" => null,
            'trang_thai' => 'Chưa có đề tài',
        ]);

        return redirect()->back()->with('success', 'Hủy phân công thành công.');
    }

    return redirect()->back()->with('error', 'Không tìm thấy sinh viên hoặc đề tài.');
}
public function create()
    {
        return view('giangvien/quanlysinhvien.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'ho_ten' => 'required|string|max:100',
            'ngay_sinh' => 'required|date',
            'gioi_tinh' => 'required|in:Nam,Nữ',
            'lop' => 'required|string|max:20',
            'sdt' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:users,email',
            'dia_chi' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->ho_ten,
            'email' => $request->email,
            'password' => "00000000",
            
            'role' => 'student',
        ]);

        SinhVien::create([
            'user_id' => $user->id,
            'ho_ten' => $request->ho_ten,
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'lop' => $request->lop,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'dia_chi' => $request->dia_chi,
            
        ]);
            

        return redirect()->route('giangvien/quanlysinhvien.index')->with('success', 'Thêm sinh viên thành công!');
    }

}