<?php

namespace App\Http\Controllers;

use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;

class KetQuaThucTapController extends Controller
{
    public function index()
    {
        $ketquas = KetQuaThucTap::with('sinhvien', 'doanhnghiep')->paginate(10);
        return view('ketquathuctap.index', compact('ketquas'));
    }
}
