<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhvienController extends Controller
{
    public function index(Request $request)
    {
        return view('sinhviens.index');
    }
}
