<?php

namespace App\Http\Controllers;

use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;

class KetQuaThucTapSinhVienController extends Controller
{
    public function index()
    {
        $ketquas = KetQuaThucTap::paginate(10);
        return view('sinhvienrole/ketquathuctapsv.index', compact('ketquas'));
    }
    ////
    public function store(Request $request)
    {
        $student_id = auth()->user()->id;
        $request->validate([
            'student_id' => 'required|integer',
            'internship_result' => 'required|string|max:255',
        ]);

        KetQuaThucTap::create([
            'ma_sv' => $student_id,
            'internship_result' => $request->internship_result,
        ]);

        return redirect()->route('ketquathuctapsv.index')->with('success', 'Kết quả thực tập đã được thêm thành công.');
    }
}
