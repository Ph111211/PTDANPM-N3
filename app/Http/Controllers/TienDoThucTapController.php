<?php

namespace App\Http\Controllers;

use App\Models\KetQuaThucTap;
use Illuminate\Http\Request;

class TienDoThucTapController extends Controller
{
    public function index()
    {
        $ketquas = KetQuaThucTap::paginate(10);
        return view('sinhvienrole/tiendothuctap.index', compact('ketquas'));
    }
}
