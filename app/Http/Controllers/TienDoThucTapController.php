<?php

namespace App\Http\Controllers;

use App\Models\DoAn;
use Illuminate\Http\Request;

class TienDoThucTapController extends Controller
{
    public function index()
    {
        $ketquas = DoAn::paginate(10);
        return view('sinhvienrole/tiendothuctap.index', compact('ketquas'));
    }
}
