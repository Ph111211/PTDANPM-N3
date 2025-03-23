<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SinhVienController extends Controller
{
    public function index()
    {
        $sinhviens = SinhVien::paginate(5);
        return view('sinhviens.index', compact('sinhviens'));
    }

    public function create()
    {
        return view('sinhviens.create');
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'ho_ten' => 'required|string|max:100',
            'ngay_sinh' => 'required|date',
            'gioi_tinh' => 'required|in:Nam,Nữ',
            'lop' => 'required|string|max:20',
            'sdt' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:users,email',
            'dia_chi' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->ho_ten,
            'email' => $request->email,
            'password' => "00000000",
            
            'role' => 'sinh_vien',
        ]);

        SinhVien::create([
            'user_id' => $user->id,
            'ho_ten' => $request->ho_ten,
            'ngay_sinh' => $request->ngay_sinh,
            'gioi_tinh' => $request->gioi_tinh,
            'lop' => $request->lop,
            'sdt' => $request->sdt,
            'email' => $request->email,
            'dia_chi' => $request->dia_chi,
            
        ]);
            

        return redirect()->route('sinhviens.index')->with('success', 'Thêm sinh viên thành công!');
    }

    public function edit($user_id)
    {
        $sinhvien = SinhVien::findOrFail($user_id);
        return view('sinhviens.edit', compact('sinhvien'));
    }

    public function update(Request $request, $user_id)
    {
        $sinhvien = SinhVien::where('user_id', $user_id)->firstOrFail();
        $user = User::findOrFail($user_id);

        $validated = $request->validate([
            'ho_ten' => 'required|string|max:255',
            'ngay_sinh' => 'required|date',
            'gioi_tinh' => 'required|in:Nam,Nữ',
            'lop' => 'required|string|max:50',
            'sdt' => 'required|string|max:15',
            'email' => 'required|email|max:100|unique:users,email,' . $user_id,
            'dia_chi' => 'required|string',
        ]);

        $user->update([
            'name' => $validated['ho_ten'],
            'email' => $validated['email'],
        ]);

        $sinhvien->update($validated);

        return redirect()->route('sinhviens.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy($user_id)
    {
        $sinhvien = SinhVien::where('user_id', $user_id)->first();
        $user = User::find($user_id);

        if (!$sinhvien || !$user) {
            return redirect()->route('sinhviens.index')->with('error', 'Không tìm thấy sinh viên!');
        }

        $sinhvien->delete();
        $user->delete();

        return redirect()->route('sinhviens.index')->with('success', 'Xóa thành công!');
    }
}
