<?php

namespace App\Http\Controllers;

use App\Models\DoAn;
use App\Models\GiangVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class GiangVienHuongDanController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::all(); // Lấy danh sách giảng viên

        return view('sinhvienrole/giangvienhd.index', compact('giangviens'));
    }


    public function updateSoLuong(Request $request, $user_id)
    {

        // Tìm giảng viên theo ID
        $giangVien = GiangVien::where('user_id', $user_id)->first();

        if (!$giangVien) {
            return response()->json(['success' => false, 'message' => 'Giảng viên không tồn tại!'], 404);
        }

        // Kiểm tra số lượng sinh viên hợp lệ
        $request->validate([
            'so_luong' => 'required|integer|min:0|max:10'
        ]);

        // Cập nhật số lượng sinh viên hướng dẫn
        $giangVien->so_luong_sinh_vien_huong_dan = $request->so_luong;
        $giangVien->save();
        return redirect()->route('giangvienhd.index')->with('success', 'Cập nhật thành công!');
    }
}
