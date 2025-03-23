<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;


class QuanLiDeTaiController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::paginate(5);
        return view('quanlidetai.index', ['giangviens' => $giangviens]);
    }
}
