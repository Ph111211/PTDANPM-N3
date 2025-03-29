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
    public function create()
    {
        return view('dangkithuctap.index');
    }
    public function store(Request $request)
    {   
        $student_id = auth()->user()->id;
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'ten_dn' => 'required|string|max:255',
            'vi_tri' => 'required|string|max:255',

        ]);
        
            KetQuaThucTap::create([
                'ma_sv' => $student_id,
                'ten_dn' => $request->ten_dn,
                'vi_tri' => $request->vi_tri
            ]);
        
        

        return redirect()->route('ketquathuctapsv.index')->with('success', 'Kết quả thực tập đã được thêm thành công.');
    }
}
