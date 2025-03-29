<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function trangchu()
{
    $logo = asset('storage/images/logo.png');
    return view('trangchu',compact('logo'));
}
public function dashboard()
{
    
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
}