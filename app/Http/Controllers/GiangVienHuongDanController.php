<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use Illuminate\Http\Request;

class GiangVienHuongDanController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::all(); // Lấy danh sách giảng viên
        return view('sinhvienrole/giangvienhd.index', compact('giangviens'));
    }

    public function updateSoLuong(Request $request)
    {
        // Lấy user_id của giảng viên từ form
        $selectedUserId = $request->giang_vien;

        // Tìm giảng viên
        $giangVien = GiangVien::where('user_id', $selectedUserId)->first();
        if (!$giangVien) {
            return back()->withErrors(['giang_vien' => 'Vui lòng chọn giảng viên']);
        }

        // Kiểm tra số lượng sinh viên hiện tại
        if ($giangVien->so_luong_sinh_vien_huong_dan >= 10) {
            return back()->withErrors(['giang_vien' => 'Giảng viên đã đủ số lượng sinh viên!']);
        }

        // Tăng số lượng sinh viên hướng dẫn lên 1
        $giangVien->so_luong_sinh_vien_huong_dan += 1;
        $giangVien->save();

        return redirect()->route('giangvienhd.index')->with('success', 'Chọn giảng viên thành công!');
    }
}
