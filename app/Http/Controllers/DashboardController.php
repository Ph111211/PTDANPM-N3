<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function sinhvien()
    {
        return view('dashboard.sinhvien');
    }
    public function giangvien()
    {
        return view('dashboard.giangvien');
    }
    public function admin()
    {
        return view('dashboard.admin');
    }   
}
