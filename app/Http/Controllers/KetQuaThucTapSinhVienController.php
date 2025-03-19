<?php

namespace App\Http\Controllers;

use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;

class KetQuaThucTapSinhVienController extends Controller
{
    public function index()
    {
        $ketquas = KetQuaThucTap::paginate(10);
        return view('sinhvienrole/ketquathuctapsv.index', compact('ketquas'));
    }
}
