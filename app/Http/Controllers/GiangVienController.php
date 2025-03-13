<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiangVien;

class GiangVienController extends Controller
{
    public function index()
    {
        $giangviens = Giangvien::with('giangVien')->get();
        return view('giangviens.index', compact('giangviens'));
    }


    public function edit($ma_gv)
    {
        $giangvien = giangvien::findOrFail($ma_gv);
        return view('admin/giangvien.edit', compact('giangvien'));
    }

    public function update(Request $request, $ma_gv)
    {
        $request->validate([
            'ma_gv' => 'required|string|max:20',
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:tai_khoan,email,' . $ma_gv,
            'vai_tro' => 'required|in:Sinh viên,Giảng viên',
            'sdt' => 'required|string|max:15',
        ]);

        $giangvien = giangvien::findOrFail($ma_gv);
        $giangvien->update([
            'ma_gv' => $request->ma_gv,
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'vai_tro' => $request->vai_tro,
            'sdt' => $request->sdt
        ]);
        return redirect()->route('admin/giangvien.index')->with('success', 'Sửa thành công!');
    }

    public function destroy($ma_gv)
    {
        $giangvien = giangvien::findOrFail($ma_gv);
        $giangvien->delete();
        return redirect()->route('admin/giangvien.index')->with('success', 'Xóa thành công!');
    }
}
