<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SinhvienController;

Route::get('/', [HomeController::class, 'trangchu'])->name('trangchu');
Route::get('/sinhvien', [SinhvienController::class, 'index'])->name('sinhviens.index');
=======

Route::get('/', function () {
    return view('welcome');
});
>>>>>>> main
