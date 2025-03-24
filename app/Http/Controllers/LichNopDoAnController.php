<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\User;
use App\Models\DoAn;

class LichNopDoAnController extends Controller
{
    public function lichnop()
    {   
        $logo = asset('storage/images/logo.png');
        $doans = DoAn::get();
        $sinhviens = Sinhvien::paginate(5);
        return view('giangvien/quanlydoan.lichnop', compact('doans','logo','sinhviens'));
    }
    public function create()
    {
        return view('giangvien/quanlydoan.lichnop');
    }
    public function store(Request $request)
    {
        $request->validate([
            'ma_sv' => 'required',
            'ho_ten' => 'required',
            'lop' => 'required',
            'tieu_de' => 'required',
            'email' => 'required|email|max:100',
            'ngay_gio' => 'required',
        ]);

        $user = User::create([
            'name' => $request->ho_ten,
            'email' => "123@example",
            'password' => "00000000",
            
            'role' => 'student',
        ]);

        SinhVien::create([
            'user_id' => $user->id,
            'ho_ten' => $request->ho_ten,
            'lop' => $request->lop,
            'email' => $request->email
        ]);
        DoAn::create([
            'ma_sv' => $user->id,
            'tieu_de' => $request->tieu_de,
            'ngay_gio' => $request->ngay_gio,
            'trang_thai' => 'Hoàn thành'
        ]);
        if (!$user) {
            return redirect()->back()->with('error', 'Lỗi khi tạo tài khoản!');
        }
        return redirect()->back()->with('success', 'Thêm lịch nộp thành công!');
    }
    public function update(Request $request, $id)
{
    $sinhvien = SinhVien::findOrFail($id);
    
    $sinhvien->update([
        'ho_ten' => $request->ho_ten,
        'lop' => $request->lop
    ]);

    $doAn = DoAn::where('ma_sv', $id)->first();
    if (!$doAn) {
        $doAn = new DoAn();
        $doAn->ma_sv = $id;
        $doAn->tieu_de = $request->tieu_de;
        $doAn->save([
            'tieu_de' => $request->tieu_de,
            'ngay_gio' => $request->ngay_gio
        ]);
    }
    if ($doAn) {
        $doAn->update([
            'tieu_de' => $request->tieu_de,
            'ngay_gio' => $request->ngay_gio
        ]);
    }

    return redirect()->back()->with('success', 'Cập nhật thành công!');
}
public function destroy($id)
{
    SinhVien::findOrFail($id)->delete();
    DoAn::where('ma_sv', $id)->delete();

    return redirect()->back()->with('success', 'Xóa thành công!');
}

}
