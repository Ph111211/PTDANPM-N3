<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiangVien;
use App\Models\User;

class GiangVienController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::paginate(5);
        return view('giangviens.index', ['giangviens' => $giangviens]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required',
            'email' => 'required|email',
            'khoa' => 'required',
            'sdt' => 'required|numeric',
        ]);

        $user = User::create([
            'name' => $request->ho_ten,
            'email' => $request->email,
            'password' => "00000000",

            'role' => 'giang_vien',
        ]);
        GiangVien::create([
            'user_id' => $user->id,
            'ho_ten' => $request->ho_ten,
            'khoa' => $request->khoa,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'so_luong_sinh_vien_huong_dan' => 0,


        ]);
        return redirect()->route('giangviens.index');
    }
    public function destroy($id)
    {
        // $giangvien = GiangVien::where('user_id', $id)->firstOrFail();
        

        GiangVien::where('user_id', $id)->delete();
        return redirect()->route('giangviens.index')->with('success', 'Xóa giảng viên thành công');
        
        
    }

    public function edit($id)
    {
        $giangvien = GiangVien::where('user_id', $id)->firstOrFail();
        return view('giangviens.edit', ['giangvien' => $giangvien]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ma_gv' => 'required',
            'ho_ten' => 'required',
            'email' => 'required|email',
            'khoa' => 'required',
            'sdt' => 'required|numeric',
        ]);


        $user = User::findOrFail($request->ma_gv);

        $user->update([
            'name' => $request->ho_ten,
            'email' => $request->email,
        ]);

        GiangVien::where('user_id', $request->ma_gv)->update([
            'ho_ten' => $request->ho_ten,
            'khoa' => $request->khoa,
            'email' => $request->email,
            'sdt' => $request->sdt,
        ]);

        return redirect()->route('giangviens.index');
    }
}