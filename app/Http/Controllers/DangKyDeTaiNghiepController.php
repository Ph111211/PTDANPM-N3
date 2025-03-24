<?php

namespace App\Http\Controllers;

use App\Models\DoAn;
use App\Models\GiangVien;
use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DangKyDeTaiNghiepController extends Controller
{
    public function index()
    {
        $doan = DoAn::paginate(10);
        $giangviens = GiangVien::all(); // Lấy danh sách giảng viên
        return view('sinhvienrole/dangkydetai.index', compact('doan','giangviens'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'thoi_gian_bat_dau' => 'required|date',
            'ma_sv' => 'required|exists:sinh_vien,user_id',
            'ma_gv' => 'nullable|exists:giang_vien,user_id',
            'nhan_xet' => 'nullable|string',
        ]);

        DoAn::create([
            'ma_do_an' => Str::uuid(), // Generate UUID
            'tieu_de' => $request->tieu_de,
            'thoi_gian_bat_dau' => $request->thoi_gian_bat_dau,
            'ma_sv' => auth()->user()->id, // Assuming the logged-in user is the student
            'ma_gv' => $request->ma_gv,
            'nhan_xet' => $request->nhan_xet,
        ]);

        return redirect()->route('dangkydetai.index')->with('success', 'Đồ án đã được đăng ký thành công.');
    }}
