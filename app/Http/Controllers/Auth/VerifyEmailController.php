<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            
            if (Auth::user()->role === 'admin') {
                return redirect()->intended(route('dashboard.admin', absolute: false).'?verified=1');
            } 
            if (Auth::user()->role === 'sinh_vien') {
                return redirect()->intended(route('dashboard.sinhvien', absolute: false).'?verified=1');
            }
            if (Auth::user()->role === 'giang_vien') {
                return redirect()->intended(route('dashboard.giangvien', absolute: false).'?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        
    }
}
