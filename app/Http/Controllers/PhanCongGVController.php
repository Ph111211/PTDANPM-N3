<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class PhanCongGVController extends Controller
{
    public function index()
    {
        $sinhvien = SinhVien::with("doan")->paginate(10);
        return view('phancong.index', compact('sinhvien'));
    }

    /**
     * Hiển thị form thêm người dùng mới.
     */
    public function create()
    {
        $giangvien = GiangVien::all();
        return view('phancong.create', compact('giangvien'));
    }

    /**
     * Cập nhật thông tin sinh viên.
     */
    public function update(Request $request, $user_id)
    {
        $sinhvien = SinhVien::findOrFail($user_id);

        $sinhvien->update([
            'ma_sv' => $request->ma_sv,
            'ho_ten' => $request->ho_ten,
            'lop' => $request->lop,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'dia_chi' => $request->dia_chi,
        ]);

        return redirect()->route('phancong.index')->with('success', 'Cập nhật sinh viên thành công!');
    }

    public function destroy($user_id)
    {
        $sinhvien = SinhVien::findOrFail($user_id);
        $sinhvien->delete();
        return redirect()->route('phancong.index')->with('success', 'Xóa sinh viên thành công!');
    }
}
