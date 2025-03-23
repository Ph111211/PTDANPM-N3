<?php

namespace App\Http\Controllers;

use App\Models\GiangVien;


class QuanLiDoAnController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::paginate(5);
        return view('quanlidoan.index', ['giangviens' => $giangviens]);
    }
}
