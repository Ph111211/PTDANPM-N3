<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiangVien;

class GiangVienController extends Controller
{
    public function index()
    {
        $giangviens = Giangvien::with('giangVien')->get();
        return view('giangviens.index', compact('giangviens'));
    }

    public function destroy($id)
    {
        $giangvien = GiangVien::findOrFail($id);
        $giangvien->delete();

        return redirect()->route('giangviens.index')->with('success', 'Giảng viên đã được xóa thành công.');
    }
}
