<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giangvien extends Model
{
    use HasFactory;

    protected $table = 'giang_vien';
    protected $fillable = ['user_id', 'ho_ten', 'khoa', 'email', 'sdt', 'so_luong_sinh_vien_huong_dan'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getGiangvienById($user_id)
    {
        return self::find($user_id);
    }
}
