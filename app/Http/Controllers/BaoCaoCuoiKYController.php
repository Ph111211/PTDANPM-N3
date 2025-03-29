<?php

namespace App\Http\Controllers;

use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;

class BaoCaoCuoiKYController extends Controller
{
    public function index()
    {
        return view('sinhvienrole/baocaocuoiky.index');
    }
}
