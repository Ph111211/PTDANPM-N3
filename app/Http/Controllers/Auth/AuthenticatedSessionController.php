<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors(['error' => 'Sai tên đăng nhập hoặc mật khẩu.']);
        }
        $request->session()->put('user_id', Auth::id());
        $request->session()->put('user_login', Auth::user()->username);
        $request->session()->regenerate();


        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif (Auth::user()->role === 'sinh_vien') {
            return redirect()->route('dashboard.sinhvien');
        }
        elseif (Auth::user()->role === 'giang_vien') {
            return redirect()->route('dashboard.giangvien');
        }

        return redirect()->route('home');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
