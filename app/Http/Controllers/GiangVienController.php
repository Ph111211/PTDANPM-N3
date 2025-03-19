<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiangVien;

class GiangVienController extends Controller
{
    public function index()
    {
        $giangviens = GiangVien::all();
        return view('giangviens.index', ['giangviens' => $giangviens]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'ho_ten' => 'required',
            'email' => 'required|email',
            'khoa' => 'required',
            'sdt' => 'required|numeric',
        ]);

        GiangVien::create($request->all());

        return redirect()->route('giangviens.index');
    }
}
