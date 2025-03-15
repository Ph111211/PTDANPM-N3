<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    use HasFactory;

    protected $table = 'giang_vien';
    protected $fillable = [
        'ma_gv',
        'ho_ten',
        'email',
        'khoa',
        'sdt',
    ];
}
