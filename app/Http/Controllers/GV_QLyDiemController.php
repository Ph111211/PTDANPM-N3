<?php
namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\DoAn;
use Illuminate\Http\Request;

class GV_QLyDiemController extends Controller
{
    public function index()
    {   
        $logo = asset('storage/images/logo.png');
        $doans = DoAn::paginate(5);
        $sinhviens = Sinhvien::get();
        return view('giangvien/quanlydiem.index', compact('doans','logo','sinhviens'));
    }
    public function chamdiem(Request $request)
    {
        $request->validate([
            'masv' => 'required',
            'diem_so' => 'required|numeric|min:0|max:10'
        ]);
        $doan = DoAn::where('ma_sv', $request->masv)->first();
    
        if (!$doan) {
            return redirect()->back()->with('error', 'Không tìm thấy đồ án của sinh viên này!');
        }
        $doan->diem_so = (float) $request->diem_so;
        $doan->save();
    
        return redirect()->back()->with('success', 'Lưu điểm thành công!');
    }
    public function suadiem(Request $request)
    {
        $request->validate([
            'masv' => 'required',
            'diem_so' => 'required|numeric|min:0|max:10'
        ]);
        $doan = DoAn::where('ma_sv', $request->masv)->first();
    
        if (!$doan) {
            return redirect()->back()->with('error', 'Không tìm thấy đồ án của sinh viên này!');
        }
        $doan->diem_so = (float) $request->diem_so;
        $doan->save();
    
        return redirect()->back()->with('success', 'Lưu điểm thành công!');
    }
}    