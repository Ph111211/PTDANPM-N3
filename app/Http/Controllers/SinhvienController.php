<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhviens = SinhVien::all();
        return view('sinhvien.index', compact('sinhviens'));
    }
}
