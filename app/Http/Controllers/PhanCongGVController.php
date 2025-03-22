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
        $doans = DoAn::with('sinhvien','giangvien')->paginate(10);
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

    public function update(Request $request, $ma_do_an)
    {
        $doan = DoAn::findOrFail($ma_do_an);

        $doan->update([
            'dia_diem' => $request->dia_diem,
            'tieu_de' => $request->tieu_de,
            // Thêm các trường khác nếu cần
        ]);

        // Cập nhật thông tin sinh viên liên quan
        if ($doan->sinhvien) {
            $doan->sinhvien->update([
                'ho_ten' => $request->ho_ten,
                'lop' => $request->lop,
            ]);
        }

        return redirect()->route('phancong.index')->with('success', 'Cập nhật đồ án thành công!');
    }
    public function destroy($id)
    {
        $doan = DoAn::findOrFail($id);
        $doan->delete();
        return redirect()->route('phancong.index')->with('success', 'Xóa đồ án thành công!');
    }

    public function assignGiangVien(Request $request)
    {
        $request->validate([
            'ma_do_an' => 'required|exists:do_an,ma_do_an',
            'ma_gv' => 'required|exists:giang_vien,user_id',
        ]);

        $doAn = DoAn::find($request->ma_do_an);
        if ($doAn) {
            $doAn->ma_gv = $request->ma_gv;
            $doAn->save();
            $giangVien = GiangVien::find($request->ma_gv);
            return response()->json([
                'success' => true,
                'ten_gv' => $giangVien->ho_ten
            ]);
        }

        return redirect()->route('phancong.index')->with('success', 'Cập nhật đồ án thành công!');
    }
}
