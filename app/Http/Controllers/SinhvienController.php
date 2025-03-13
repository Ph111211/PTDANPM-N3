<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhviens = SinhVien::with('doAn.giangVien')->get();
        return view('sinhviens.index', compact('sinhviens'));
    }
}
