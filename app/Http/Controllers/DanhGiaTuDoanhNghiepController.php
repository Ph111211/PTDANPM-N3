<?php

namespace App\Http\Controllers;

use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;

class DanhGiaTuDoanhNghiepController extends Controller
{
    public function index()
    {
        $ketquas = KetQuaThucTap::paginate(10);
        return view('sinhvienrole/danhgiatudoanhnghiep.index', compact('ketquas'));
    }
}
