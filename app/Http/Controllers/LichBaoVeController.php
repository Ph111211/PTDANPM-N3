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
       
        $data = DoAn::with(['SinhVien', 'GiangVien'])->whereNull('ngay_gio')->get();

        return view('lichbaove.index', compact('data'));
    }

    public function update(Request $request, $tieu_de)
    {
        $request->validate([
        'ngay_gio' => 'required|date',
        'dia_diem' => 'required|string|max:255',
        ]);
        $doan = DoAn::where('tieu_de', $tieu_de)->firstOrFail();

        $doan->ngay_gio = $request->ngay_gio;
        $doan->dia_diem = $request->dia_diem;
        $doan->save();

        return redirect()->route('lichbaove.index');
    }
}