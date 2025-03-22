<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin/users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:users,email',
            'role' => 'required|in:student,lecture,admin',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password), // Mã hóa mật khẩu
        ]);

        return redirect()->route('admin/users.index')->with('success', 'Tạo tài khoản thành công!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin/users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:users,email,' . $id,
            'role' => 'required|in:student,lecture,admin',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin/users.index')->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin/users.index')->with('success', 'Xóa tài khoản thành công!');
    }
}
