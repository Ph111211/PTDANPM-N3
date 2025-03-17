<?php
namespace App\Http\Controllers;

use App\Models\SinhVien;

class LuuTruController extends Controller
{
    public function index()
    {
        return view('capnhatketqua.index');
    }
}
