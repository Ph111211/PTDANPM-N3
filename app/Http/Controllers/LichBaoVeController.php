<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GiangVien;
use App\Models\SinhVien;

class LichBaoVeController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::paginate(5);
        $sinhviens = SinhVien::paginate(5);
        return view('lichbaove.index', compact('giangviens', 'sinhviens'));
    }
}
