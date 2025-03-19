<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiangVien extends Model
{
    use HasFactory;

    protected $table = 'giang_vien';
    protected $primaryKey = 'ma_gv';
    public $timestamps = false;

    protected $fillable = [
        'ma_gv', 'ho_ten', 'khoa', 'sdt', 'email', 'so_luong_sinh_vien_huong_dan'
    ];

    public function sinhvien()
    {
        return $this->hasMany(SinhVien::class, 'ma_gv', 'ma_gv');
    }
}
