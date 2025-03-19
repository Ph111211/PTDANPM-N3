<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\GiangVien;

class ThongKeController extends Controller
{
    public function index()
    {
        $sinhviens = SinhVien::all();
        return view('thongke.index', compact('sinhviens'));
    }
}