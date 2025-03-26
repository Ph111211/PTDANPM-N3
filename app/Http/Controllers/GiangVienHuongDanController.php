<?php

namespace App\Http\Controllers;

use App\Models\DoAn;
use App\Models\GiangVien;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class GiangVienHuongDanController extends Controller
{
    public function index()
    {
        $giangvienhd = DoAn::with('SinhVien')->get();
        $giangviens = GiangVien::all(); // Lấy danh sách giảng viên

        return view('sinhvienrole/giangvienhd.index', compact('giangvienhd', 'giangviens'));
    }

    public function capnhatGiangVien(Request $request, $ma_do_an)
    {
        $doAn = DoAn::where('ma_do_an', $ma_do_an)->first();
        if (!$doAn) {
            return response()->json(['message' => 'Đồ án không tồn tại'], 404);
        }

        $giangVien = GiangVien::where('user_id', $request->input('giang_vien'))->first();
        if (!$giangVien) {
            return response()->json(['message' => 'Giảng viên không tồn tại'], 404);
        }

        try {
            DB::beginTransaction();
            // Cập nhật số lượng sinh viên hướng dẫn
            $giangVien->so_luong_sinh_vien_huong_dan = $request->input('so_luong')+1;
            $giangVien->save();
            // Cập nhật thông tin đồ án
            $doAn->ma_gv = $request->input('giang_vien');
//            $doAn->tieu_chi_giang_vien = $request->tieu_chi;
            $doAn->save();
            DB::commit();
            return redirect()->route('dashboard.sinhvien')->with('success', 'Chọn giảng viên thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Lỗi khi cập nhật: ' . $e->getMessage()], 500);
        }
    }
}
