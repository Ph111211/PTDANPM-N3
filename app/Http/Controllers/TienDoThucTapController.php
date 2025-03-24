<?php

namespace App\Http\Controllers;

use App\Models\DoAn;
use Illuminate\Http\Request;

class TienDoThucTapController extends Controller
{
    public function index()
    {
        $ketquas = DoAn::paginate(10);
        return view('sinhvienrole/tiendothuctap.index', compact('ketquas'));
    }
    public function update(Request $request, $ma_do_an)
    {
        $ketquadoan = DoAn::find($ma_do_an); // Sử dụng find thay vì findOrFail để xử lý trường hợp không tìm thấy

        if (!$ketquadoan) {
            return redirect()->route('tiendothuctap.index')->with('error', 'Không tìm thấy bản ghi.');
        }

        $ketquadoan->mo_ta_nhiem_vu = $request->mo_ta_nhiem_vu;
        $ketquadoan->nhiem_vu = $request->nhiem_vu;
        $ketquadoan->save(); // Lưu các thay đổi

        return redirect()->route('tiendothuctap.index')->with('success', 'Cập nhật thành công!');
    }
}
