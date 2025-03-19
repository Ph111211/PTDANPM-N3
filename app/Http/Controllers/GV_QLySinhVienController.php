<?php
namespace App\Http\Controllers;

use App\Models\SinhVien;

class GV_QLySinhVienController extends Controller
{
    public function index()
    {   
        $logo = asset('storage/images/logo.png');
        $sinhviens = SinhVien::paginate(5);
        return view('giangvien/quanlysinhvien.index', compact('sinhviens','logo'));
    }
}    