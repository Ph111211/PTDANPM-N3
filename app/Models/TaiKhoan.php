<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'tai_khoan'; // Tên bảng trong database

    protected $primaryKey = 'id'; // Khóa chính

    public $timestamps = true; // Bật timestamps

    protected $fillable = ['ma', 'ho_ten', 'email', 'vai_tro', 'sdt', 'mat_khau'];


    protected $hidden = [
        'mat_khau'
    ];
}
