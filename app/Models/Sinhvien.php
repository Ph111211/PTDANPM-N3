<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $table = 'sinh_vien';
    protected $fillable = ['ma_sv', 'ho_ten','ngay_sinh','gioi_tinh','lop','sdt', 'email', 'dia_chi', 'ma_gv','madn'];
}

