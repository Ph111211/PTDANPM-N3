<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DeTai;

class DeTaiController extends Controller
{
    public function index($ma_gv) {
        $deTais = DeTai::where('ma_gv', $ma_gv)->paginate(15);  
        return view('giangviens.detai', compact('deTais'));
    }
}
