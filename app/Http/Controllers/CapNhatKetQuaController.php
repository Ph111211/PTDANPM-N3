<?php

namespace App\Http\Controllers;

use App\Models\DoAn;
use Illuminate\Http\Request;

class CapNhatKetQuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ketquadoan = DoAn::paginate(10);
        return view('capnhatketqua.index', compact('ketquadoan'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ketquadoan = DoAn::findOrFail($id);
        $ketquadoan->update([
            'ma_do_an' => $request->ma_do_an,
            'diem_so' => $request->diem_so,
            'nhan_xet' => $request->nhan_xet,
            'trang_thai' => $request->trang_thai,
        ]);
        return redirect()->route('capnhatketqua.index')->with('success', 'Cập nhật thành công!');
    }

}
