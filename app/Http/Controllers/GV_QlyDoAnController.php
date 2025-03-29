<?php
namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\DoAn;
use Illuminate\Http\Request;

class GV_QLyDoAnController extends Controller
{
    public function index()
    {   
        $logo = asset('storage/images/logo.png');
        $doans = DoAn::paginate(5);
        $sinhviens = Sinhvien::get();
        return view('giangvien/quanlydoan.index', compact('doans','logo','sinhviens'));
    }
    public function show($id)
    {
        $logo = asset('storage/images/logo.png');
        $doans = DoAn::findOrFail($id);
        return view('giangvien/quanlydoan.show', compact('doans','logo'));
    }
    public function chamdiem(Request $request)
    {
        $request->validate([
            'ma_sv' => 'required',
            'diem' => 'required|integer|min:0|max:10'
        ]);
        $doan = DoAn::where('ma_sv', $request->ma_sv)->first();
    
        if (!$doan) {
            return redirect()->back()->with('error', 'Không tìm thấy đồ án của sinh viên này!');
        }
        $doan->update(['diem' => $request->diem]);
    
        return redirect()->back()->with('success', 'Lưu điểm thành công!');
    }

    public function lichnop()
    {   
        $logo = asset('storage/images/logo.png');
        $doans = DoAn::paginate(5);
        $sinhviens = Sinhvien::get();
        return view('giangvien/quanlydoan.lichnop', compact('doans','logo','sinhviens'));
    }
    
}    