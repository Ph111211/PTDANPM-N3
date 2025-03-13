<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\GiangVien;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhviens = SinhVien::with(['giangVien', 'doAn.giangVien'])->paginate(5);
        return view('sinhviens.index', compact('sinhviens'));
    }
    public function create() {
        $giangViens = GiangVien::all();
        return view('sinhviens.create', compact('giangViens'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'ma_sv' => 'required|string|max:20|unique:sinh_vien',
            'ho_ten' => 'required|string|max:100',
            'ngay_sinh' => 'required|date',
            'gioi_tinh' => 'required|in:Nam,Nữ',
            'lop' => 'required|string|max:20',
            'sdt' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:sinh_vien',
            'dia_chi' => 'required|string',
            'ma_gv' => 'required|string|exists:giang_vien,ma_gv',
        ]);
    
        SinhVien::create($validated);
        return redirect()->route('sinhviens.index')->with('success', 'Thêm sinh viên thành công!');
}
    public function edit($ma_sv)
    {
        $sinhvien = SinhVien::with('doAn.giangVien')->findOrFail($ma_sv);
        $giangViens = GiangVien::all();
        return view('sinhviens.edit', compact('sinhvien', 'giangViens'));
    }

    public function update(Request $request, $ma_sv)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'lop' => 'required|string|max:50',
            'tieu_de' => 'nullable|string|max:255',
            'trang_thai' => 'nullable|string|max:50',
        ]);

        $sinhvien = SinhVien::where('ma_sv', $ma_sv)->firstOrFail();
        $sinhvien->ho_ten = $request->ho_ten;
        $sinhvien->lop = $request->lop;
        $sinhvien->save();

        if ($sinhvien->doAn) {
            $sinhvien->doAn->tieu_de = $request->tieu_de;
            \DB::table('do_an')
            ->where('ma_sv', $ma_sv)
            ->update(['ma_gv' => $request->ma_gv,
                'trang_thai' => $request->trang_thai,
                'updated_at' => now()
            ]);
            $sinhvien->doAn->save();
        }

        return redirect()->route('sinhviens.index')->with('success', 'Cập nhật thành công');
    }
    public function destroy($ma_sv)
{
    $sinhvien = SinhVien::where('ma_sv', $ma_sv)->first();

    if (!$sinhvien) {
        return redirect()->route('sinhviens.index')->with('error', 'Không tìm thấy sinh viên!');
    }
    \DB::table('do_an')->where('ma_sv', $ma_sv)->delete();

    $sinhvien->delete();
    return redirect()->route('sinhviens.index')->with('success', 'Xóa thành công!');
}
}
