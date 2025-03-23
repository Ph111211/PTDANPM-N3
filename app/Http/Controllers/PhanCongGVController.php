<?php
namespace App\Http\Controllers;

use App\Models\GiangVien;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class PhanCongGVController extends Controller
{
    public function index()
    {
        $sinhvien = SinhVien::with('giangvien')->paginate(10);
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

    public function update(Request $request, $id)
    {
        $request->validate([
            'ma_sv' => 'required|string|max:20',
            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'required|date', // Thêm validation cho ngay_sinh
            'gioi_tinh' => 'required|in:Nam,Nữ', // Thêm validation cho gioi_tinh
            'lop' => 'required|string|max:20', // Thêm validation cho lop
            'sdt' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:sinh_viens,email,' . $id, // Sửa tên bảng thành sinh_viens
            'dia_chi' => 'required|string|max:255', // Thêm validation cho dia_chi
            'ma_gv' => 'nullable|string|max:20', // Thêm validation cho ma_gv (nullable)
            'ma_dn' => 'nullable|string|max:20', // Thêm validation cho ma_dn (nullable)
        ]);

        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->update([
            'ma_sv' => $request->ma_sv,
            'ho_ten' => $request->ho_ten,
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'lop' => $request->lop,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'dia_chi' => $request->dia_chi,
            'ma_gv' => $request->ma_gv,
            'ma_dn' => $request->ma_dn,
        ]);

        return redirect()->route('phancong.index')->with('success', 'Sửa sinh viên thành công!');
    }
    public function destroy($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->delete();
        return redirect()->route('phancong.index')->with('success', 'Xóa thành công!');
    }
}
