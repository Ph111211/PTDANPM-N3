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
        } 
        if (Auth::user()->role === 'sinh_vien') {
            return redirect()->route('dashboard.sinhvien');
        }
        if (Auth::user()->role === 'giang_vien') {
            return redirect()->route('dashboard.giangvien');
        }

        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page or home

        return redirect()->route('trangchu');
    }
}
