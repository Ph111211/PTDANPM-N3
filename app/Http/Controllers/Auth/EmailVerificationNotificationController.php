<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
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

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
