<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GiangVien;
use App\Models\SinhVien;
use App\Models\DoAn;

class LichBaoVeController extends Controller
{
    public function index()

    {
        $data = [];
        $data = DoAn::with(['SinhVien', 'GiangVien'])->get();

        return view('lichbaove.index', compact('data'));
    }
}