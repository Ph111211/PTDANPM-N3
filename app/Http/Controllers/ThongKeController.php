<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\GiangVien;
use App\Models\DoAn;

class ThongKeController extends Controller
{
    public function index(){
    
        $sinhviens = DoAn::with(['SinhVien.GiangVien'])->get();
        

        return view('thongke.index', compact('sinhviens'));
    }
}