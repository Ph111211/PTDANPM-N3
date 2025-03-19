<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    public function trangchu()
{
    $logo = asset('storage/images/logo.png');
    return view('trangchu',compact('logo'));
}
}
