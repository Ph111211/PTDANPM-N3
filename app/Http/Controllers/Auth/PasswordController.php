<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        
        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard.admin')->with('status', 'password-updated');;
        } 
        if (Auth::user()->role === 'sinh_vien') {
            return redirect()->route('dashboard.sinhvien')->with('status', 'password-updated');
        }
        if (Auth::user()->role === 'giang_vien') {
            return redirect()->route('dashboard.giangvien')->with('status', 'password-updated');       }
    }
}
