<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        
        if($request->user()->hasVerifiedEmail()){
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
        else{
            return view('auth.verify-email');
        }
    }
}
