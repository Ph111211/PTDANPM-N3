<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\SinhVien;
use App\Models\DoAn;
use Illuminate\Http\Request;

class PhanCongGVController extends Controller
{
    public function index()
    {
        $doans = DoAn::with('sinhvien')->paginate(10);
        $giangviens = GiangVien::all();
        return view('phancong.index', compact('doans', 'giangviens'));
    }

    public function store(Request $request)
    {
        DoAn::create([
            'ma_sv' => $request->ma_sv,
            'ten_do_an' => $request->ten_do_an,
            'diem_so' => $request->diem_so,
            'ma_gv' => $request->ma_gv,
            // Thêm các trường khác nếu cần
        ]);

        return redirect()->route('phancong.index')->with('success', 'Tạo đồ án thành công!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'dia_diem' => 'required|string|max:255',
            'ho_ten' => 'required|string|max:255',
            'lop' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        // Tìm đồ án
        $doAn = DoAn::findOrFail($id);
        $doAn->update([
            'tieu_de' => $request->tieu_de,
            'dia_diem' => $request->dia_diem,
        ]);

        // Cập nhật thông tin sinh viên
        $sinhVien = SinhVien::where('user_id', $doAn->ma_sv)->first();
        if ($sinhVien) {
            $sinhVien->update([
                'ho_ten' => $request->ho_ten,
                'lop' => $request->lop,
                'email' => $request->email,
                'sdt' => $request->sdt,
                'dia_chi' => $request->dia_chi,
                'ngay_sinh' => $request->ngay_sinh,
                'gioi_tinh' => $request->gioi_tinh,
            ]);
        }

        return redirect()->route('phancong.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy($ma_do_an)
    {
        $doan = DoAn::findOrFail($ma_do_an);
        $doan->delete();
        return redirect()->route('phancong.index')->with('success', 'Xóa thành công!');
    }

    public function assignGiangVien(Request $request)
    {
        // Lấy thông tin giảng viên
        $giangVien = GiangVien::find($request->ma_gv);
        if (!$giangVien) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy giảng viên!'
            ], 400);
        }

        // Đếm số lượng sinh viên đã hướng dẫn
        $soLuongSinhVien = DoAn::where('ma_gv', $giangVien->user_id)->count();

        // Kiểm tra nếu đã đủ số lượng sinh viên
        if ($soLuongSinhVien >= 10) {
            return response()->json([
                'success' => false,
                'message' => 'Giảng viên này đã hướng dẫn đủ 10 sinh viên! Không thể thêm.'
            ], 400);
        }

        // Gán giảng viên cho đồ án
        $doAn = DoAn::find($request->ma_do_an);
        if ($doAn) {
            $doAn->ma_gv = $giangVien->user_id;
            $doAn->save();

            return response()->json([
                'success' => true,
                'ten_gv' => $giangVien->ho_ten
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Lỗi khi cập nhật!'], 400);
    }

}
