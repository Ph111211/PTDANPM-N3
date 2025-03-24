<?php
namespace App\Http\Controllers;

use App\Models\SinhVien;
use App\Models\DoAn;
use Illuminate\Http\Request;

class GV_QLyDeTaiController extends Controller
{
    public function index()
    {   
        $logo = asset('storage/images/logo.png');
        $doans = DoAn::paginate(5);
        $sinhviens = Sinhvien::get();
        return view('giangvien/quanlydetai.index', compact('doans','logo','sinhviens'));
    }
    public function create()
    {
        return view('giangvien/quanlydetai.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'thoi_gian_bat_dau' => 'required|date',
            'thoi_gian_ket_thuc' => 'required|date',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|string',
        ]);

        DoAn::create($request->all());

        return redirect()->route('giangvien/quanlydetai.index')->with('success', 'Đề tài đã được thêm!');
    }
    public function show($id)
    {
        $doans = DoAn::findOrFail($id);
        return view('giangvien/quanlydetai.show', compact('doans'));
    }
    public function edit($id)
    {
        $doans = DoAn::findOrFail($id);
        return view('giangvien/quanlydetai.edit', compact('doans'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'tieu_de' => 'required|string|max:255',
        'thoi_gian_bat_dau' => 'required|date',
        'thoi_gian_ket_thuc' => 'required|date|after_or_equal:thoi_gian_bat_dau',
        'mo_ta' => 'nullable|string',
        'trang_thai' => 'required|string|in:Đang mở,Đóng',
    ]);

    $doans = DoAn::findOrFail($id);
    $doans->update($request->all());

    return redirect()->route('giangvien/quanlydetai.index')->with('success', 'Cập nhật thành công');
}
public function destroy($ma_do_an)
{
    $doans = DoAn::findOrFail($ma_do_an);
    $doans->delete();

    return redirect()->route('giangvien/quanlydetai.index')->with('success', 'Đề tài đã được xóa thành công.');
}
public function phancong(Request $request)
    {
        $request->validate([
            'do_an_id' => 'required|exists:do_an,ma_do_an',
            'user_id'  => 'required|exists:sinh_vien,user_id'
        ]);

        $doan = DoAn::where('ma_do_an', $request->do_an_id)->firstOrFail();
        $user_id = $request->user_id;

        if ($doan->ma_sv == $user_id) {
            $doan->update([
                'ma_sv'      => null,
                'trang_thai' => 'Chưa có đề tài'
            ]);
            return redirect()->back()->with('success', 'Hủy phân công thành công.');
        } else {
            $doan->update([
                'ma_sv'      => $user_id,
            ]);
            return redirect()->back()->with('success', 'Phân công thành công.');
        }
    }
}