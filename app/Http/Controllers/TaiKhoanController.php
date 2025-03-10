<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function index()
    {
        $taikhoans = TaiKhoan::paginate(10);
        return view('admin/taikhoan.index', compact('taikhoans'));
    }

    /**
     * Hiển thị form thêm người dùng mới.
     */
    public function create()
    {

        $taikhoans = TaiKhoan::all();
        return view('admin/taikhoan.create', compact('taikhoans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ma' => 'required|string|max:20',
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:tai_khoan,email',
            'vai_tro' => 'required|in:Sinh viên,Giảng viên',
            'sdt' => 'required|string|max:15',
            'mat_khau' => 'required|string|min:8',
        ]);

        $taiKhoan = new TaiKhoan([
            'ma' => $request->ma,
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'vai_tro' => $request->vai_tro,
            'sdt' => $request->sdt,
            'mat_khau' => $request->mat_khau,
        ]);
        $taiKhoan->save();

        return redirect()->route('admin/taikhoan.index')->with('success', 'Tạo tài khoản thành công!');
    }


    public function edit($id)
    {
        $taikhoan = TaiKhoan::findOrFail($id);
        return view('admin/taikhoan.edit', compact('taikhoan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ma' => 'required|string|max:20',
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:tai_khoan,email,' . $id,
            'vai_tro' => 'required|in:Sinh viên,Giảng viên',
            'sdt' => 'required|string|max:15',
        ]);

        $taikhoan = TaiKhoan::findOrFail($id);
        $taikhoan->update([
            'ma' => $request->ma,
            'ho_ten' => $request->ho_ten,
            'email' => $request->email,
            'vai_tro' => $request->vai_tro,
            'sdt' => $request->sdt
        ]);
        return redirect()->route('admin/taikhoan.index')->with('success', 'Sửa thành công!');
    }

    public function destroy($id)
    {
        $taikhoan = TaiKhoan::findOrFail($id);
        $taikhoan->delete();
        return redirect()->route('admin/taikhoan.index')->with('success', 'Xóa thành công!');
    }
}
